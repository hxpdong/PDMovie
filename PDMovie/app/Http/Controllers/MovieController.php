<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;

class MovieController extends Controller
{
    //
    public function index()
    {
        $results = DB::select("CALL movie_list()");
        $perPage = 12;
        $currentPage = request()->get('page', 1);
        $total = count($results);
        $offset = ($currentPage - 1) * $perPage;
        $results = array_slice($results, $offset, $perPage);
        $movies = new LengthAwarePaginator(
            $results,
            $total,
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );

        $resultArray = [
            'movies' => $movies->items(),
            'current_page' => $movies->currentPage(),
            'total' => $movies->total(),
            'per_page' => $movies->perPage(),
            'last_page' => $movies->lastPage(),
        ];
        if (!empty($resultArray)) {
        return response()->json([
            'success' => true,
            'results' => $resultArray]);
        } else {
            return response()->json([
                'success' => false]);
        }
    }

    public function insertUserTest(Request $request)
    {
        $usname = $request->usname;
        $email = $request->email;
        $passwd = $request->uspasswd;
        $passwd = password_hash($passwd, PASSWORD_BCRYPT);
        $fullname = $request->fullname;

        // Insert the new user's account
        DB::insert('insert into pdmv_accounts (usname, password, acctype_id) values (?, ?, ?)', [$usname, $passwd, 3]);

        // Get the newly inserted account's ID
        $numaccid = DB::table('pdmv_accounts')
            ->where('acctype_id', 3)
            ->max('acc_id');

        // Insert the user associated with the new account
        DB::insert('insert into pdmv_users (user_id, email, fullname) values (?, ?, ?)', [$numaccid, $email, $fullname]);

        // Get the newly inserted user's information
        $lastUser = DB::table('pdmv_users')
            ->where('user_id', $numaccid)
            ->first();

        // Get the information of the newly inserted account
        $lastAccount = DB::table('pdmv_accounts')
            ->where('acc_id', $numaccid)
            ->first();

        return response()->json([
            'success' => true,
            'newuser' => $lastUser,
            'newacc' => $lastAccount
        ]);
    }

    public function show($mid){
        $results = DB::select("CALL movie_showdetail(?)", array($mid));
        if (!empty($results)) {
            return response()->json([
                'success' => true,
                'movie_detail' => $results
            ]);
        } else {
            // Đăng nhập thất bại
            return response()->json([
                'success' => false
            ]);
        }

        
    }

    public function getCommentListOf($mid){
        $results = DB::select("SELECT * FROM pdmv_comments cmt JOIN pdmv_accounts acc ON cmt.user_id = acc.acc_id WHERE movie_id = ? ORDER BY comment_id DESC;", array($mid));
        
        $perPage = 3;
        $currentPage = request()->get('page', 1);
        $total = count($results);
        $offset = ($currentPage - 1) * $perPage;
        $results = array_slice($results, $offset, $perPage);
        $comments = new LengthAwarePaginator(
            $results,
            $total,
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );

        $resultArray = [
            'comments' => $comments->items(),
            'current_page' => $comments->currentPage(),
            'total' => $comments->total(),
            'per_page' => $comments->perPage(),
            'last_page' => $comments->lastPage(),
        ];
        
        
        if (!empty($resultArray)) {
            return response()->json([
                'success' => true,
                'results' => $resultArray
            ]);
        } else {
            // Đăng nhập thất bại
            return response()->json([
                'success' => false
            ]);
        }
    }

    public function postcomment(Request $request)
    {
        $usid = $request->accId;
        $mid = $request->mId;
        $cmt = $request->comment;

        // Insert the new user's account
        DB::insert('insert into pdmv_comments (user_id, movie_id, comment) values (?, ?, ?)', [$usid, $mid, $cmt]);

        return response()->json([
            'success' => true
        ]);
    }

    public function getRatingOf($uid, $mid){
        $results = DB::select("SELECT * FROM pdmv_ratings WHERE user_id = ? AND movie_id = ?;", array($uid, $mid));
        if($results){
            return response()->json([
                'success' => true,
                'rating' => $results
            ]);
        }
        else return response()->json([
            'success' => false,
        ]);
    }

    public function postRatingOf(Request $request){
        $uid = $request->accId;
        $mid = $request->mId;
        $rating = $request->ratingpoint;
        DB::delete("DELETE FROM pdmv_ratings WHERE user_id = ? AND movie_id = ?", [$uid, $mid]);
        DB::insert("INSERT INTO pdmv_ratings(user_id, movie_id, rating) VALUES(?, ?, ?)", array($uid, $mid, $rating));
        return response()->json([
                'success' => true,
            ]);
       
    }
}