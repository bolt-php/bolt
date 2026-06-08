<?php

use app\http\middleware\Csrf;
use framework\components\Registry;

/**
 * @var \framework\Application $app
 */

$app->registerComponent('registry', new Registry());

$app->registry->set('csrf', Csrf::class);