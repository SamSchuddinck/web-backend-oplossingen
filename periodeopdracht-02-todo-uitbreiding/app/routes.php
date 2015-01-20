<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@getIndex');
Route::get('/Registreer','HomeController@getRegistreer');
Route::get('Activeer/{code}','UserController@getActivate');

// Als user ingelogd is kan niet naar login pagina gaan
Route::group(array('before' => 'auth.check'),function(){
	Route::get('/Login','HomeController@getLogin');
});


/* Protection against cross site request*/
Route::group(array('before' => 'csrf'),function(){
	Route::post('/Registreer','UserController@register');
	Route::post('/Login','UserController@login');
});
/* Routes die enkel toegankelijk zijn voor ingelogde users */
Route::group(array('before' => 'auth'),function(){
	Route::get('/Logout','UserController@logout');
	Route::get('/Todos','ToDoController@getIndex');
	Route::get('Todos/Done/{todoId}','ToDoController@changeToDone');
	Route::get('Todos/Todo/{todoId}','ToDoController@changeToTodo');
	Route::get('Todos/Delete/{todoId}','ToDoController@deleteTodo');
	
	/* Protection against cross site request*/
	Route::group(array('before' => 'csrf'),function(){
		Route::post('/Todos','ToDoController@addToDo');
	});
});