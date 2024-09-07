<?php

$routes->group(
    'expenses', ['namespace' => 'App\Modules\Expenses\Controllers'], function ($routes) {
        $routes->get('/', 'Index::index');
        $routes->post('save', 'Index::save');
    }
);