<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Mail;
use App\Testimonial;

class Testimonial extends Model
{

    public $table='testimonial';

    /**
     * The aibutes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'image', 'status',
    ];

    //add Testimonial
    public function addTestimonial()
    {
        $data = Input::all ();

        $image = Input::file ( 'userfile' );
        $img = time () . '.' . $image->getClientOriginalExtension ();
        $destinationPath = public_path ('assets/img/testimonials' );
        $image->move ( $destinationPath, $img );
        
        $blog = new Testimonial ();
        $blog->title = Input::get ('title');
        $blog->description = Input::get ('description' );
        $blog->image = $img;
        $blog->status = Input::get ('status');
        $blog->save ();
        
        return $blog;
    }


 //Update Testimonial
    public static function updateTestimonialData()
    {

        $data = Input::all ();
        if(Input::get('status') == 1){
            $status = 'Active';
        }else{
            $status = 'Inactive';
        }

        $query = Testimonial::where('id',Input::get('id'))->first();
        if(Input::file ( 'userfile' )){

        $image = Input::file ( 'userfile' );
        $img = time () . '.' . $image->getClientOriginalExtension ();
        $destinationPath = public_path ('assets/img/testimonials' );
        $image->move ( $destinationPath, $img );

         $filename = public_path().'assets/img/testimonials/'.$query->image;
         //echo $filename;die;
         @unlink($filename);
        
          $data = Testimonial::where('id', Input::get('id'))
           ->update ( [
            'title' => Input::get('title'),
            'description' => Input::get('description'),
             'status' => $status,
              'image' => $img,
             'updated_at'=> date("Y-m-d H:i:s")
           ] );

        }else{

         $data = Testimonial::where('id', Input::get('id'))
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


    public static function enableDisableTestimonial($id,$status)
    {
        $data = Testimonial::where('id', $id)
           ->update ( [
             'status' => $status,
             'updated_at'=> date("Y-m-d H:i:s")
           ] );
        return $data;
    }
    

}
