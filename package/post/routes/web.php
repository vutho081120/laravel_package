<?php

use Illuminate\Support\Facades\Route;

// Route::group(["namespace" => "Mallcode\Post\Http\Controllers"], function () {
//     Route::get("/post", "PostController@index")->name("post.index");

//     Route::get("/post/create", "PostController@createShow")->name("post.createShow");
// });

Route::get('/', function () {
    return redirect('admin/home');
});

// Route Admin
Route::group(['prefix' => 'admin', 'namespace' => "Mallcode\Post\Http\Controllers\Admin"], function () {
    Route::get('home', 'HomeController@index')->name('admin.home.index');

    Route::group(['prefix' => 'post'], function () {
        Route::get('/', 'PostController@index')->name('admin.post.index');

        Route::get('create', 'PostController@createShow')->name('admin.post.createShow');
        Route::post('create', 'PostController@create')->name('admin.post.create');

        Route::get('edit/{id}', 'PostController@editShow')->name('admin.post.editShow');
        Route::post('update/{id}', 'PostController@update')->name('admin.post.update');

        Route::get('delete/{id}', 'PostController@delete')->name('admin.post.delete');

        Route::get('search', 'PostController@search')->name('admin.post.search');

        Route::post('upload', 'PostController@upload')->name('admin.post.upload');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoryController@index')->name('admin.category.index');

        Route::get('create', 'CategoryController@createShow')->name('admin.category.createShow');
        Route::post('create', 'CategoryController@create')->name('admin.category.create');

        Route::get('edit/{id}', 'CategoryController@editShow')->name('admin.category.editShow');
        Route::post('update/{id}', 'CategoryController@update')->name('admin.category.update');

        Route::get('delete/{id}', 'CategoryController@delete')->name('admin.category.delete');

        Route::get('search', 'CategoryController@search')->name('admin.category.search');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@index')->name('admin.user.index');

        Route::get('create', 'UserController@createShow')->name('admin.user.createShow');
        Route::post('create', 'UserController@create')->name('admin.user.create');

        Route::get('edit/{id}', 'UserController@editShow')->name('admin.user.editShow');
        Route::post('update/{id}', 'UserController@update')->name('admin.user.update');
        Route::post('updatePassword/{id}', 'UserController@updatePassword')->name('admin.user.updatePassword');

        Route::get('delete/{id}', 'UserController@delete')->name('admin.user.delete');

        Route::get('search', 'UserController@search')->name('admin.user.search');
    });
});
