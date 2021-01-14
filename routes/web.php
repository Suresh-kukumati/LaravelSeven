<?php

// use Illuminate\Support\Facades\Route;

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
Route::resource('/todo','TodoController');
// Route::get('/todos','TodoController@index')->name('todo.index');
// Route::get('/todos/create','TodoController@create')->name('todo.create);
// Route::post('/todos/create','TodoController@store')->name('todo.store);
// Route::get('/todos/{todo}/edit','TodoController@edit')->name('todo.edit);
// //Route::get('/todos/{todo:slug}/edit','TodoController@edit');
// Route::patch('/todos/{todo}/update','TodoController@update')->name('todo.update');
// Route::delete('/todos/{todo}/delete','TodoController@destroy')->name('todo.destroy');

Route::put('/todos/{todo}/completed','TodoController@complete')->name('todo.complete');
Route::delete('/todos/{todo}/inComplete','TodoController@inComplete')->name('todo.inComplete');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user','UserController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/upload','HomeController@store');


