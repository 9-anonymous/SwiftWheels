<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerWkrWlGE\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerWkrWlGE/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerWkrWlGE.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerWkrWlGE\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerWkrWlGE\App_KernelDevDebugContainer([
    'container.build_hash' => 'WkrWlGE',
    'container.build_id' => '19d8e449',
    'container.build_time' => 1709499474,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerWkrWlGE');
