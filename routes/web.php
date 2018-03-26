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
    Route::get('/all-ads', 'SiteController@allAds');


    /* Site Ajax Location and Categories */
    Route::get('/ajax/categories', 'SiteController@ajaxCategoryModal');
    Route::get('/ajax/locations', 'SiteController@ajaxLocationModal');

    
    Auth::routes();
    
    /* User */
    Route::get('/home', 'SiteController@index')->name('home');
    Route::get('/dashboard', 'HomeController@dashboard');
    Route::get('/account', 'HomeController@account');    
    
    /* Place ad */
    Route::get('/post-ad', 'HomeController@postAd');
});

/* Form Submits */
Route::post('/account/update', 'HomeController@accountUpdate');


/* Admin Panel routes */
Route::get('/administrator', 'AdminLoginController@index');
Route::post('/admin/authenticate', 'AdminLoginController@verifyUser');
Route::get('/admin/logout', 'AdminController@logout');
Route::get('/admin', 'AdminController@index');


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






