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
Route::get('/', 'PublicController@indexView');
Route::post('/login', 'LoginController@logar');
Route::get('/logout', function() {
    Auth::logout();
    return redirect('/login');
});

Route::group(['prefix' => 'dashboard','middleware' => 'checkLogged'], function()
{
    Route::get('/', function () {
        return view('dashboard.index');
    });
    Route::resource('users', 'UserController')->only([
        'index', 'edit','store','edit','update','destroy'
    ]);
});

