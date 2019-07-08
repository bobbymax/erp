<?php

Route::get('/', 'HomeController@index');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('dashboard')->group(function() {

	Route::prefix('staff-services')->group(function() {
		Route::resource('trainings', 'TrainingController');
		Route::get('manage/{user}/trainings', 'TrainingController@userTrainings')->name('manage.user.trainings');
		Route::get('update/{training}/{category}', 'TrainingController@updateCategory')->name('update.training.category');
		Route::get('manage/trainings', 'TrainingController@manage')->name('manage.trainings');
		Route::get('archived/trainings', 'TrainingController@archived')->name('archived.trainings');
		Route::get('propose/trainings', 'TrainingController@proposed')->name('propose.trainings');
		Route::get('propose/trainings/create', 'TrainingController@createProposed')->name('create.proposed');
		Route::get('/', 'HomeController@staffservices')->name('staff.services');
	});

	// Modules Management
	Route::prefix('helpdesk')->group(function() {
		Route::resource('issues', 'IssueController');
		Route::resource('categories', 'CategoryController');
		Route::resource('tickets', 'TicketController');
		Route::post('adhoc/support/store', 'TicketController@adhocStore')->name('tickets.adhoc.store');

		Route::get('adhoc/support', 'TicketController@createHelpdesk')->name('adhoc.support');
		// Route::get('autocomplete', 'TicketController@autocomplete')->name('autocomplete');

		Route::get('tasks', 'TicketController@tasks')->name('tasks.index');
		Route::get('approve/tickets', 'TicketController@approve')->name('approve.tickets');
		Route::get('unresolved/tickets', 'TicketController@unresolved')->name('unresolved.tickets');
		Route::post('assign/{ticket}/tickets', 'TicketController@assign')->name('assign.ticket');
		Route::post('tickets/{ticket}/reports', 'TicketReportController@store')->name('reports.store');
		Route::get('tickets/{ticket}/report', 'TicketController@report')->name('ticket.report');
		Route::get('tickets/{ticket}/close', 'TicketController@close')->name('close.ticket');


		Route::post('dependency/fetch', 'TicketController@fetch')->name('dependencies.fetch');
		Route::get('/', 'HomeController@helpdesk')->name('helpdesk.index');
	});
	
	// Structure Management
	Route::resource('menus', 'MenuController');
	Route::resource('modules', 'ModuleController');
	Route::resource('users', 'UserController');
	Route::post('users/{user}/groups', 'HomeController@assignGroup')->name('users.add.group');
	Route::get('users/{user}/groups/{group}/block', 'HomeController@blockGroup')->name('block.group');
	Route::resource('groups', 'GroupController');
	Route::post('groups/{group}/permissions', 'GroupController@addPermissions')->name('groups.add.permissions');
	Route::get('groups/{group}/permissions/{permission}/deny', 'GroupController@denyPermission')->name('deny.permission');
	Route::resource('permissions', 'PermissionController');
	Route::get('/', 'HomeController@index')->name('user.dashboard');

});

