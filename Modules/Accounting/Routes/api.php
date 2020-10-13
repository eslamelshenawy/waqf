<?php

use Modules\Accounting\Entities\Account;
use Modules\Accounting\Transformers\Account as AccountResource;
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

Route::middleware('auth:api')->get('/accounting', function (Request $request) {
    return $request->user();
});

Route::get('/accounts', function () {
    return new AccountResource(Account::with(['account', 'childes'])->get()->sortBy('code'));
});
Route::get('/accounts/main', function () {
    return new AccountResource(Account::with(['account', 'childes'])->where('parent_id',null)->get()->sortBy('code'));
});


Route::post('accounts/create/journal', 'Api\CreateAccountController@create_journal');
Route::post('accounts/create', 'Api\CreateAccountController@creatAccount');
Route::post('accounts/remove/{id}', 'Api\CreateAccountController@remove');
Route::post('accounts/update/{id}', 'Api\UpdateAccountController@updateAccount');
