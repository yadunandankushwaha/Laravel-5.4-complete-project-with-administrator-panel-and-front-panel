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
use App\Testimonial;

class TestimonialController extends Controller
{
	
	public function addTestimonial()
    {
		$data = Input::all ();
		$rules = array (
				'title' => 'required',
				'description' => 'required',
				'userfile' => 'required|mimes:jpg,png,gif,jpeg,JPG,GIF,PNG,JPEG'
		)
		;
		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
			// Session::flash('message', 'Please Enter Valid Email & Password.');
			return Redirect::to ( '/admin/add-testimonial' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else {
			$testimonial = new Testimonial ();
			$return = $testimonial->addTestimonial ();
			if ($return) {
				return Redirect::to ( '/admin/testimonials' )->with ( "confirm", "You have successfully Added the Testimonial! " );
			}
		}
    }    
  

	public function viewAddTestimonial(){
		return view('admin.add-testimonial');
	}

	public function getTestimonials()
    {
    	$testimonials = Testimonial::orderBy('id','desc')->get();
    	return view("/admin/testimonials" , ["confirm",'data'=>$testimonials]);
    }

    public function updateTestimonial($id)
    {
    	if($id){
    	$testimonialDetail = Testimonial::where('id',$id)->first();
		    if($testimonialDetail){
		    	return view('/admin/update-testimonial', ['data'=>$testimonialDetail]);
		    	//return Redirect::to ('/admin/update-user/'.$id , ['data'=>$userDetail]);
		    }else{
		    	return Redirect::to ( '/admin/update-testimonial');
		    }
        }else{
        	return Redirect::to ( '/admin/update-testimonial');
        }
    }

    public static function updateTestimonialData()
    {
		$data = Input::all ();
		$rules = array (
				'title' => 'required',
				'description' => 'required'
		)
		;
		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
			// Session::flash('message', 'Please Enter Valid Email & Password.');
			return Redirect::to ( '/admin/add-testimonial' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else {
			$testimonial = Testimonial::updateTestimonialData();
			if ($testimonial) {
				return Redirect::to ( '/admin/testimonials' )->with ( "confirm", "You have successfully Updated the Testimonial! " );
			}else{
				return Redirect::to ( '/admin/testimonials' )->with ( "error", "Some Error Occured While Updating Testimonial! " );
			}

		}
    } 


    public static function deleteTestimonial($id)
    {
    	if($id){ 
	    	$testimonial = Testimonial::find($id);    
			$testimonial->delete();
		    if($testimonial){
		    	return Redirect::to('/admin/testimonials')->with("confirm","Testimonial Deleted Successfully");
		    }else{
		    	return Redirect::to ( '/admin/testimonials');
		    }
        }else{
        	return Redirect::to ( '/admin/testimonials');
        }
    }

    public static function enableDisableTestimonial($id)
    {
    	if($id){ 
	    	$testimonial = Testimonial::find($id);    
			if($testimonial->status == 'Active'){
				$status = 'Inactive';
				$userInactive = Testimonial::enableDisableTestimonial($id,$status);
				return Redirect::to('/admin/testimonials')->with("confirm","Testimonial Inactive Successfully");
			}else{
				$status = 'Active';
				$userInactive = Testimonial::enableDisableTestimonial($id,$status);
				return Redirect::to('/admin/testimonials')->with("confirm","Testimonial Active Successfully");
			}
        }else{ 
        	return Redirect::to ( '/admin/testimonials');
        }
    }

	    
	
}
