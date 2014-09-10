<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

$app = new Application();
$app['debug'] = true;

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_sqlite',
        'path'   => __DIR__.'/../var/data/app.db',
    ),
));

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->match('/', function(Application $app, Request $request) {

    $name = $request->get('name');

    $errors = array();
    if ($request->isMethod('POST')) {

        $pass = $request->get('pass');

        $sql = 'SELECT * FROM user WHERE name = ? AND pass = ?';
        $user = $app['db']->fetchAssoc($sql, array($name, $pass));

        if (is_array($user)) {
            return $app->redirect($app['url_generator']->generate('matched'));
        }

        $errors[] = "Invalid name or pass";
    }

    $url = $app['url_generator']->generate('index');

    return $app['twig']->render('05/index.twig', array(
        'name'   => $name,
        'errors' => $errors,
    ));
})
->method('GET|POST')
->bind('index');

$app->get('/matched', function(Application $app) {
    return 'matched!';
})
->bind('matched');

$app->run();
