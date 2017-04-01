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
route::group(['middleware'=>['auth']],function(){
	Route::get('/', 'TasksController@index');
	Route::post('/','TasksController@add');
	Route::get('/delete/{id}','TasksController@delete');
	Route::post('/edit/{id}/task','TasksController@update');
	Route::get('/edit/{id}','TasksController@edit');
});



Auth::routes();
 
Route::get('/home', 'HomeController@index');
