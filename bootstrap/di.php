<?php

/**
 * @var framework\web\WebApplication $app
 */ 

use app\components\DependencyContainer;

$app->registerComponent('di', new DependencyContainer());

$app->di->scoped(\framework\web\request\Request::class, function () {
    return new \framework\web\request\Request();
});
$app->di->scoped(\framework\web\request\Response::class, function () {
    return new \framework\web\request\Response();
});