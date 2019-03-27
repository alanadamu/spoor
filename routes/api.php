<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function() {
    /**
     * User Routes
     */
    Route::get('/user', 'UserController@authenticatedUser');
    Route::get('/users', 'UserController@index');
    Route::get('/user/{id}', 'UserController@show');
    Route::post('/user', 'UserController@store');
    Route::put('/user', 'UserController@update');
    Route::put('/user/{id}/changePassword', 'UserController@changeUserPassword');
    Route::delete('/user', 'UserController@destroy');
    /**
     * End User Routes
     */

    Route::put(
      '/state',
      'StateController@update'
    );
});

Route::group(['prefix'=> 'v1'], function() {
    /**
     * User and Roles routes
     */
    Route::get(
        '/roles',
        'RoleController@index'
    );
    /**
     * end User x Roles routes
     */

    /**
     * Post Routes
     */
    Route::group(['prefix' => 'post'], function() {
        Route::get('/', 'PostController@index');
        Route::get('/latest/{count}', 'PostController@latestPosts');
        Route::post('/', 'PostController@store')->middleware('auth:api');
        Route::get('/view/{id}', 'PostController@show');
        Route::post('/{id}', 'PostController@update')->middleware('auth:api');
        Route::put('/approve', 'PostController@approve')->middleware('auth:api');
        Route::delete('/', 'PostController@destroy')->middleware('auth:api');
    });
    /**
     * End Post Routes
     */

    /**
     * Investigation Routes
     */
    Route::group(['prefix' => 'investigation'], function() {
        Route::get('/', 'InvestigationController@index');
        Route::get('/{investigationId}', 'InvestigationController@index');
        Route::post('/', 'InvestigationController@store')->middleware('auth:api');
        Route::get('/view/{id}', 'InvestigationController@show');
        Route::post('/{id}', 'InvestigationController@update')->middleware('auth:api');
        Route::delete('/', 'InvestigationController@destroy')->middleware('auth:api');
    });
    /**
     * End Investigation Routes
     */
});