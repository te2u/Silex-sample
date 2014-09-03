<?php

require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;

$app = new Application();
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app['debug'] = true;

$app->get('/', function(Application $app) {
    $url1 = $app['url_generator']->generate('sample03-01');
    $url2 = $app['url_generator']->generate('sample03-02', array('id' => 1));
    $url3 = $app['url_generator']->generate('sample03-02', array('id' => 2, 'foo' => 'text'));

    return <<<EOH
<ul>
<li><a href="$url1">sample03-01</a></li>
<li><a href="$url2">sample03-02 01</a></li>
<li><a href="$url3">sample03-02 02</a></li>
</ul>
EOH;
});

$app->get('/sample03-01', function(Application $app) {
    return $app->escape($app['request']->getUri());
})
->bind('sample03-01');

$app->get('/sample03-02/{id}', function(Application $app) {
    return $app->escape($app['request']->getUri());
})
->bind('sample03-02');

$app->run();
