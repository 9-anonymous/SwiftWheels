<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerFliSkXd\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerFliSkXd/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerFliSkXd.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerFliSkXd\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerFliSkXd\App_KernelDevDebugContainer([
    'container.build_hash' => 'FliSkXd',
    'container.build_id' => '0cd7b093',
    'container.build_time' => 1714370354,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerFliSkXd');
