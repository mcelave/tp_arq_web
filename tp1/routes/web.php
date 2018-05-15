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

Route::get('/users/{userName}', 'UserController@show');

Route::get('/users/all/{userName}', 'UserController@showAll');


Route::get('/room', 'RoomController@mainRoom');

Route::post('room/sendMessage', 'RoomController@sendMessage');

Route::post('room/sendImage', 'RoomController@sendImage');

Route::get('/room/all/{userName}', 'RoomController@showAll');

Route::get('/room/join/{roomName}/{userName}', 'RoomController@join');

Route::get('/room/createGroup/{userName}', 'RoomController@createPublicChat');

Route::get('/room/{userName}/{otherName}', 'RoomController@openPrivateChat');

Route::post('/room/public', 'RoomController@openPublicChat');