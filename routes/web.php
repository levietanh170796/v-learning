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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('user_profiles', 'UserProfilesController')->only(['update']);
    Route::get('user_profiles', 'UserProfilesController@edit')->name('user_profiles.edit');
    Route::resource('roles', 'RolesController');
    Route::resource('levels', 'LevelsController');
    Route::resource('subjects', 'SubjectsController');
});
