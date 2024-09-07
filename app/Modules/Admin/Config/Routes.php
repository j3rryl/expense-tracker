<?php

$routes->group(
    'admin', ['namespace' => 'App\Modules\Admin\Controllers'], function ($routes) {
        $routes->get('dashboard', 'Dashboard::index', ['filter' => 'group:superadmin']);
        $routes->get('users', 'Users::index', ['filter' => 'group:superadmin']);
        $routes->get('categories', 'Categories::index', ['filter' => 'group:superadmin']);
        $routes->post('users/update/(:num)', 'Users::update/$1', ['filter' => 'group:superadmin']);
        $routes->post('users/delete/(:num)', 'Users::delete/$1', ['filter' => 'group:superadmin']);
    }
);