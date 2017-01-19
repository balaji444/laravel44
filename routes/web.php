<?php
use App\Notifications\PaymentRecieved;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    //notify(new PaymentRecieved());
    return view('welcome');
});
Route::get('foo', function () {
    return 'Hello World';
});
Route::get('user/{id}', 'UserController');
Route::resource('photos', 'PhotoController');
Route::get('greets', function () {
    return view('greeting', ['name' => 'James']);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('contact', 'FormController@index');
Route::post('contacts', 'FormController@contacts');
Route::get('contactslist', 'FormController@contactsList');
Route::get('contactsview/{id}', 'FormController@contactsView');
Route::get('contactsajaxlist', 'FormController@contactsAjaxList');
Route::get('emailunique', 'FormController@emailUnique');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
