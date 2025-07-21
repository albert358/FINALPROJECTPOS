<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =====================
// Public Routes
// =====================
$routes->get('/', 'Auth::login'); // Default landing page
$routes->get('/login', 'Auth::login',['filter' => 'guest']);
$routes->post('/login/auth', 'Auth::loginAuth');
$routes->get('/logout', 'Auth::logout');
$routes->get('/register', 'Auth::register',['filter' => 'guest']);
$routes->post('/register/save', 'Auth::registerSave');

// =====================
// Authenticated User Routes
// =====================
$routes->group('/', ['filter' => 'authFilter'], function ($routes) {
    // Category Management
    $routes->get('categories', 'CategoryController::index');
    $routes->post('categories/store', 'CategoryController::store');
    $routes->get('categories/edit/(:num)', 'CategoryController::edit/$1');
    $routes->post('categories/update/(:num)', 'CategoryController::update/$1');
    $routes->get('categories/delete/(:num)', 'CategoryController::delete/$1');

    // Orders (Generic)
    $routes->get('orders', 'Orders::index');

    // Transaction Management
    $routes->get('transaction', 'Transaction::index');
    $routes->get('transaction/history', 'TransactionHistory::index');
    $routes->get('transaction/refunds', 'Refunds::index');

    // Report Analytics
    $routes->get('report', 'ReportOverview::index');
    $routes->get('report/daily', 'DailyReport::index');
    $routes->get('report/weekly', 'WeeklyReport::index');
    $routes->get('report/monthly', 'MonthlyReport::index');

    // Cashier Activity & Requests
    $routes->get('admin/request', 'CashierRequest::index');
    $routes->get('admin/activity-log', 'ActivityLog::index');
});

// =====================
// Admin Routes
// =====================
$routes->group('admin', ['filter' => 'authFilter:admin'], function ($routes) {
    $routes->get('dashboard', 'AdminDashboard::index');

    // Manage Cashiers
    $routes->get('manage-cashiers', 'ManageCashier::index');
    $routes->get('approve-cashier/(:num)', 'ManageCashier::approve/$1');
    $routes->get('reject-cashier/(:num)', 'ManageCashier::reject/$1');

    // Menu Management
    $routes->get('menu', 'Menu::index');
    $routes->get('menu/new', 'Menu::new');
    $routes->post('menu/create', 'Menu::create');
    $routes->post('menu/delete/(:num)', 'Menu::delete/$1');


    $routes->get('request', 'CashierRequest::index');
    $routes->post('submit-report-request', 'CashierRequest::submitReportRequest');
    $routes->get('report-requests-list', 'AdminReportController::listRequests');
});

// =====================
// Cashier Routes
// =====================
$routes->group('cashier', ['filter' => 'authFilter:cashier'], function ($routes) {
    $routes->get('dashboard', 'Cashier::dashboard');
    $routes->get('pending', 'Cashier::pending');
    $routes->get('pos', 'POSController::index');
    $routes->get('orders', 'CashierOrderList::index');
    $routes->post('submit-report-request', 'CashierRequest::submit');

    // Transaction Management
    $routes->get('transactions', 'CashierTransaction::index');
    $routes->get('refunds', 'CashierRefund::index');
});
