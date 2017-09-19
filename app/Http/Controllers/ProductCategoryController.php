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
use App\ProductCategory;

class ProductCategoryController extends Controller
{
	
	public function addProductCategory()
    {
		$data = Input::all ();
		$rules = array (
				'cat_name' => 'required'
		)
		;
		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
			return Redirect::to ( '/admin/add-product-category' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else {
			$productcat = new ProductCategory();
			$return = $productcat->addProductCategory ();
			if ($return) {
				return Redirect::to ( '/admin/product-categories' )->with ( "confirm", "You have successfully Added a product category! " );
			}
		}
    }    

	public function viewAddProductCategory(){

		//for stats
		$productCatTotal = ProductCategory::orderBy('id','desc')->get();
    	$productcatsEnableTotal = ProductCategory::where('status',1)->get();
    	$productcatsDisableTotal = ProductCategory::where('status',0)->get();
    	//end stats

    	return view("/admin/add-product-category" , ['data'=>$productCatTotal, 'productcatsEnableTotal'=>$productcatsEnableTotal, 'productcatsDisableTotal'=>$productcatsDisableTotal]);

		//return view('admin.add-product-category');
	}


	public function getProductCategories()
    {	
    	//for stats
    	$productCatTotal = ProductCategory::orderBy('id','desc')->get();
    	$productcatsEnableTotal = ProductCategory::where('status',1)->get();
    	$productcatsDisableTotal = ProductCategory::where('status',0)->get();
    	return view("/admin/product-categories" , ['data'=>$productCatTotal, 'productcatsEnableTotal'=>$productcatsEnableTotal, 'productcatsDisableTotal'=>$productcatsDisableTotal]);
    	//end stats
    }

    public function updateProductCategory($id)
    {
    	if($id){
    		
    		//for stats
    		$productcatsEnableTotal = ProductCategory::where('status',1)->get();
    		$productcatsDisableTotal = ProductCategory::where('status',0)->get();
    		//end stats

    	$detail = ProductCategory::where('id',$id)->first();
		    if($detail){
		    	return view('/admin/update-product-category', ['data'=>$detail, 'productcatsEnableTotal'=>$productcatsEnableTotal, 'productcatsDisableTotal'=>$productcatsDisableTotal]);
		    }else{
		    	return Redirect::to ( '/admin/update-product-category');
		    }
        }else{
        	return Redirect::to ( '/admin/update-product-category');
        }
    }

    public static function updateProductCategoryData()
    {
		$data = Input::all ();
		$rules = array (
				'cat_name' => 'required'
		);
		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
			return Redirect::to ( '/admin/update-product-category' )->withInput ( Input::except ( 'status' ) )->withErrors ( $validator );
		} else {
			$pc = ProductCategory::updateProductCategoryData();
			if ($pc) {
				return Redirect::to ( '/admin/product-categories' )->with ( "confirm", "You have successfully Updated Product Category! " );
			}else{
				return Redirect::to ( '/admin/product-categories' )->with ( "error", "Some Error Occured While Updating Product Category! " );
			}

		}
    } 


    public static function deleteProductCategory($id)
    {
    	if($id){ 
	    	$user = ProductCategory::find($id);    
			$user->delete();
		    if($user){
		    	return Redirect::to('/admin/product-categories')->with("confirm","Product Categories Deleted Successfully");
		    }else{
		    	return Redirect::to ( '/admin/product-categories');
		    }
        }else{
        	return Redirect::to ( '/admin/product-categories');
        }
    }

    public static function enableDisableProductCategory($id)
    {
    	if($id){ 
	    	$pc = ProductCategory::find($id);    
			if($pc->status == 1){
				$status = 0;
				$userInactive = ProductCategory::enableDisableProductCategory($id,$status);
				return Redirect::to('/admin/product-categories')->with("confirm","Product Categories Inactive Successfully");
			}else{
				$status = 1;
				$userInactive = ProductCategory::enableDisableProductCategory($id,$status);
				return Redirect::to('/admin/product-categories')->with("confirm","Product Categories Active Successfully");
			}
        }else{ 
        	return Redirect::to ( '/admin/product-categories');
        }
    }

	    
	
}
