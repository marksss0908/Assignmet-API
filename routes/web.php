<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'StudentController@index')->name('student.index');
Route::post('/students', 'StudentController@store')->name('student.store');
Route::get('/edit/{id}', 'StudentController@edit')->name('student.edit');
Route::put('/update', 'StudentController@update')->name('student.update');
Route::delete('/delete/{id}', 'StudentController@destroy')->name('student.destroy');
