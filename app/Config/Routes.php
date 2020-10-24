<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Course');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->add('course', 'Course::index');
$routes->add('course/newCourse', 'Course::newCourse');
$routes->add('course/search', 'Course::searchCourse');
$routes->add('course/newUpdate/', 'Course::update');
$routes->add('course/remove/(:num)', 'Course::removeCourse/$1');
$routes->add('course/update/(:num)', 'Course::updateCourse/$1');
$routes->add('subtopic/(:num)', 'Subtopic::index/$1');
$routes->add('subtopic/search/(:num)', 'Subtopic::searchSubtopic/$1');
$routes->add('subtopic/remove/(:num)/(:num)', 'Subtopic::deleteSubtopic/$1/$2');
$routes->add('subtopic/edit/(:num)/(:num)', 'Subtopic::getSubtopic/$1/$2');
$routes->add('subtopic/content/(:num)', 'Subtopic::contentView/$1');
$routes->add('subtopic/contentEditPage/(:any)', 'Subtopic::contentEdit/$1');
$routes->add('subtopic/contentUpdate/(:num)', 'Subtopic::contentUpdate/$1');
$routes->add('subtopic/insertReference/(:num)', 'Subtopic::insertReference/$1');
$routes->add('subtopic/deleteReference/(:num)/(:num)', 'Subtopic::deleteReference/$1/$2');
$routes->add('subtopic/editReference/(:num)/(:num)', 'Subtopic::editReference/$1/$2');
$routes->add('subtopic/updateReference/(:num)/(:num)', 'Subtopic::updateReference/$1/$2');
$routes->add('resources/upload/(:num)', 'Resources::insertResources/$1');
$routes->add('resources/removeResource/(:num)(:num)', 'Resources::insertResources/$1/$2');
$routes->add('reference', 'Reference::index');


/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
