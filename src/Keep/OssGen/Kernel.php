<?php
require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;

$app->get('/hello/{name}', );

$app->run();

/**
* Application kernel
*/
class Kernel extends Application
{
    public function ($name) {
        return 'Hello '.$this->escape($name);
    }
}