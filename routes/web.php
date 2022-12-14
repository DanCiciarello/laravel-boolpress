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

// Public
Route::get('/', 'HomeController@index')->name('home');

// Admin
Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('homepage');
        // Users
        Route::get('/users', 'UserController@index')->name('users.index');
        Route::patch('/users/{user}', 'UserController@update')->name('users.update');
        Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
        // Create CRUD routes for Post
        Route::resource("posts", "PostController");
    });

// Rotta jolly
Route::get("{any?}", function () {
    return view("welcome");
})->where("any", ".*");
