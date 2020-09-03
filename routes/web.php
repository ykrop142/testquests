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
    return view('welcome');
});

Route::group(['prefix'=>'admin'],function (){
    Route::get('users','GreenKrasBPost@indexuser');
    Route::get('panel', function () {
        return view('admin.panel');
    });
    Route::get('/','GreenKrasBPost@index');
    Route::patch('/{id}','GreenKrasBPost@update');
    Route::delete('/{id}','GreenKrasBPost@destroy');
   // Route::resource('','GreenKrasBPost');
});



