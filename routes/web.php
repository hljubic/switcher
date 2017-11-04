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

Route::get('/users', 'UserController@index'); // Retrieve all data from table user
Route::get('/users/{id}', 'UserController@show')->where('id', '[0-9]+'); // Retrieve user which corresponds to passed ID
//Create user
Route::get('/users/create', 'UserController@create')->name('user_create');
Route::post('/users/create', 'UserController@store');
//Update user
Route::get('/users/edit')->name('user_edit');
Route::get('/users/edit/{id}', 'UserController@edit');
Route::patch('/users/edit/{id}', 'UserController@update');
//Destroy user
Route::get('/users/delete')->name('user_delete');
Route::get('/users/delete/{id}', 'UserController@destroy');


Route::get('/attendances', 'AttendanceController@index');
Route::get('/attendances/{id}', 'AttendanceController@show')->where('id','[0-9]+');
Route::get('/attendances/create','AttendanceController@create')->name('attendance_create');
Route::post('/attendances/create','AttendanceController@store');


Route::get('/classes', 'ClasseController@index');
Route::get('/classes/{id}', 'ClasseController@show')->where ('id','[0-9]+');
Route::get('/classes/create','ClasseController@create')->name('classe_create');
Route::post('/classes/create','ClasseController@store');


Route::get('/collegiums', 'CollegiumController@index')->name('colegiums');
Route::get('/collegiums/{id}', 'CollegiumController@show')->where('id', '[0-9]+')->name('collegium_show');

Route::get('/collegium_study', 'CollegiumStudyController@index');
Route::get('/collegium_study/{id}', 'CollegiumStudyController@show')->where('id','[0-9]+');
Route::get('/collegium_study/create','CollegiumStudyController@create')->name('collegium_study_create');
Route::post('/collegium_study/create','CollegiumStudyController@store');



Route::get('/conversations', 'ConversationController@index');
Route::get('/conversations/{id}', 'ConversationController@show')->where('id', '[0-9]+');
//Create conversation
Route::get('/conversations/create', 'ConversationController@create')->name('conversation_create');
Route::post('/conversations/create', 'ConversationController@store');
//Update conversation
Route::get('/conversations/edit')->name('conversation_edit');
Route::get('/conversations/edit/{id}', 'ConversationController@edit');
Route::patch('/conversations/edit/{id}', 'ConversationController@update');
//Destroy conversation
Route::get('/conversations/delete')->name('conversation_delete');
Route::get('/conversations/delete/{id}', 'ConversationController@destroy');

Route::get('/faculties', 'FacultyController@index');
Route::get('/faculties/{id}', 'FacultyController@show');

Route::get('/files', 'FileController@index');
Route::get('/files/{id}', 'FileController@show')->where('id','[0-9]+');
Route::get('files/create','FileController@create')->name('file_create');
Route::post('/files/create','FileController@store');

Route::get('/followers', 'FollowerUserController@index');
Route::get('/followers/{id}', 'FollowerUserController@show');


Route::get('/messages', 'MessageController@index');
Route::get('/messages/{id}', 'MessageController@show')->where('id', '[0-9]+');
//Create message
Route::get('/messages/create', 'MessageController@create')->name('message_create');
Route::post('messages/create', 'MessageController@store');
//Update message
Route::get('/messages/edit')->name('message_edit');
Route::get('/messages/edit/{id}', 'MessageController@edit');
Route::patch('/messages/edit/{id}', 'MessageController@update');
//Destroy message
Route::get('/messages/delete')->name('message_delete');
Route::get('/messages/delete/{id}', 'MessageController@destroy');


Route::get('/participants', 'ParticipantController@index');
Route::get('/participants/{id}', 'ParticipantController@show')->where('id', '[0-9]+');
//Create participant
Route::get('/participants/create', 'ParticipantController@create')->name('participant_create');
Route::post('participants/create', 'ParticipantController@store');
//Update participant
Route::get('/participants/edit')->name('participant_edit');
Route::get('/participants/edit/{id}', 'ParticipantController@edit');
Route::patch('/participants/edit/{id}', 'ParticipantController@update');
//Destroy participant
Route::get('/participants/delete')->name('participant_delete');
Route::get('/participants/delete/{id}', 'ParticipantController@destroy');


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










