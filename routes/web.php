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

Route::get('/home', 'HomeController@index')->name('home');
//USERS
Route::get('/users', 'UserController@index')->name('users'); // Retrieve all data from table user
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

//ATTENDANCES
Route::get('/attendances', 'AttendanceController@index')->name('attendances');
Route::get('/attendances/{id}', 'AttendanceController@show')->where('id', '[0-9]+');
//create attendance
Route::get('/attendances/create', 'AttendanceController@create')->name('attendance_create');
Route::post('/attendances/create', 'AttendanceController@store');
//Update attendances
Route::get('/attendances/edit')->name('attendance_edit');
Route::get('/attendances/edit/{id}','AttendanceController@edit');
Route::patch('/attendances/edit/{id}','AttendanceController@update');
//Destroy attendances
Route::get('/attendances/delete')->name('attendance_delete');
Route::get('/attendances/delete/{id}','AttendanceController@destroy');

//CLASSES
Route::get('/classes', 'ClasseController@index');
Route::get('/classes/{id}', 'ClasseController@show')->where('id', '[0-9]+');
//create class
Route::get('/classes/create', 'ClasseController@create')->name('classe_create');
Route::post('/classes/create', 'ClasseController@store');
//Update classes
Route::get('/classes/edit')->name('classe_edit');
Route::get('/classes/edit/{id}','ClasseController@edit');
Route::patch('/classes/edit/{id}','ClasseController@update');
//Destroy classes
Route::get('/classes/delete')->name('classe_delete');
Route::get('/classes/delete/{id}','ClasseController@destroy');

//COLLEGIUMS
Route::get('/collegiums', 'CollegiumController@index')->name('collegiums');
Route::get('/collegiums/{id}', 'CollegiumController@show')->where('id', '[0-9]+')->name('collegium_show');
//create collegium
Route::get('/collegiums/create', 'CollegiumController@create')->name('collegium_create');
Route::post('/collegiums/create', 'CollegiumController@store');
//update collegium
Route::get('/collegiums/edit')->name('collegium_edit');
Route::get('/collegiums/edit/{id}', 'CollegiumController@edit');
Route::patch('/collegiums/edit/{id}', 'CollegiumController@update');
//destroy collegium
Route::get('/collegiums/delete')->name('collegium_delete');
Route::get('/collegiums/delete/{id}', 'CollegiumController@destroy');

//COLLEGIUM_STUDY
Route::get('/collegium_study', 'CollegiumStudyController@index');
Route::get('/collegium_study/{id}', 'CollegiumStudyController@show')->where('id', '[0-9]+');
//Create collegium_study
Route::get('/collegium_study/create', 'CollegiumStudyController@create')->name('collegium_study_create');
Route::post('/collegium_study/create', 'CollegiumStudyController@store');
//Update collegium_study
Route::get('/collegium_study/edit')->name('collegium_study_edit');
Route::get('/collegium_study/edit/{id}', 'CollegiumStudyController@edit');
Route::patch('/collegium_study/edit/{id}', 'CollegiumStudyController@update');
//Destroy collegium_study
Route::get('/collegium_study/delete')->name('collegium_study_delete');
Route::get('/collegium_study/delete/{id}','CollegiumStudyController@destroy');

//CONVERSATIONS
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

//FACULTIES
Route::get('/faculties', 'FacultyController@index')->name('faculties');
Route::get('/faculties/{id}', 'FacultyController@show')->where('id', '[0-9]+')->name('faculty_show');
//create faculty
Route::get('faculties/create', 'FacultyController@create')->name('faculty_create');
Route::post('faculties/create', 'FacultyController@store');
//update faculty
Route::get('/faculties/edit')->name('faculty_edit');
Route::get('/faculties/edit/{id}', 'FacultyController@edit');
Route::patch('/faculties/edit/{id}', 'FacultyController@update');
//Destroy faculty
Route::get('/faculties/delete')->name('faculty_delete');
Route::get('/faculties/delete/{id}', 'FacultyController@destroy');

//FILES
Route::get('/files', 'FileController@index');
Route::get('/files/{id}', 'FileController@show')->where('id', '[0-9]+');
//Create files
Route::get('files/create', 'FileController@create')->name('file_create');
Route::post('/files/create', 'FileController@store');
//Update files
Route::get('/files/edit')->name('file_edit');
Route::get('/files/edit/{id}', 'FileController@edit');
Route::patch('/files/edit/{id}', 'FileController@update');
//Destroy files
Route::get('/files/delete')->name('file_delete');
Route::get('/files/delete/{id}', 'FileController@destroy');

//FOLLOWER_USER
Route::get('/followers', 'FollowerUserController@index');
Route::get('/followers/{id}', 'FollowerUserController@show')->where('id', '[0-9]+');
//create follower_user
Route::get('/followers/create', 'FollowerUserController@create')->name('follower_create');
Route::post('followers/create', 'FollowerUserController@store');
//update follower_user
Route::get('/followers/edit')->name('follower_edit');
Route::get('/followers/edit/{id}', 'FollowerUserController@edit');
Route::patch('/followers/edit/{id}', 'FollowerUserController@update');
//Destroy  follower_user
Route::get('/followers/delete')->name('follower_delete');
Route::get('/followers/delete/{id}', 'FollowerUserController@destroy');

//MESSAGES
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

//PARTICIPANTS
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

//POSTS
Route::get('/posts', 'PostController@index');
Route::get('/posts/{id}', 'PostController@show')->where('id', '[0-9]+');
//create post
Route::get('/posts/create', 'PostController@create')->name('post_create');
Route::post('/posts/create', 'PostController@store');
//update post
Route::get('/posts/edit')->name('post_edit');
Route::get('/posts/edit/{id}', 'PostController@edit');
Route::patch('/posts/edit/{id}', 'PostController@update');
//destroy post
Route::get('/posts/delete')->name('post_delete');
Route::get('/posts/delete/{id}', 'PostController@destroy');

//STUDIES
Route::get('/studies', 'StudyController@index')->name('studies');
Route::get('/studies/{id}', 'StudyController@show')->where('id', '[0-9]+');
//create study
Route::get('/studies/create', 'StudyController@create')->name('study_create');
Route::post('/studies/create', 'StudyController@store');
//update study
Route::get('/studies/edit')->name('study_edit');
Route::get('/studies/edit/{id}', 'StudyController@edit');
Route::patch('/studies/edit/{id}', 'StudyController@update');
//destroy study
Route::get('/studies/delete')->name('study_delete');
Route::get('/studies/delete/{id}', 'StudyController@destroy');


//CRUD for table tasks
Route::get('/tasks', 'TaskController@index')->name('tasks');
Route::get('/tasks/{id}', 'TaskController@show')->where('id', '[0-9]+');
//create
Route::get('/tasks/create', 'TaskController@create')->name('task_create');
Route::post('/tasks/create', 'TaskController@store');
//update task
Route::get('/tasks/edit')->name('task_edit');
Route::get('/tasks/edit/{id}', 'TaskController@edit');
Route::patch('/tasks/edit/{id}', 'TaskController@update');
//destroy task
Route::get('/tasks/delete')->name('task_delete');
Route::get('/tasks/delete/{id}', 'TaskController@destroy');

//TASK_USER
Route::get('/team', 'TaskUserController@index');
Route::get('/team/{id}', 'TaskUserController@show')->where('id', '[0-9]+');
//create team
Route::get('/team/create', 'TaskUserController@create')->name('taskuser_create');
Route::post('/team/create', 'TaskUserController@store');
//update team
Route::get('/team/edit')->name('taskuser_edit');
Route::get('/team/edit/{id}', 'TaskUserController@edit');
Route::patch('/team/edit/{id}', 'TaskUserController@update');
//destroy team
Route::get('/team/delete')->name('taskuser_delete');
Route::get('/team/delete/{id}', 'TaskUserController@destroy');

//COLLEGIUM_USER
Route::get('/collegium_user', 'CollegiumUserController@index');
Route::get('/collegium_user/{id}', 'CollegiumUserController@show')->where('id', '[0-9]+');
//Create collegium_study
Route::get('/collegium_user/create', 'CollegiumUserController@create')->name('collegium_user_create');
Route::post('/collegium_user/create', 'CollegiumUserController@store');
//Update collegium_study
Route::get('/collegium_user/edit')->name('collegium_user_edit');
Route::get('/collegium_user/edit/{id}', 'CollegiumUserController@edit');
Route::patch('/collegium_user/edit/{id}', 'CollegiumUserController@update');
//Destroy collegium_study
Route::get('/collegium_user/delete')->name('collegium_user_delete');
Route::get('/collegium_user/delete/{id}','CollegiumUserController@destroy');

//imenik
Route::get('/imenik', 'UserController@imenik')->name('imenik');
Route::get('/follow')->name('follow');
Route::post('/follow/{id}', 'FollowerUserController@follow');
Route::get('/unfollow')->name('unfollow');
Route::get('/unfollow/{id}', 'FollowerUserController@unfollow');

//collegium profile
Route::get('/followCollegium')->name('followCollegium');
Route::post('/followCollegium/{id}','CollegiumUserController@AddMeToCollegium');
Route::get('/unfollowCollegium')->name('unfollowCollegium');
Route::get('/unfollowCollegium/{id}', 'CollegiumUserController@RemoveMeFromCollegium');

//task profile
Route::get('/followTask')->name('followTask');
Route::post('/followTask/{id}','TaskUserController@AddMeToTask');

//uploading file
Route::get('/upload','UploadController@index');
Route::post('/store','UploadController@store')->name('upload_store');
// Chat
Route::get('/chat', 'ChatController@index');
Route::get('/chat/conversations', 'ChatController@getConversations')->name('conversations'); //vraća sve razgovore prijavljenog korisnika
Route::get('/chat/messages/{conversation_id}', 'ChatController@getMessages')->name('messages'); //vraća sve poruke u razgovoru čiji id je proslijeđen
Route::get('/chat/participants/{conversation_id}', 'ChatController@getParticipants')->name('participants'); //vraća sve sudionike u razgovoru čiji id je proslijeđen
Route::get('/chat/conversation/{user_id}', 'ChatController@createConversation'); //kreira novi razgovor sa korisnikom čiji id je proslijeđen
Route::get('/chat/messages', 'ChatController@createMessage'); //kreira novu poruku u razgovoru