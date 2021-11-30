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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index')->name('home');
Route::get('/members/account','Members\AccountController@index')->name('account');
Route::get('/members/account/website/edit/{id}','Members\WebsiteController@edit');
Route::get('/members/account/website/{id}/view','Members\WebsiteController@show');
Route::get('/members/account/website/{id}/edit','Members\WebsiteController@edit');
Route::get('/members', 'Members\MembersController@index')->name('members-home');
Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin-home');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
