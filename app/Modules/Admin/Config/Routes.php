<?php

$routes->group(
    'admin', ['namespace' => 'App\Modules\Admin\Controllers'], function ($routes) {
        $routes->get('dashboard', 'Dashboard::index');
        $routes->get('users', 'Users::index');
    }
);