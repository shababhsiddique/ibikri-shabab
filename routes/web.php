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
Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
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
    
    
    
    /* Ad management */
    Route::get('/post-ad', 'HomeController@postAd');
    Route::get('/edit-ad/{id}', 'HomeController@editAd');
    Route::get('/delete-ad/{id}', 'HomeController@deleteAd');
    
});

/* Form Submits */

Route::post('/upload', 'HomeController@postImageUpload');
Route::post('/upload-delete', 'HomeController@postImageDeleteCache');

/*Account */
Route::post('/account/update', 'HomeController@accountUpdate');

/*Post Ad*/
Route::post('/post-ad/submit', 'HomeController@postAdSubmit');
Route::post('/edit-ad/submit', 'HomeController@editAdSubmit');


/* Edit ad */
Route::get('/delete-post-image/{id}', 'HomeController@postImageEditRemove');
//Route::any('/post-ad-image', 'HomeController@postAdImageHandler');

/* Report an ad */
Route::post('/report', 'HomeController@reportAd');    

/* Favourite an And */
Route::get('/favour/{id}', 'HomeController@favourAd');    

/* Update View Count */
Route::get('/ajax/view/{id}', 'AdSearchController@ajaxView');




/**
 * Admin Panel Routes
 */

Route::get('/administrator', 'AdminLoginController@index');
Route::post('/admin/authenticate', 'AdminLoginController@verifyUser');
Route::get('/admin/logout', 'AdminController@logout');
Route::get('/admin', 'AdminController@index');

/* Ad Posts Management */
Route::get('/admin/ads', 'AdminController@adsDatatable');
Route::get('/admin/ads/getdata', 'AdminController@adsDatatableGetData')->name('datatable/getdata');

Route::get('/admin/ads/changeStatus/{status}/{id}', 'AdminController@adsChangeStatus');


/* User Reports Management */
Route::get('/admin/ad/complains', 'AdminController@reportsDatatable');
Route::get('/admin/ad/complains/getdata', 'AdminController@reportsDatatableGetData')->name('datatable/getreportdata');

Route::get('/admin/ad/complain/end/{id}', 'AdminController@reportsEnd');

Route::get('/admin/ads/changeStatus/{status}/{id}', 'AdminController@adsChangeStatus');



/* Category Management */
Route::get('/admin/categories', 'AdminController@categoryView');

Route::get('/admin/category/create', 'AdminController@categoryCreate');
Route::get('/admin/category/edit/{category_id}', 'AdminController@categoryEdit');
Route::post('/admin/category/save-category', 'AdminController@categorySaveCategory');

Route::get('/admin/subcategory/create', 'AdminController@subcategoryCreate');
Route::get('/admin/subcategory/edit/{subcategory_id}', 'AdminController@subcategoryEdit');
Route::post('/admin/subcategory/save-subcategory', 'AdminController@subcategorySave');


/* Location Management */
Route::get('/admin/locations', 'AdminController@locationView');

Route::get('/admin/division/create', 'AdminController@divisionCreate');
Route::get('/admin/division/edit/{division_id}', 'AdminController@divisionEdit');
Route::post('/admin/division/save-division', 'AdminController@divisionSave');

Route::get('/admin/city/create', 'AdminController@cityCreate');
Route::get('/admin/city/edit/{city_id}', 'AdminController@cityEdit');
Route::post('/admin/city/save-city', 'AdminController@citySave');



Route::get('/admin/sample/table', 'AdminController@table');
Route::get('/admin/sample/form', 'AdminController@form');






