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
Route::get('/', 'ItemC@index');
Route::get('/view/{vibor}','ItemC@viewitems');
Route::get('/about','About@index');

Route::get('/contact','Contact@index');
Route::post('/contact/feedback','Contact@feedback');

Route::get('/alert','Contact@alert');

Route::get('/orders','OrderC@index');
Route::post('/orders/buy','OrderC@buy');

Route::post('/orders/add/{id}','OrdC@add');
Route::get('/orders/up/{id}','OrdC@up');
Route::get('/orders/down/{id}','OrdC@down');

Route::get('sendhtmlemail','MailController@html_email');

