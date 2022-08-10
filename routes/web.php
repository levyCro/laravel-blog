<?php

use App\models\Post;

use Illuminate\Support\Facades\Route;

// getting the posts with collect function
Route::get('/', function () {

    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {

    return view('post', [
        'post' => $post
    ]);
});
