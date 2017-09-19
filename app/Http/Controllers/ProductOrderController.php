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
use App\ProductOrder;

class ProductOrderController extends Controller
{
	

	public function view(){
		return view('admin.product-orders');
	}

	public function viewAddProduct(){
		return view('admin.add-product');
	}

	public function addProduct()
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
			return Redirect::to ( '/admin/add-product' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else {
			$product = new Product ();
			$return = $product->addProduct ();
			if ($return) {
				return Redirect::to ( '/admin/add-product' )->with ( "confirm", "You have successfully Added a Product! " );
			}
		}
    }  

    public function updateProduct($id)
    {
        	if($id){
    	$detail = Product::where('id',$id)->first();
		    if($detail){
		    	return view('/admin/update-product', ['data'=>$detail]);
		    }else{
		    	return view('admin.update-product');
		    }
        }else{
        	return Redirect::to ( '/admin/update-product/');
        }
    }


	public function getProductOrders()
    {
    	$productsorder = ProductOrder::orderBy('id','desc')->get();
    	return view("/admin/product-orders" , ["confirm",'data'=>$productsorder]);
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
