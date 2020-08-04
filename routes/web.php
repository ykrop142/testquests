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

//Route::get('/contact',function (){
//    return view('contact');
//});
//
//Route::get('/admin','GreenkrasBans@viewers');
//Route::post('/admin','GreenkrasBans@storenewban');
//Route::get('/admin/create','GreenkrasBans@create');
Route::get('admin/users','GreenKrasBPost@indexuser');
Route::resource('admin','GreenKrasBPost');


