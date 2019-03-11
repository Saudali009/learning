<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Authorized routes

Route::post('send-sms', 'UsersController@sendSms');
Route::post('verify', 'UsersController@verify');


Route::post('createAccount', 'UsersController@createAccount');
Route::post('login', 'UsersController@login');
Route::post('uploadImage', 'UsersController@uploadImage');
Route::get('getAllProducts', 'ProductController@index');
Route::post('addProduct', 'ProductController@store');
Route::post('createOrder', 'OrderController@store');
Route::post('getAllOrderById', 'OrderController@getAllOrders');
Route::post('getProductById', 'ProductController@getProductDetail');


Route::group(['middleware' => ['auth:api']], function () {

    Route::get('getLoginUser', 'UsersController@details');
});

Route::group(['middleware' => ['XSS']], function () {

    Route::post('makeQbDirectApiRequest', 'QbDirectApiController@createAccount');

});




