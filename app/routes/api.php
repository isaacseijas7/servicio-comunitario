<?php

use Illuminate\Http\Request;

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


Route::resource('configurations', 'ConfigurationAPIController');

Route::resource('people', 'PersonAPIController');

Route::resource('students', 'StudentAPIController');

Route::resource('tutors', 'TutorAPIController');

Route::resource('inscriptions', 'InscriptionAPIController');

Route::resource('companies', 'CompanyAPIController');

Route::resource('downloadables', 'DownloadableAPIController');