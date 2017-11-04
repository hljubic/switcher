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

Route::get('/collegiums', 'CollegiumController@index')->name('colegiums');
Route::get('/collegiums/{id}', 'CollegiumController@show')->where('id', '[0-9]+')->name('collegium_show');

Route::get('/collegiumstudy', 'CollegiumStudyController@index');
Route::get('/collegiumstudy/{id}', 'CollegiumStudyController@show');

Route::get('/conversations', 'ConversationController@index');
Route::get('/conversations/{id}', 'ConversationController@show');

Route::get('/faculties', 'FacultyController@index');
Route::get('/faculties/{id}', 'FacultyController@show');

Route::get('/files', 'FileController@index');
Route::get('/files/{id}', 'FileController@show');

Route::get('/followers', 'FollowerUserController@index');
Route::get('/followers/{id}', 'FollowerUserController@show');

Route::get('/messages', 'MessageController@index');
Route::get('/messages/{id}', 'MessageController@show');

Route::get('/participants', 'ParticipantController@index');
Route::get('/participants/{id}', 'ParticipantController@show');

Route::get('/posts', 'PostController@index');
Route::get('/posts/{id}', 'PostController@show')->where('id', '[0-9]+');

Route::get('/studies', 'StudyController@index');
Route::get('/studies/{id}', 'StudyController@show');

Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/{id}', 'TaskController@show')->where('id', '[0-9]+');

Route::get('/team', 'TaskUserController@index');
Route::get('/team/{id}', 'TaskUserController@show')->where('id', '[0-9]+');

Route::get('/chat', 'ChatController@index');


//CRUD for table collegiums
Route::get('/collegiums/create', 'CollegiumController@create')->name('collegium_create');
Route::post('/collegiums/create', 'CollegiumController@store');

//CRUD for table tasks
Route::get('/tasks/create', 'TaskController@create')->name('task_create');
Route::post('/tasks/create', 'TaskController@store');


//CRUD  for table task_user
Route::get('/team/create', 'TaskUserController@create')->name('taskuser_create');
Route::post('/team/create', 'TaskUserController@store');


//CRUD  for table posts
Route::get('/posts/create', 'PostController@create')->name('post_create');
Route::post('/posts/create', 'PostController@store');










