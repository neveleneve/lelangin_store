<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// regular route
Route::get('/', 'HomeController@index')->name('dashboard');
Route::get('/profile/{id}', 'HomeController@profile')->name('userprofile');
Route::get('/category', 'HomeController@category')->name('category');
Route::get('/category/{name}', 'HomeController@categoryview')->name('categoryview');
Route::get('/brand', 'HomeController@brand')->name('brand');
Route::get('/brand/{name}', 'HomeController@brand')->name('brandview');
Route::get('/search', 'HomeController@search')->name('search');
Auth::routes(['verify' => true]);
// admin
Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/administrator/category', 'AdminController@cate')->name('admincategory');
    Route::get('/administrator/category/edit/{id}', 'AdminController@cateedit')->name('admincategoryedit');
    Route::get('/administrator/category/view/{id}', 'AdminController@cateview')->name('admincategoryview');
    Route::post('/administrator/category/edit', 'AdminController@cateupdate')->name('admincategoryupdate');

    Route::get('/administrator/brands', 'AdminController@brands')->name('adminbrand');
    
    Route::get('/administrator/users', 'AdminController@userlist')->name('adminpengguna');
    
    Route::get('/administrator/verifications', 'AdminController@verification')->name('adminverification');
    
    Route::get('/administrator/lelang', 'AdminController@lelangmasuk')->name('adminlelangmasuk');
});
// user
Route::group(['middleware' => ['auth', 'isUser']], function () {
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::get('/kyc', 'UserController@kycverification')->name('kycverification');
    Route::post('/kyc', 'UserController@kycinput')->name('kycinput');
    Route::get('/kyc/done', 'UserController@kycdone')->name('kycdone');
});
