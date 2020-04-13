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
Route::get('/dashboard', 'Frontend\DashboardController@index')->name('dashboard');

Route::get('/publisher/', 'Frontend\PublisherController@index')->name('publisher.list');
Route::get('/publisher/create', 'Frontend\PublisherController@create')->name('publisher.create');
Route::post('/publisher/store', 'Frontend\PublisherController@store')->name('publisher.store');
Route::get('/publisher/show/{id}', 'Frontend\PublisherController@show')->name('publisher.show');
Route::get('/publisher/edit/{id}', 'Frontend\PublisherController@edit')->name('publisher.edit');
Route::post('/publisher/update/{id}', 'Frontend\PublisherController@update')->name('publisher.update');
Route::get('/publisher/destroy/{id}', 'Frontend\PublisherController@destroy')->name('publisher.destroy');


Route::get('/author/', 'Frontend\AuthorController@index')->name('author.list');
Route::get('/author/create', 'Frontend\AuthorController@create')->name('author.create');
Route::post('/author/store', 'Frontend\AuthorController@store')->name('author.store');
Route::get('/author/show/{id}', 'Frontend\AuthorController@show')->name('author.show');
Route::get('/author/edit/{id}', 'Frontend\AuthorController@edit')->name('author.edit');
Route::post('/author/update/{id}', 'Frontend\AuthorController@update')->name('author.update');
Route::get('/author/destroy/{id}', 'Frontend\AuthorController@destroy')->name('author.destroy');


Route::get('/book/', 'Frontend\BookController@index')->name('book.list');
Route::get('/book/create', 'Frontend\BookController@create')->name('book.create');
Route::post('/book/store', 'Frontend\BookController@store')->name('book.store');
Route::get('/book/show/{id}', 'Frontend\BookController@show')->name('book.show');
Route::get('/book/edit/{id}', 'Frontend\BookController@edit')->name('book.edit');
Route::post('/book/update/{id}', 'Frontend\BookController@update')->name('book.update');
Route::get('/book/destroy/{id}', 'Frontend\BookController@destroy')->name('book.destroy');


Route::get('/bookIssued/', 'Frontend\BookIssuedController@index')->name('bookIssued.list');
Route::get('/bookIssued/create', 'Frontend\BookIssuedController@create')->name('bookIssued.create');
Route::post('/bookIssued/store', 'Frontend\BookIssuedController@store')->name('bookIssued.store');
Route::get('/bookIssued/show/{id}', 'Frontend\BookIssuedController@show')->name('bookIssued.show');
Route::get('/bookIssued/edit/{id}', 'Frontend\BookIssuedController@edit')->name('bookIssued.edit');
Route::post('/bookIssued/update/{id}', 'Frontend\BookIssuedController@update')->name('bookIssued.update');
Route::get('/bookIssued/destroy/{id}', 'Frontend\BookIssuedController@destroy')->name('bookIssued.destroy');


Route::get('/bookReturn/', 'Frontend\BookReturnController@index')->name('bookReturn.list');
Route::get('/bookReturn/create', 'Frontend\BookReturnController@create')->name('bookReturn.create');
Route::post('/bookReturn/store', 'Frontend\BookReturnController@store')->name('bookReturn.store');
Route::get('/bookReturn/show/{id}', 'Frontend\BookReturnController@show')->name('bookReturn.show');
Route::get('/bookReturn/edit/{id}', 'Frontend\BookReturnController@edit')->name('bookReturn.edit');
Route::post('/bookReturn/update/{id}', 'Frontend\BookReturnController@update')->name('bookReturn.update');
Route::get('/bookReturn/destroy/{id}', 'Frontend\BookReturnController@destroy')->name('bookReturn.destroy');


Route::get('/bookReview/', 'Frontend\BookReviewController@index')->name('bookReview.list');
Route::get('/bookReview/create', 'Frontend\BookReviewController@create')->name('bookReview.create');
Route::post('/bookReview/store', 'Frontend\BookReviewController@store')->name('bookReview.store');
Route::get('/bookReview/show/{id}', 'Frontend\BookReviewController@show')->name('bookReview.show');
Route::get('/bookReview/edit/{id}', 'Frontend\BookReviewController@edit')->name('bookReview.edit');
Route::post('/bookReview/update/{id}', 'Frontend\BookReviewController@update')->name('bookReview.update');
Route::get('/bookReview/destroy/{id}', 'Frontend\BookReviewController@destroy')->name('bookReview.destroy');


Route::get('/bookSuggest/', 'Frontend\BookSuggestController@index')->name('bookSuggest.list');
Route::get('/bookSuggest/create', 'Frontend\BookSuggestController@create')->name('bookSuggest.create');
Route::post('/bookSuggest/store', 'Frontend\BookSuggestController@store')->name('bookSuggest.store');
Route::get('/bookSuggest/show/{id}', 'Frontend\BookSuggestController@show')->name('bookSuggest.show');
Route::get('/bookSuggest/edit/{id}', 'Frontend\BookSuggestController@edit')->name('bookSuggest.edit');
Route::post('/bookSuggest/update/{id}', 'Frontend\BookSuggestController@update')->name('bookSuggest.update');
Route::get('/bookSuggest/destroy/{id}', 'Frontend\BookSuggestController@destroy')->name('bookSuggest.destroy');


Route::get('/user/', 'Frontend\UserController@index')->name('user.list');
Route::get('/user/create', 'Frontend\UserController@create')->name('user.create');
Route::post('/user/store', 'Frontend\UserController@store')->name('user.store');
Route::get('/user/show/{id}', 'Frontend\UserController@show')->name('user.show');
Route::get('/user/edit/{id}', 'Frontend\UserController@edit')->name('user.edit');
Route::post('/user/update/{id}', 'Frontend\UserController@update')->name('user.update');
Route::get('/user/destroy/{id}', 'Frontend\UserController@destroy')->name('user.destroy');
Route::get('/user/changePassword/', 'Frontend\UserController@changePassword')->name('user.change.password');
Route::get('/user/changePassword/{id}', 'Frontend\UserController@changePassword')->name('user.change.password');
Route::post('/user/updatePassword/', 'Frontend\UserController@updatePassword')->name('user.update.password');
Route::post('/user/updatePassword/{id}', 'Frontend\UserController@updatePassword')->name('user.update.password');
