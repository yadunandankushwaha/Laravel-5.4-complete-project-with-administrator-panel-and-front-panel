<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Mail;
use App\BlogComments;

class BlogComments extends Model
{

    public $table='comments';


    public static function getBlogComments()
    {
        $data = BlogComments::join('posts','posts.id','comments.item_id')
        ->join('users','users.id','comments.user_id')
        ->where('comments.type','=','post')
        ->select('users.name as userName','comments.created_at as createdAt','comments.comments as comment', 'comments.type')
        ->limit(5)
        ->get();


        return $data;
    }
    

}
