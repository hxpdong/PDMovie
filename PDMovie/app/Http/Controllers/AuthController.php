<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
            $request->session()->put('loginId', $loggedInUser->acc_id);
            $data = array();
            if(Session::has('loginId')){
                $data = $loggedInUser;
                $information = Session::put('inforUser', $data);
            }
            
            return redirect('/adminpage');
        }else{
            return response()->json([
                "success" => false,
                "message" => "TK hoac MK khong dung"
            ]);
        }
    }

    public function AuthLogout(Request $request)
    {
        /*
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        
        return redirect('/');
        */
        if(Session::has('loginId')) {
            Session::pull('loginId');
            Session::pull('inforUser');
            //Session::pull('locale');
            return redirect('/login');
        }
    }
}
