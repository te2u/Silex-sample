<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/', function() {
    return <<<EOH
<ul>
<li><a href="sample02-01">sample02-01</a></li>
<li>
<form method="post" action="sample02-02" style="margin:0">
<button type="submit">sample02-02</button>
</form>
</li>
<li>
<form method="post" action="sample02-03" style="margin:0">
<button type="submit">sample02-03</button>
</form>
</li>
<li><a href="sample02-04">sample02-04</a></li>
<li><a href="sample02-05?foo=1&amp;bar=hoge">sample02-05?foo=1&amp;bar=hoge</a></li>
<li><a href="sample02-06/6">sample02-06/6</a></li>
<li><a href="sample02-07/id/message">sample02-07/id/message - (404)</a></li>
<li><a href="sample02-07/7/message">sample02-07/7/message</a></li>
<li><a href="sample02-08">sample02-08</a></li>
<li><a href="sample02-09">sample02-09</a></li>
<li><a href="sample02-10">sample02-10</a></li>
</ul>
EOH;
});

$app->get('/sample02-01', function() {
    return 'Hello1!';
});

$app->post('/sample02-02', function() {
    return 'Hello2!';
});

$app->match('/sample02-03', function() {
    return 'Hello3!';
})->method('GET|POST');

$app->get('/sample02-04', function() {
    return new Response('Not Found', 404);
});

$app->get('/sample02-05', function(Request $request) {
    $keys = $request->query->keys();

    $html = "<ul>\n";
    foreach ($keys as $key) {
        $html .= "<li>$key=".$request->get($key)."</li>\n";
    }
    $html .= "</ul>\n";

    return $html;
});

$app->get('/sample02-06/{id}', function ($id) {
    $html = "id=$id";

    return $html;
});

$app->get('/sample02-07/{id}/{message}', function ($id, $message) {
    $html  = "id=$id<br/>";
    $html .= "message=$message";

    return $html;
})
->assert('id', '\d+');

$app->get('/sample02-08', function (Silex\Application $app, Request $request) {
    $url = $request->getSchemeAndHttpHost().$request->getBasePath().'/sample02-08/redirected';
    return $app->redirect($url);
});

$app->get('/sample02-08/redirected', function () {
    return 'redirected from sample02-08';
});

$app->get('/sample02-09', function (Silex\Application $app) {

    $data = array(
        'foo' => 'foo',
        'bar' => 100,
    );

    return $app->json($data);
});

$app->get('/sample02-10', function (Silex\Application $app) {
    return $app->escape('<script type="text/javascript">alert("alert!!");</script>');
});

$app->run();
