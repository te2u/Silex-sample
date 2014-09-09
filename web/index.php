<?php

require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;

$app = new Application();
$app['debug'] = true;

$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../var/log/application.log',
    'monolog.level'   => 'DEBUG',
));

$app->get('/', function(Application $app) {
    $app['monolog']->addDebug('log debug');
    $app['monolog']->addInfo('log info');
    $app['monolog']->addWarning('log warning');
    $app['monolog']->addError('log warning');

    return 'index';
});

$app->run();
