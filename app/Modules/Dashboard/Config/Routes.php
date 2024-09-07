<?php

$routes->group(
    'dashboard', ['namespace' => 'App\Modules\Dashboard\Controllers'], function ($routes) {
        $routes->get('/', 'Index::index');
    }
);