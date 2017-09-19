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
use App\Product;
use App\ProductCategory;
use App\User;

class ProductController extends Controller
{
	

	public function view(){
		return view('admin.product-dashboard');
	}

	public function viewAddProduct(){
		$productCat = ProductCategory::orderBy('id','desc')->get();
		$Seller = User::where('role','=','Seller')->orderBy('id','desc')->get();
    	return view("/admin/add-product" , ['data'=>$productCat,'seller'=>$Seller]);

	}

	public function addProduct()
    {
		$data = Input::all ();
		$rules = array (
				'code' => 'required',
				'name' => 'required',
				'price' => 'required',
				'seller_id' => 'required',
				'cat_id' => 'required',
				'short_description' => 'required',
				'description' => 'required',
				'userfile' => 'required|mimes:jpg,png,gif,jpeg,JPG,GIF,PNG,JPEG'
		)
		;
		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
			return Redirect::to ( '/admin/add-product' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else { 
			$product = new Product ();
			$return = $product->addProduct ();
			if ($return) {
				return Redirect::to ( '/admin/products' )->with ( "confirm", "You have successfully Added a Product! " );
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


	public function getProducts()
    {
    	$products = Product::getProducts();
    	return view("/admin/products" , ["confirm",'data'=>$products]);
    }

    

    public static function updateProductData()
    {
		$data = Input::all ();
		$rules = array (
				'name' => 'required',
				'price' => 'required',
				'seller_id' => 'required',
				'cat_id' => 'required',
				'short_description' => 'required',
				'description' => 'required'
		);
		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
			// Session::flash('message', 'Please Enter Valid Email & Password.');
			return Redirect::to ( '/admin/update-product' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else {
			$product = Product::updateProductData();
			if ($product) {
				return Redirect::to ( '/admin/products' )->with ( "confirm", "You have successfully Updated the Product! " );
			}else{
				return Redirect::to ( '/admin/products' )->with ( "error", "Some Error Occured While Updating Product! " );
			}

		}
    } 


    public static function deleteProduct($id)
    {
    	if($id){ 
	    	$product = Product::find($id);    
			$product->delete();
		    if($product){
		    	return Redirect::to('/admin/products')->with("confirm","Product Deleted Successfully");
		    }else{
		    	return Redirect::to ( '/admin/products');
		    }
        }else{
        	return Redirect::to ( '/admin/products');
        }
    }

    public static function enableDisableproduct($id)
    {
    	if($id){ 
	    	$product = Product::find($id);    
			if($product->status == 1){
				$status = 0;
				$userInactive = Product::enableDisableProduct($id,$status);
				return Redirect::to('/admin/products')->with("confirm","Product Inactive Successfully");
			}else{
				$status = 1;
				$userInactive = Product::enableDisableProduct($id,$status);
				return Redirect::to('/admin/products')->with("confirm","Product Active Successfully");
			}
        }else{ 
        	return Redirect::to ( '/admin/products');
        }
    }

	    
	
}
