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

// Welcome
Route::get('/welcome', function () {
    return view('welcome');
});

// landing page
Route::get('/', function () {
  return view('landing');
});

// Authentication
Auth::routes();

// Facebook Authentication
Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

// Home
Route::get('/home', 'HomeController@index',  array('as' => 'home', 'uses'));

// Route::get('/home', array('as' => 'home', 'uses' => function(){
//   return view('home');
// }));
