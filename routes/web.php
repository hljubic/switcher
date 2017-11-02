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
Route::get('/attendances/{id}', 'AttendanceController@show');

Route::get('/classes', 'ClasseController@index');
Route::get('/classes/{id}', 'ClasseController@show');

Route::get('/collegiums', 'CollegiumController@index');
Route::get('/collegiums/{id}', 'CollegiumController@show');

Route::get('/collegiumstudy', 'CollegiumStudyController@index');
Route::get('/collegiumstudy/{id}', 'CollegiumStudyController@show');

Route::get('/collegiumstudy', 'CollegiumStudyController@index');
Route::get('/collegiumstudy/{id}', 'CollegiumStudyController@show');

Route::get('/conversations', 'ConversationController@index');
Route::get('/conversations/{id}', 'ConversationController@show');

Route::get('/faculties', 'FacultyController@index');
Route::get('/faculties/{id}', 'FacultyController@show')->where('id', '[0-9]+'); //
Route::get('faculties/create', 'FacultyController@create')->name('faculty_create');
Route::post('faculties/create', 'FacultyController@store');

Route::get('/files', 'FileController@index');
Route::get('/files/{id}', 'FileController@show');

Route::get('/followers', 'FollowerUserController@index');
Route::get('/followers/{id}', 'FollowerUserController@show')->where('id','[0-9]+');
Route::get('/followers/create','FollowerUserController@create')->name('follower_create');
Route::post('followers/create', 'FollowerUserController@store');

Route::get('/messages', 'MessageController@index');
Route::get('/messages/{id}', 'MessageController@show');

Route::get('/participants', 'ParticipantController@index');
Route::get('/participants/{id}', 'ParticipantController@show');

Route::get('/posts', 'PostController@index');
Route::get('/posts/{id}', 'PostController@show');

Route::get('/studies', 'StudyController@index');
Route::get('/studies/{id}', 'StudyController@show')->where('id', '[0-9]+');
//create study
Route::get('studies/create', 'StudyController@create')->name('study_create');
Route::post('studies/create', 'StudyController@store');
//update study
Route::get('/studies')-> name('studies');
Route::get('/studies/edit/{id}','StudyController@edit');
Route::patch('/studies/edit/{id}','StudyController@update');

Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/{id}', 'TaskController@show');

Route::get('/team', 'TaskUserController@index');
Route::get('/team/{id}', 'TaskUserController@show');

Route::get('/chat', 'ChatController@index');








