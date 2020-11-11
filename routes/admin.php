<?php
Route::resource('tasks', 'TaskController');
Route::resource('users', 'UserController');

Route::resource('admins', 'AdminController');

Route::get('/', 'AdminController@index')->name('index');
Route::post('users/{id}/add', 'UserController@addTask')->name('addTask');

Route::get('users/create','AdminController@admins')->name('addUser');




