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
use App\Blog;

class BlogController extends Controller
{
	
	public function addBlog()
    {
		$data = Input::all ();
		$rules = array (
				'title' => 'required',
				'description' => 'required',
				'userfile' => 'required|mimes:jpg,png,gif,jpeg,JPG,GIF,PNG,JPEG'
		)
		;
		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
			// Session::flash('message', 'Please Enter Valid Email & Password.');
			return Redirect::to ( '/admin/add-blog' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else {
			$blog = new Blog ();
			$return = $blog->addBlog ();
			if ($return) {
				return Redirect::to ( '/admin/blogs' )->with ( "confirm", "You have successfully Added the Blog! " );
			}
		}
    }    

    

	public function viewAddBlog(){
		return view('admin.add-blog');
	}

	public function getBlogs()
    {
    	$blogs = Blog::orderBy('id','desc')->get();
    	return view("/admin/blogs" , ["confirm",'data'=>$blogs]);
    }

    public function updateBlog($id)
    {
    	if($id){
    	$blogDetail = Blog::where('id',$id)->first();
		    if($blogDetail){
		    	return view('/admin/update-blog', ['data'=>$blogDetail]);
		    	//return Redirect::to ('/admin/update-user/'.$id , ['data'=>$userDetail]);
		    }else{
		    	return Redirect::to ( '/admin/update-blog');
		    }
        }else{
        	return Redirect::to ( '/admin/update-blog');
        }
    }

    public static function updateBlogData()
    {
		$data = Input::all ();
		$rules = array (
				'title' => 'required',
				'description' => 'required'
		)
		;
		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
			// Session::flash('message', 'Please Enter Valid Email & Password.');
			return Redirect::to ( '/admin/add-blog' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else {
			$blog = Blog::updateBlogData();
			if ($blog) {
				return Redirect::to ( '/admin/blogs' )->with ( "confirm", "You have successfully Updated the Blog! " );
			}else{
				return Redirect::to ( '/admin/blogs' )->with ( "error", "Some Error Occured While Updating Blog! " );
			}

		}
    } 


    public static function deleteBlog($id)
    {
    	if($id){ 
	    	$user = Blog::find($id);    
			$user->delete();
		    if($user){
		    	return Redirect::to('/admin/blogs')->with("confirm","Blog Deleted Successfully");
		    }else{
		    	return Redirect::to ( '/admin/blogs');
		    }
        }else{
        	return Redirect::to ( '/admin/blogs');
        }
    }

    public static function enableDisableBlog($id)
    {
    	if($id){ 
	    	$blog = Blog::find($id);    
			if($blog->status == 'Active'){
				$status = 'Inactive';
				$userInactive = Blog::enableDisableBlog($id,$status);
				return Redirect::to('/admin/blogs')->with("confirm","Blogs Inactive Successfully");
			}else{
				$status = 'Active';
				$userInactive = Blog::enableDisableBlog($id,$status);
				return Redirect::to('/admin/blogs')->with("confirm","Blogs Active Successfully");
			}
        }else{ 
        	return Redirect::to ( '/admin/blogs');
        }
    }

	    
	
}
