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

<<<<<<< HEAD
Route::get('projects', 'ProjectController@index');


=======
// Default Auth Routes
>>>>>>> 15238754893405526436e074ad9ac1524a8c2a81
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

  
  /* Company Settings */
  Route::group(['middleware'=>'admincheck'], function(){
    Route::get('settings/company/users', 'SettingsController@showUsers');
    Route::get('settings/company/{view}', 'SettingsController@show');
    Route::post('settings/company/update', 'SettingsController@updateCompany');
    Route::post('settings/company/uploadlogo', 'UploadsController@uploadLogoCompany');
    Route::post('settings/company/savelogo', 'SettingsController@saveLogoCompany');
    Route::get('settings/company/remove/{usercode}', 'SettingsController@removeUserModal');
    Route::post('settings/company/remove', 'SettingsController@removeUser');
    Route::get('settings/company/admin/{usercode}', 'SettingsController@makeUserAdmin'); 
  });
  Route::get('settings/create-company', function() {
    return view('settings.company.create');
  });
  Route::post('settings/create-company', 'SettingsController@createCompany');     
  
  /* Personal Settings */
  Route::get('settings/{view}', 'SettingsController@show');
  Route::post('settings/avatar/upload/{type}', array('uses' => 'UploadsController@uploadAvatar'));
  Route::post('settings/profile/update', 'SettingsController@updateProfile');
  Route::post('settings/account/change-password', array('uses' => 'SettingsController@changePassword'));
  Route::post('settings/account/delete', array('uses' => 'SettingsController@deleteAccount'));
  Route::get('settings/avatar/crop/{type}', function() {
    return view('settings.modals.crop')->with('type', $type);
  });
  Route::post('settings/avatar/crop/{type}', array('uses' => 'UploadsController@cropAvatar'));
  Route::post('settings/company/join', 'SettingsController@joinCompany');
  Route::post('settings/company/leave', 'SettingsController@leaveCompany');
    
  /* Autocomplete */
  Route::post('autocomplete/companies', 'AutocompleteController@findCompanies');
  
});