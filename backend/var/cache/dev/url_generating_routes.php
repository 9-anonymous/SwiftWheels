<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_xdebug' => [[], ['_controller' => 'web_profiler.controller.profiler::xdebugAction'], [], [['text', '/_profiler/xdebug']], [], [], []],
    '_profiler_font' => [['fontName'], ['_controller' => 'web_profiler.controller.profiler::fontAction'], [], [['text', '.woff2'], ['variable', '/', '[^/\\.]++', 'fontName', true], ['text', '/_profiler/font']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    'app_accueil' => [[], ['_controller' => 'App\\Controller\\AppController::index'], [], [['text', '/']], [], [], []],
    'api_cars' => [[], ['_controller' => 'App\\Controller\\CarController::getCars'], [], [['text', '/api/cars']], [], [], []],
    'api_delete_cars' => [['id'], ['_controller' => 'App\\Controller\\CarController::deleteCars'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/cars']], [], [], []],
    'api_count_cars' => [[], ['_controller' => 'App\\Controller\\CarController::countCars'], [], [['text', '/api/cars/count']], [], [], []],
    'cart_add' => [[], ['_controller' => 'App\\Controller\\CartController::addToCart'], [], [['text', '/cart/add']], [], [], []],
    'cart_items' => [['userId'], ['_controller' => 'App\\Controller\\CartController::getCartItems'], [], [['variable', '/', '[^/]++', 'userId', true], ['text', '/cart/items']], [], [], []],
    'cart_payment' => [[], ['_controller' => 'App\\Controller\\CartController::handlePayment'], [], [['text', '/cart/payment']], [], [], []],
    'cart_delete' => [['itemId'], ['_controller' => 'App\\Controller\\CartController::deleteCartItem'], [], [['variable', '/', '[^/]++', 'itemId', true], ['text', '/cart/delete']], [], [], []],
    'receipt_items' => [['userId'], ['_controller' => 'App\\Controller\\CartController::getPurchasedItems'], [], [['variable', '/', '[^/]++', 'userId', true], ['text', '/receipt/items']], [], [], []],
    'receipt_create' => [[], ['_controller' => 'App\\Controller\\CartController::createReceipt'], [], [['text', '/receipt/create']], [], [], []],
    'app_home' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/home']], [], [], []],
    'app_login' => [[], ['_controller' => 'App\\Controller\\LoginController::login'], [], [['text', '/login']], [], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\LoginController::logout'], [], [['text', '/logout']], [], [], []],
    'api_send-email' => [[], ['_controller' => 'App\\Controller\\MailController::sendEmail'], [], [['text', '/send-email']], [], [], []],
    'app_message_by_id' => [['id'], ['_controller' => 'App\\Controller\\MessageController::getMessageById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/messages/id']], [], [], []],
    'app_messages_received' => [['receiverUsername'], ['_controller' => 'App\\Controller\\MessageController::getMessagesForUser'], [], [['variable', '/', '[^/]++', 'receiverUsername', true], ['text', '/messages/user']], [], [], []],
    'app_messages' => [[], ['_controller' => 'App\\Controller\\MessageController::sendMessage'], [], [['text', '/messages']], [], [], []],
    'app_upload_file' => [['filename'], ['_controller' => 'App\\Controller\\MessageController::serveFile'], [], [['variable', '/', '[^/]++', 'filename', true], ['text', '/uploads']], [], [], []],
    'app_notifications_unread' => [[], ['_controller' => 'App\\Controller\\NotificationController::getUnreadNotifications'], [], [['text', '/notifications']], [], [], []],
    'app_notifications_mark_as_read' => [[], ['_controller' => 'App\\Controller\\NotificationController::markNotificationsAsRead'], [], [['text', '/notifications/mark-as-read']], [], [], []],
    'app_notifications_unread_count' => [[], ['_controller' => 'App\\Controller\\NotificationController::getUnreadNotificationsCount'], [], [['text', '/notifications/unread-count']], [], [], []],
    'app_notifications_mark_all_as_read' => [[], ['_controller' => 'App\\Controller\\NotificationController::markAllNotificationsAsRead'], [], [['text', '/notifications/mark-all-as-read']], [], [], []],
    'app_notifications_all' => [[], ['_controller' => 'App\\Controller\\NotificationController::getAllNotifications'], [], [['text', '/notifications']], [], [], []],
    'app_notifications_delete' => [['id'], ['_controller' => 'App\\Controller\\NotificationController::deleteNotification'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/notifications']], [], [], []],
    'app_search_car' => [[], ['_controller' => 'App\\Controller\\SearchCarController::index'], [], [['text', '/search/car']], [], [], []],
    'get_all_marks' => [[], ['_controller' => 'App\\Controller\\SearchCarController::getCarBrands'], [], [['text', '/marks']], [], [], []],
    'get_models_for_mark' => [['mark'], ['_controller' => 'App\\Controller\\SearchCarController::getModelsForMark'], [], [['variable', '/', '[^/]++', 'mark', true], ['text', '/models']], [], [], []],
    'get_all_cars' => [[], ['_controller' => 'App\\Controller\\SearchCarController::getAllCars'], [], [['text', '/cars']], [], [], []],
    'search_cars' => [[], ['_controller' => 'App\\Controller\\SearchCarController::searchCars'], [], [['text', '/search/cars']], [], [], []],
    'get_car_owner' => [['id'], ['_controller' => 'App\\Controller\\SearchCarController::getCarOwner'], [], [['text', '/owner'], ['variable', '/', '[^/]++', 'id', true], ['text', '/car']], [], [], []],
    'api_register' => [[], ['_controller' => 'App\\Controller\\SignupController::register'], [], [['text', '/register']], [], [], []],
    'confirm_expert' => [['token'], ['_controller' => 'App\\Controller\\SignupController::confirmExpert'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/confirm-expert']], [], [], []],
    'app_user_by_role' => [['role'], ['_controller' => 'App\\Controller\\UserController::getUsersByRole'], [], [['variable', '/', '[^/]++', 'role', true], ['text', '/users/role']], [], [], []],
    'api_clients' => [[], ['_controller' => 'App\\Controller\\UserController::getClients'], [], [['text', '/api/users']], [], [], []],
    'api_delete_client' => [['id'], ['_controller' => 'App\\Controller\\UserController::deleteClient'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/users']], [], [], []],
    'api_count_clients' => [[], ['_controller' => 'App\\Controller\\UserController::countClients'], [], [['text', '/api/users/count']], [], [], []],
    'app_user' => [[], ['_controller' => 'App\\Controller\\UserController::listUsers'], [], [['text', '/users']], [], [], []],
    'car_new' => [[], ['_controller' => 'App\\Controller\\CarController::create'], [], [['text', '/car/new']], [], [], []],
    'App\Controller\AppController::index' => [[], ['_controller' => 'App\\Controller\\AppController::index'], [], [['text', '/']], [], [], []],
    'App\Controller\CarController::getCars' => [[], ['_controller' => 'App\\Controller\\CarController::getCars'], [], [['text', '/api/cars']], [], [], []],
    'App\Controller\CarController::deleteCars' => [['id'], ['_controller' => 'App\\Controller\\CarController::deleteCars'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/cars']], [], [], []],
    'App\Controller\CarController::countCars' => [[], ['_controller' => 'App\\Controller\\CarController::countCars'], [], [['text', '/api/cars/count']], [], [], []],
    'App\Controller\CartController::addToCart' => [[], ['_controller' => 'App\\Controller\\CartController::addToCart'], [], [['text', '/cart/add']], [], [], []],
    'App\Controller\CartController::getCartItems' => [['userId'], ['_controller' => 'App\\Controller\\CartController::getCartItems'], [], [['variable', '/', '[^/]++', 'userId', true], ['text', '/cart/items']], [], [], []],
    'App\Controller\CartController::handlePayment' => [[], ['_controller' => 'App\\Controller\\CartController::handlePayment'], [], [['text', '/cart/payment']], [], [], []],
    'App\Controller\CartController::deleteCartItem' => [['itemId'], ['_controller' => 'App\\Controller\\CartController::deleteCartItem'], [], [['variable', '/', '[^/]++', 'itemId', true], ['text', '/cart/delete']], [], [], []],
    'App\Controller\CartController::getPurchasedItems' => [['userId'], ['_controller' => 'App\\Controller\\CartController::getPurchasedItems'], [], [['variable', '/', '[^/]++', 'userId', true], ['text', '/receipt/items']], [], [], []],
    'App\Controller\CartController::createReceipt' => [[], ['_controller' => 'App\\Controller\\CartController::createReceipt'], [], [['text', '/receipt/create']], [], [], []],
    'App\Controller\HomeController::index' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/home']], [], [], []],
    'App\Controller\LoginController::login' => [[], ['_controller' => 'App\\Controller\\LoginController::login'], [], [['text', '/login']], [], [], []],
    'App\Controller\LoginController::logout' => [[], ['_controller' => 'App\\Controller\\LoginController::logout'], [], [['text', '/logout']], [], [], []],
    'App\Controller\MailController::sendEmail' => [[], ['_controller' => 'App\\Controller\\MailController::sendEmail'], [], [['text', '/send-email']], [], [], []],
    'App\Controller\MessageController::getMessageById' => [['id'], ['_controller' => 'App\\Controller\\MessageController::getMessageById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/messages/id']], [], [], []],
    'App\Controller\MessageController::getMessagesForUser' => [['receiverUsername'], ['_controller' => 'App\\Controller\\MessageController::getMessagesForUser'], [], [['variable', '/', '[^/]++', 'receiverUsername', true], ['text', '/messages/user']], [], [], []],
    'App\Controller\MessageController::sendMessage' => [[], ['_controller' => 'App\\Controller\\MessageController::sendMessage'], [], [['text', '/messages']], [], [], []],
    'App\Controller\MessageController::serveFile' => [['filename'], ['_controller' => 'App\\Controller\\MessageController::serveFile'], [], [['variable', '/', '[^/]++', 'filename', true], ['text', '/uploads']], [], [], []],
    'App\Controller\NotificationController::getUnreadNotifications' => [[], ['_controller' => 'App\\Controller\\NotificationController::getUnreadNotifications'], [], [['text', '/notifications']], [], [], []],
    'App\Controller\NotificationController::markNotificationsAsRead' => [[], ['_controller' => 'App\\Controller\\NotificationController::markNotificationsAsRead'], [], [['text', '/notifications/mark-as-read']], [], [], []],
    'App\Controller\NotificationController::getUnreadNotificationsCount' => [[], ['_controller' => 'App\\Controller\\NotificationController::getUnreadNotificationsCount'], [], [['text', '/notifications/unread-count']], [], [], []],
    'App\Controller\NotificationController::markAllNotificationsAsRead' => [[], ['_controller' => 'App\\Controller\\NotificationController::markAllNotificationsAsRead'], [], [['text', '/notifications/mark-all-as-read']], [], [], []],
    'App\Controller\NotificationController::getAllNotifications' => [[], ['_controller' => 'App\\Controller\\NotificationController::getAllNotifications'], [], [['text', '/notifications']], [], [], []],
    'App\Controller\NotificationController::deleteNotification' => [['id'], ['_controller' => 'App\\Controller\\NotificationController::deleteNotification'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/notifications']], [], [], []],
    'App\Controller\SearchCarController::index' => [[], ['_controller' => 'App\\Controller\\SearchCarController::index'], [], [['text', '/search/car']], [], [], []],
    'App\Controller\SearchCarController::getCarBrands' => [[], ['_controller' => 'App\\Controller\\SearchCarController::getCarBrands'], [], [['text', '/marks']], [], [], []],
    'App\Controller\SearchCarController::getModelsForMark' => [['mark'], ['_controller' => 'App\\Controller\\SearchCarController::getModelsForMark'], [], [['variable', '/', '[^/]++', 'mark', true], ['text', '/models']], [], [], []],
    'App\Controller\SearchCarController::getAllCars' => [[], ['_controller' => 'App\\Controller\\SearchCarController::getAllCars'], [], [['text', '/cars']], [], [], []],
    'App\Controller\SearchCarController::searchCars' => [[], ['_controller' => 'App\\Controller\\SearchCarController::searchCars'], [], [['text', '/search/cars']], [], [], []],
    'App\Controller\SearchCarController::getCarOwner' => [['id'], ['_controller' => 'App\\Controller\\SearchCarController::getCarOwner'], [], [['text', '/owner'], ['variable', '/', '[^/]++', 'id', true], ['text', '/car']], [], [], []],
    'App\Controller\SignupController::register' => [[], ['_controller' => 'App\\Controller\\SignupController::register'], [], [['text', '/register']], [], [], []],
    'App\Controller\SignupController::confirmExpert' => [['token'], ['_controller' => 'App\\Controller\\SignupController::confirmExpert'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/confirm-expert']], [], [], []],
    'App\Controller\UserController::getUsersByRole' => [['role'], ['_controller' => 'App\\Controller\\UserController::getUsersByRole'], [], [['variable', '/', '[^/]++', 'role', true], ['text', '/users/role']], [], [], []],
    'App\Controller\UserController::getClients' => [[], ['_controller' => 'App\\Controller\\UserController::getClients'], [], [['text', '/api/users']], [], [], []],
    'App\Controller\UserController::deleteClient' => [['id'], ['_controller' => 'App\\Controller\\UserController::deleteClient'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/users']], [], [], []],
    'App\Controller\UserController::countClients' => [[], ['_controller' => 'App\\Controller\\UserController::countClients'], [], [['text', '/api/users/count']], [], [], []],
    'App\Controller\UserController::listUsers' => [[], ['_controller' => 'App\\Controller\\UserController::listUsers'], [], [['text', '/users']], [], [], []],
];
