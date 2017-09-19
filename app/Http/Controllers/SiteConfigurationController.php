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
use App\SiteConfiguration;

class SiteConfigurationController extends Controller
{

	public function viewSiteConfiguration()
    {
    	$sf = SiteConfiguration::where('id',1)->first();
    	return view("/admin/site-configuration" , ["confirm",'data'=>$sf]);
    }

	
	public function updateSiteConfiguration()
    {
		$data = Input::all ();
		$rules = array (
				'website_name' => 'required',
				'website_title' => 'required'
		);

		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
			return Redirect::to ( '/admin/site-configuration' )->withInput ( Input::except ( 'userfile' ) )->withErrors ( $validator );
		} else {
			$siteconfig = SiteConfiguration::updateSiteConfiguration();
			if ($siteconfig) {
				return Redirect::to ( '/admin/site-configuration' )->with ( "confirm", "You have successfully Updated Website Configuration! " );
			}else{
				return Redirect::to ( '/admin/site-configuration' )->with ( "error", "Some Error Occured While Updating Website Configuration! " );
			}
		}
    }    


	    
	
}
