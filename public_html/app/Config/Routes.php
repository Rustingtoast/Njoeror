<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');

$routes->add('formular', 'Formular::index');
$routes->get('formular/new', 'Formular::createView');
$routes->post('formular/new', 'Formular::request');
$routes->post('formular/back', 'Formular::move');

$routes->add('user/list', 'UserList::index');
$routes->post('user/list', 'UserList::user_operation');
$routes->post('user/list/new', 'UserList::new');

$routes->add('user/creation', 'UserCreation::index');
$routes->post('user/creation', 'UserCreation::create');
$routes->post('user/creation/back', 'UserCreation::back');

$routes->add('user/edit', 'UserEdit::index');
$routes->post('user/edit', 'UserEdit::save');
$routes->post('user/edit/back', 'UserEdit::back');

$routes->get('user/reservation/list', 'Reservation::index');

$routes->add('staff/reservation/list', 'StaffReservation::index');
$routes->post('staff/reservation/list/accept', 'StaffReservation::reservation_accept');
$routes->post('staff/reservation/list/reject', 'StaffReservation::reservation_reject');


$routes->add('login', 'Login::index');
$routes->post('login', 'Login::login');

$routes->add('register', 'Register::index');
$routes->post('register', 'Register::register');


$routes->add('/logout', 'Logout::index');

$routes->add('weather', 'Weather::index');
$routes->get('weather/getWeatherJSON', 'Weather::getWeatherJSON');
$routes->add('/dashboard', 'Dashboard::index');
$routes->post('dashboard/saveLayout', 'Dashboard::saveLayout');
