<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Mail;
use App\ProductCategory;

class ProductCategory extends Model
{

    public $table='product_categories';

    /**
     * The aibutes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cat_name', 'status',
    ];

    //add product category
    public function addProductCategory()
    {
        $data = Input::all ();
        $product_cat = new ProductCategory ();
        $product_cat->cat_name = Input::get ('cat_name');
        $product_cat->status = Input::get ('status');
        $product_cat->save ();
        return $product_cat;
    }


 //Update product category
    public static function updateProductCategoryData()
    {

        $data = Input::all ();
        if(Input::get('status') == 1){
            $status = 1;
        }else{
            $status = 0;
        }

        $data = ProductCategory::where('id', Input::get('id'))
           ->update ( [
            'cat_name' => Input::get('cat_name'),
            'status' => $status,
            'updated_at'=> date("Y-m-d H:i:s")
           ] );
        
        return $data;
    }

//enable Disabled Product category
    public static function enableDisableProductCategory($id,$status)
    {
        $data = ProductCategory::where('id', $id)
           ->update ( [
             'status' => $status,
             'updated_at'=> date("Y-m-d H:i:s")
           ] );
        return $data;
    }

    

}
