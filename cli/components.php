<?php

use app\components\DependencyContainer;
use framework\Application;
use framework\components\Logger;
use framework\components\PathManager;
use framework\components\Registry;
use framework\components\Validator;

/**
 * This file attaches all core components required for the app to function.
 * 
 * @var Application $app
 */
$app->registerComponent('registry', new Registry());
$app->registerComponent('container', DependencyContainer::class);
$app->registerComponent('logger', Logger::class);
$app->registerComponent('path', PathManager::class);
$app->registerComponent('validator', Validator::class);

/**
 * Dynamically load all modules
 */
$app->scanModules();