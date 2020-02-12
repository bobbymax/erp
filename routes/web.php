<?php

Route::get('/', 'HomeController@index');

Auth::routes();

Route::prefix('dashboard')->group(function() {

	Route::get('/contacts', 'AllowanceController@profiles')->name('user.profiles');
	Route::post('/find/user', 'UserController@details')->name('find.user.details');


	Route::prefix('staff-services')->group(function() {
		Route::resource('trainings', 'TrainingController');
		Route::resource('grades', 'GradeLevelController');
		Route::resource('gradeGroups', 'GradeGroupController');

		Route::resource('locations', 'LocationController');
		Route::resource('travels', 'TravelCategoryController');

		// Per Diems Management
		Route::get('gradeGroups/{gradeGroup}/perdiems', 'PerDiemController@index')->name('per.diems.index');
		Route::get('gradeGroups/{gradeGroup}/perdiems/create', 'PerDiemController@create')->name('create.diems');
		Route::post('{gradeGroup}/perdiems/store', 'PerDiemController@store')->name('per.diem.submit');
		Route::get('{gradeGroup}/{travel}/edit', 'PerDiemController@edit')->name('edit.per.diem');
		Route::patch('{gradeGroup}/{travel}/update', 'PerDiemController@update')->name('update.per.diem');
		Route::post('{gradeGroup}/{travel}/destroy', 'PerDiemController@destroy')->name('destroy.per.diem');
		Route::get('journey/instructions', 'PdfController@instructions')->name('journey.instructions');
		Route::post('add/training/objectives', 'PdfController@store')->name('add.objectives');
		Route::get('objectives/{objective}/destroy', 'TrainingObjectiveController@destroy')->name('destroy.objective');
		

		// Training Management
		Route::get('messages', 'ConversationController@index')->name('inbox');
		Route::get('query/trainings/{training}/{manager}', 'ConversationController@queryTraining')->name('conversations.query');
		Route::post('get/convo/threads', 'ConversationController@getThreads')->name('get.convo.threads');
		Route::get('trainings/{training}/instructions', 'PdfController@joiningInstructions')->name('get.joining.instructions');
		Route::get('manage/{user}/trainings', 'TrainingController@userTrainings')->name('manage.user.trainings');
		Route::post('manage/show/trainings', 'TrainingController@getUserTrainings')->name('get.staff.trainings');
		Route::get('autocomplete', 'TrainingController@autocomplete')->name('autocomplete');

		Route::post('update/training/category', 'TrainingController@updateCategory')->name('update.training.category');

		Route::get('manage/trainings', 'TrainingController@manage')->name('manage.trainings');
		Route::get('print/staff/trainings', 'TrainingController@getStaffTrainings')->name('print.staff.trainings');

		Route::get('print/{user}/pdf', 'PdfController@trainings')->name('trainings.print');

		Route::get('approve/trainings/manager', 'TrainingController@approveTrainingsByManager')->name('manager.approval');
		Route::get('approve/trainings/hr', 'TrainingController@approveTrainingsByHr')->name('hr.approval');
		Route::get('hr/trainings/{training}/{value}/decision', 'TrainingController@decision')->name('final.decision.hr');
		
		// Route::get('archived/trainings', 'TrainingController@archived')->name('archived.trainings');
		Route::get('propose/trainings', 'TrainingController@proposed')->name('propose.trainings');
		Route::get('propose/trainings/create', 'TrainingController@createProposed')->name('create.proposed');
		Route::get('hr/{staff}/trainings/create', 'TrainingController@hrPropose')->name('hr.propose.training');
		Route::post('manager/{training}/trainings', 'TrainingController@approveOrDeclineTrainingRequest')->name('approve.training.submit');
		Route::post('proposal/hr', 'TrainingController@findStaff')->name('find.staff');
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
	Route::get('users/{user}/account', 'HomeController@account')->name('user.account');
	Route::get('users/{user}/profile', 'HomeController@viewProfile')->name('view.user.profile');
	Route::post('fetch/placement', 'HomeController@placements')->name('fetch.placement');
	Route::post('update/{user}/account', 'HomeController@updateAccount')->name('update.user.account');
	Route::post('users/{user}/groups', 'HomeController@assignGroup')->name('users.add.group');
	Route::get('users/{user}/groups/{group}/block', 'HomeController@blockGroup')->name('block.group');
	Route::resource('groups', 'GroupController');
	Route::post('groups/{group}/permissions', 'GroupController@addPermissions')->name('groups.add.permissions');
	Route::get('groups/{group}/permissions/{permission}/deny', 'GroupController@denyPermission')->name('deny.permission');
	Route::resource('permissions', 'PermissionController');
	Route::get('/', 'HomeController@index')->name('user.dashboard');

});

