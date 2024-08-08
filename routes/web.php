<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//ログインの為のルート
Route::get('/', [AuthController::Class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::Class, 'login'])->name('login');

// //登録の為のルート
// Route::get('/products/getRegister', 'App\Http\Controllers\ProductController@getRegister')->name('product.getRegister');
// Route::post('/products/postRegister', 'App\Http\Controllers\ProductController@postRegister')->name('product.postRegister');


Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');

Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::post('/products/store', 'App\Http\Controllers\ProductController@store')->name('product.store');

Route::get('/products/edit/{product}', 'App\Http\Controllers\ProductController@edit')->name('product.edit');
Route::put('/products/edit/{product}', 'App\Http\Controllers\ProductController@update')->name('product.update');

Route::get('/products/show/{product}', 'App\Http\Controllers\ProductController@show')->name('product.show');

Route::delete('/products/{product}', 'App\Http\Controllers\ProductController@destroy')->name('product.destroy');

//検索の為のルート
Route::get('/products/search', 'App\Http\Controllers\ProductController@search')->name('product.search');
Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
