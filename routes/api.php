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

Route::group(["middleware" => "api"], function () {
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('/current_admin_user', function () {
        return Auth::user();
    });

    Route::group(['middleware' => ['auth:api']], function () {
        Route::apiResource('admin_users', 'Api\AdminUserController')->except(['show']);
    });
});

Route::get('/', function() {
    return 'helloworld';
});

