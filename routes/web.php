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

use Wink\WinkPost;

Route::get('/', 'BlogController@index')->name('home');
Route::get('/about', 'BlogController@about')->name('about');


Route::get('/articles/drafts', 'DraftController@index')->name('drafts');
Route::get('/articles/drafts/{id}', 'DraftController@findPostById')->name('draft.post');

Route::get('/articles', 'BlogController@index')->name('articles');
Route::get('/articles/{slug}', 'BlogController@findPostBySlug')->name('blog.post');

Route::get('/fresh', 'BlogController@updateIndexedArticles')->name('index.json');
Route::get('/newsletter', 'BlogController@newsletter')->name('newsletter');
// Route::get('seeder', 'BlogController@seeder');

Route::get('/series/laravel-lessons', 'SeriesController@laravelLessons')->name('laravel.lessons');

