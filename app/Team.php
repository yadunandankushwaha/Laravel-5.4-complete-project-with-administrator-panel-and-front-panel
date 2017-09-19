<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Mail;
use App\Team;

class Team extends Model
{

    public $table='teams';

    /**
     * The aibutes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'designation', 'description', 'image', 'status',
    ];

    //add Team
    public function addTeam()
    {
        $data = Input::all ();

        $image = Input::file ( 'userfile' );
        $img = time () . '.' . $image->getClientOriginalExtension ();
        $destinationPath = public_path ('assets/img/teams' );
        $image->move ( $destinationPath, $img );
        
        $team = new Team ();
        $team->name = Input::get ('name');
        $team->designation = Input::get ('designation');
        $team->description = Input::get ('description' );
        $team->image = $img;
        $team->status = Input::get ('status');
        $team->save ();
        
        return $team;
    }


 //Update team
    public static function updateTeamData()
    {

        $data = Input::all ();
        if(Input::get('status') == 1){
            $status = 'Active';
        }else{
            $status = 'Inactive';
        }

        $query = Team::where('id',Input::get('id'))->first();
        if(Input::file ( 'userfile' )){

        $image = Input::file ( 'userfile' );
        $img = time () . '.' . $image->getClientOriginalExtension ();
        $destinationPath = public_path ('assets/img/teams' );
        $image->move ( $destinationPath, $img );

         $filename = public_path().'assets/img/teams/'.$query->image;
         //echo $filename;die;
         @unlink($filename);
        
          $data = Team::where('id', Input::get('id'))
           ->update ( [
            'name' => Input::get('name'),
            'designation' => Input::get('designation'),
            'description' => Input::get('description'),
             'status' => $status,
              'image' => $img,
             'updated_at'=> date("Y-m-d H:i:s")
           ] );

        }else{ 

         $data = Team::where('id', Input::get('id'))
           ->update ( [
            'name' => Input::get('name'),
            'designation' => Input::get('designation'),
            'description' => Input::get('description'),
             'status' => $status,
             'image' => $query->image,
             'updated_at'=> date("Y-m-d H:i:s")
           ] );

        }
        return $data;
    }


    public static function enableDisableTeam($id,$status)
    {
        $data = Team::where('id', $id)
           ->update ( [
             'status' => $status,
             'updated_at'=> date("Y-m-d H:i:s")
           ] );
        return $data;
    }
    

}
