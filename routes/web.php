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

Route::get('/', 'FrontController@index')->name('front');

Route::group([ 'prefix' => 'front'], function() {
    Route::get('/career', 'FrontController@career')->name('career_front');
    Route::get('/service', 'FrontController@service')->name('service_front');
    Route::get('/client', 'FrontController@client')->name('client_front');
    Route::get('/about', 'FrontController@about')->name('about_front');
    Route::get('/gallery', 'FrontController@gallery')->name('gallery_front');
    Route::get('/contact', 'FrontController@contact')->name('contact_front');
    Route::post('/contact/post', 'FrontController@contact_post')->name('contact_front_post');
});

Auth::routes(['register' => true]);

Route::get('/login', 'FrontController@index')->name('front_login');
Route::get('/admins', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/admins', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


Route::group([ 'prefix' => 'admin', 'middleware' => ['auth'] ], function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/career/category', 'CareerController@category')->name('cat_career');
    Route::post('/career/category/post', 'CareerController@category_post')->name('cat_career_post');
    Route::get('/career/list', 'CareerController@career')->name('career_list');
    Route::post('/career/post', 'CareerController@career_post')->name('career_post');

    Route::get('/gallery/lable', 'GalleryController@lable')->name('lable');
    Route::post('/gallery/lable/post', 'GalleryController@post_label')->name('lable_post');
    Route::get('/gallery/images', 'GalleryController@images')->name('gallery');
    Route::post('/gallery/images/post', 'GalleryController@post_images')->name('image_post');
    Route::get('/client', 'ClientController@index')->name('client');
    Route::post('/client/post', 'ClientController@post')->name('client_post');
    Route::get('/slider', 'SliderController@index')->name('slider');
    Route::post('/slider/post', 'SliderController@post')->name('slider_post');
    Route::get('/service', 'ServiceController@index')->name('service');
    Route::post('/service/post', 'ServiceController@post')->name('service_post');
    Route::get('/about', 'AboutController@index')->name('about');
    Route::post('/about/post', 'AboutController@post')->name('about_post');
    Route::get('/subscribe', 'SubscribeController@index')->name('subscribe');
});


Route::get('/mode_development', 'FrontController@maintenance');