<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'employers'], function () {

    // All Employer Lists
    Route::get('all', 'API\EmployersController@index')->name('api.all_employers');
    Route::get('all-data', 'API\EmployersController@employers_for_datatable')->name('api.all_employers_data');
});

Route::get('/get-degrees/{id}', 'API\DegreeController@getDegree')->name('api.getDegrees');


//custom api route::
/** Get District By Division */

Route::get('/get-districts/{id}', 'API\DistrictController@getDistrict')->name('api.getDistrict');

/** Get Upazilla By District */
Route::get('/get-upazillas/{id}', 'API\UpazillaController@getUpazilla')->name('api.getUpazillas');


/** Contact Page */
/** Create contact form api for insert contact-form data*/
Route::post('/store-message', 'API\ContactController@store')->name('contacts.store');


// User sign-up Route
Route::group(['prefix' => 'jobseeker'], function () {
	Route::post('/sign-up', 'API\UserController@create')->name('job_seeker.signup');
});

// User login Route
Route::group(['prefix' => 'jobseeker'], function () {
	Route::post('/login', 'API\UserController@login')->name('job.seeker.login');
});