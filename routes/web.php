<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('dashboard')->group(function() {
	

	// Modules Management
	Route::get('/helpdesk', 'HomeController@helpdesk')->name('helpdesk.index');
	
	// Structure Management
	Route::resource('categories', 'CategoryController');
	Route::resource('menus', 'MenuController');
	Route::resource('modules', 'ModuleController');
	Route::resource('users', 'UserController');
	Route::post('users/{user}/groups', 'HomeController@assignGroup')->name('users.add.group');
	Route::resource('groups', 'GroupController');
	Route::post('groups/{group}/permissions', 'GroupController@addPermissions')->name('groups.add.permissions');
	Route::resource('permissions', 'PermissionController');
	Route::get('/', 'HomeController@index')->name('user.dashboard');

});

