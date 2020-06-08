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
Route::get('/account','AccountController@index')->name('account');
Route::get('/account/website/edit/{id}','WebsiteController@edit');
Route::get('/account/website/{id}/view','WebsiteController@show');
Route::get('/account/website/{id}/edit','WebsiteController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

