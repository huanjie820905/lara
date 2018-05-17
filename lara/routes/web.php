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

/*Route::get('/', function () {
	return view('welcome');
});*/

Route::get('/', function () {
	return view('login');
});;
Route::post('/','LoginController@login');

Route::get('/lesson','LessonController@show');
Route::post('/lesson','LessonController@add');
Route::get('/lesson/{lesson_id}','LessonController@delete');

Route::post('/ajax','AjaxController@query');

Route::get('/logout','LogoutController@logout');