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

//---------------------Route Admin------------------------------------------
Route::any('/admin','RestaurantController@index');
Route::get('/admin/restaurant/add','RestaurantController@add_restaurant');
Route::post('/admin/restaurant/save','RestaurantController@insert_restaurant');
Route::get('/admin/restaurant/edit/{id}','RestaurantController@edit_restaurant');
Route::post('/admin/restaurant/update','RestaurantController@update_restaurant');
Route::post('/admin/restaurant/delete_galls','RestaurantController@delete_galls');
Route::post('/admin/restaurant/status','RestaurantController@status');
Route::post('/admin/restaurant/delete_restaurant','RestaurantController@delete_restaurant');
Route::post('/admin/restaurant/deleteAll','RestaurantController@deleteAll');


//-------------------Route User-------------------------------------------------
Route::any('/','RestaurantController@restaurant');
Route::get('/restaurant-detail/{id}','RestaurantController@restaurant_detail');
