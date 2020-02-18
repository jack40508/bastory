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
Auth::routes();

Route::get('/','HomeController@index')->name('home');
Route::get('/home','HomeController@index')->name('home');
Route::get('/myteam','HomeController@team');
Route::get('/myprofile','HomeController@profile');

Route::get('/search','TeamController@search');
Route::get('/search/searchresult','TeamController@searchresult');

Route::put('/replyevent/{event_user_id}/{reply}','EventController@event_reply_update');

Route::resource('/team','TeamController');
Route::get('/team/{team_id}/member','TeamController@member');
Route::get('/team/{team_id}/profile','TeamController@profile');
Route::put('/teamuser/{team_id}','TeamController@apply');
Route::put('/teamuser/{team_id}/{user_id}/check','TeamController@check_apply');
Route::put('/teamuser/{team_id}/destroy','TeamController@cancel_apply');

Route::resource('/event','EventController');

Route::get('/post/search','PostController@search');
Route::put('/post/close/{post_id}','PostController@close');
Route::resource('/post','PostController');
Route::resource('/post/{post_id}/comment','CommentController');

Route::post('/message/sendbyid/{to}','MessageController@sendbyid');
Route::resource('/message','MessageController');
