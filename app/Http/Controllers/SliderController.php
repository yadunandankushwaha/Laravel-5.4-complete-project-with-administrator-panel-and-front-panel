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
use App\Slider;

class SliderController extends Controller
{
	
	public function addSlider()
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
			return Redirect::to ( '/admin/add-slider' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else {
			$slider = new Slider ();
			$return = $slider->addSlider ();
			if ($return) {
				return Redirect::to ( '/admin/sliders' )->with ( "confirm", "You have successfully Added the Slider! " );
			}
		}
    }    

    

	public function viewAddSlider(){
		return view('admin.add-slider');
	}

	public function getSliders()
    {
    	$Sliders = Slider::orderBy('id','desc')->get();
    	return view("/admin/sliders" , ["confirm",'data'=>$Sliders]);
    }

    public function updateSlider($id)
    {
    	if($id){
    	$detail = Slider::where('id',$id)->first();
		    if($detail){
		    	return view('/admin/update-slider', ['data'=>$detail]);
		    	//return Redirect::to ('/admin/update-user/'.$id , ['data'=>$userDetail]);
		    }else{
		    	return Redirect::to ( '/admin/update-slider');
		    }
        }else{
        	return Redirect::to ( '/admin/update-slider');
        }
    }

    public static function updateSliderData()
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
			return Redirect::to ( '/admin/add-slider' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else {
			$slider = Slider::updateSliderData();
			if ($slider) {
				return Redirect::to ( '/admin/sliders' )->with ( "confirm", "You have successfully Updated the Slider! " );
			}else{
				return Redirect::to ( '/admin/sliders' )->with ( "error", "Some Error Occured While Updating Slider! " );
			}

		}
    } 


    public static function deleteSlider($id)
    {
    	if($id){ 
	    	$user = Slider::find($id);    
			$user->delete();
		    if($user){
		    	return Redirect::to('/admin/sliders')->with("confirm","Slider Deleted Successfully");
		    }else{
		    	return Redirect::to ( '/admin/sliders');
		    }
        }else{
        	return Redirect::to ( '/admin/sliders');
        }
    }

    public static function enableDisableSlider($id)
    {
    	if($id){ 
	    	$slider = Slider::find($id);    
			if($slider->status == 1){
				$status = 0;
				$userInactive = Slider::enableDisableSlider($id,$status);
				return Redirect::to('/admin/sliders')->with("confirm","Slider Inactive Successfully");
			}else{
				$status = 1;
				$userInactive = Slider::enableDisableSlider($id,$status);
				return Redirect::to('/admin/sliders')->with("confirm","Slider Active Successfully");
			}
        }else{ 
        	return Redirect::to ( '/admin/Sliders');
        }
    }

	    
	
}
