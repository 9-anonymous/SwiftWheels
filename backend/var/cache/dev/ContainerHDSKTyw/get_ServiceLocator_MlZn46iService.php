<?php

namespace ContainerHDSKTyw;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_MlZn46iService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.mlZn46i' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.mlZn46i'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'App\\Controller\\LoginController::login' => ['privates', '.service_locator.RyflRLG', 'get_ServiceLocator_RyflRLGService', true],
            'App\\Controller\\MailController::sendEmail' => ['privates', '.service_locator.uVvF4gL', 'get_ServiceLocator_UVvF4gLService', true],
            'App\\Controller\\MessageController::getMessageById' => ['privates', '.service_locator.sLkGFte', 'get_ServiceLocator_SLkGFteService', true],
            'App\\Controller\\MessageController::getMessagesForUser' => ['privates', '.service_locator.iK3Dxq9', 'get_ServiceLocator_IK3Dxq9Service', true],
            'App\\Controller\\MessageController::sendMessage' => ['privates', '.service_locator.JDhzbGq', 'get_ServiceLocator_JDhzbGqService', true],
            'App\\Controller\\NotificationController::getAllNotifications' => ['privates', '.service_locator.eD04aH.', 'get_ServiceLocator_ED04aH_Service', true],
            'App\\Controller\\NotificationController::getUnreadNotifications' => ['privates', '.service_locator.eD04aH.', 'get_ServiceLocator_ED04aH_Service', true],
            'App\\Controller\\NotificationController::getUnreadNotificationsCount' => ['privates', '.service_locator.eD04aH.', 'get_ServiceLocator_ED04aH_Service', true],
            'App\\Controller\\NotificationController::markAllNotificationsAsRead' => ['privates', '.service_locator.161_wLo', 'get_ServiceLocator_161WLoService', true],
            'App\\Controller\\NotificationController::markNotificationsAsRead' => ['privates', '.service_locator.161_wLo', 'get_ServiceLocator_161WLoService', true],
            'App\\Controller\\SearchCarController::getCarBrands' => ['privates', '.service_locator.3LuXUDl', 'get_ServiceLocator_3LuXUDlService', true],
            'App\\Controller\\SearchCarController::getModelsForMark' => ['privates', '.service_locator.3LuXUDl', 'get_ServiceLocator_3LuXUDlService', true],
            'App\\Controller\\SignupController::register' => ['privates', '.service_locator.dTaHD7m', 'get_ServiceLocator_DTaHD7mService', true],
            'App\\Controller\\UserController::listUsers' => ['privates', '.service_locator.JDhzbGq', 'get_ServiceLocator_JDhzbGqService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Controller\\LoginController:login' => ['privates', '.service_locator.RyflRLG', 'get_ServiceLocator_RyflRLGService', true],
            'App\\Controller\\MailController:sendEmail' => ['privates', '.service_locator.uVvF4gL', 'get_ServiceLocator_UVvF4gLService', true],
            'App\\Controller\\MessageController:getMessageById' => ['privates', '.service_locator.sLkGFte', 'get_ServiceLocator_SLkGFteService', true],
            'App\\Controller\\MessageController:getMessagesForUser' => ['privates', '.service_locator.iK3Dxq9', 'get_ServiceLocator_IK3Dxq9Service', true],
            'App\\Controller\\MessageController:sendMessage' => ['privates', '.service_locator.JDhzbGq', 'get_ServiceLocator_JDhzbGqService', true],
            'App\\Controller\\NotificationController:getAllNotifications' => ['privates', '.service_locator.eD04aH.', 'get_ServiceLocator_ED04aH_Service', true],
            'App\\Controller\\NotificationController:getUnreadNotifications' => ['privates', '.service_locator.eD04aH.', 'get_ServiceLocator_ED04aH_Service', true],
            'App\\Controller\\NotificationController:getUnreadNotificationsCount' => ['privates', '.service_locator.eD04aH.', 'get_ServiceLocator_ED04aH_Service', true],
            'App\\Controller\\NotificationController:markAllNotificationsAsRead' => ['privates', '.service_locator.161_wLo', 'get_ServiceLocator_161WLoService', true],
            'App\\Controller\\NotificationController:markNotificationsAsRead' => ['privates', '.service_locator.161_wLo', 'get_ServiceLocator_161WLoService', true],
            'App\\Controller\\SearchCarController:getCarBrands' => ['privates', '.service_locator.3LuXUDl', 'get_ServiceLocator_3LuXUDlService', true],
            'App\\Controller\\SearchCarController:getModelsForMark' => ['privates', '.service_locator.3LuXUDl', 'get_ServiceLocator_3LuXUDlService', true],
            'App\\Controller\\SignupController:register' => ['privates', '.service_locator.dTaHD7m', 'get_ServiceLocator_DTaHD7mService', true],
            'App\\Controller\\UserController:listUsers' => ['privates', '.service_locator.JDhzbGq', 'get_ServiceLocator_JDhzbGqService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
        ], [
            'App\\Controller\\LoginController::login' => '?',
            'App\\Controller\\MailController::sendEmail' => '?',
            'App\\Controller\\MessageController::getMessageById' => '?',
            'App\\Controller\\MessageController::getMessagesForUser' => '?',
            'App\\Controller\\MessageController::sendMessage' => '?',
            'App\\Controller\\NotificationController::getAllNotifications' => '?',
            'App\\Controller\\NotificationController::getUnreadNotifications' => '?',
            'App\\Controller\\NotificationController::getUnreadNotificationsCount' => '?',
            'App\\Controller\\NotificationController::markAllNotificationsAsRead' => '?',
            'App\\Controller\\NotificationController::markNotificationsAsRead' => '?',
            'App\\Controller\\SearchCarController::getCarBrands' => '?',
            'App\\Controller\\SearchCarController::getModelsForMark' => '?',
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
            'App\\Controller\\MessageController:sendMessage' => '?',
            'App\\Controller\\NotificationController:getAllNotifications' => '?',
            'App\\Controller\\NotificationController:getUnreadNotifications' => '?',
            'App\\Controller\\NotificationController:getUnreadNotificationsCount' => '?',
            'App\\Controller\\NotificationController:markAllNotificationsAsRead' => '?',
            'App\\Controller\\NotificationController:markNotificationsAsRead' => '?',
            'App\\Controller\\SearchCarController:getCarBrands' => '?',
            'App\\Controller\\SearchCarController:getModelsForMark' => '?',
            'App\\Controller\\SignupController:register' => '?',
            'App\\Controller\\UserController:listUsers' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}
