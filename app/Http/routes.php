<?php

/*
|--------------------------------------------------------------------------
| Storefront Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'StorefrontController@index');
Route::get('home', 'StorefrontController@index');

// Custom Auth View Routes
Route::get('login', function() { return view('auth.login'); });
Route::get('signup', function() { return view('auth.signup'); });
Route::get('password', function() { return view('auth.password'); });

// Default Auth Routes
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::get('projects', 'ProjectsController@index');