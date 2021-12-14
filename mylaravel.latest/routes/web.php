<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Home\ProductController@index')->name('home');
Route::get('/danh-muc/{slug}','Home\CategoryController@index')->name('home.category.get');
Route::get('/san-pham/{slug}','Home\ProductController@detail')->name('home.product.detail');

Route::get('/dang-nhap','Home\AuthController@login')->name('home.login');
Route::post('/dang-nhap','Home\AuthController@postLogin')->name('home.login.post');
Route::get('/dang-xuat','Home\AuthController@logout')->name('home.logout');

Route::get('/dang-ki','Home\AuthController@register')->name('home.register');
Route::post('/dang-ki','Home\AuthController@postRegister')->name('home.register.post');

Route::match(['get', 'post'],'/them-gio-hang/{id}','Home\CartController@addCart')->name('home.cart.add');
Route::get('/xoa-san-pham/{id}','Home\CartController@delete')->name('home.cart.delete');

Route::get('/gio-hang','Home\CartController@index')->name('home.cart');
Route::get('/xoa-tat-ca-san-pham','Home\CartController@deleteAll')->name('home.cart.deleteAll');
Route::post('/cap-nhat-gio-hang','Home\CartController@updateCart')->name('home.cart.update');
Route::get('/thanh-toan','Home\CartController@checkout')->name('home.checkout');
Route::post('/thanh-toan','Home\CartController@addCheckout')->name('home.checkout.post');

Route::group(['middleware' => 'is_admin'], function(){
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

    Route::get('/category', 'Admin\CategorysController@index')->name('auth.category');
    Route::get('/category/add', 'Admin\CategorysController@create')->name('auth.category.create');
    Route::post('/category/add', 'Admin\CategorysController@store')->name('auth.category.create.post');
   
    Route::get('/category/{id}', 'Admin\CategorysController@detail')->name('auth.category.detail');
    Route::post('/category/{id}', 'Admin\CategorysController@update')->name('auth.category.update');
    Route::post('/category/delete/{id}', 'Admin\CategorysController@delete')->name('auth.category.delete');
    
    Route::get('/user', 'Admin\UsersController@index')->name('admin.user');
    Route::get('/user/search', 'Admin\UsersController@search')->name('admin.user.search');
    Route::get('/user/add', 'Admin\UsersController@create')->name('admin.user.create');
    Route::post('/user/add', 'Admin\UsersController@store')->name('admin.user.create.post');

    Route::get('/user/edit/{id}', 'Admin\UsersController@detail')->name('admin.user.edit');
    Route::post('/user/edit/{id}', 'Admin\UsersController@update')->name('admin.user.update');
    Route::post('/user/delete/{id}', 'Admin\UsersController@delete')->name('admin.user.delete');

    Route::get('/customer', 'Admin\CustomersController@index')->name('admin.customer');
    Route::get('/customer/search', 'Admin\CustomersController@search')->name('admin.customer.search');
    Route::post('/customer/delete/{id}', 'Admin\CustomersController@delete')->name('admin.customer.delete');

    Route::get('/product', 'Admin\ProductsController@index')->name('admin.product');
    Route::get('/product/search', 'Admin\ProductsController@search')->name('admin.product.search');
    Route::get('/product/add', 'Admin\ProductsController@add')->name('admin.product.add');
    Route::post('/product/add', 'Admin\ProductsController@store')->name('admin.product.add.post');
    Route::get('/product/edit/{id}', 'Admin\ProductsController@detail')->name('admin.product.edit');
    Route::post('/product/edit/{id}', 'Admin\ProductsController@update')->name('admin.product.edit.post');
    Route::post('/product/delete/{id}', 'Admin\ProductsController@delete')->name('admin.product.delete');

    Route::get('/order', 'Admin\OrdersController@index')->name('admin.order');
    Route::get('/order/search', 'Admin\OrdersController@search')->name('admin.order.search');
    Route::get('/order/confirm/{id}', 'Admin\OrdersController@confirm')->name('admin.order.confirm');

    Route::get('/order/detail/{id}', 'Admin\OrdersController@detail')->name('admin.order.detail');

});

Route::get('/login', 'Admin\AuthController@index')->name('auth.login.get');
Route::post('/login', 'Admin\AuthController@postLogin')->name('auth.login.post');
Route::get('/logout', 'Admin\AuthController@logout')->name('auth.logout.get');
