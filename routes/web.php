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

Route::get('/','EntryController@show');
Route::post('/entry','EntryController@entry');
Route::post('/deletepost','EntryController@delete');
Route::get('/comment/{id}','CommentController@show')->name('comment');
Route::post('/addcom','CommentController@comment');
Route::post('/delete','CommentController@delete');