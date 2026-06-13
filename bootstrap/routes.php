<?php

use app\http\middleware\Csrf;
use framework\web\Routes;

$middleware = app()->registry->get('web-middleware', []);

Routes::group('/', function () {
    require_once __DIR__ . '/../app/config/routes/web.php';
})->middleware(array_merge([Csrf::class], $middleware));