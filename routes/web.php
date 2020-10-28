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
Route::get('main', function () {
    return view('main');
});

Route::group(['prefix'=>'admin'],function (){
    Route::get('users','GKBanAdd@indexuser');
    Route::get('panel', function () {
        return view('admin.panel');
    });
    Route::get('/','GKBanAdd@index');
    Route::get('/create','GKBanAdd@create');
    Route::post('/create','GKBanAdd@store');
    Route::patch('/{id}','GKBanAdd@update');
    Route::delete('/{id}','GKBanAdd@destroy');
});

Route::group(['prefix'=>'lk'],function(){
    Route::get('/profile','GKUserProfile@index');
});

Auth::routes();

Route::get('/main', 'HomeController@index')->name('main');
