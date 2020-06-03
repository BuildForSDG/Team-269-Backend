<?php

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

Route::get('/', 'HomeController@index');

Route::middleware('auth:api')->get('/user', 'AuthenticationController@authUser');

// authentication endpoints
Route::prefix('auth')->group(base_path('routes/auth.php'));

// user management endpoints
Route::apiResource('users', 'UsersController');
