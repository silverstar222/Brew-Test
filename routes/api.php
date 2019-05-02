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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/all', 'TankController@index')->name('index');
Route::post('/brew', 'TankController@brew')->name('brew');
Route::post('/move', 'TankController@move')->name('move');
Route::post('/dump', 'TankController@dump')->name('dump');
Route::post('/keg', 'TankController@keg')->name('keg');
