<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function getAuthLogin(){
        return view('/auth.login');
    }

    public function postAuthLogin(Request $request){
        
        $arr = [
            'usname' => $request->usname, 
            'password' => $request->uspassword
        ];
        if(Auth::attempt($arr)){
            $loggedInUser = Auth::user(); // Get the logged-in user
            return response()->json([
                "success" => true,
                "message" => "login thanh cong",
                'logineduser' => $loggedInUser
            ]);
        }else{
            return response()->json([
                "success" => false,
                "message" => "TK hoac MK khong dung"
            ]);
        }
    }
}
