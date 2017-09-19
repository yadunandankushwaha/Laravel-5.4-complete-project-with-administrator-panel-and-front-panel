<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Mail;
use App\Product;

class Product extends Model
{

    public $table='products';

    /**
     * The aibutes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code', 'quantity', 'status','short_description','description','price','cat_id','seller_id'
    ];

    //add Product
    public function addProduct()
    {
        $data = Input::all ();

        $image = Input::file ( 'userfile' );
        $img = time () . '.' . $image->getClientOriginalExtension ();
        $destinationPath = public_path ('assets/img/products' );
        $image->move ( $destinationPath, $img );
        
        $product = new Product ();
        $product->code = Input::get ('code');
        $product->name = Input::get ('name' );
        $product->image = $img;
        $product->seller_id = Input::get ('seller_id' );
        $product->cat_id = Input::get ('cat_id' );
        $product->short_description = Input::get ('short_description' );
        $product->description = Input::get ('description');

        $product->quantity = Input::get ('quantity');
        $product->price = Input::get ('price');
        $product->condition = Input::get ('condition');
        $product->color = Input::get ('color');
        $product->favourite = Input::get ('favourite');
        $product->seo_title = Input::get ('seo_title');
        $product->seo_keywords = Input::get ('seo_keywords');
        $product->seo_description = Input::get ('seo_description');


        $product->status = Input::get ('status');
        $product->save ();
        
        return $product;
    }


 //add blog
    public static function updateproductData()
    {

        $data = Input::all ();
        if(Input::get('status') == 1){
            $status = 1;
        }else{
            $status = 0;
        }

        $query = Product::where('id',Input::get('id'))->first();

        if(Input::file ( 'userfile' )){

        $image = Input::file ( 'userfile' );
        $img = time () . '.' . $image->getClientOriginalExtension ();
        $destinationPath = public_path ('assets/img/products' );
        $image->move ( $destinationPath, $img );

         $filename = public_path().'assets/img/products/'.$query->image;
         //echo $filename;die;
         @unlink($filename);
        
          $data = Product::where('id', Input::get('id'))
           ->update ( [
            'name' => Input::get('name'),
            'seller_id' => Input::get('seller_id'),
            'cat_id' => Input::get('cat_id'),
            'short_description' => Input::get('short_description'),
            'quantity' => Input::get('quantity'),
            'price' => Input::get('price'),
            'condition' => Input::get('condition'),
            'color' => Input::get('color'),
            'favourite' => Input::get('favourite'),
            'seo_title' => Input::get('seo_title'),
            'seo_keywords' => Input::get('seo_keywords'),
            'seo_description' => Input::get('seo_description'),
            'status' => $status,
            'image' => $img,
            'updated_at'=> date("Y-m-d H:i:s")
           ] );

        }else{

         $data = Product::where('id', Input::get('id'))
           ->update ( [
            'name' => Input::get('name'),
            'seller_id' => Input::get('seller_id'),
            'cat_id' => Input::get('cat_id'),
            'short_description' => Input::get('short_description'),
            'quantity' => Input::get('quantity'),
            'price' => Input::get('price'),
            'condition' => Input::get('condition'),
            'color' => Input::get('color'),
            'favourite' => Input::get('favourite'),
            'seo_title' => Input::get('seo_title'),
            'seo_keywords' => Input::get('seo_keywords'),
            'seo_description' => Input::get('seo_description'),
            'status' => $status,
            'image' => $query->image,
            'updated_at'=> date("Y-m-d H:i:s")
           ] );

        }
        return $data;
    }


    public static function enableDisableProduct($id,$status)
    {
        $data = Product::where('id', $id)
           ->update ( [
             'status' => $status,
             'updated_at'=> date("Y-m-d H:i:s")
           ] );
        return $data;
    }

    public static function getProducts()
    {
        $data = Product::join('users','users.id','products.seller_id')
        ->join('product_categories','product_categories.id','products.cat_id')
        ->select('products.id as productId','products.code','products.name as productName','products.quantity','products.cat_id','product_categories.cat_name as catName','products.price','products.created_at as createdAt','products.status as status','products.image as productImage')
        ->orderBy('products.id','desc')
        ->get();
        return $data;
    }

    

}
