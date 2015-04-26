<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateSettingsProfileRequest;
use App\Models\Userphone;

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
    \Auth::User()->update([
        'name' => $request->get('name'),
        'username' => $request->get('username'),
        'title' => $request->get('title'),
        'timezone' => $request->get('timezone')
    ]);
    
    Userphone::updateOrCreate(['user_id' => \Auth::User()->id], [
      'user_id' => \Auth::User()->id,
      'direct' => $request->get('direct'),
      'mobile' => $request->get('mobile')
    ]);
    
    return \Redirect::to('settings/profile')
      ->with('UpdateSuccess', '<strong>Success!</strong> Your profile information has been updated.');
    
	} // end update

}
