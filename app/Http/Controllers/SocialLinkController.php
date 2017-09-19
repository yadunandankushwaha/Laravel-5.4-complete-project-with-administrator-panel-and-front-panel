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
use DB;
use App\SocialLink;

class SocialLinkController extends Controller
{
	
	public function addSocialLink()
    {
		$data = Input::all ();
		$rules = array (
				'name' => 'required',
				'link' => 'required'
		);
		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
			return Redirect::to ( '/admin/add-social-link' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else {
			$sl = new SocialLink ();
			$return = $sl->addSocialLink ();
			if ($return) {
				return Redirect::to ( '/admin/social-links' )->with ( "confirm", "You have successfully Added A Social Link! " );
			}
		}
    }    
 

	public function viewAddSocialLink(){
		return view('admin.add-social-link');
	}

	public function getSocialLinks()
    {
    	$sl = SocialLink::orderBy('id','desc')->get();
    	return view("/admin/social-links" , ["confirm",'data'=>$sl]);
    }

    public function updateSocialLink($id)
    {
    	if($id){
    	$detail = SocialLink::where('id',$id)->first();
		    if($detail){
		    	return view('/admin/update-social-link', ['data'=>$detail]);
		    }else{
		    	return Redirect::to ( '/admin/update-social-link');
		    }
        }else{
        	return Redirect::to ( '/admin/update-social-link');
        }
    }

    public static function updateSocialLinkData()
    {
		$data = Input::all ();
		$rules = array (
				'name' => 'required',
				'link' => 'required'
		);
		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
			return Redirect::to ( '/admin/update-social-link' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else {
			$sl = SocialLink::updateSocialLinkData();
			if ($sl) {
				return Redirect::to ( '/admin/social-links' )->with ( "confirm", "You have successfully Updated Social Link! " );
			}else{
				return Redirect::to ( '/admin/social-links' )->with ( "error", "Some Error Occured While Updating Social Link! " );
			}

		}
    } 


    public static function deleteSocialLink($id)
    {
    	if($id){ 
	    	$sl = SocialLink::find($id);    
			$sl->delete();
		    if($sl){
		    	return Redirect::to('/admin/social-links')->with("confirm","Social Link Deleted Successfully");
		    }else{
		    	return Redirect::to ( '/admin/social-links');
		    }
        }else{
        	return Redirect::to ( '/admin/social-links');
        }
    }

    public static function enableDisableSocialLink($id)
    {
    	if($id){ 
	    	$sl = SocialLink::find($id);    
			if($sl->status == 1){
				$status = 0;
				$inactive = SocialLink::enableDisableSocialLink($id,$status);
				return Redirect::to('/admin/social-links')->with("confirm","Social Link Inactive Successfully");
			}else{
				$status = 1;
				$active = SocialLink::enableDisableSocialLink($id,$status);
				return Redirect::to('/admin/social-links')->with("confirm","Social Link Active Successfully");
			}
        }else{ 
        	return Redirect::to ( '/admin/social-links');
        }
    }

	    
	
}
