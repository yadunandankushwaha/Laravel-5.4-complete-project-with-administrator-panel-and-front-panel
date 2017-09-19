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
use App\Faq;

class FaqController extends Controller
{
	
	public function addFaq()
    {
		$data = Input::all ();
		$rules = array (
				'question' => 'required',
				'answer' => 'required'
		)
		;
		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
			return Redirect::to ( '/admin/add-faq' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else {
			$faq = new Faq ();
			$return = $faq->addFaq ();
			if ($return) {
				return Redirect::to ( '/admin/faqs' )->with ( "confirm", "You have successfully Added the Faq! " );
			}
		}
    }    
 

	public function viewAddFaq(){
		return view('admin.add-faq');
	}

	public function getFaqs()
    {
    	$faqs = Faq::orderBy('id','desc')->get();
    	return view("/admin/faqs" , ["confirm",'data'=>$faqs]);
    }

    public function updateFaq($id)
    {
    	if($id){
    	$faqDetail = Faq::where('id',$id)->first();
		    if($faqDetail){
		    	return view('/admin/update-faq', ['data'=>$faqDetail]);
		    }else{
		    	return Redirect::to ( '/admin/update-faq');
		    }
        }else{
        	return Redirect::to ( '/admin/update-faq');
        }
    }

    public static function updateFaqData()
    {
		$data = Input::all ();
		$rules = array (
				'question' => 'required',
				'answer' => 'required'
		)
		;
		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
			return Redirect::to ( '/admin/add-faq' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else {
			$faq = Faq::updateFaqData();
			if ($faq) {
				return Redirect::to ( '/admin/faqs' )->with ( "confirm", "You have successfully Updated the Faq! " );
			}else{
				return Redirect::to ( '/admin/faqs' )->with ( "error", "Some Error Occured While Updating Faq! " );
			}

		}
    } 


    public static function deleteFaq($id)
    {
    	if($id){ 
	    	$user = Faq::find($id);    
			$user->delete();
		    if($user){
		    	return Redirect::to('/admin/faqs')->with("confirm","Faq Deleted Successfully");
		    }else{
		    	return Redirect::to ( '/admin/faqs');
		    }
        }else{
        	return Redirect::to ( '/admin/faqs');
        }
    }

    public static function enableDisableFaq($id)
    {
    	if($id){ 
	    	$faq = Faq::find($id);    
			if($faq->status == 1){
				$status = 0;
				$userInactive = Faq::enableDisableFaq($id,$status);
				return Redirect::to('/admin/faqs')->with("confirm","Faqs Inactive Successfully");
			}else{
				$status = 1;
				$userInactive = Faq::enableDisableFaq($id,$status);
				return Redirect::to('/admin/faqs')->with("confirm","Faqs Active Successfully");
			}
        }else{ 
        	return Redirect::to ( '/admin/faqs');
        }
    }

	    
	
}
