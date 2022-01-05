<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
    return view('welcome');
});


Route::get('/home',[LoginController::class,'index']);


Route::get('/login/facebook',[LoginController::class,'redirectToProvider']);

Route::get('/login/facebook/callback',[LoginController::class,'handleProviderCallback']);




Route::get('/home',[LoginController::class,'index']);


Route::get('/login/github',[LoginController::class,'redirectToProviderGithub']);

Route::get('/login/github/callback',[LoginController::class,'handleProviderCallbackGithub']);

