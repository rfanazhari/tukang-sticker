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
Route::get('/sitemap', 'FrontController@sitemap')->name('sitemap');

Route::group([ 'prefix' => 'web'], function() {
    Route::get('/career', 'FrontController@career')->name('career_front');
    Route::get('/service', 'FrontController@service')->name('service_front');
    Route::get('/client', 'FrontController@client')->name('client_front');
    Route::get('/about', 'FrontController@about')->name('about_front');
    Route::get('/gallery', 'FrontController@gallery')->name('gallery_front');
    Route::get('/contact', 'FrontController@contact')->name('contact_front');
    Route::post('/contact/post', 'FrontController@contact_post')->name('contact_front_post');
});

Route::group([ 'prefix' => 'order'], function() {
    Route::get('/', 'OrderController@index')->name('home_order');
    Route::get('/create', 'OrderController@createOrder')->name('create_order');
    Route::get('/login', 'OrderController@index')->name('login_order');
});

Route::get('/product/{product}', 'ProductController@index');

Auth::routes(['register' => true]);

Route::get('/login', 'FrontController@index')->name('front_login');
Route::get('/admins', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/admins', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'another'], function() {
    Route::get('/invoice-print', 'AnotherController@printInvoice')->name('print_invoice');
    Route::get('/email-generate', 'AnotherController@generateEmail')->name('email_generate');
});


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

    Route::get('/order/customer', 'CustomerController@customer')->name('customer');
    Route::post('/order/customer/post', 'CustomerController@customer_post')->name('customer_post');
    Route::get('/order/transaction', 'TransactionController@transaction')->name('transaction');
    Route::get('/order/transaction/create/{type}', 'TransactionController@create')->name('transaction_create');
    Route::post('/order/transaction/post/{type}', 'TransactionController@post')->name('transaction_post');
    Route::post('/order/transaction/show-details', 'TransactionController@details')->name('transaction_details');

    Route::get('/project/list', 'ProjectController@list')->name('list');
    Route::get('/project/project-add', 'ProjectController@project_add')->name('project_add');
    Route::post('/project/project-post', 'ProjectController@project_add_post')->name('project_post');

    Route::get('/project/template', 'ProjectController@template')->name('template');
    Route::get('/project/template/{label}', 'ProjectController@filter_template')->name('template_filter');
    Route::post('/project/template/post', 'ProjectController@post_template')->name('template_post');
    
    Route::get('/project/wallpaper', 'ProjectController@wallpaper')->name('wallpaper');
    Route::post('/project/wallpaper/post', 'ProjectController@post_wallpaper')->name('wallpaper_post');
});

Route::group(['prefix' => 'projects'], function() {
    Route::get('/wallpapers', 'OurProjectController@wallpaper')->name('front_wallpaper');
    Route::get('/designs', 'OurProjectController@design')->name('front_design');
});


Route::get('/mode_development', 'FrontController@maintenance');