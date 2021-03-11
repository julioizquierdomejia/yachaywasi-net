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
Route::middleware(['guest'])->group(function () {
	Route::get('/', function () {
	    return view('auth.login');
	});
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/subject/all', 'SubjectController@all')->name('subject.all');

	Route::resource('messages', 'MessagesController');
	Route::get('messages/{tema_id}/list', [App\Http\Controllers\MessagesController::class, 'list'])->name('messages.list');
	Route::post('messages/{student_id}/{docente_id}', [App\Http\Controllers\MessagesController::class, 'store'])->name('messages.store');
	Route::resource('user', 'UsersController');

	Route::resource('student', 'StudentController');
	Route::resource('course', 'CourseController');

	Route::resource('subject', 'SubjectController');

	Route::get('level-course/{course_id}', 'SubjectController@index')->name('subject');
	Route::post('subject/store', 'SubjectController@store')->name('subject.store');
	Route::post('subject/edit', 'SubjectController@store')->name('subject.edit');
	//Route::put('subject/{tema_id}', 'SubjectController@update')->name('subject.update');
	
	Route::resource('competencie', 'competencieController');

	Route::get('dashboard', 'dasboardController@index')->name('dashboard');

	Route::resource('createcourses', 'CrearCursoToUser');

	Route::prefix('temas')->group(function () {
		Route::get('/', 'SubjectController@list')->name('temas');
		Route::get('/{course_id}', 'SubjectController@show')->name('vertemas');
		Route::get('/tema/{tema_id}', 'SubjectController@detail')->name('temadetalle');
		Route::get('/tema/edit/{tema_id}', 'SubjectController@edit')->name('temaedit');

	});

	//Horario
	Route::get('/horario', 'ScheduleController@index')->name('horario');


});
