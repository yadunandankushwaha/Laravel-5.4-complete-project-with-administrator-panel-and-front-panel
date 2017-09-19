<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Mail;
use App\SiteConfiguration;

class SiteConfiguration extends Model
{

    public $table='siteconfiguration';

    /**
     * The aibutes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'website_name', 'website_title', 'logo',
    ];




 //Update Site Configuration
    public static function updateSiteConfiguration()
    {

        $data = Input::all ();
        
        $query = SiteConfiguration::where('id',Input::get('id'))->first();
        if(Input::file ( 'userfile' )){

        $image = Input::file ( 'userfile' );
        $img = time () . '.' . $image->getClientOriginalExtension ();
        $destinationPath = public_path ('assets/img/' );
        $image->move ( $destinationPath, $img );

         $filename = public_path().'assets/img/'.$query->logo;
         //echo $filename;die;
         @unlink($filename);
        
          $data = SiteConfiguration::where('id', Input::get('id'))
           ->update ( [
            'website_name' => Input::get('website_name'),
            'website_title' => Input::get('website_title'),
            'logo' => $img,
            'updated_at'=> date("Y-m-d H:i:s")
           ] );

        }else{

         $data = SiteConfiguration::where('id', Input::get('id'))
           ->update ( [
            'website_name' => Input::get('website_name'),
            'website_title' => Input::get('website_title'),
             'logo' => $query->logo,
             'updated_at'=> date("Y-m-d H:i:s")
           ] );

        }
        return $data;
    }


    

}
