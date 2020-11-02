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
    return view('main');
})->middleware('auth');
Route::get('map', function () {
    return view('welcome');
})->middleware('auth');

Route::group(['prefix'=>'admin'],function (){
    Route::get('users','GKBanAdd@indexuser')->middleware('auth');
    Route::get('panel', function () {
        return view('admin.panel');
    })->middleware('auth');
    Route::get('/','GKBanAdd@index')->middleware('auth');
    Route::get('/create','GKBanAdd@create')->middleware('auth');
    Route::post('/create','GKBanAdd@store')->middleware('auth');
    Route::patch('/{id}','GKBanAdd@update')->middleware('auth');
    Route::delete('/{id}','GKBanAdd@destroy')->middleware('auth');
});

Route::group(['prefix'=>'lk'],function(){
    Route::get('/profile','GKUserProfile@index')->middleware('auth');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('main');
