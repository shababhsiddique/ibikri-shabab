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

use App\Http\Middleware\CheckAdmin;

Route::group(
        [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
        ], function() {

    /* Site */
    Route::get('/', 'SiteController@index');
    Route::get('/all-ads', 'AdSearchController@allAds');
    Route::get('/ads-by/{id}/{username}', 'AdSearchController@adsByUser');
    Route::get('/ad/{id}/{title}', 'AdSearchController@adDetails');
    Route::get('/ad/{id}', 'AdSearchController@adDetails');
    Route::get('/test', 'AdSearchController@test');


    /* Site Ajax Location and Categories */
    Route::get('/ajax/categories', 'SiteController@ajaxCategoryModal');
    Route::get('/ajax/locations', 'SiteController@ajaxLocationModal');


    Auth::routes();

    /* User */
    Route::get('/home', 'SiteController@index')->name('home');
    Route::get('/dashboard', 'HomeController@dashboard');
    Route::get('/favourites', 'HomeController@userFavourites');
    Route::get('/account', 'HomeController@account');
    Route::get('/messages', 'HomeController@messages');
    Route::get('/message/{code}/{user}/{poster}', 'HomeController@viewMessage');    
    
    Route::get('/balance', 'HomeController@balance');
    



    /* basic site pages */
    Route::get('/help/{slug}', 'SiteController@page');



    /* Ad management */
    Route::get('/post-ad', 'HomeController@postAd');
    Route::get('/edit-ad/{id}', 'HomeController@editAd');
    Route::get('/delete-ad/{id}', 'HomeController@deleteAd');
});

/* Form Submits */

Route::post('/upload', 'HomeController@postImageUpload');
Route::post('/upload-delete', 'HomeController@postImageDeleteCache');

/* Account */
Route::post('/account/update', 'HomeController@accountUpdate');

/* Recharge request */
Route::post('/balance-request', 'HomeController@requestRecharge');

/* Post Ad */
Route::post('/post-ad/submit', 'HomeController@postAdSubmit');
Route::post('/edit-ad/submit', 'HomeController@editAdSubmit');


/* Edit ad */
Route::get('/delete-post-image/{id}', 'HomeController@postImageEditRemove');
//Route::any('/post-ad-image', 'HomeController@postAdImageHandler');

/* Report an ad */
Route::post('/report', 'HomeController@reportAd');


/* Favourite an And */
Route::get('/favour/{id}', 'HomeController@favourAd');

/* Promote an Ad */
Route::get('/promote-ad/{id}', 'HomeController@promoteAd');



/* Update View Count */
Route::get('/ajax/view/{id}/{tok}', 'AdSearchController@ajaxView');


//Route::get('/threads', 'HomeController@threadsGet');




/**
 * Admin Panel Routes
 */
Route::get('/administrator', 'AdminLoginController@index');
Route::post('/admin/authenticate', 'AdminLoginController@verifyUser');

Route::group(['prefix' => 'admin', 'middleware' => [CheckAdmin::class]], function() {

    Route::get('/logout', 'AdminController@logout');
    Route::get('/', 'AdminController@index');

    /* User Management */
    Route::get('/users', 'AdminController@usersDatatable');
    Route::get('/users/getdata', 'AdminController@usersDatatableGetData')->name('datatables/usersgetdata');

    Route::get('/users/changeStatus/{status}/{id}', 'AdminController@usersChangeStatus');

    /* User recharge payments */
    Route::get('/payments', 'AdminController@rechargeDatatable');
    Route::get('/payments/getdata', 'AdminController@rechargeDatatableGetData')->name('datatables/rechargegetdata');

    Route::get('/payment/changeStatus/{status}/{id}', 'AdminController@rechargeChangeStatus');
    

    /* Ad Posts Management */
    Route::get('/ads', 'AdminController@adsDatatable');
    Route::get('/ads/getdata', 'AdminController@adsDatatableGetData')->name('datatable/getdata');

    Route::get('/ads/changeStatus/{status}/{id}', 'AdminController@adsChangeStatus');


    /* User Reports Management */
    Route::get('/ad/complains', 'AdminController@reportsDatatable');
    Route::get('/ad/complains/getdata', 'AdminController@reportsDatatableGetData')->name('datatable/getreportdata');

    Route::get('/ad/complain/end/{id}', 'AdminController@reportsEnd');

    Route::get('/ads/changeStatus/{status}/{id}', 'AdminController@adsChangeStatus');



    /* Category Management */
    Route::get('/categories', 'AdminController@categoryView');

    Route::get('/category/create', 'AdminController@categoryCreate');
    Route::get('/category/edit/{category_id}', 'AdminController@categoryEdit');
    Route::post('/category/save-category', 'AdminController@categorySaveCategory');

    Route::get('/subcategory/create', 'AdminController@subcategoryCreate');
    Route::get('/subcategory/edit/{subcategory_id}', 'AdminController@subcategoryEdit');
    Route::post('/subcategory/save-subcategory', 'AdminController@subcategorySave');


    /* Location Management */
    Route::get('/locations', 'AdminController@locationView');

    Route::get('/division/create', 'AdminController@divisionCreate');
    Route::get('/division/edit/{division_id}', 'AdminController@divisionEdit');
    Route::post('/division/save-division', 'AdminController@divisionSave');

    Route::get('/city/create', 'AdminController@cityCreate');
    Route::get('/city/edit/{city_id}', 'AdminController@cityEdit');
    Route::post('/city/save-city', 'AdminController@citySave');


    /* Basic Content Management */
    Route::get('/pages', 'AdminController@pagesView');
    Route::get('/page/create', 'AdminController@pageCreate');
    Route::get('/page/edit/{id}', 'AdminController@pageEdit');
    Route::post('/page/save-page', 'AdminController@pageSave');


    Route::get('/sample/table', 'AdminController@table');
    Route::get('/sample/form', 'AdminController@form');
});

/**
 * Admin Panel Routes
 */









