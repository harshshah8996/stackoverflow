<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('jwt.auth')->get('users', function () {
    return auth('api')->user();
});

// Authorization
Route::post('/auth/sign-up','AuthController@signup');
Route::post('/auth/login','AuthController@login');

// User
Route::get('/users','UserController@index');
Route::get('/user','UserController@show');



// Route::get('question','QuestionController@index');
// Route::get('question/{id}','QuestionController@view');
// Route::put('question/{id}','QuestionController@update');

// Route::post('question','QuestionController@store');

