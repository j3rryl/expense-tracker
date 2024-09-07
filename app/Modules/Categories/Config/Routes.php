<?php

$routes->group(
    'categories', ['namespace' => 'App\Modules\Categories\Controllers'], function ($routes) {
        $routes->get('/', 'Index::index');
    }
);