<?php

use app\http\controllers\AuthController;
use app\http\middleware\RequireAuth;
use framework\web\Routes;

/**
 * Built-in Routes
 * 
 * These routes are essential to many built-in features like authentication.
 * 
 * You can safely remove them or leave them depending upon your usecase.
 */

Routes::get('/media/{path}', 'FileController@index');

/**
 * Add Routes here
 * 
 * Example:
 * Routes::get('/', 'HomeController@index');
 */
Routes::get('/', function () {
    $user = request()->user;
    return view('welcome')->with('user', $user);
});