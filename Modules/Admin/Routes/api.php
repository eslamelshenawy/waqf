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

Route::middleware('auth:api')->get('/admin', function (Request $request) {
    return $request->user();
});

Route::post('/pages/update', 'Api\AdminController@updateContent');
Route::post('/email-checker', 'ValidatorController@isEmailValid');
Route::post('/get-beneficiary-buildings', 'OrchestraController@getBeneficiaryBuildings');