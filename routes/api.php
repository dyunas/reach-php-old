<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', 'UserController@view');

Route::middleware('auth:api')->get('/users', 'UserController@index');
Route::middleware('auth:api')->get('/user/{user}', 'UserController@show');

Route::middleware('auth:api')->get('/customer/{customer}', 'CustomerController@show');

Route::middleware('auth:api')->post('/logout', 'Auth\LoginController@logout');

Route::post('/login', 'Auth\LoginController@login');

Route::middleware('auth:api')->get('/getAuthenticatedUser', function () {
  return Auth::user()->account_type;
});
