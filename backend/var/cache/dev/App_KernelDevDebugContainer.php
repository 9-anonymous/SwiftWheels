<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerIsiCWJk\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerIsiCWJk/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerIsiCWJk.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerIsiCWJk\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerIsiCWJk\App_KernelDevDebugContainer([
    'container.build_hash' => 'IsiCWJk',
    'container.build_id' => '3ae66e5b',
    'container.build_time' => 1709329368,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerIsiCWJk');
