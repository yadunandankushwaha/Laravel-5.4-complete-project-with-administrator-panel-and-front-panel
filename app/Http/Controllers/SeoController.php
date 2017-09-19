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
use App\Seo;

class SeoController extends Controller
{
	

	public function getSeosPages()
    {
    	$seos = Seo::orderBy('id','desc')->get();
    	return view("/admin/seo-pages" , ["confirm",'data'=>$seos]);
    }

    public function updateSeoPage($id)
    {
    	if($id){
    	$seoDetail = Seo::where('id',$id)->first();
		    if($seoDetail){
		    	return view('/admin/update-seo-page', ['data'=>$seoDetail]);
		    }else{
		    	return Redirect::to ( '/admin/update-seo-page');
		    }
        }else{
        	return Redirect::to ( '/admin/update-seo-page');
        }
    }

    public static function updateSeoPageData()
    {
		$data = Input::all ();
		$rules = array (
				'title' => 'required',
				'keywords' => 'required',
				'description' => 'required'
		)
		;
		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
			// Session::flash('message', 'Please Enter Valid Email & Password.');
			return Redirect::to ( '/admin/update-seo-pages' )->withInput ( Input::except ( 'page_name' ) )->withErrors ( $validator );
		} else {
			$seo = Seo::updateSeoPageData();
			if ($seo) {
				return Redirect::to ( '/admin/seo-pages' )->with ( "confirm", "You have successfully Updated the Seo Pages! " );
			}else{
				return Redirect::to ( '/admin/seo-pages' )->with ( "error", "Some Error Occured While Updating Seo Pages! " );
			}

		}
    } 


	
}
