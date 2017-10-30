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

//Resources
Route::get('/users', 'UserController@index'); // Retrieve all data from table users
Route::get('/users/{id}', 'UserController@show'); // Retrieve user which corresponds to passed ID

Route::get('/attendances', 'AttendanceController@index');
Route::get('/attendances/{id}', 'AttendanceController@show')->where('id','[0-9]+');
Route::get('/attendances/create','AttendanceController@create')->name('attendance_create');
Route::post('/attendances/create','AttendanceController@store');


Route::get('/classes', 'ClasseController@index');
Route::get('/classes/{id}', 'ClasseController@show')->where ('id','[0-9]+');
Route::get('/classes/create','ClasseController@create')->name('classe_create');
Route::post('/classes/create','ClasseController@store');


Route::get('/collegiums', 'CollegiumController@index');
Route::get('/collegiums/{id}', 'CollegiumController@show');

Route::get('/collegium_study', 'CollegiumStudyController@index');
Route::get('/collegium_study/{id}', 'CollegiumStudyController@show')->where('id','[0-9]+');
Route::get('/collegium_study/create','CollegiumStudyController@create')->name('collegium_study_create');
Route::post('/collegium_study/create','CollegiumStudyController@store');


Route::get('/collegiumstudy', 'CollegiumStudyController@index');
Route::get('/collegiumstudy/{id}', 'CollegiumStudyController@show');

Route::get('/conversations', 'ConversationController@index');
Route::get('/conversations/{id}', 'ConversationController@show');

Route::get('/faculties', 'FacultyController@index');
Route::get('/faculties/{id}', 'FacultyController@show');

Route::get('/files', 'FileController@index');
Route::get('/files/{id}', 'FileController@show')->where('id','[0-9]+');
Route::get('files/create','FileController@create')->name('file_create');
Route::post('/files/create','FileController@store');

Route::get('/followers', 'FollowerUserController@index');
Route::get('/followers/{id}', 'FollowerUserController@show');

Route::get('/messages', 'MessageController@index');
Route::get('/messages/{id}', 'MessageController@show');

Route::get('/participants', 'ParticipantController@index');
Route::get('/participants/{id}', 'ParticipantController@show');

Route::get('/posts', 'PostController@index');
Route::get('/posts/{id}', 'PostController@show');

Route::get('/studies', 'StudyController@index');
Route::get('/studies/{id}', 'StudyController@show');

Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/{id}', 'TaskController@show');

Route::get('/team', 'TaskUserController@index');
Route::get('/team/{id}', 'TaskUserController@show');

Route::get('/chat', 'ChatController@index');








