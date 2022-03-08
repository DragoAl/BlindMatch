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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();


Route::get('/', 'GuestController@home')->name('home');

//autenticazione
Route::post('/login', 'Auth\LoginController@login') -> name('login');
Route::post('/register', 'Auth\RegisterController@register') -> name('register');
Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');

//prendere tutti gli interessi 
Route::get('/interest/get', 'HomeController@getInterests')-> name('get.interests');

//prendere gli interessi dell'utente loggato
Route::get('/interest/get/{id}', 'HomeController@getCheckedInterests')-> name('get.checked.interests');

//prendere tutti gli utenti e i loro interessi
Route::get('users/interests', 'HomeController@getInterestsAllUsers')-> name('get.interests.allusers');

//prendere tutti gli utenti
Route::get('/users/get', 'HomeController@getUsers')-> name('get.users');

//update  degli interessi dell'utente loggato
Route::patch('/interest/link/{id}', 'HomeController@linkInterests')-> name('link.interests');


