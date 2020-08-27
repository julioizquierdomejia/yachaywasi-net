<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
	Route::resource('user', 'UsersController');

	Route::resource('student', 'StudentController');

	Route::resource('course', 'CourseController');
	Route::get('level-course/{course_id}', 'SubjectController@index')->name('subject');
	Route::post('subject/store', 'SubjectController@store')->name('subject.store');

	Route::resource('competencie', 'competencieController');

	Route::get('dashboard', 'dasboardController@index')->name('dashboard');

	Route::resource('createcourses', 'CrearCursoToUser');

	Route::prefix('temas')->group(function () {
		Route::get('/', 'SubjectController@list')->name('temas');
		Route::get('/{course_id}', 'SubjectController@show')->name('vertemas');
		Route::get('/tema/{tema_id}', 'SubjectController@detail')->name('temadetalle');
	});
});
