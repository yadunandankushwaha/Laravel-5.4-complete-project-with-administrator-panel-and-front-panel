<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Mail;
use App\SocialLink;

class SocialLink extends Model
{

    public $table='sociallinks';

    /**
     * The aibutes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'link', 'status',
    ];

    //add Social Link
    public function addSocialLink()
    {
        $data = Input::all ();

        $sl = new SocialLink ();
        $sl->name = Input::get ('name');
        $sl->link = Input::get ('link' );
        $sl->status = Input::get ('status');
        $sl->save ();
        
        return $sl;
    }


 //Update Social Link
    public static function updateSocialLinkData()
    {

        $data = Input::all ();
        
          $data = SocialLink::where('id', Input::get('id'))
           ->update ( [
            'name' => Input::get('name'),
            'link' => Input::get('link'),
            'status' => Input::get('status'),
             'updated_at'=> date("Y-m-d H:i:s")
           ] );

        return $data;
    }

// change Social Lnk status
    public static function enableDisableSocialLink($id,$status)
    {
        $data = SocialLink::where('id', $id)
           ->update ( [
             'status' => $status,
             'updated_at'=> date("Y-m-d H:i:s")
           ] );
        return $data;
    }
    

}
