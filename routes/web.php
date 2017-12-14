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

Route::get('/dashboard', function (){
    return view('dashboard');
});

$routes = [
    'users' => 'UserController',
    'attendances' => 'AttendanceController',
    'classes' => 'ClasseController',
    'collegiums' => 'CollegiumController',
    'collegium_study' => 'CollegiumStudyController',
    'conversations' => 'ConversationController',
    'faculties' => 'FacultyController',
    'files' => 'FileController',
    'followers' => 'FollowerUserController',
    'messages' => 'MessageController',
    'participants' => 'ParticipantController',
    'posts' => 'PostController',
    'studies' => 'StudyController',
    'tasks' => 'TaskController',
    'taskuser' => 'TaskUserController',
    'collegium_user' => 'CollegiumUserController',

];

foreach ($routes as $key => $value) {


    Route::get('/' . $key, $value . '@index')->name($key); // Retrieve all data from table
    Route::get('/' . $key . '/{id}', $value . '@show')->where('id', '[0-9]+'); // Retrieve user which corresponds to passed ID
//Create
    Route::get('/' . $key . '/create', $value . '@create')->name($key . '_create');
    Route::post('/' . $key . '/create', $value . '@store');
//Update
    Route::get('/' . $key . '/edit')->name($key . '_edit');
    Route::get('/' . $key . '/edit/{id}', $value . '@edit');
    Route::patch('/' . $key . '/edit/{id}', $value . '@update');
//Destroy
    Route::get('/' . $key . '/delete')->name($key . '_delete');
    Route::get('/' . $key . '/delete/{id}', $value . '@destroy');
}

//imenik
Route::get('/imenik', 'UserController@imenik')->name('imenik');
Route::get('/follow')->name('follow');
Route::post('/follow/{id}', 'FollowerUserController@follow');
Route::get('/unfollow')->name('unfollow');
Route::get('/unfollow/{id}', 'FollowerUserController@unfollow');

//collegium profile
Route::get('/followCollegium')->name('followCollegium');
Route::post('/followCollegium/{id}', 'CollegiumUserController@AddMeToCollegium');
Route::get('/unfollowCollegium')->name('unfollowCollegium');
Route::get('/unfollowCollegium/{id}', 'CollegiumUserController@RemoveMeFromCollegium');

//task profile
Route::get('/followTask')->name('followTask');
Route::post('/followTask/{id}','TaskUserController@AddMeToTask');

//uploading file
Route::get('/files/upload','FileController@showFile')->name('upload_file');
Route::post('/files/upload','FileController@storeFile');

// Chat
Route::get('/chat', 'ChatController@index');
Route::get('/chat/conversations', 'ChatController@getConversations')->name('conversations'); //vraća sve razgovore prijavljenog korisnika
Route::get('/chat/messages/{conversation_id}', 'ChatController@getMessages')->name('messages'); //vraća sve poruke u razgovoru čiji id je proslijeđen
Route::get('/chat/participants/{conversation_id}', 'ChatController@getParticipants')->name('participants'); //vraća sve sudionike u razgovoru čiji id je proslijeđen
Route::get('/chat/conversation/{user_id}', 'ChatController@createConversation'); //kreira novi razgovor sa korisnikom čiji id je proslijeđen
Route::get('/chat/messages', 'ChatController@createMessage'); //kreira novu poruku u razgovoru

//Add users in attendances
Route::post('/class_user', 'AttendanceController@storeUsers')->name('class_user');

//Ažuriranje statusa studenata na zadatku
Route::get('/task_user', 'TaskController@editUsers')->name('task_user');
Route::get('/task_user/edit/{task_id}', 'TaskController@editUsers'); //otvara formu za promijenu statusa studenata na nekom zadatku
Route::patch('task_user/edit/{task_id}', 'TaskController@updateUsers'); //ažurira status studenata na nekom zadatku

//Dodavanje liste studenata na zadatak
Route::get('/task_user/create/{task_id}', 'TaskController@createUsers');
Route::post('/task_user/create/{task_id}', 'TaskController@storeUsers');

