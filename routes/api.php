<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', 'mainController@products');
Route::get('products/{id}', 'mainController@productById');
Route::get('products/search', 'mainController@search');

// Route::prefix('auth')->group(function(){
//     Route::get('init', 'mainController@init');

//     Route::post('login','mainController@login');
//     Route::post('register', 'mainController@register');
//     Route::post('logout, @mainController@logout');
//  });