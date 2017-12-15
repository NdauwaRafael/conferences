<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    // public function __construct(){
    //   $this.middleware('auth:api')
    //   ->only('logout');
    // }

    public function register(Request $request)
    {
      $this->validate($request, [
        'username'=>'required|max:30',
        'fname'=>'required|max:30',
        'lname'=>'required|max:30',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|between:6,25'
      ]);
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        return response()
            ->json([
              'registered'=>true
            ]);
    }

//    public function login(Request $request){
//      $this->validate($request, [
//        'email' => 'required|email',
//        'password'=>'required|between:6, 40'
//      ]);
//
//      $user = User::where('email', $request->email)
//        ->first();
//
//        if ($user && Hash::check($request->password, $user->password)) {
//          $user -> save();
//
//          return response()
//          ->json([
//            'authenticated' => true,
//            'user_id'=>$user->id
//          ]);
//        }
//
//        return response()
//        ->json([
//            'email'=>['provided email address and password do not match!!']
//        ], 422);
//
//
//
//    }


    public function login(Request $request) {
        $this->validate($request,
            [ 'email' => 'required|email',
                'password' => 'required|between:5,20'
            ]);
        $user = User::where('email', $request->email)
            ->first();
        if($user && Hash::check($request->password, $user->password))
            { $user->api_token = str_random(100);
            $user->save();
            return response()
                ->json([
                    'authenticated' => true,
                    'api_token' => $user->api_token,
                    'user_id' => $user->id
                ]);
            }
            return response()
                ->json([
                    'email' => ['Login Details provided are Wrong']
                ], 422); }
}
