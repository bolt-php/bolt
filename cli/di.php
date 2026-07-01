<?php

/**
 * @var ApplicationInterface $app;
 */

use app\components\DependencyContainer;
use framework\contracts\ApplicationInterface;

$app->registerComponent('di', new DependencyContainer());

$app->di->scoped(ApplicationInterface::class, $app);