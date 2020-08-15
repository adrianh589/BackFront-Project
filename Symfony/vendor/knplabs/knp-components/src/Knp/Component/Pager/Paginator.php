<?php

namespace Knp\Component\Pager;

use Knp\Component\Pager\Event;
use Knp\Component\Pager\Event\Subscriber\Paginate\PaginationSubscriber;
use Knp\Component\Pager\Event\Subscriber\Sortable\SortableSubscriber;
use Knp\Component\Pager\Exception\PageNumberOutOfRangeException;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Symfony\Component\EventDispatcher\Event as BaseEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\LegacyEventDispatcherProxy;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Paginator uses event dispatcher to trigger pagination
 * lifecycle events. Subscribers are expected to paginate
 * wanted target and finally it generates pagination view
 * which is only the result of paginator
 */
class Paginator implements PaginatorInterface
{
    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * Default options of paginator
     *
     * @var array
     */
    protected $defaultOptions = [
        self::PAGE_PARAMETER_NAME => 'page',
        self::SORT_FIELD_PARAMETER_NAME => 'sort',
        self::SORT_DIRECTION_PARAMETER_NAME => 'direction',
        self::FILTER_FIELD_PARAMETER_NAME => 'filterParam',
        self::FILTER_VALUE_PARAMETER_NAME => 'filterValue',
        self::DISTINCT => true,
        self::PAGE_OUT_OF_RANGE => self::PAGE_OUT_OF_RANGE_IGNORE,
        self::DEFAULT_LIMIT => self::DEFAULT_LIMIT_VALUE,
    ];

    /**
     * @var RequestStack|null
     */
    protected $requestStack;

    /**
     * Initialize paginator with event dispatcher
     * Can be a service in concept. By default it
     * hooks standard pagination subscriber
     *
     * @param EventDispatcherInterface|null $eventDispatcher
     * @param RequestStack|null             $requestStack
     */
    public function __construct(EventDispatcherInterface $eventDispatcher = null, RequestStack $requestStack = null)
    {
        $this->eventDispatcher = \class_exists(BaseEvent::class) && \class_exists(LegacyEventDispatcherProxy::class) ? LegacyEventDispatcherProxy::decorate($eventDispatcher) : $eventDispatcher;
        if (is_null($this->eventDispatcher)) {
            $this->eventDispatcher = new EventDispatcher();
            $this->eventDispatcher->addSubscriber(new PaginationSubscriber);
            $this->eventDispatcher->addSubscriber(new SortableSubscriber);
        }
        $this->requestStack = $requestStack;
    }

    /**
     * Override the default paginator options
     * to be reused for paginations
     *
     * @param array $options
     */
    public function setDefaultPaginatorOptions(array $options): void
    {
        $this->defaultOptions = array_merge($this->defaultOptions, $options);
    }

    /**
     * Paginates anything (depending on event listeners)
     * into Pagination object, which is a view targeted
     * pagination object (might be aggregated helper object)
     * responsible for the pagination result representation
     *
     * @param mixed $target - anything what needs to be paginated
     * @param int $page - page number, starting from 1
     * @param int $limit - number of items per page
     * @param array $options - less used options:
     *     boolean $distinct - default true for distinction of results
     *     string $alias - pagination alias, default none
     *     array $allowList - sortable allow list for target fields being paginated
     *     string $pageOutOfRange - see PaginatorInterface::PAGE_OUT_OF_RANGE_*
     * @throws \LogicException
     * @throws PageNumberOutOfRangeException
     * @return PaginationInterface
     */
    public function paginate($target, int $page = 1, int $limit = null, array $options = []): PaginationInterface
    {
        $limit = $limit ?? $this->defaultOptions[self::DEFAULT_LIMIT];
        if ($limit <= 0 or $page <= 0) {
            throw new \LogicException("Invalid item per page number. Limit: $limit and Page: $page, must be positive non-zero integers");
        }

        $offset = ($page - 1) * $limit;
        $options = array_merge($this->defaultOptions, $options);

        // normalize default sort field
        if (isset($options[self::DEFAULT_SORT_FIELD_NAME]) && is_array($options[self::DEFAULT_SORT_FIELD_NAME])) {
            $options[self::DEFAULT_SORT_FIELD_NAME] = implode('+', $options[self::DEFAULT_SORT_FIELD_NAME]);
        }

        $request = null === $this->requestStack ? Request::createFromGlobals() : $this->requestStack->getCurrentRequest();

        // default sort field and direction are set based on options (if available)
        if (isset($options[self::DEFAULT_SORT_FIELD_NAME]) && !$request->query->has($options[self::SORT_FIELD_PARAMETER_NAME])) {
           $request->query->set($options[self::SORT_FIELD_PARAMETER_NAME], $options[self::DEFAULT_SORT_FIELD_NAME]);

            if (!$request->query->has($options[self::SORT_DIRECTION_PARAMETER_NAME])) {
                $request->query->set($options[self::SORT_DIRECTION_PARAMETER_NAME], $options[self::DEFAULT_SORT_DIRECTION] ?? 'asc');
            }
        }

        // before pagination start
        $beforeEvent = new Event\BeforeEvent($this->eventDispatcher, $request);
        $this->dispatch('knp_pager.before', $beforeEvent);
        // items
        $itemsEvent = new Event\ItemsEvent($offset, $limit);
        $itemsEvent->options = &$options;
        $itemsEvent->target = &$target;
        $this->dispatch('knp_pager.items', $itemsEvent);
        if (!$itemsEvent->isPropagationStopped()) {
            throw new \RuntimeException('One of listeners must count and slice given target');
        }
        if ($page > ceil($itemsEvent->count / $limit)) {
            $pageOutOfRangeOption = $options[self::PAGE_OUT_OF_RANGE] ?? $this->defaultOptions[self::PAGE_OUT_OF_RANGE];
            if ($pageOutOfRangeOption === self::PAGE_OUT_OF_RANGE_FIX && $itemsEvent->count > 0) {
                // replace page number out of range with max page
                return $this->paginate($target, ceil($itemsEvent->count / $limit), $limit, $options);
            }
            if ($pageOutOfRangeOption === self::PAGE_OUT_OF_RANGE_THROW_EXCEPTION) {
                throw new PageNumberOutOfRangeException("Page number: $page is out of range.");
            }
        }

        // pagination initialization event
        $paginationEvent = new Event\PaginationEvent;
        $paginationEvent->target = &$target;
        $paginationEvent->options = &$options;
        $this->dispatch('knp_pager.pagination', $paginationEvent);
        if (!$paginationEvent->isPropagationStopped()) {
            throw new \RuntimeException('One of listeners must create pagination view');
        }
        // pagination class can be different, with different rendering methods
        $paginationView = $paginationEvent->getPagination();
        $paginationView->setCustomParameters($itemsEvent->getCustomPaginationParameters());
        $paginationView->setCurrentPageNumber($page);
        $paginationView->setItemNumberPerPage($limit);
        $paginationView->setTotalItemCount($itemsEvent->count);
        $paginationView->setPaginatorOptions($options);
        $paginationView->setItems($itemsEvent->items);

        // after
        $afterEvent = new Event\AfterEvent($paginationView);
        $this->dispatch('knp_pager.after', $afterEvent);
        return $paginationView;
    }

    /**
     * Hooks in the given event subscriber
     *
     * @param \Symfony\Component\EventDispatcher\EventSubscriberInterface $subscriber
     */
    public function subscribe(EventSubscriberInterface $subscriber): void
    {
        $this->eventDispatcher->addSubscriber($subscriber);
    }

    /**
     * Hooks the listener to the given event name
     *
     * @param string $eventName
     * @param object $listener
     * @param integer $priority
     */
    public function connect(string $eventName, $listener, int $priority = 0): void
    {
        $this->eventDispatcher->addListener($eventName, $listener, $priority);
    }

    /**
     * Provide a BC way to dispatch events.
     *
     * @param string $eventName
     * @param Event\Event $event
     */
    protected function dispatch(string $eventName, Event\Event $event): void
    {
        if (!\class_exists(LegacyEventDispatcherProxy::class)) {
            $this->eventDispatcher->dispatch($eventName, $event);
        } else {
            $this->eventDispatcher->dispatch($event, $eventName);
        }
    }
}
