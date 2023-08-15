<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecommenderController extends Controller
{
    //
    public function UserBased_CollaborativeFiltering($uid)
    {
        $movies = DB::select('CALL collab_recommendedmovies(?, ?)', array($uid, 9));
        if (!empty($movies)) {
            return response()->json([
                'success' => true,
                'recommendedmovies' => $movies]);
        } else {
            return response()->json([
                'success' => false]);
            }
        return response()->json($movies);
    }
}