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

Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
	Route::get('/', 'Admin\SettingController@index')->name('index');
	Route::get('{setting}', 'Admin\SettingController@edit')->name('edit');
	Route::put('{setting}', 'Admin\SettingController@update');
});
