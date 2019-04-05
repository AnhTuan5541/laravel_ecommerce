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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::match(['get', 'post'], '/admin', 'AdminController@login')->name('admin.login');
Route::group(['prefix'=> 'admin', 'middleware'=>['auth:admin']], function(){
    Route::get('/dashboard', 'AdminController@getDashboard');
    Route::match(['get', 'post'], '/setting', 'Admincontroller@setting');

    //Catelogy
    Route::get('/catelogy', 'CatelogyController@getCatelogy');
    Route::match(['get', 'post'], '/add-catelogy', 'CatelogyController@addCatelogy');
    Route::match(['get', 'post'], '/edit-catelogy/{id}', 'CatelogyController@editCatelogy');
    Route::get('/delete-catelogy/{id}', 'CatelogyController@deleteCatelogy');

    //Type
    Route::get('/type', 'TypeController@getType');
    Route::match(['get', 'post'], '/add-type', 'TypeController@addType');
    Route::match(['get', 'post'], '/edit-type/{id}', 'TypeController@editType');
    Route::get('/delete-type/{id}', 'TypeController@deleteType');

    //Product
    Route::get('/product', 'ProductController@getProduct');
    Route::match(['get', 'post'], '/add-product', 'ProductController@addProduct');
    Route::match(['get', 'post'], '/edit-product/{id}', 'ProductController@editProduct');
    Route::get('/delete-product/{id}', 'ProductController@deleteProduct');
    Route::get('/getTypeByCatelogy/{idCatelogy}','ProductController@getTypeByCatelogy');

    Route::match(['get', 'post'], '/add-product-image/{id}', 'ProductController@addProductImage');
    Route::get('/delete-product-image/{id}', 'ProductController@deleteProductImage');
    
    //Account
    Route::get('/account', 'AdminController@getAccount');
    Route::match(['get', 'post'], '/add-account', 'AdminController@addAccount');
    Route::get('/delete-account/{id}', 'AdminController@deleteAccount');

    //Logout
    Route::get('/logout', 'AdminController@logout');
});
//Get home page
Route::get('/home', 'FrontendController@getHome');

//get all product in catelogy
Route::get('/catelogy/{slug_name}', 'FrontendController@catelogyDetails');

//get all product in type
Route::get('/type-product/{slug_name}', 'FrontendController@typeDetails');

//Get product detail
Route::get('/product/{id}', 'FrontendController@productDetails');

Route::get('/add-to-cart/{id}', 'FrontendController@addToCart');

Route::get('reduce-item/{id}', 'FrontendController@reduceCart');

Route::get('remove-items/{id}', 'FrontendController@removeItems');

Route::get('/cart', 'FrontendController@getCart');

Route::match(['get', 'post'], 'user/login', 'FrontendController@login')->name('user.login');

Route::match(['get', 'post'], 'user/register', 'FrontendController@register');

Route::match(['get', 'post'], '/check-out', 'UserController@checkOut');

Route::get('user/logout', 'FrontendController@logout');


