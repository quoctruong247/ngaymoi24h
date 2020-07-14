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

 Auth::routes();

// Route::get('/', 'LiveSearchController@index');
// Route::get('/search', 'LiveSearchController@search');


Route::get('/','HomeController@index')->name('trang-chu');

Route::get('/tin-tuc/{slug}','HomeController@viewCategory');

Route::get('/{slug}','HomeController@viewPost')->name('view.post');

Route::post('/home/video/{id}','HomeController@video')->name('video');

Route::get('site-map/create-XML/createXML','HomeController@createXML')->name('createXML');  
//phần admin
Route::group(['prefix'=>'admin','as'=>'admin.','namespace'=>'admin'], function(){
	// login
	Route::get('login', 'HomeController@index')->name('login');
	Route::get('logout', 'HomeController@logout')->name('logout');
	Route::get('verify', 'HomeController@verify')->name('verify');
	Route::get('register', 'HomeController@register')->name('register');

	// user
	Route::get('/user', 'UserController@index')->name('user.index');
	Route::post('/user', 'UserController@store')->name('user.store');
    Route::get('/user/create', 'UserController@create')->name('user.create');
    Route::get('/user/{id}', 'UserController@show')->name('user.show');
    Route::put('/user/{id}', 'UserController@update')->name('user.update');
    Route::delete('/user/{id}', 'UserController@delete')->name('user.delete');
    Route::get('/user/active/{id}', 'UserController@updateActive')->name('user.active');

    // category
	Route::get('/category', 'CategoryController@index')->name('category.index');
    Route::post('/category', 'CategoryController@store')->name('category.store');
    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::get('/category/{id}', 'CategoryController@show')->name('category.show');
    Route::put('/category/{id}', 'CategoryController@update')->name('category.update');
    Route::delete('/category/{id}', 'CategoryController@delete')->name('category.delete');
    Route::get('/category/active/{id}', 'CategoryController@updateActive')->name('category.active');

    //Post
    Route::get('/post', 'PostController@index')->name('post.index');
    Route::get('/post/search', 'PostController@search')->name('post.search');
    Route::post('/post', 'PostController@store')->name('post.store');
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::get('/post/{id}', 'PostController@show')->name('post.show');
    Route::put('/post/{id}', 'PostController@update')->name('post.update');
    Route::delete('/post/{id}', 'PostController@delete')->name('post.delete');
    Route::get('/activePost/{id}', 'PostController@updateActive')->name('post.active');
    Route::get('/activePostSale/{id}', 'PostController@updatePostSale')->name('postsale.active');
    Route::get('/activeNewPost/{id}', 'PostController@updateNewPost')->name('newpost.active');

	// banner quảng cáo
	Route::get('/advertisement', 'AdvertisementController@index')->name('advertisement.index');
    Route::post('/advertisement', 'AdvertisementController@store')->name('advertisement.store');
    Route::get('/advertisement/create', 'AdvertisementController@create')->name('advertisement.create');
    Route::get('/advertisement/{id}', 'AdvertisementController@show')->name('advertisement.show');
    Route::put('/advertisement/{id}', 'AdvertisementController@update')->name('advertisement.update');
    Route::delete('/advertisement/{id}', 'AdvertisementController@delete')->name('advertisement.delete');
    Route::get('/activeAdvertisement/{id}', 'AdvertisementController@updateActive')->name('advertisement.active');

    // banner quảng cáo phải
    Route::get('/advertisement1', 'Advertisement1Controller@index')->name('advertisement1.index');
    Route::post('/advertisement1', 'Advertisement1Controller@store')->name('advertisement1.store');
    Route::get('/advertisement1/create', 'Advertisement1Controller@create')->name('advertisement1.create');
    Route::get('/advertisement1/{id}', 'Advertisement1Controller@show')->name('advertisement1.show');
    Route::put('/advertisement1/{id}', 'Advertisement1Controller@update')->name('advertisement1.update');
    Route::delete('/advertisement1/{id}', 'Advertisement1Controller@delete')->name('advertisement1.delete');
    Route::get('/activeAdvertisement1/{id}', 'Advertisement1Controller@updateActive')->name('advertisement1.active');

	// Interface
	Route::get('/giaodien', 'GiaodienController@index')->name('giaodien.index');
    Route::post('/giaodien', 'GiaodienController@store')->name('giaodien.store');
    Route::get('/giaodien/create', 'GiaodienController@create')->name('giaodien.create');
    Route::get('/giaodien/{id}', 'GiaodienController@show')->name('giaodien.show');
    Route::put('/giaodien/{id}', 'GiaodienController@update')->name('giaodien.update');
    Route::delete('/giaodien/{id}', 'GiaodienController@delete')->name('giaodien.delete');
    Route::get('/activeGiaoDien/{id}', 'GiaodienController@updateActive')->name('giaodien.active');

    // Video
    Route::get('/video', 'VideoController@index')->name('video.index');
    Route::post('/video', 'VideoController@store')->name('video.store');
    Route::get('/video/create', 'VideoController@create')->name('video.create');
    Route::get('/video/{id}', 'VideoController@show')->name('video.show');
    Route::put('/video/{id}', 'VideoController@update')->name('video.update');
    Route::delete('/video/{id}', 'VideoController@delete')->name('video.delete');
    Route::get('/activeVideo/{id}', 'VideoController@updateActive')->name('video.active');
});



