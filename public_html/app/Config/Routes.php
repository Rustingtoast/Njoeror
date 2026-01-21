<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/submit', 'Home::move');
$routes->get('/home', 'Home::index');

$routes->add('formular', 'Formular::index');
$routes->get('formular/new', 'Formular::createView');
$routes->post('formular/new', 'Formular::request');
$routes->post('formular/back', 'Formular::move');

$routes->add('userlist', 'UserList::index');
