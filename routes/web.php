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
	$articles = App\Article::all();
    return view('welcome',compact('articles'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('articles/{article}/rate', 'ArticleRatingController@store');
