<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('forum', 'ForumController@topics');
Route::get('topic/{num}', 'ForumController@get_comment_by_id');
Route::post('addtopic' , 'ForumController@add_topic');
Route::post('removetopic' , 'ForumController@remove_topic');
Route::post('updatetopic' , 'ForumController@update_topic');