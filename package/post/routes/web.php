<?php

use Illuminate\Support\Facades\Route;

Route::group(["namespace" => "Mallcode\Post\Http\Controllers"], function () {
    Route::get("/post", "PostController@index")->name("post.index");
});
