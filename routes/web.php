<?php

use App\models\Post;

use Illuminate\Support\Facades\Route;

// getting the posts with collect function
Route::get('/', function () {

    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('posts/{post}', function ($id) {

    return view('post', [
        'post' => Post::findOrFail($id)
    ]);
});
