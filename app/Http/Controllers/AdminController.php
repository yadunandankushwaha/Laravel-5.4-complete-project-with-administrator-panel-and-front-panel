<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\BlogComments;
use App\Blog;

class AdminController extends Controller
{
	public function adminIndexPage(){
     	return view('admin.index');
	}
	
	public function adminDashboardPage(){
		$users = User::orderBy('id','desc')->get();
		$comment = BlogComments::getBlogComments();
		$blogCount = Blog::get()->count();
    	return view("/admin/dashboard" , ["confirm",'data'=>$users,'comments'=>$comment,'blogCount'=>$blogCount]);
		//return view('admin.dashboard');
	}

	public function addUser()
    {
    
    $data = Input::all();
      $rules = array(
      		'val_username' => 'required',
      		'val_role' => 'required',
			'val_password' => 'required|min:6',
      		'val_confirm_password' => 'required|min:6|same:val_password'
			//'photo' => 'mimes:jpeg,bmp,png'
		     );
     	$chk =	self::isExisting ( Input::get('val_email') );
     	
	    $validator = Validator::make($data, $rules);

	    if ($validator->fails()){
	      Session::flash('message', 'Please Enter Valid Email & Password.');
	      $response = Redirect::to('/admin/add-user')->withInput(Input::except('val_password'))->withErrors($validator);
	    }
	    $user= new	User();
	    $user->registration();
	    if($user){
	    	$response = Redirect::to('/admin/users')->with("confirm","User Successfully Added");
		}else{
			$response = Redirect::to('/admin/users')->with("error","Something Went Wrong");
		}
		
		return $response;

	    }
	      

    public function isExisting($email) { 
		  $existingEmail = User::where ('email', $email )->first();
		  if ($existingEmail instanceof User) { 
		  	return Redirect::to('/admin/users')->with("confirm","User Successfully Added");
		  	die;
		  }
 	}

    public function Authuanticate()
    {
		$userdata = array (
				'email' => Input::get ('login-email'),
				'password' => Input::get ('login-password'),
				'status'=>'Active',
				'role' => 'Admin'
		);
		
		if (Auth::validate ( $userdata )) {
			if (Auth::attempt ( $userdata )) {
				Session::flash ( 'message', 'Welcome to Admin Dashboard!' );
				return Redirect::to ( '/admin/dashboard' );
			}
		} 

		else {
			Session::flash ( 'message', 'Username or Password is Incorrect!' );
			return Redirect::to ( '/admin/index' )->withInput(Input::except('password'));
		}
	     
	    }
	    
	    
	    public function confirmation($token)
	    {
	    	$user=User::where("remember_token",$token)->first();
	    	// We can add token expiry code also here
	    	if($user)
	    	{
	    		$user->status="Active";
	    		$user->save();
	    		return Redirect::to('/index')->with("confirm","Your account has been activated successfully, You can login now !");
	    	}									
	    	else 
	    	{
	    		return Redirect::to('/index')->with("confirm","Sorry this is not the valid link");
	    	}
	    	
	    }   

	public function viewAddUser(){
		return view('admin.add-user');
	}

	public function getUsers()
    {
    	$users = User::orderBy('id','desc')->get();
    	return view("/admin/users" , ["confirm",'data'=>$users]);
    }

    public function updateUser($id)
    {
    	if($id){
    	$userDetail = User::where('id',$id)->first();
		    if($userDetail){
		    	return view('/admin/update-user', ['data'=>$userDetail]);
		    	//return Redirect::to ('/admin/update-user/'.$id , ['data'=>$userDetail]);
		    }else{
		    	return Redirect::to ( '/admin/update-user');
		    }
        }else{
        	return Redirect::to ( '/admin/update-user');
        }
    }

    public static function updateUserData(Request $Request)
    {
    	if(Input::get('id')){ 
    	$userDetail = User::updateUserData($Request);
		    if($userDetail){ 
		    	return Redirect::to('/admin/users')->with("confirm","User Updated Successfully");
		    }else{ 
		    	return Redirect::to ( '/admin/update-user');
		    }
        }else{ 
        	return Redirect::to ( '/admin/update-user');
        }
    }

    public static function deleteUser($id)
    {
    	if($id){ 
	    	$user = User::find($id);    
			$user->delete();
		    if($user){ 
		    	return Redirect::to('/admin/users')->with("confirm","User Deleted Successfully");
		    }else{ 
		    	return Redirect::to ( '/admin/users');
		    }
        }else{ 
        	return Redirect::to ( '/admin/users');
        }
    }

    public static function enableDisableUser($id)
    {
    	if($id){ 
	    	$user = User::find($id);    
			if($user->status == 'Active'){
				$status = 'Inactive';
				$userInactive = User::enableDisableUser($id,$status);
				return Redirect::to('/admin/users')->with("confirm","User Inactive Successfully");
			}else{
				$status = 'Active';
				$userInactive = User::enableDisableUser($id,$status);
				return Redirect::to('/admin/users')->with("confirm","User Active Successfully");
			}
        }else{ 
        	return Redirect::to ( '/admin/users');
        }
    }

    public function updateProfile()
    {
    	$id = Auth::user()->id;
    	if($id){
    	$userDetail = User::where('id',$id)->first();
		    if($userDetail){
		    	return view('/admin/update-Profile', ['data'=>$userDetail]);
		    }else{
		    	return Redirect::to ( '/admin/update-Profile');
		    }
        }else{
        	return Redirect::to ( '/admin/update-profile');
        }
    }

	public function updateProfileData(){
    
    $data = Input::all();
      $rules = array(
      		'val_username' => 'required'
			);
     	
	    $validator = Validator::make($data, $rules);

	    if ($validator->fails()){
	      Session::flash('message', 'Please Enter Valid Name');
	      $response = Redirect::to('/admin/update-profile')->withInput(Input::except('confirm_password'))->withErrors($validator);
	    }
	   $user = User::updateProfileData();
	    if($user){
	    	$response = Redirect::to('/admin/update-profile')->with("confirm","Profile Updated Successfully");
		}else{
			$response = Redirect::to('/admin/update-profile')->with("error","Something Went Wrong");
		}
		return $response;
	}

	public function changePassword()
    {
    	$id = Auth::user()->id;
    	if($id){
    	$userDetail = User::where('id',$id)->first();
		    if($userDetail){
		    	return view('/admin/change-password', ['data'=>$userDetail]);
		    }else{
		    	return Redirect::to ( '/admin/change-password');
		    }
        }else{
        	return Redirect::to ( '/admin/change-password');
        }
    }

   public function changePasswordData(Request $request)
    {
        $this->validate($request, [
            'old' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
 
        $user = User::find(Auth::id());
        $hashedPassword = $user->password;
 
        if (Hash::check($request->old, $hashedPassword)) {
            //Change the password
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();
 			Session::flash ( 'confirm', 'Your password has been changed.' );
            //$request->session()->flash('message', 'Your password has been changed.');
            return back();
        }
 			Session::flash ( 'message', 'Your password has not been changed.' );
       // $request->session()->flash('error', 'Your password has not been changed.');
        return back();
 
 
    }
	 
	
	
}
