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
    return redirect("dashboard");
});
Route::get('/login','App\Http\Controllers\AuthController@index');
Route::get('/dashboard','App\Http\Controllers\AuthController@dashboard');
Route::get('/profile','App\Http\Controllers\AuthController@profile');
Route::get('/author_list','App\Http\Controllers\AuthController@userList');
Route::get('/create-author','App\Http\Controllers\AuthController@createAuthor');
Route::get('/edit-author/{id}','App\Http\Controllers\AuthController@editAuthor');
Route::get('/create-book','App\Http\Controllers\AuthController@createBook');
Route::get('/book-list','App\Http\Controllers\AuthController@bookList');
Route::get('/edit-book/{id}','App\Http\Controllers\AuthController@editBook');
Route::get('/view-author/{id}','App\Http\Controllers\AuthController@viewAuthor');