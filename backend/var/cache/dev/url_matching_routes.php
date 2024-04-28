<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_accueil', '_controller' => 'App\\Controller\\AppController::index'], null, null, null, false, false, null]],
        '/api/cars' => [[['_route' => 'api_cars', '_controller' => 'App\\Controller\\CarController::getCars'], null, ['GET' => 0], null, false, false, null]],
        '/cart/add' => [[['_route' => 'cart_add', '_controller' => 'App\\Controller\\CartController::addToCart'], null, ['POST' => 0], null, false, false, null]],
        '/cart/payment' => [[['_route' => 'cart_payment', '_controller' => 'App\\Controller\\CartController::handlePayment'], null, ['POST' => 0], null, false, false, null]],
        '/home' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\LoginController::login'], null, ['POST' => 0], null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\LoginController::logout'], null, ['POST' => 0], null, false, false, null]],
        '/send-email' => [[['_route' => 'api_send-email', '_controller' => 'App\\Controller\\MailController::sendEmail'], null, ['POST' => 0], null, false, false, null]],
        '/messages' => [[['_route' => 'app_messages', '_controller' => 'App\\Controller\\MessageController::sendMessage'], null, ['POST' => 0], null, false, false, null]],
        '/notifications' => [
            [['_route' => 'app_notifications_unread', '_controller' => 'App\\Controller\\NotificationController::getUnreadNotifications'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'app_notifications_all', '_controller' => 'App\\Controller\\NotificationController::getAllNotifications'], null, ['GET' => 0], null, false, false, null],
        ],
        '/notifications/mark-as-read' => [[['_route' => 'app_notifications_mark_as_read', '_controller' => 'App\\Controller\\NotificationController::markNotificationsAsRead'], null, ['POST' => 0], null, false, false, null]],
        '/notifications/unread-count' => [[['_route' => 'app_notifications_unread_count', '_controller' => 'App\\Controller\\NotificationController::getUnreadNotificationsCount'], null, ['GET' => 0], null, false, false, null]],
        '/notifications/mark-all-as-read' => [[['_route' => 'app_notifications_mark_all_as_read', '_controller' => 'App\\Controller\\NotificationController::markAllNotificationsAsRead'], null, ['POST' => 0], null, false, false, null]],
        '/search/car' => [[['_route' => 'app_search_car', '_controller' => 'App\\Controller\\SearchCarController::index'], null, null, null, false, false, null]],
        '/marks' => [[['_route' => 'get_all_marks', '_controller' => 'App\\Controller\\SearchCarController::getCarBrands'], null, ['GET' => 0], null, false, false, null]],
        '/cars' => [[['_route' => 'get_all_cars', '_controller' => 'App\\Controller\\SearchCarController::getAllCars'], null, ['GET' => 0], null, false, false, null]],
        '/search/cars' => [[['_route' => 'search_cars', '_controller' => 'App\\Controller\\SearchCarController::searchCars'], null, ['POST' => 0], null, false, false, null]],
        '/register' => [[['_route' => 'api_register', '_controller' => 'App\\Controller\\SignupController::register'], null, ['POST' => 0], null, false, false, null]],
        '/api/users' => [[['_route' => 'api_clients', '_controller' => 'App\\Controller\\UserController::getClients'], null, ['GET' => 0], null, false, false, null]],
        '/users' => [[['_route' => 'app_user', '_controller' => 'App\\Controller\\UserController::listUsers'], null, ['GET' => 0], null, false, false, null]],
        '/car/new' => [[['_route' => 'car_new', '_controller' => 'App\\Controller\\CarController::create'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/api/(?'
                    .'|cars/(?'
                        .'|([^/]++)(*:226)'
                        .'|count(*:239)'
                    .')'
                    .'|users/(?'
                        .'|([^/]++)(*:265)'
                        .'|count(*:278)'
                    .')'
                .')'
                .'|/c(?'
                    .'|ar(?'
                        .'|t/(?'
                            .'|items/([^/]++)(*:317)'
                            .'|delete/([^/]++)(*:340)'
                        .')'
                        .'|/([^/]++)/owner(*:364)'
                    .')'
                    .'|onfirm\\-expert/([^/]++)(*:396)'
                .')'
                .'|/m(?'
                    .'|essages/(?'
                        .'|id/([^/]++)(*:432)'
                        .'|user/([^/]++)(*:453)'
                    .')'
                    .'|odels/([^/]++)(*:476)'
                .')'
                .'|/u(?'
                    .'|ploads/([^/]++)(*:505)'
                    .'|sers/role/([^/]++)(*:531)'
                .')'
                .'|/notifications/([^/]++)(*:563)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        226 => [[['_route' => 'api_delete_cars', '_controller' => 'App\\Controller\\CarController::deleteCars'], ['id'], ['DELETE' => 0], null, false, true, null]],
        239 => [[['_route' => 'api_count_cars', '_controller' => 'App\\Controller\\CarController::countCars'], [], ['GET' => 0], null, false, false, null]],
        265 => [[['_route' => 'api_delete_client', '_controller' => 'App\\Controller\\UserController::deleteClient'], ['id'], ['DELETE' => 0], null, false, true, null]],
        278 => [[['_route' => 'api_count_clients', '_controller' => 'App\\Controller\\UserController::countClients'], [], ['GET' => 0], null, false, false, null]],
        317 => [[['_route' => 'cart_items', '_controller' => 'App\\Controller\\CartController::getCartItems'], ['userId'], ['GET' => 0], null, false, true, null]],
        340 => [[['_route' => 'cart_delete', '_controller' => 'App\\Controller\\CartController::deleteCartItem'], ['itemId'], ['DELETE' => 0], null, false, true, null]],
        364 => [[['_route' => 'get_car_owner', '_controller' => 'App\\Controller\\SearchCarController::getCarOwner'], ['id'], ['GET' => 0], null, false, false, null]],
        396 => [[['_route' => 'confirm_expert', '_controller' => 'App\\Controller\\SignupController::confirmExpert'], ['token'], ['GET' => 0], null, false, true, null]],
        432 => [[['_route' => 'app_message_by_id', '_controller' => 'App\\Controller\\MessageController::getMessageById'], ['id'], ['GET' => 0], null, false, true, null]],
        453 => [[['_route' => 'app_messages_received', '_controller' => 'App\\Controller\\MessageController::getMessagesForUser'], ['receiverUsername'], ['GET' => 0], null, false, true, null]],
        476 => [[['_route' => 'get_models_for_mark', '_controller' => 'App\\Controller\\SearchCarController::getModelsForMark'], ['mark'], ['GET' => 0], null, false, true, null]],
        505 => [[['_route' => 'app_upload_file', '_controller' => 'App\\Controller\\MessageController::serveFile'], ['filename'], ['GET' => 0], null, false, true, null]],
        531 => [[['_route' => 'app_user_by_role', '_controller' => 'App\\Controller\\UserController::getUsersByRole'], ['role'], ['GET' => 0], null, false, true, null]],
        563 => [
            [['_route' => 'app_notifications_delete', '_controller' => 'App\\Controller\\NotificationController::deleteNotification'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
