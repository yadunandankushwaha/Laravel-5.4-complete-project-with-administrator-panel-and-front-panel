<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Mail;
use App\Seo;

class Seo extends Model
{

    public $table='seos';

    /**
     * The aibutes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'page_name', 'title', 'keywords', 'description',
    ];

   

 //add blog
    public static function updateSeoPageData()
    {

        $data = Input::all ();
       
         $data = Seo::where('id', Input::get('id'))
           ->update ( [
            'title' => Input::get('title'),
            'description' => Input::get('description'),
            'keywords' => Input::get('keywords')
           ] );

        return $data;
    }

}
