<?php

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('configurations', 'ConfigurationController');

Route::resource('people', 'PersonController');

Route::resource('students', 'StudentController');

Route::resource('tutors', 'TutorController');

Route::resource('inscriptions', 'InscriptionController');

Route::resource('companies', 'CompanyController');

Route::resource('downloadables', 'DownloadableController');