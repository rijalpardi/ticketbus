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
Route::post('admin/login', 'api\User@login'); // table users
Route::apiResource('admin', 'api\User'); // table users

Route::apiResource('rute', 'api\Rutes'); //tabel rutes

Route::get('test/{id}', 'api\Rutes@test'); // TEST