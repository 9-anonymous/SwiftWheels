<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerWcWeDSQ\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerWcWeDSQ/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerWcWeDSQ.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerWcWeDSQ\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerWcWeDSQ\App_KernelDevDebugContainer([
    'container.build_hash' => 'WcWeDSQ',
    'container.build_id' => '2c28daa8',
    'container.build_time' => 1714254568,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerWcWeDSQ');
