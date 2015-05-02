<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Auth;
use Hash;
use Input;
use Redirect;
use Session;

// Requests
use App\Http\Requests\UpdateSettingsProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\DeleteAccountRequest;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\JoinCompanyRequest;
use App\Http\Requests\LeaveCompanyRequest;

// Models
use App\Models\User;
use App\Models\Userphone;
use App\Models\Company;
use App\Models\Companylocation;
use App\Models\Companylogo;

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
      'name'        => $request->get('name'),
      'username'    => $request->get('username'),
      'title'       => $request->get('title'),
      'timezone'    => $request->get('timezone'),
    ]);
    
    Userphone::updateOrCreate(['user_id' => Auth::User()->id], [
      'user_id'     => Auth::User()->id, //pkey
      'direct'      => $request->get('direct'),
      'mobile'      => $request->get('mobile')
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
  
  public function createCompany(CreateCompanyRequest $request) {
        
    $company = Company::create([
      'companycode'  => Str::random(10),
      'name'        => $request->get('name'),
      'type'        => $request->get('type'),
      'labor'       => $request->get('labor')
    ]);
    
    Companylocation::create([
      'company_id'  => $company->id,
      'street'      => $request->get('street'),
      'city'        => $request->get('city'),
      'country'     => $request->get('country'),
      'state'       => $request->get('state'),
      'zipcode'     => $request->get('zipcode'),
      'phone'       => $request->get('phone'),
      'fax'         => $request->get('fax'),
      'website'     => $request->get('website')
    ]);
    
    Auth::User()->update([
      'company_id' => $company->id,
      'company_user_access' => 'admin',
      'company_user_status' => 'active'
    ]);
    
    Session::put('company_id', $company->id);
    Session::put('company_user_access', 'admin');
    
    return Redirect::to('settings/account')
            ->with('UpdateSuccess', '<strong>Success!</strong> Your company has been added.');
  }
  
  public function updateCompany(UpdateCompanyRequest $request) {
        
    Company::where('id', Auth::User()->Company->id)->update([
      'name'        => $request->get('name'),
      'type'        => $request->get('type'),
      'labor'       => $request->get('labor')
    ]);
    
    Companylocation::where('company_id', Auth::User()->Company->id)->update([
      'street'      => $request->get('street'),
      'city'        => $request->get('city'),
      'country'     => $request->get('country'),
      'state'       => $request->get('state'),
      'zipcode'     => $request->get('zipcode'),
      'phone'       => $request->get('phone'),
      'fax'         => $request->get('fax'),
      'website'     => $request->get('website')
    ]);
    
    return Redirect::to('http://localhost/settings/company')
            ->with('UpdateSuccess', '<strong>Success!</strong> Your company information has been updated.');
  }
  
  public function saveLogoCompany() {
    
    $file_id = Input::get('file_id');
    
    Companylogo::where('company_id', Auth::user()->Company->id)->update([
        'file_id_logo'  => $file_id
    ]);
    
    return Redirect::to('http://localhost/settings/company')
            ->with('UpdateSuccess', '<strong>Success!</strong> Your company logo has been changed.');
  }
   
  public function joinCompany(JoinCompanyRequest $request) {
    
    //Check for admin user
    $count = User::where('company_id', '=', $request->get('company_id'))
            ->where('company_user_status', '=', 'active')
            ->where('company_user_access', '=', 'admin')
            ->count();
    
    // Set user access type
    $user_access = $count > 0 ? 'standard' : 'admin';
    
    Auth::User()->update([
      'company_id' => $request->get('company_id'),
      'company_user_access' => $user_access,
      'company_user_status' => 'active'
    ]);
    
    return Redirect::to('settings/account')
            ->with('UpdateSuccess', '<strong>Success!</strong> You have been added to ' . Auth::User()->company->name . '!');
  }
  
  public function leaveCompany(LeaveCompanyRequest $request) {
            
    Auth::User()->update([
      'company_user_access' => 'standard',
      'company_user_status' => 'disabled'
    ]);
    
    Session::forget('company_id');
    Session::forget('company_user_access');
    
    return Redirect::to('settings/account')
            ->with('UpdateSuccess', '<strong>Success!</strong> You have been removed from your previous company.');
  }
 
}