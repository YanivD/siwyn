<?php

Route::get('/',              'SiteController@homepage')      ->name('homepage');
Route::get('gallery',        'SiteController@gallery')       ->name('gallery');
Route::get('add_subscriber', 'SiteController@add_subscriber')->name('add_subscriber');

Route::group(['middleware' => 'auth', 'prefix' => 'maya'], function () {
    Route::get('/',                'AdminController@dashboard')     ->name('admin.dashboard');
    Route::get('edit_post/{id}',   'AdminController@edit_post')     ->name('admin.edit_post');
    Route::post('edit_post/{id}',  'AdminController@update_post');
    Route::post('update_gallery',  'AdminController@update_gallery')->name('admin.update_gallery');
    Route::get('add_post',         'AdminController@add_post')      ->name('admin.add_post');
    Route::get('delete_post/{id}', 'AdminController@delete_post')   ->name('admin.delete_post');
    Route::post('upload_image',     'AdminController@upload_image') ->name('admin.upload_image');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');
