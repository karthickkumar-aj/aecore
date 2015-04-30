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
  Route::post('settings/avatar/upload/{type}', array('uses' => 'UploadsController@uploadAvatar'));
  Route::get('settings/avatar/crop/{type}', function() {
    return view('settings.modals.crop')->with('type', $type);
  });
  Route::post('settings/avatar/crop/{type}', array('uses' => 'UploadsController@cropAvatar'));
  
  /* Settings - Company */
  Route::get('settings/company/create', function() {
    return view('settings.companies.create');
  });
  Route::post('settings/company/create', 'SettingsController@createCompany');
  Route::post('settings/company/join', 'SettingsController@joinCompany');
  Route::post('settings/company/leave', 'SettingsController@leaveCompany');
  
  /* Autocomplete */
  Route::post('autocomplete/companies', 'AutocompleteController@findCompanies');
  
});