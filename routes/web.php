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

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('/ticket/{id}', 'TicketController@index')->name('ticket');

Route::post('/create', 'HomeController@create');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//custom login controller
Route::post('/login/custom', [
    'uses' => 'LoginController@login',
    'as' => 'login.custom'
]);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

});
