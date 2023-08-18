<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Kernel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/movie.index');
});
Route::get('/movies', function() {
    return view('/movie.index');
});
Route::get('/demofilm', function() {
    return view('demofilm');
});
Route::get('movies/{mid}', function(){
    return view('/movie.show');
});
Route::get('/adminpage', function () {
    return view('/admin.index');
})->middleware('PDMV_isLogin', 'PDMV_checklogin');

Route::get('/login', [AuthController::class, 'getAuthLogin'])->middleware('PDMV_alreadyLoggedIn');
Route::post('/login', [AuthController::class, 'postAuthLogin']);
Route::get('/logout', [AuthController::class, 'AuthLogout']);

Route::get('/recommend', function() {
    return view('/movie.recommender');
})->middleware('PDMV_isLogin');
