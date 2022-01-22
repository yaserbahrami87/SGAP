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

Auth::routes();


Route::get('/home', 'HomeController@index');
Route::get('/panel', 'AdminController@index');


Route::middleware(['can:isAdmin'])->prefix('admin')->group(function()
{
    Route::get('/','AdminController@index');
    //Users
    Route::get('/user/all','UserController@allUsers');
    Route::resource('user','UserController');
//    Route::prefix('user')->group(function()
//    {
//        Route::get('all','UserController@allUsers');
//        Route::get('create','UserController@create');
//        Route::resource('user','UserController');
//    });

});
