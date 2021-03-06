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

Route::get('/', 'HomeController@index')->name('main');
Route::get('/search', 'SearchController@index')->name('search');
Route::post('/search', 'SearchController@index')->name('searchp');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');

Route::resource('posts', 'PostController');
Route::resource('comments', 'CommentController');

Route::namespace('Admin')->prefix('admin')->middleware('auth')->name('admin.')->group(function(){
    Route::resource('users', 'UserController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('roles', 'RoleController');
    Route::resource('category', 'CategoryController');
});
