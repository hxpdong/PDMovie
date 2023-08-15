<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/login', function () {
    return view('/auth.login');
});
Route::get('/adminpage', function (){
    return view('/admin.index');
});