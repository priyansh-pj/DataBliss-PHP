<?php

namespace Config;

use App\Controllers\Organization;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Credentials::index');
$routes->get('/login', 'Credentials::index');
$routes->get('/logout', 'Credentials::logout');
$routes->post('/login/login_check', 'Credentials::login_check');
$routes->post('/register', 'Credentials::register');
$routes->get('/organization_verify/(:segment)', 'Credentials::organization_verify/$1');
$routes->post('/organization_create', 'Credentials::organization_create');
$routes->get('/organization_make', 'Credentials::organization_make');
$routes->get('/organization/verify/(:segment)','Organization::role_verify/$1');
$routes->get("/Organization",'Organization::index');
$routes->get("/Billing","Billing::index");
$routes->get("/Billing/Generate_Invoice","Billing::generate_invoice");
$routes->get("/Billing/Invoice_history","Billing::invoice_history");
$routes->get("/Billing/Enter_purchase_invoice","Billing::enter_purchase_invoice");
$routes->get("/Billing/Edit_purchase_invoice","Billing::edit_purchase_invoice");
$routes->get("/Billing/Purchase_history","Billing::purchase_history");
$routes->get("/Contact/fetch_data","Billing::fetch_details");
$routes->get("/Product/fetch_products","Billing::fetch_products");
$routes->get("/Product/get_product_details","Billing::get_product_details");
$routes->post("/Billing/invoice_data","Billing::invoice_data");
$routes->get("/Billing/invoice_delete/(:segment)","Billing::invoice_delete/$1");
$routes->post("/Billing/purchase_data","Billing::purchase_data");
$routes->get("/Billing/purchase_delete/(:segment)","Billing::purchase_delete/$1");
$routes->get("/Billing/print_invoice/(:segment)","Billing::print_invoice/$1");


$routes->get('/employee_list','Owner::emp_list');
// Employee Management
$routes->get('/Owner/employee_management','Owner::employee_management');
// Employee add list(show request)
$routes->get('/Owner/add_employee_request','Owner::add_employee_request');
//add employee details when you accept request
$routes->get('/Owner/add_employee/(:segment)', 'Owner::add_employee/$1');
//insert details  into employee table
$routes->post('/Owner/insert_employee', 'Owner::insert_employee');
// Employee Terminate list
$routes->get('/Owner/terminate_employee_list','Owner::terminate_employee_list');
// click on terminate button to terminate employee
$routes->get('/Owner/terminate_employee/(:num)', 'Owner::terminate_employee/$1');
//access or role management(edit)
$routes->get('/Owner/access_employee_list','Owner::access_employee_list');
$routes->get('/Owner/edit_employee/(:num)','Owner::edit_employee/$1');
$routes->get('/Owner/employee_updated/(:num)','Owner::update_employee/$1');
//Search Organization
$routes->get('/search_organization', 'Credentials::search_organization');
//emp request in Buffer
$routes->post('/request_send', 'Credentials::employee_request');


$routes->get("/Inventory","Inventory::index");
$routes->get("/Inventory/product_delete/(:segment)","Inventory::product_delete/$1");
$routes->get("/Inventory/product_edit/(:segment)","Inventory::product_edit/$1");
$routes->post("/Inventory/update_product","Inventory::update_product");

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
