<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
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
                if(Session::get('inforUser')['acctype_id'] == '3'){
                    $recommendedMovies = DB::select('CALL collab_recommendedmovies(?, ?)', array(Session::get('loginId'), 9));
                    $information2 = Session::put('recommendedMovies', $recommendedMovies);
                    $userlogged = DB::select('SELECT * FROM pdmv_users WHERE USER_ID = ? LIMIT 1', array(Session::get('loginId')));
                    $information3 = Session::put('fullInfoUser', $userlogged);
                }
                

            }
            /*
            return response()->json([
                'loginas' => Session::get('loginId'),
                'accinfor' => Session::get('inforUser'),
                'userinfor' => Session::get('fullInfoUser'),
                'recommend' => Session::get('recommendedMovies')
            ]);*/
            return redirect('/admin/dashboard');
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
            Session::pull('fullInfoUser');
            Session::pull('recommendedMovies');
            //Session::pull('locale');
            return redirect()->back();
        }
    }
}
