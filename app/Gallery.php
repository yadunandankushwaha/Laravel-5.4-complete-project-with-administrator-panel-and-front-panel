<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Mail;
use App\Gallery;

class Gallery extends Model
{

    public $table='Galleries';

    /**
     * The aibutes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'image', 'status',
    ];

    //add blog
    public function addBlog()
    {
        $data = Input::all ();

        $image = Input::file ( 'userfile' );
        $img = time () . '.' . $image->getClientOriginalExtension ();
        $destinationPath = public_path ('assets/img/blogs' );
        $image->move ( $destinationPath, $img );
        
        $blog = new Blog ();
        $blog->title = Input::get ('title');
        $blog->description = Input::get ('description' );
        $blog->image = $img;
        $blog->author = 1;
        $blog->status = Input::get ('status');
        $blog->save ();
        
        return $blog;
    }


 //add blog
    public static function updateBlogData()
    {

        $data = Input::all ();
        if(Input::get('status') == 1){
            $status = 'Active';
        }else{
            $status = 'Inactive';
        }

        $query = Blog::where('id',Input::get('id'))->first();
        if(Input::file ( 'userfile' )){

        $image = Input::file ( 'userfile' );
        $img = time () . '.' . $image->getClientOriginalExtension ();
        $destinationPath = public_path ('assets/img/blogs' );
        $image->move ( $destinationPath, $img );

         $filename = public_path().'assets/img/blogs/'.$query->image;
         //echo $filename;die;
         @unlink($filename);
        
          $data = Blog::where('id', Input::get('id'))
           ->update ( [
            'title' => Input::get('title'),
            'description' => Input::get('description'),
             'status' => $status,
              'image' => $img,
             'updated_at'=> date("Y-m-d H:i:s")
           ] );

        }else{

         $data = Blog::where('id', Input::get('id'))
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


    public static function enableDisableBlog($id,$status)
    {
        $data = Blog::where('id', $id)
           ->update ( [
             'status' => $status,
             'updated_at'=> date("Y-m-d H:i:s")
           ] );
        return $data;
    }

    

}
