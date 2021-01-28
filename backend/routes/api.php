<?php

use Illuminate\Http\Request;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::apiResource('users', 'UserController');
Route::get('user/{user}', 'ProfileController@profile')->name('user.profile');
Route::get('album/{album}', 'ProfileController@photos')->name('user.photos');
Route::apiResource('albums', 'AlbumController');
Route::apiResource('photos', 'PhotoController');
Route::get('photos/{photo}/edit', 'PhotoController@edit');
