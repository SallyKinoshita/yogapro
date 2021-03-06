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
//\Log::debug(__METHOD__);
Route::get('/', function () {
    return view('top');
});

//Route::get('sample/model/{email_address?}', 'SampleController@model');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('programs', 'ProgramsController');

Route::resource('programs/add_asana', 'Ajax\AddAsanaController');

Route::resource('programs/remove_asana', 'Ajax\RemoveAsanaController');

Route::resource('programs/sort_asana', 'Ajax\SortAsanaController');

Route::resource('asanas', 'AsanasController');