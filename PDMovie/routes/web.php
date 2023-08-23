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

///////////////
Route::get('/login', [AuthController::class, 'getAuthLogin'])->middleware('PDMV_alreadyLoggedIn');
Route::post('/login', [AuthController::class, 'postAuthLogin']);
///////////////for Logged in
Route::middleware(['PDMV_isLogin'])->group(function () {
    Route::get('/logout', [AuthController::class, 'AuthLogout']);
});
////////Just Admin and SP Admin
Route::middleware(['PDMV_isLogin', 'PDMV_isAdmin'])->group(function () {
    Route::get('/adminpage', function () {
        return view('/admin.index');
    });
    Route::get('/admin/dashboard', function () {
        return view('/admin.dashboard');
    });
});
////////Just for User
Route::middleware(['PDMV_isLogin', 'PDMV_isUser'])->group(function (){
    Route::get('/recommend', function() {
        return view('/movie.recommender');
    });
});
////////Just User or Guest
Route::middleware(['PDMV_isUserOrGuest'])->group(function () {
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
    Route::get('/header', function() {
        return view('/component.header');
    });
});

Route::get('/test', function(){
    return view('/test');
});

Route::post('/modalLogin', [AuthController::class, 'modalPostAuthLogin'])->name('modalLogin');