<?php

namespace PHPMaker2021\project3;

use Slim\App;
use Slim\Routing\RouteCollectorProxy;

// Handle Routes
return function (App $app) {
    // API
    $app->any('/login', ApiController::class . ':login')->add(JwtMiddleware::class . ':create')->setName('api/login'); // login
    $app->any('/list[/{params:.*}]', ApiController::class)->add(ApiPermissionMiddleware::class)->add(new JwtMiddleware())->setName('api/list'); // list
    $app->any('/view[/{params:.*}]', ApiController::class)->add(ApiPermissionMiddleware::class)->add(new JwtMiddleware())->setName('api/view'); // view
    $app->any('/add[/{params:.*}]', ApiController::class)->add(ApiPermissionMiddleware::class)->add(new JwtMiddleware())->setName('api/add'); // add
    $app->any('/edit[/{params:.*}]', ApiController::class)->add(ApiPermissionMiddleware::class)->add(new JwtMiddleware())->setName('api/edit'); // edit
    $app->any('/delete[/{params:.*}]', ApiController::class)->add(ApiPermissionMiddleware::class)->add(new JwtMiddleware())->setName('api/delete'); // delete
    $app->any('/file[/{params:.*}]', ApiController::class)->add(ApiPermissionMiddleware::class)->add(new JwtMiddleware())->setName('api/file'); // file
    $app->any('/lookup[/{params:.*}]', ApiController::class)->add(ApiPermissionMiddleware::class)->add(new JwtMiddleware())->setName('api/lookup'); // lookup
    $app->any('/upload[/{params:.*}]', ApiController::class)->add(ApiPermissionMiddleware::class)->add(new JwtMiddleware())->setName('api/upload'); // upload
    $app->any('/jupload[/{params:.*}]', ApiController::class)->add(ApiPermissionMiddleware::class)->setName('api/jupload'); // jupload
    $app->any('/session[/{params:.*}]', ApiController::class)->add(ApiPermissionMiddleware::class)->setName('api/session'); // session
    $app->any('/progress[/{params:.*}]', ApiController::class)->add(ApiPermissionMiddleware::class)->setName('api/progress'); // session
    $app->any('/chart[/{params:.*}]', ApiController::class)->add(ApiPermissionMiddleware::class)->setName('api/chart'); // chart
    $app->any('/permissions[/{params:.*}]', ApiController::class)->add(ApiPermissionMiddleware::class)->add(new JwtMiddleware())->setName('api/permissions'); // permissions

    // User API actions
    if (function_exists(PROJECT_NAMESPACE . "Api_Action")) {
        Api_Action($app);
    }

    // Other API actions
    $app->any('/[{params:.*}]', ApiController::class)->add(ApiPermissionMiddleware::class)->setName('custom');
};
