<?php

/**
 * @var framework\web\WebApplication $app
 */ 

use app\components\DependencyContainer;
use framework\contracts\ApplicationInterface;
use framework\contracts\request\RequestInterface;
use framework\contracts\request\ResponseInterface;

$app->registerComponent('di', new DependencyContainer());

$app->di->singleton(RequestInterface::class, function () {
    return new \framework\web\request\Request();
});
$app->di->singleton(ResponseInterface::class, function () {
    return new \framework\web\request\Response();
});

$app->di->scoped(ApplicationInterface::class, $app);