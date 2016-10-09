<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'RayMailer',
    ['path' => '/ray-mailer'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
