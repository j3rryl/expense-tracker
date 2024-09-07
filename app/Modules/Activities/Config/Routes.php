<?php

$routes->group(
    'activities', ['namespace' => 'App\Modules\Activities\Controllers'], function ($routes) {
        $routes->get('/', 'Index::index');
    }
);