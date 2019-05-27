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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('ziadost', 'ZiadostController');

Route::post('ziadost2', 'ZiadostController@store2');



//Admin

Route::get('/admin_pane', 'FormTemplateController@index')->name('admin_pane');

//Template and components
Route::resource('formtemplate', 'FormTemplateController');
Route::resource('formcomponents', 'FormComponentsController');
