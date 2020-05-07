<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::permanentRedirect('home', '/');

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
	Route::get('/', 'Admin\DashboardController@index');
});

Route::resource('roles', 'Admin\RoleController');
Route::get('accesses/{role}', 'Admin\AccessController@index')->name('roles.accesses');
Route::put('accesses/{role}', 'Admin\AccessController@update_accesses');