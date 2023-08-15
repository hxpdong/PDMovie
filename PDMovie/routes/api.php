<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;
use App\Http\Controllers\RecommenderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/recommended/{uid}', [RecommenderController::class, 'UserBased_CollaborativeFiltering']);
Route::post('/users/new' , [MovieController::class, 'insertUserTest']);
Route::get('/movies/{mid}', [MovieController::class, 'show']);
