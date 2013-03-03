<?php
require_once __DIR__.'/vendor/autoload.php';

use Keep\OssGen\Generator\Generator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

function get_generator()
{
    return new Generator(realpath(dirname(__FILE__) . '/oss-sources'));
}

function generate_license($source, $licenser, $year)
{
    $content = get_generator()->generate($source, $licenser, $year);

    return new Response($content, 200, array('content-type' => 'text/plain'));
}

$app = new Silex\Application();

$app->get('/generate/{source}/{licenser}/{year}', function ($source, $licenser, $year) use ($app) {
    return generate_license($app->escape($source), $app->escape($licenser), $app->escape($year));
});

$app->post('/generate/{source}', function (Request $request) use ($app) {
    return generate_license($request->get('source'), $request->get('licenser'), $request->get('year'));
});

$app->run();