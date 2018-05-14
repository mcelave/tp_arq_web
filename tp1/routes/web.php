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

Route::get('/','UserController@index');

Route::post('/users/store', 'UserController@store');

Route::get('/room', 'RoomController@mainRoom');

Route::post('room/sendMessage', 'RoomController@sendMessage');

Route::post('room/sendImage', 'RoomController@sendImage');





Route::get('/allUsers/{thisUserId}', 'RoomController@showAllUsers');

Route::get('/startPrivateConversation', 'AllUsersController@startPrivateConversation');

Route::get('/notify', 'PusherController@sendNotification');