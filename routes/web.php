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
// User Auth
Auth::routes();

// Home
Route::get('/', 'HomeController@index');

// Lojas
Route::group(['prefix' => 'lojas'], function(){
    Route::get('{titleslug}/{id}', 'StoreController@index');
    Route::get('/', 'StoreController@map');
});

// Cupons 
Route::group(['prefix' => 'cupons'], function(){
    Route::get('{store_id}/{id}', 'OfferController@index');
    Route::get('/', 'OfferController@new_offers');
});

// Search
Route::get('/search', 'SearchController@index');

//Sitemap
Route::get('/sitemap.xml', 'SitemapController@index');
