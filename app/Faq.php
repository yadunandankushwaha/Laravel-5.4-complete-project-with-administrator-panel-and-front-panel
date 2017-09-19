<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Mail;
use App\Faq;

class Faq extends Model
{

    public $table='faqs';

    /**
     * The aibutes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question', 'answer', 'status',
    ];

    //add Faq
    public function addFaq()
    {
        $data = Input::all ();

        $faq = new Faq ();
        $faq->question = Input::get ('question');
        $faq->answer = Input::get ('answer' );
        $faq->status = Input::get ('status');
        $faq->save ();
        
        return $faq;
    }


 //Update Faq
    public static function updateFaqData()
    {

        $data = Input::all ();
        
          $data = Faq::where('id', Input::get('id'))
           ->update ( [
            'question' => Input::get('question'),
            'answer' => Input::get('answer'),
            'status' => Input::get('status'),
             'updated_at'=> date("Y-m-d H:i:s")
           ] );

        return $data;
    }

// change faq status
    public static function enableDisableFaq($id,$status)
    {
        $data = Faq::where('id', $id)
           ->update ( [
             'status' => $status,
             'updated_at'=> date("Y-m-d H:i:s")
           ] );
        return $data;
    }
    

}
