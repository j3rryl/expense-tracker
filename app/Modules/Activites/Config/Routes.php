<?php

$routes->group(
    'activites', ['namespace' => 'App\Modules\Activites\Controllers'], function ($routes) {
        $routes->get('/', 'Index::index');
    }
);