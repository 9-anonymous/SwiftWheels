<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerNl3D7ot\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerNl3D7ot/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerNl3D7ot.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerNl3D7ot\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerNl3D7ot\App_KernelDevDebugContainer([
    'container.build_hash' => 'Nl3D7ot',
    'container.build_id' => '72174206',
    'container.build_time' => 1714251514,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerNl3D7ot');
