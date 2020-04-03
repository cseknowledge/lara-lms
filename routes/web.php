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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'Frontend\DashboardController@index')->name('dashboard');

Route::get('/publisher/', 'Frontend\PublisherController@index')->name('publisher')->name('publisher_list');
Route::get('/publisher/create', 'Frontend\PublisherController@create')->name('publisher.create');
Route::post('/publisher/store', 'Frontend\PublisherController@store')->name('publisher.store');
Route::get('/publisher/show/{id}', 'Frontend\PublisherController@show')->name('publisher.show');
Route::get('/publisher/edit/{id}', 'Frontend\PublisherController@edit')->name('publisher.edit');
Route::post('/publisher/update/{id}', 'Frontend\PublisherController@update')->name('publisher.update');
Route::get('/publisher/destroy/{id}', 'Frontend\PublisherController@destroy')->name('publisher.destroy');
