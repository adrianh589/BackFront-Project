<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerMJjhRUY\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerMJjhRUY/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerMJjhRUY.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerMJjhRUY\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerMJjhRUY\App_KernelDevDebugContainer([
    'container.build_hash' => 'MJjhRUY',
    'container.build_id' => 'ddedd06f',
    'container.build_time' => 1597504529,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerMJjhRUY');
