<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Job;

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

/*********************************************************************
					FRONTEND ROUTES
 *********************************************************************/

// Home Page Route
Route::get('/', 'Frontend\PagesController@index')->name('index');
Route::get('/about-us', 'Frontend\PagesController@about')->name('abouts');


//CATEGORIES routes
//Categories Job show Route
Route::get('/categories-job-view/{id}', 'Frontend\CategoriesController@index')->name('category.job.index');

//Categories single Job show Route
// Route::get('/single-job-view/{id}', 'Frontend\CategoriesController@show')->name('single.job.show');


// Job Page Route
Route::group(['prefix' => 'jobs'], function () {
	Route::get('/find-job', 'Frontend\JobsController@index')->name('jobs');
	Route::get('/view/{id}', 'Frontend\JobsController@show')->name('jobs.show');
	// Route::get('/{slug}/apply', 'Frontend\JobsController@apply')->name('jobs.apply');
});


// Job Posting Routes
Route::group(['prefix' => 'jobs'], function () {
	Route::get('/post-job', 'Frontend\JobsController@postJob')->name('jobs.post');
});


// Contact Page Route
Route::group(['prefix' => 'contacts'], function () {
	Route::get('/', 'Frontend\ContactsController@index')->name('contacts');
	// Route::post('/store', 'Frontend\ContactsController@store')->name('contacts.store');  /** FROM API ROUTE */
});


// Training Page Route
Route::group(['prefix' => 'training'], function () {
	Route::get('/', 'Frontend\TrainingsController@index')->name('trainings');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*********************************************************************
					BACKEND ROUTES
 *********************************************************************/

/**
 * Admin / Super Admin Routes
 */

Route::group(['prefix' => 'admin'], function () {

	// Admin Login Routes
	Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');
	Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout');

	// Password Email Send
	Route::get('/password/reset', 'Backend\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/resetPost', 'Backend\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

	// Password Reset
	Route::get('/password/reset/{token}', 'Backend\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('/password/reset', 'Backend\Auth\ResetPasswordController@reset')->name('admin.password.reset.post');

	Route::get('/change-password', 'Backend\PagesController@changePasswordForm')->name('admin.password.changeForm');
	Route::post('/change-password', 'Backend\PagesController@changePassword')->name('admin.password.change');


	/** Employer Routes */
	Route::group(['as' => 'admin.'], function () {
		Route::resource('employers', 'Backend\EmployersController');
	});

	/** Jobs Routes */
	Route::group(['as' => 'admin.'], function () {
		Route::resource('jobs', 'Backend\JobsController');

		Route::get('jobs/step2/{job_id}', 'Backend\JobsController@step2')->name('jobs.store.step2');
		Route::get('jobs/step3/{job_id}', 'Backend\JobsController@step3')->name('jobs.store.step3');

		//Jobs update route
		Route::post('jobs/update-step2/{job_id}', 'Backend\JobsController@step2Update')->name('jobs.update_step2');
		Route::post('jobs/update-step3/{job_id}', 'Backend\JobsController@step3Update')->name('jobs.update_step3');

		//Jobs preview/show route
		Route::get('jobs/preview-data/{job_id}', 'Backend\JobsController@preview')->name('jobs.store.preview');
		Route::get('jobs/complete/{id}', 'Backend\JobsController@complete')->name('jobs.store.complete');
		Route::get('jobs/live/{id}', 'Backend\JobsController@livePost')->name('jobs.store.live');

		//job edit/update route
		Route::get('/jobs/jobs_edit/{id}', 'Backend\JobsController@jobsEdit')->name('jobs.store.jobs_edit');
		Route::put('/jobs/jobs_update/{id}', 'Backend\JobsController@jobsUpdate')->name('jobs.store.jobs_update');

		//job destroy route
		Route::delete('/jobs/delete/{id}', 'Backend\JobsController@job_Delete')->name('jobs.store.job_delete');

	});

	Route::get('/', 'Backend\PagesController@index')->name('admin.index');

	Route::get('create-permission', function () {
		// Spatie\Permission\Models\Permission::create(['name' => 'employers.view']);
		$role = Role::where('name', 'Super Admin')->first();
		$permission = Permission::where('name', 'employers.view')->first();
		$role->givePermissionTo($permission);
		$permission->assignRole($role);
	});
});

/*********************************************************************
				  	Custome Route 
 *********************************************************************/	

Route::group(['as' => 'admin.'], function () {

	/** CATEGORICES */
	/** CATEGORY index */
	Route::get('/job-category', 'Backend\CategoryController@index')->name('category.index');
	Route::post('/job-category/create', 'Backend\CategoryController@create')->name('category.create');


	/** CATEGORY edit/delete */
	Route::delete('/job-category/destroy/{id}', 'Backend\CategoryController@destroy')->name('category.destroy');
	Route::get('/job-category/edit/{id}', 'Backend\CategoryController@edit')->name('category.edit');
	Route::put('/job-category/update/{id}', 'Backend\CategoryController@update')->name('category.update');


	/** DEGREE LEVELS */
	/** DEGREE LEVELS index */
	Route::get('/degree-level/index', 'Backend\DegreeController@index')->name('degree_level.index');
	Route::post('degree-level/create', 'Backend\DegreeController@create')->name('degree_level.create');


	/** DEGREE LEVELS edit/delete */
	Route::delete('/degree-level/destroy/{id}', 'Backend\DegreeController@degree_level_destroy')->name('degree_level.destroy');
	Route::put('/degree-level/degree_level_edit/{id}', 'Backend\DegreeController@degree_level_edit')->name('degree_level.edit');
	Route::put('/degree-level/degree_level_upate/{id}', 'Backend\DegreeController@degree_level_update')->name('degree_level.update');

	
	/** DEGREES */
	/** DEGREES index */
	Route::get('/degree/degree_index', 'Backend\DegreeController@degree_index')->name('degree.index');
	Route::post('/degree/degree_create', 'Backend\DegreeController@degree_create')->name('degree.create');


	/** DEGREES edit/delete */
	Route::delete('/degree/degrees_destroy/{id}', 'Backend\DegreeController@degree_destroy')->name('degree.destroy');
	Route::put('/degree/degrees_update/{id}', 'Backend\DegreeController@degree_update')->name('degree.update');

});

