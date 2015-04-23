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



/* TEMPORARY ROUTES FOR UI VIEW DESIGN */
Route::get('settings/profile', function(){
  return view('settings.personal.profile');
});
Route::get('settings/account', function(){
  return view('settings.personal.account');
});