<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class MovieController extends Controller
{
    //
    public function index()
    {
        $results = DB::select("Select * from movies");
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

        return response()->json($resultArray);
    }

    public function insertMovie(Request $request)
    {
        $usname = $request->usname;
        $email = $request->email;
        $passwd = $request->uspasswd;
        $fullname = $request->fullname;
        DB::insert('insert into users (usname, email, uspassword, fullname, ustype_id) values (?, ?, ?, ?, ?)', [$usname, $email, $passwd, $fullname, 2]);

        // Chèn thông tin người dùng vào cơ sở dữ liệu
        $lastUser = DB::table('users')
        ->orderBy('user_id', 'desc')  // Sắp xếp theo cột ID theo thứ tự giảm dần (ngược lại)
        ->first();
        
        return response()->json([
            'success' => true,
            'newuser' => $lastUser,
        ]);
    }
}
