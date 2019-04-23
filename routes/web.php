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
//inde page real slider
Route::get('/', 'PageController@index');

Route::get('404', ['as' => '404', 'uses' => 'ErrorController@notfound']);
Route::get('500', ['as' => '500', 'uses' => 'ErrorController@fatal']);

Route::get('posts', 'PostController@posts');
Route::get('tag', 'PostController@tag');
Route::get('category', 'PostController@category');
Route::get('post/{slug}', 'PostController@post');
Route::get('search', 'PostController@searchPosts');
Route::get('about', 'PageController@about');
Route::get('contact', 'PageController@contact');
Route::get('test', 'TestController@testImage');
Route::get('testnews', 'NewsController@testnews');

Route::get('news', 'NewsController@newspage');
Route::get('marvel-heros','MarvelController@heros');
