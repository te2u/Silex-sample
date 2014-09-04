<?php

require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;

$app = new Application();

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app['debug'] = true;

$app->get('/', function(Application $app) {
    return $app['twig']->render('04/index.twig');
});

$app->get('/sample04-01', function(Application $app) {
    return $app['twig']->render('04/sample04-01.twig', array('name' => 'Silex!!'));
});

$app->get('/sample04-02', function(Application $app) {
    return $app['twig']->render('04/sample04-02.twig');
})
->bind('sample04-02');

$app->run();
