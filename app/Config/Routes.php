<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Main routes that serve Vue components
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/profile', 'Profile::index');
$routes->get('/about', 'About::index');

// API routes use AUTO ROUTING
// The /api/* URLs are automatically routed to App\Controllers\Api\ namespace
// Examples:
// GET    /api/posts     -> Api\Posts::index()
// GET    /api/posts/search -> Api\Posts::search()
//
// Just create controllers in app/Controllers/Api/ and they automatically work!

// Test routes for debugging
// Route with parameters passed to Vue
