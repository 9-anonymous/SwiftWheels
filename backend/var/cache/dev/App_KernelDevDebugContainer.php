<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerUoKBdqI\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerUoKBdqI/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerUoKBdqI.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerUoKBdqI\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerUoKBdqI\App_KernelDevDebugContainer([
    'container.build_hash' => 'UoKBdqI',
    'container.build_id' => '3a11ce30',
    'container.build_time' => 1713828397,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerUoKBdqI');
