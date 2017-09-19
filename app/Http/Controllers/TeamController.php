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
use App\Team;

class TeamController extends Controller
{
	
	public function addTeam()
    {
		$data = Input::all ();
		$rules = array (
				'name' => 'required',
				'designation' => 'required',
				'description' => 'required',
				'userfile' => 'required|mimes:jpg,png,gif,jpeg,JPG,GIF,PNG,JPEG'
		)
		;
		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
			// Session::flash('message', 'Please Enter Valid Email & Password.');
			return Redirect::to ( '/admin/add-team' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else {
			$team = new Team ();
			$return = $team->addTeam ();
			if ($return) {
				return Redirect::to ( '/admin/teams' )->with ( "confirm", "You have successfully Added the Team! " );
			}
		}
    }    

   
	public function viewAddTeam(){
		return view('admin.add-team');
	}

	public function getTeams()
    {
    	$teams = Team::orderBy('id','desc')->get();
    	return view("/admin/teams" , ["confirm",'data'=>$teams]);
    }

    public function updateTeam($id)
    {
    	if($id){
    	$teamDetail = Team::where('id',$id)->first();
		    if($teamDetail){
		    	return view('/admin/update-team', ['data'=>$teamDetail]);
		    }else{
		    	return Redirect::to ( '/admin/update-team');
		    }
        }else{
        	return Redirect::to ( '/admin/update-team');
        }
    }

    public static function updateTeamData()
    {
		$data = Input::all ();
		$rules = array (
				'name' => 'required',
				'designation' => 'required',
				'description' => 'required'
		)
		;
		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
			return Redirect::to ( '/admin/add-team' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else {
			$team = Team::updateTeamData();
			if ($team) {
				return Redirect::to ( '/admin/teams' )->with ( "confirm", "You have successfully Updated the Team! " );
			}else{
				return Redirect::to ( '/admin/teams' )->with ( "error", "Some Error Occured While Updating Team! " );
			}

		}
    } 


    public static function deleteTeam($id)
    {
    	if($id){ 
	    	$user = Team::find($id);    
			$user->delete();
		    if($user){
		    	return Redirect::to('/admin/teams')->with("confirm","Team Deleted Successfully");
		    }else{
		    	return Redirect::to ( '/admin/teams');
		    }
        }else{
        	return Redirect::to ( '/admin/teams');
        }
    }

    public static function enableDisableTeam($id)
    {
    	if($id){ 
	    	$team = Team::find($id);    
			if($team->status == 'Active'){
				$status = 'Inactive';
				$userInactive = Team::enableDisableTeam($id,$status);
				return Redirect::to('/admin/teams')->with("confirm","Teams Inactive Successfully");
			}else{
				$status = 'Active';
				$userInactive = Team::enableDisableTeam($id,$status);
				return Redirect::to('/admin/teams')->with("confirm","Teams Active Successfully");
			}
        }else{ 
        	return Redirect::to ( '/admin/teams');
        }
    }

	    
	
}
