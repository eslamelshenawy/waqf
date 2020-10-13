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

use Illuminate\Http\Request;

Route::prefix('/')->group(function() {
    Route::get('/', 'ClientController@index');
    Route::get('/setting', 'ClientController@setting')->name('Client::setting');
    Route::post('/setting/store', 'ClientController@setting_store')->name('Client::setting.store');
    Route::get('/advance', 'User\Beneficiary\BeneficiaryAdvanceController@index');
    Route::get('/balance', 'User\Beneficiary\BeneficiaryBalanceController@index');
    Route::get('/getPDF', 'User\Beneficiary\BeneficiaryBalanceController@getPDF');
    Route::get('/information', 'User\Beneficiary\BeneficiaryInformationController@index');
    Route::get('/statement_account', 'User\Beneficiary\BeneficiaryAdvanceController@statement_account');
    Route::post('/advance/store', 'User\Beneficiary\BeneficiaryAdvanceController@store_advance');
    Route::post('/balance/order/send', 'User\Beneficiary\BeneficiaryBalanceController@sendOrder');
    Route::post('/information/order/send', 'User\Beneficiary\BeneficiaryInformationController@sendOrder');

    Route::get('allNotification', 'ClientController@allNotification');

    Route::resource('/lab', 'LabController');

    Route::get('/search', 'SearchController')->name('search');
    Route::get('/search/home', 'SearchController@search_home')->name('search.home');

    Route::get('/login.', 'Auth\AuthController@showLoginForm')->name('showLoginForm');
    Route::post('/login', 'Auth\AuthController@login')->name('login');
    Route::get('/.login', 'Auth\AuthController@showBeforeLoginForm')->name('showBeforeLoginForm');
    Route::post('/before-login', 'Auth\AuthController@beforeLogin')->name('beforeLogin');

    Route::get('/code/{code?}', 'Auth\AuthController@showCodeForm')->name('showCodeForm');
    Route::post('/check-code', 'Auth\AuthController@checkCode')->name('checkCode');

    Route::get('/estates/create', 'EstateController@create')->name('estate.create');
    Route::get('/estates', 'EstateController@index')->name('estate.index');
    Route::get('/estates/{estate}', 'EstateController@show')->name('estate.show');
    Route::post('/building', 'Estates\Buildings\BuildingController@store')->name('building.store');
    Route::post('/apartment', 'Estates\Apartments\ApartmentController@store')->name('apartment.store');
    Route::post('/shop', 'Estates\Shops\ShopController@store')->name('shop.store');
    Route::post('/land', 'Estates\Lands\LandController@store')->name('land.store');
//    Route::post('/apartment', 'Estates\Apartment\ApartmentController@store');
//    Route::post('/land', 'Estates\Land\LandController@store');
    //    Route::post('/shop', 'Estates\Shop\ShopController@store');


    Route::get('/register', function(){
        return view('client::register');
    })->name('register');

    Route::POST('/read/notification', function(Request $request){
        $dt = new \DateTime();
        $Notification=  \App\Notification::find($request->data_id);
        $Notification->read_at=$dt->format('Y-m-d H:i:s');
        $Notification->save();
        return "true";
    });

    Route::get('/tenants/register', 'User\Tenant\TenantController@create')->name('tenants.register');
    Route::post('/tenants/register', 'User\Tenant\TenantController@store')->name('tenants.registering');

    Route::get('/beneficiaries/register', 'User\Beneficiary\BeneficiaryController@create')
    ->name('beneficiaries.register');
    Route::post('/beneficiaries/register', 'User\Beneficiary\BeneficiaryController@store')
    ->name('beneficiaries.registering');

    Route::get('/agencies/register', 'User\Agency\AgencyController@create')->name('agencies.register');
    Route::post('/agencies/register', 'User\Agency\AgencyController@store')->name('agencies.registering');

    Route::resource('/tenants', 'User\Tenant\TenantController')->only(['show', 'edit', 'update']);
    Route::resource('/beneficiaries', 'User\Beneficiary\BeneficiaryController')->only(['show', 'edit', 'update']);
    Route::resource('/agencies', 'User\Agency\AgencyController')->only(['edit', 'update']);

    Route::get('/agencies/orders', 'User\Agency\AgencyOrdersController@index')->name('agency.orders');
    Route::post('/agencies/orders/agree', 'User\Agency\AgencyOrdersController@index_status')->name('agency.orders.status');

    Route::get('/gallery', 'GalleryController')->name('gallery');
    Route::post('/inquiry/add', 'User\InquiryController@add_inquiry')->name('add.inquiry');

    Route::get('/send-code', function(){
        return view('client::auth.send_code');
    })->name('client.sendCode');

    /* With auth middleware */
    Route::group(['middleware' => 'already-user'], function(){
        Route::post('/logout', 'Auth\AuthController@logout')->name('logout');
    });

    Route::get('/maintenance', 'MaintenanceController@index')->name('maintenance.index');
    Route::get('/maintenance/create/order', 'MaintenanceController@create_order')->name('maintenance.create.order');
    Route::get('/maintenance/old', 'MaintenanceOrderController@old_maintenance')->name('maintenance.old');
    Route::get('/orders/tenant/old', 'MaintenanceOrderController@old_tenantOrders')->name('tenant.orders.old');
    Route::post('maintenance/store', 'MaintenanceOrderController@store')->name('Client::maintenance.store.order');
    Route::post('estate/order/store', 'EstateOrderController@store')->name('Client::estate.store.order');
    Route::post('date_end/store', 'EstateOrderController@store_date_end')->name('Client::estate.store.date');

});


