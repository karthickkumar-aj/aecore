<?php

/*
|--------------------------------------------------------------------------
| Storefront Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'StorefrontController@index');
Route::get('home', 'StorefrontController@index');

// Custom Auth Routes
Route::get('login', function() { return view('auth.login'); });
Route::get('signup', function() { return view('auth.signup'); });
Route::get('password', function() { return view('auth.password'); });
Route::get('reactivate', function() { return view('auth.reactivate'); });

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

Route::group(['middleware'=>'userstatus'], function(){
  
  /* Projects */
  Route::get('projects', 'ProjectsController@index');

  /* Tasks */
  Route::resource('tasks', 'TasksController@index');

  /* Settings */
  Route::get('settings/{view}', 'SettingsController@show');
  Route::post('settings/profile/update', 'SettingsController@updateProfile');
  Route::post('settings/account/change-password', array('uses' => 'SettingsController@changePassword'));
  Route::post('settings/account/delete', array('uses' => 'SettingsController@deleteAccount'));
});