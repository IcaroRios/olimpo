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

Route::get('/login', 'LoginController@loginView');
Route::post('/login', 'LoginController@logar');
Route::get('/logout', function() {
    Auth::logout();
    return redirect('/login');
});

Route::get('/', function () {
    return view('dashboard.index');
});

Route::group(['prefix' => 'dashboard','middleware' => 'checkLogged'], function()
{
    
    Route::resource('users', 'UserController')->only([
        'index', 'edit','store','edit','update','destroy'
    ]);

    Route::resource('students', 'StudentController')->only([
        'create','store'
    ]);

});

