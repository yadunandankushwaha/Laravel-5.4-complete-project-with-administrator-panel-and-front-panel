<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Mail;
use App\Slider;

class Slider extends Model
{

    public $table='sliders';

    /**
     * The aibutes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'image', 'status',
    ];

    //add slider
    public function addSlider()
    {
        $data = Input::all ();

        if(Input::get('status') == 1){
            $status = 1;
        }else{
            $status = 0;
        }

        $image = Input::file ( 'userfile' );
        $img = time () . '.' . $image->getClientOriginalExtension ();
        $destinationPath = public_path ('assets/img/sliders' );
        $image->move ( $destinationPath, $img );
        
        $slider = new Slider ();
        $slider->title = Input::get ('title');
        $slider->description = Input::get ('description' );
        $slider->image = $img;
        $slider->status = $status;
        $slider->save ();
        
        return $slider;
    }


 //add slider
    public static function updateSliderData()
    {

        $data = Input::all ();
        if(Input::get('status') == 1){
            $status = 1;
        }else{
            $status = 0;
        }

        $query = Slider::where('id',Input::get('id'))->first();
        if(Input::file ( 'userfile' )){

        $image = Input::file ( 'userfile' );
        $img = time () . '.' . $image->getClientOriginalExtension ();
        $destinationPath = public_path ('assets/img/sliders' );
        $image->move ( $destinationPath, $img );

         $filename = public_path().'assets/img/sliders/'.$query->image;
         //echo $filename;die;
         @unlink($filename);
        
          $data = Slider::where('id', Input::get('id'))
           ->update ( [
            'title' => Input::get('title'),
            'description' => Input::get('description'),
            'status' => $status,
            'image' => $img,
            'updated_at'=> date("Y-m-d H:i:s")
           ] );

        }else{

         $data = Slider::where('id', Input::get('id'))
           ->update ( [
            'title' => Input::get('title'),
            'description' => Input::get('description'),
            'status' => $status,
            'image' => $query->image,
            'updated_at'=> date("Y-m-d H:i:s")
           ] );

        }
        return $data;
    }


    public static function enableDisableSlider($id,$status)
    {
        $data = Slider::where('id', $id)
           ->update ( [
             'status' => $status,
             'updated_at'=> date("Y-m-d H:i:s")
           ] );
        return $data;
    }

    

}
