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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/lojas/{titleslug}/{id}', 'StoreController@index');
Route::get('/lojas', 'StoreController@map');
Route::get('/cupons/{store_id}/{id}', 'OfferController@index');
Route::get('/cupons', 'OfferController@new_offers');
Route::get('/search', 'SearchController@index');
Route::get('/sitemap.xml', 'SitemapController@index');