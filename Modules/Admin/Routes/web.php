<?php

use App\Page;
use Illuminate\Http\Request;

//Route::post('/submit', function(){
//    dd('dsdsd');
//});

            Route::post('/submit', 'AdminController@updateContent')->name('updateContent');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function () {

    Route::get('/login', 'AdminAuthController@create')->name('admin.login');
    Route::post('/login', 'AdminAuthController@store')->name('admin.login');
    Route::name('Admin::')->prefix('dashboard')->group(function() {
        Route::group(['middleware' => ['auth:admin']], function () {
            Route::post('/logout', 'AdminAuthController@destroy')->name('logout');
            Route::get('/root', 'AdminController@index')->name('root');
            //            Route::group(['middleware' => ['role:super-admin']], function () {
                Route::resource('/administrators', 'Administrators\AdministratorController');
                Route::get('/Inquiry', 'Administrators\AdministratorController@Inquiry');
                Route::get('/contactus', 'Administrators\AdministratorController@contactus');
                Route::resource('/users', 'UserController');
                Route::resource('/subscribers', 'Subscribers\SubscribeController')->only(['index', 'destroy']);
                Route::put('/control', 'OrchestraController@control')->name('control');
                Route::resource('/tenants', 'Tenants\TenantController');
                Route::resource('/beneficiaries', 'Beneficiaries\BeneficiaryController');
            Route::get('advances/accept', 'Beneficiaries\AdvancesController@change_accept');
            Route::get('balance/accept', 'Beneficiaries\OrderBalanceController@changeStatus');
            Route::get('information/accept', 'Beneficiaries\InformationController@changeStatusInformation');
            Route::post('advance/store/comment', 'Beneficiaries\AdvancesController@commint');
            Route::post('advance/store/date', 'Beneficiaries\AdvancesController@date_done');
            Route::post('advance/store/change', 'Beneficiaries\AdvancesController@change');
            Route::resource('advances', 'Beneficiaries\AdvancesController');
            Route::resource('ordersBalance', 'Beneficiaries\OrderBalanceController');
            Route::resource('balanceSheet', 'Beneficiaries\balanceSheetController');
            Route::resource('incomeStatement', 'Beneficiaries\incomeStatementController');
            Route::resource('ordersInformation', 'Beneficiaries\InformationController');
            Route::resource('/agencies', 'Agencies\AgencyController');
                Route::post('/syncing', 'SyncController')->name('syncing');
                Route::resource('/roles', 'RolesAndPermissions\Roles\RoleController');
                Route::resource('/permissions', 'RolesAndPermissions\Permissions\PermissionController');
                Route::prefix('estates')->group(function(){
                    Route::resource('buildings', 'Estates\Buildings\BuildingController');
                    Route::get('Reservations/accept', 'Estates\Reservations\ReservationsController@change_accept')->name('Reservations.accept');
                    Route::resource('Reservations', 'Estates\Reservations\ReservationsController');
                    Route::resource('apartments', 'Estates\Apartments\ApartmentController');
                    Route::post('shop12/4', 'Estates\Shops\ShopController@update_shope');

                    Route::resource('shops', 'Estates\Shops\ShopController');
                    Route::resource('lands', 'Estates\Lands\LandController');
                });

                Route::resource('setting', 'SettingController');
                Route::get('/template', function(){
                    return view('admin::template.edit');
                })->name('template');
                Route::resource('/pages', 'PageController');
//            });
        });
    });
});
