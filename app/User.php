<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use Notifiable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
   public function registration()
   {
    $data = Input::all();
    //dd(   $data);
    $user = new User();
    $user->name = Input::get('val_username');
    $user->email = Input::get('val_email');
    $user->password = Hash::make(Input::get('val_password'));
    $user->status = 'Inactive';
    $user->role= Input::get('val_role');
    $user->remember_token= Input::get('_token');
    $user->save();

    Mail::send('users.mails.welcome_email',[
            'user' => $user,
            
    ],function ($message) use ($user){
        $message->from('ynandan55@gmail.com');
        $message->to ($user->email, $user->name)->subject('Welcome to Laravel Website system ');
    });
   // return Redirect::to('/createpayment');
    //return redirect('createpayment');
    return ;
   }

   public static function updateUserData($request)
    {
        if(Input::get('status') == 1){
            $status = 'Active';
        }else{
            $status = 'Inactive';
        }

        $data = User::where('id', Input::get('id'))
           ->update ( [
             'name' => Input::get('val_username'),
              'role' => Input::get('val_role'),
             'status' => $status,
             'updated_at'=> date("Y-m-d H:i:s")
           ] );

           if($data){
            return true;
           }else{
            return false;
           }
    }

    public static function enableDisableUser($id,$status)
    {
        $data = User::where('id', $id)
           ->update ( [
             'status' => $status,
             'updated_at'=> date("Y-m-d H:i:s")
           ] );
        return $data;
    }

     public static function updateProfileData()
    {
       
       $id = Auth::user()->id;
       $imageuser = Auth::user()->image;

       if(Input::file ( 'userfile' )){

        $image = Input::file ( 'userfile' );
        $img = time () . '.' . $image->getClientOriginalExtension ();
        $destinationPath = public_path ('assets/img/users' );
        $image->move ( $destinationPath, $img );

        if($imageuser){
            $filename = public_path().'assets/img/users/'.$imageuser;
            @unlink($filename);
        }

          $data = User::where('id', $id)
           ->update ( [
            'name' => Input::get('val_username'),
            'image' => $img,
            'updated_at'=> date("Y-m-d H:i:s")
           ] );

        }else{

        $data = User::where('id', $id)
           ->update ( [
             'name' => Input::get('val_username'),
             'updated_at'=> date("Y-m-d H:i:s")
           ] );
        }
    return $data;
           
    }
    

}
