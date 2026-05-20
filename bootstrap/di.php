<?php

/**
 * @var framework\web\WebApplication $app
 */ 

use app\components\DependencyContainer;

$app->registerComponent('di', new DependencyContainer());

$app->di->singleton(\framework\web\request\Request::class, function () {
    return new \framework\web\request\Request();
});
$app->di->singleton(\framework\web\request\Response::class, function () {
    return new \framework\web\request\Response();
});