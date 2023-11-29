<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.home');
});
Route::namespace('App\Http\Controllers')->name('anonymous.')->group(function(){
    Route::any('anonymous/message','AnonymousController@sendMessage')->name('send.message');
    /*auth*/
    Route::any('anonymous/signup','AnonymousAuthController@Signup')->name('signup');

});

Route::get('fake',[TestController::class,'dumyRecord']);

Route::get('/inbox', function () {
    return view('frontend.anymous.inbox');
});
