<?php

$routes->group(
    'admin', ['namespace' => 'App\Modules\Admin\Controllers'], function ($routes) {
        $routes->get('dashboard', 'Dashboard::index', ['filter' => 'group:superadmin']);
        $routes->get('categories', 'Categories::index', ['filter' => 'group:superadmin']);
        
        // Users
        $routes->get('users', 'Users::index', ['filter' => 'group:superadmin']);
        $routes->get('archived/users', 'Users::archived', ['filter' => 'group:superadmin']);
        $routes->post('users/update/(:num)', 'Users::update/$1', ['filter' => 'group:superadmin']);
        $routes->post('users/archive/(:num)', 'Users::archive/$1', ['filter' => 'group:superadmin']);
        $routes->post('users/restore/(:num)', 'Users::restore/$1', ['filter' => 'group:superadmin']);
        $routes->post('users/delete/(:num)', 'Users::delete/$1', ['filter' => 'group:superadmin']);
        
        // Expenses
        $routes->get('expenses', 'Expenses::index', ['filter' => 'group:superadmin']);
        $routes->get('archived/expenses', 'Expenses::archived', ['filter' => 'group:superadmin']);
        $routes->get('expenses/view/(:num)', 'Expenses::view/$1', ['filter' => 'group:superadmin']);
        $routes->post('expenses/update/(:num)', 'Expenses::update/$1', ['filter' => 'group:superadmin']);
        $routes->post('expenses/restore/(:num)', 'Expenses::restore/$1', ['filter' => 'group:superadmin']);
        $routes->post('expenses/delete/(:num)', 'Expenses::delete/$1', ['filter' => 'group:superadmin']);
    }
);