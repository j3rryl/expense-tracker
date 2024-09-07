<?php

$routes->group(
    'admin', ['namespace' => 'App\Modules\Admin\Controllers'], function ($routes) {
        $routes->get('dashboard', 'Dashboard::index', ['filter' => 'group:superadmin']);
        $routes->get('users', 'Users::index', ['filter' => 'group:superadmin']);
    }
);