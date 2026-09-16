<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'StudentController::login');
$routes->get('inventory/add-item', 'InventoryController::createItem');
$routes->post('inventory/save-item', 'InventoryController::saveItem');
$routes->get('register','StudentController::register');
$routes->post('register-student','StudentController::store');
$routes->get('login', 'StudentController::login');
$routes->post('login-student', 'StudentController::authenticate');
$routes->get('logout', 'StudentController::logout');
$routes->get('dashboard','DashboardController::index');
$routes->get('items','DashboardController::viewItems');
$routes->post('borrow-item/(:num)','DashboardController::borrowItem/$1');
$routes->post('return-item/(:num)/(:num)','DashboardController::returnItem/$1/$2');
$routes->get('admin/setup','AdminController::setup');
$routes->get('admin/login','AdminController::login');
$routes->post('admin/login-admin', 'AdminController::authenticate');
$routes->get('admin/dashboard', 'AdminController::dashboard');
$routes->get('admin/logout', 'AdminController::logout');
$routes->get('inventory/edit-item/(:num)', 'InventoryController::editItem/$1');
$routes->post('inventory/update-item/(:num)', 'InventoryController::updateItem/$1');
$routes->get('inventory/delete-item/(:num)', 'InventoryController::deleteItem/$1');
$routes->get('my-history', 'StudentController::myHistory');
$routes->get('change-password', 'StudentController::changePasswordForm');
$routes->post('update-password', 'StudentController::updatePassword');
?>