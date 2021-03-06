<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/developers', 'DeveloperController@index')->name('developers');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/tweets', 'TweetController@index')->name('tweets.index');
    Route::post('/tweets', 'TweetController@store')->name('tweets.store');
});
