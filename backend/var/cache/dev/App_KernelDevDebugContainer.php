<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerXi3yIhV\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerXi3yIhV/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerXi3yIhV.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerXi3yIhV\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerXi3yIhV\App_KernelDevDebugContainer([
    'container.build_hash' => 'Xi3yIhV',
    'container.build_id' => '47bc06f4',
    'container.build_time' => 1709500344,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerXi3yIhV');
