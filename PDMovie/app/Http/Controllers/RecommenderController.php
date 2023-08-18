<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RecommenderController extends Controller
{
    //
    public function UserBased_CollaborativeFiltering($uid)
    {
        $movies = DB::select('CALL collab_recommendedmovies(?, ?)', array($uid, 9));
        $resultArray = [
            'recommendedmovies' => $movies
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
}