<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

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
Route::name('user.')->group(function(){
    Route::view('/personal', 'personal')->middleware('auth')->name('personal');

    Route::get('/login', function(){
        if(Auth::check()){
            return redirect(route('/'));
        }
        return view('login');
    })->name('login');;
    Route::post('/login', 'mainController@login');
    Route::get('/registration', function(){
        if(Auth::check()){
            return redirect(route('/'));
        }
        return view('registration');
    })->name('registration');
    Route::get('/logout', function(){
        Auth::logout();
        return redirect('/');
    })->name('logout');
    Route::post('/registration', 'mainController@save');
    
});
