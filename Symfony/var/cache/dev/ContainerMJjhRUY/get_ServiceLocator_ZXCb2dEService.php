<?php

namespace ContainerMJjhRUY;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_ZXCb2dEService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.zXCb2dE' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.zXCb2dE'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'validator' => ['services', 'validator', 'getValidatorService', false],
        ], [
            'validator' => '?',
        ]);
    }
}