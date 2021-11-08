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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1')->group(function () {
    Route::post('activities', 'App\Http\Controllers\ActivitiesController@store');
    Route::post('activities/{activities_id}/items', 'App\Http\Controllers\ActivitiesController@storeList');

    Route::get('activities', 'App\Http\Controllers\ActivitiesController@show');
    Route::get('activities/{activity_id}', 'App\Http\Controllers\ActivitiesController@getActivityById');

    Route::put('activities/{activities_id}', 'App\Http\Controllers\ActivitiesController@updateActivity');
    Route::put('activities/{activities_id}/items/{items_id}', 'App\Http\Controllers\ActivitiesController@updateItem');

    Route::delete('activities/{activities_id}', 'App\Http\Controllers\ActivitiesController@deleteActivity');
    Route::delete('activities/{activities_id}/items/{items_id}', 'App\Http\Controllers\ActivitiesController@deleteItem');
});
