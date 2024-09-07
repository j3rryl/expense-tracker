<?php

$routes->group(
    'expenses', ['namespace' => 'App\Modules\Expenses\Controllers'], function ($routes) {
        $routes->get('/', 'Index::index');
        $routes->post('save', 'Index::save');
        $routes->post('delete/(:num)', 'Index::delete/$1');
        $routes->post('update/(:num)', 'Index::update/$1');
    }
);