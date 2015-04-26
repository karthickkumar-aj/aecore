<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateSettingsProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\DeleteAccountRequest;
use App\Models\Userphone;
use Auth;
use Hash;
use Redirect;

class SettingsController extends Controller {

  // Make sure the user is authenticated.
  public function __construct()
  {
    $this->middleware('auth');
  }
  
  // Show user settings
	public function show($view)
	{
		return view('settings.'.$view);
	}
  
  // Update user settings
	public function updateProfile(UpdateSettingsProfileRequest $request)
	{
    // Proceed with update
    Auth::User()->update([
        'name' => $request->get('name'),
        'username' => $request->get('username'),
        'title' => $request->get('title'),
        'timezone' => $request->get('timezone')
    ]);
    
    Userphone::updateOrCreate(['user_id' => Auth::User()->id], [
      'user_id' => Auth::User()->id, //pkey
      'direct' => $request->get('direct'),
      'mobile' => $request->get('mobile')
    ]);
    
    return Redirect::to('settings/profile')
      ->with('UpdateSuccess', '<strong>Success!</strong> Your profile information has been updated.');
	}
  
  // Change user password
	public function changePassword(ChangePasswordRequest $request)
	{
      
    $user = Auth::User();

    if(Hash::check($request->get('old_password'), $user->getAuthPassword())) {
      // Password provided ok
      $user->password =  Hash::make($request->get('new_password'));
      if($user->save()) {
        return Redirect::to('settings/account')
            ->with('UpdateSuccess', '<strong>Success!</strong> Your password has been updated.');
      } else {
        return Redirect::to('settings/account')
            ->with('UpdateError', '<strong>Error!</strong> Your password could not be updated.');
      }
    } else {
      return Redirect::to('settings/account')
          ->with('UpdateError', '<strong>Error!</strong> The password you provided is incorrect.');
    }
	}
  
  // Update user settings
	public function deleteAccount(DeleteAccountRequest $request)
	{
    Auth::user()->update(['status' => 'disabled']);
    return Redirect::to('auth/logout');
	}  

  
}
