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

Route::prefix('pages')->group(function() {
    Route::get('/about', function(){
        bread_crumb_3d($previous=null, $current=['name' => __('staticpage::pages.about'), 'url' => null]);
        return view('staticpage::about');
    })->name('pages.about');

    Route::get('privacy_policy', function(){
        bread_crumb_3d($previous=null, $current=['name' => __('staticpage::pages.privacy_policy'), 'url' => null]);
        return view('staticpage::privacy_policy');
    })->name('pages.privacy_policy');

    Route::get('terms_policy', function(){
        bread_crumb_3d($previous=null, $current=['name' => __('staticpage::pages.terms_policy'), 'url' => null]);
        return view('staticpage::terms_policy');
    })->name('pages.terms_policy');

    Route::get('/contact', function(){
        bread_crumb_3d($previous = null, $current = ['name' => __('staticpage::pages.contact'), 'url' => null]);
        return view('staticpage::contact');
    })->name('pages.contact');

    Route::get('/welcome', function(){
        if(session()->has('welcome')){
            return view('staticpage::welcome');
        }else{
            return redirect(url('/'));
        }

    })->name('pages.welcome');

    Route::post('/contact_us', 'StaticPageController@contact_us')->name('contact_us');
});
