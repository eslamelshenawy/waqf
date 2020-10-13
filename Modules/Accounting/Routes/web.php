<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::prefix('accounting')->group(function() {
//    Route::get('/', 'AccountingController@index');
//});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::any('/', function () {
//    //
//});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

//    Route::get('/login', 'AdminAuthController@create')->name('admin.login');
//    Route::post('/login', 'AdminAuthController@store')->name('admin.login');
//    Route::get('/logout', 'AdminAuthController@destroy')->name('admin.logout');

    Route::name('Accounting::')->prefix('accounting')->group(function () {

        Route::group(['middleware' => 'auth:admin'], function () {
//            Route::get('/', 'AccountingController@index')->name('root');
//            Route::group(['middleware' => ['role:super-admin']], function () {
                Route::resource('/', 'AccountingController');

//                Route::resource('/group', 'Group\GroupController');

                Route::name('invoices.')->prefix('invoices')->group(function () {
                    Route::get('/{id}/edit', 'Invoice\InvoiceController@edit');
                    Route::get('/create/{tent?}/{price?}', 'Invoice\InvoiceController@create');
                    Route::post('/{id}', 'Invoice\InvoiceController@update');
                    Route::post('destroy/{id}', 'Invoice\InvoiceController@destroy');
                    Route::resource('/', 'Invoice\InvoiceController');
                });
                Route::name('receivable')->prefix('receivable')->group(function () {
                    Route::get('/rentBuilding/{id}', 'Receivable\TenantReceivableController@rentBuilding');
                    Route::get('/rentBuilding/order/{id}/{data?}', 'Receivable\TenantReceivableController@rentBuilding_order');
                    Route::get('/agencyMaintence/{id}', 'Receivable\TenantReceivableController@agencyMaintence');
                    Route::resource('/tenant', 'Receivable\TenantReceivableController');
                    Route::resource('/beneficiary', 'Receivable\TenantReceivableController');
                    Route::resource('/agency', 'Receivable\TenantReceivableController');
                });
                Route::name('reports.')->prefix('reports')->group(function () {
                    Route::resource('/expenses', 'Reports\ExpensesController');
                    Route::resource('/received', 'Reports\ReceivedController');
                });
                Route::name('fund.')->prefix('fund')->group(function () {
                    Route::get('/control', 'Fund\FundController@control');
                    Route::get('/{id}/edit/{type?}', 'Fund\FundController@edit');
                    Route::get('/{id}/edit/{type?}', 'Fund\FundController@edit');
                    Route::get('/update/{id?}', 'Fund\FundController@update');
                    Route::get('/destroy/{id}', 'Fund\FundController@destroy');
                    Route::resource('/', 'Fund\FundController');
                });

                Route::name('accounts.')->prefix('accounts')->group(function () {
                    Route::get('/', 'Account\AccountController')->name('general');
                    Route::get('/accountStatement/details/{id}', 'Account\AccountController@accountStatementDetails');
                    Route::get('/accountStatement', 'Account\AccountController@accountStatement');
                    Route::get('/trialBalance', 'Account\AccountController@trialBalance');
                    Route::get('edit/{id}', 'Account\AccountController@editAccount');
                    Route::post('updateAccounts/{id}', 'Account\AccountController@updateAccount');
                    Route::post('create/journal', 'Journal\JournalController@create_journal');
                    Route::resource('/journals', 'Journal\JournalController');
                });

                Route::name('vouchers.')->prefix('vouchers')->group(function () {
                    Route::resource('/receipts', 'Voucher\VoucherReceiptController');
                    Route::get('/usersajax', 'Voucher\VoucherPaymentController@usersajax');
                    Route::get('/usersajax_out', 'Voucher\VoucherPaymentController@usersajax_out');
                    Route::get('/tentantsajax_out', 'Voucher\VoucherPaymentController@tentantsajax_out');
                    Route::post('/voucher_out', 'Voucher\VoucherPaymentController@voucher_out');
                    Route::resource('/payments', 'Voucher\VoucherPaymentController');
                });


                Route::resource('/cheques', 'Cheque\ChequeController');


                Route::name('receivables.')->prefix('receivables')->group(function (){

                });



//                Route::prefix('general-ledger')->group(function () {
//                    Route::get('/', 'GeneralLedger\GeneralLedgerController');
//                });                Route::prefix('general-ledger')->group(function () {
//                    Route::get('/', 'GeneralLedger\GeneralLedgerController');
//                });

//            });
        });
    });
});



//Route::get('/{type}', function($type){
////                    $method = 'get' . ucfirst($type);
////                    $items = (new \App\Real())->$method();
////                    return \Illuminate\Support\Facades\Response::view("admin::reals." . plural($type) . ".index", [$type => $items, 'type' => $type]);
////                });
