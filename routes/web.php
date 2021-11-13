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

//  Public routes
Route::get('/', 'PageController@index')->name('welcome');
Route::get('/blog/home', 'PageController@home')->name('blog.home');
Route::get('/blog/show/{slug}', 'PageController@show')->name('blog.show');

// Authentication routes
Auth::routes();

// Admin routes
Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('blogs', 'BlogController');
});
