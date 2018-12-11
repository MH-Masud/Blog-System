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
/*-------FrontEnd Routes---------*/
Auth::routes();
Route::group(['namespace'=>'User'],function(){

	Route::get('/','HomeController@index')->name('user.home');
    
    Route::get('/article/{slug}','FrontendPostController@show')->name('show');

    Route::get('tag-{slug}','HomeController@tag')->name('tag');

    Route::get('category-{slug}','HomeController@category')->name('category');
    
    Route::post('/article/{id}','HomeController@comment')->name('comment');
});

/*-------BackEnd Routes---------*/

Route::group(['prefix'=>'admin','namespace'=>'Admin'], function() {
    
    Route::get('/home','AdminController@home')->name('admin.home')->middleware('auth:admin');

    //Post Route
    Route::resource('/post','PostController')->middleware('auth:admin','can:posts,Auth::user()');

    //Category Route
    Route::resource('/category','CategoryController')->middleware(['auth:admin','can:posts.category,Auth::user()']);

    //Tag Route
    Route::resource('/tag','TagController')->middleware(['auth:admin','can:posts.tag,Auth::user()']);

    // User Route
    Route::resource('/user','UserController')->middleware(['auth:admin','can:posts.author,Auth::user()']);

    //Comment Route
    Route::resource('/comment','CommentController')->middleware('auth:admin');

    //Permission Route
    Route::resource('/permission','PermissionController')->middleware(['auth:admin','can:posts.permission,Auth::user()']);

    // Admin Role Route
    Route::resource('/role','RoleController')->middleware(['auth:admin','can:posts.role,Auth::user()']);

    //Profile Route
    Route::resource('/profile','ProfileContriller')->middleware('auth:admin');

    // Admin Auth Route
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    
    Route::post('/login', 'Auth\LoginController@login');

    Route::post('/logout', 'Auth\LoginController@logout')->name('admin.logout');
});
