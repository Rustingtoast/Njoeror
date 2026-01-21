<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/form-text', 'Formular::index');

$routes->add('formular', 'Formular::index');
$routes->get('formular/new', 'Formular::createView');
$routes->post('formular/new', 'Formular::request');