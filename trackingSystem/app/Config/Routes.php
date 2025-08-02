<?php
namespace Config;

use App\Controllers\Appointments;

$routes = Services::routes();

if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

$routes->get('/','Auth::login');
$routes->get('login','Auth::login');
$routes->post('login', 'Auth::attemptLogin');

// $routes->group('', ['filter' => 'noauth'], function($routes) {
//     $routes->get('login', 'Auth::login');
//     $routes->post('login', 'Auth::attemptLogin');
// });

$routes->group('', ['filter' => 'auth'], function($routes) 
{
    $routes->get('dashboard', 'Home::index');
    $routes->get('settings', 'Settings::index');
    $routes->get('notifications/count','Notification::notifications');
    $routes->get('notifications/fetch','Notification::load');
    $routes->post('settings/save','Settings::save');
    //permissions 
    $routes->get('permisions','Permissions::checkpermission');
    $routes->get('permisions/list','Permissions::list');
    $routes->get('permissions/check-permission/(:any)','Permissions::checkpermission/$1');
    $routes->post('permissions/save','Permissions::save');
    $routes->get('permissions/controls','Permissions::controls');
    //tracking
    $routes->get('admin/tracking','admin\TrackingController::index');
    $routes->get('admin/create/order','admin\TrackingController::create');
    $routes->post('orders/save','admin\TrackingController::store');
    $routes->get('order/search','admin\TrackingController::search');
    $routes->post('order/order-info','admin\TrackingController::getOrder');
    $routes->post('admin/orders/order-status','admin\TrackingController::statusSave');
    $routes->post('order/update-track-spot','admin\TrackingController::spotUpdate');
    $routes->post('order/delete-track-spot','admin\TrackingController::deleteTrackSpot');
    //staff
    $routes->get('staff','Staff::index');
    $routes->get('staff/create','Staff::create');
    $routes->post('staff/save','Staff::save');
    $routes->get('staff/list','Staff::list');
    $routes->get('staff/edit/(:any)','Staff::create/$1');
    $routes->post('staff/delete','Staff::delete');
    //branch
    $routes->get('branches','Branches::index');
    $routes->get('branch/create','Branches::create');
    $routes->post('branch/save','Branches::save');
    $routes->get('branch/search','Branches::search');
    $routes->get('branches/edit/(:any)','Branches::create/$1');
    $routes->post('branch/delete','Branches::delete');
    //services
    $routes->get('services-list','Services::index');
    $routes->get('services/create','Services::create');
    $routes->post('services/save','Services::save');
    $routes->get('services/list','Services::list');
    $routes->get('service/edit/(:any)','Services::create/$1');
    $routes->post('service/delete','service::delete');
    //Categories
    $routes->get('categories','Category::index');
    $routes->post('category/save','Category::save');
    $routes->get('category/list','Category::categoryList');
    $routes->get('category/edit/(:any)','Category::create/$1');
    $routes->post('category/delete','Category::delete');
    $routes->post('category/unlock','Category::unlock');
    //clients
    $routes->get('clients','Clients::index');
    $routes->get('clients/list','Clients::list');
    $routes->get('clients/create','Clients::create');
    $routes->post('client/save','Clients::save');
    $routes->get('clients/edit/(:any)','Clients::create/$1');
    $routes->post('clients/suggestPhone','Clients::suggestPhone');
    //Apppintments
    $routes->get('appointments','Appointments::index');
    $routes->get('appointments/booking','Appointments::booking');
    $routes->post('booking/save','Appointments::save');
    $routes->get('appointments/load','Appointments::load');
    $routes->get('appointments/edit/(:any)','Appointments::edit/$1');
    //$routes->get('appointments/grid','Appointments::grid');
});
$routes->group('dashboard', ['filter' => 'auth'], function($routes) 
{
    $routes->get('reports', 'admin\Reports::index');
    $routes->get('report-list', 'admin\Reports::list');
    $routes->get('gen-report', 'admin\Reports::generatePDF');
});
$routes->get('qry', 'Home::qry');
$routes->set404Override('App\Controllers\Errors::show404');
$routes->get('order/clear-cache', 'admin\TrackingController::clearCache');
$routes->get('track/(:any)','TrackingController::trackingInfo/$1');

// use CodeIgniter\Router\RouteCollection;
// /**
//  * @var RouteCollection $routes
//  */
// $routes->get('/', 'Home::index');
