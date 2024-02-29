<?php

namespace ContainerDUo52xX;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Es_EmMqService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.es.emMq' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.es.emMq'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'App\\Controller\\LoginController::login' => ['privates', '.service_locator.MbNPG0N', 'get_ServiceLocator_MbNPG0NService', true],
            'App\\Controller\\MailController::sendEmail' => ['privates', '.service_locator.uVvF4gL', 'get_ServiceLocator_UVvF4gLService', true],
            'App\\Controller\\MessageController::getMessageById' => ['privates', '.service_locator.sLkGFte', 'get_ServiceLocator_SLkGFteService', true],
            'App\\Controller\\MessageController::getMessagesForUser' => ['privates', '.service_locator.txp4834', 'get_ServiceLocator_Txp4834Service', true],
            'App\\Controller\\MessageController::getUnreadMessagesForUser' => ['privates', '.service_locator.txp4834', 'get_ServiceLocator_Txp4834Service', true],
            'App\\Controller\\MessageController::sendMessage' => ['privates', '.service_locator.JDhzbGq', 'get_ServiceLocator_JDhzbGqService', true],
            'App\\Controller\\SignupController::register' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\UserController::listUsers' => ['privates', '.service_locator.JDhzbGq', 'get_ServiceLocator_JDhzbGqService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Controller\\LoginController:login' => ['privates', '.service_locator.MbNPG0N', 'get_ServiceLocator_MbNPG0NService', true],
            'App\\Controller\\MailController:sendEmail' => ['privates', '.service_locator.uVvF4gL', 'get_ServiceLocator_UVvF4gLService', true],
            'App\\Controller\\MessageController:getMessageById' => ['privates', '.service_locator.sLkGFte', 'get_ServiceLocator_SLkGFteService', true],
            'App\\Controller\\MessageController:getMessagesForUser' => ['privates', '.service_locator.txp4834', 'get_ServiceLocator_Txp4834Service', true],
            'App\\Controller\\MessageController:getUnreadMessagesForUser' => ['privates', '.service_locator.txp4834', 'get_ServiceLocator_Txp4834Service', true],
            'App\\Controller\\MessageController:sendMessage' => ['privates', '.service_locator.JDhzbGq', 'get_ServiceLocator_JDhzbGqService', true],
            'App\\Controller\\SignupController:register' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\UserController:listUsers' => ['privates', '.service_locator.JDhzbGq', 'get_ServiceLocator_JDhzbGqService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
        ], [
            'App\\Controller\\LoginController::login' => '?',
            'App\\Controller\\MailController::sendEmail' => '?',
            'App\\Controller\\MessageController::getMessageById' => '?',
            'App\\Controller\\MessageController::getMessagesForUser' => '?',
            'App\\Controller\\MessageController::getUnreadMessagesForUser' => '?',
            'App\\Controller\\MessageController::sendMessage' => '?',
            'App\\Controller\\SignupController::register' => '?',
            'App\\Controller\\UserController::listUsers' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\LoginController:login' => '?',
            'App\\Controller\\MailController:sendEmail' => '?',
            'App\\Controller\\MessageController:getMessageById' => '?',
            'App\\Controller\\MessageController:getMessagesForUser' => '?',
            'App\\Controller\\MessageController:getUnreadMessagesForUser' => '?',
            'App\\Controller\\MessageController:sendMessage' => '?',
            'App\\Controller\\SignupController:register' => '?',
            'App\\Controller\\UserController:listUsers' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}
