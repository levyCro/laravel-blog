<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::post('newsletter', function () {

    request()->validate(['email' => 'required|email']);
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
	    'apiKey' => config('services.mailchimp.key'),
	    'server' => 'us18'
    ]);

    $response = $mailchimp->ping->get();
    
    $response = $mailchimp->lists->addListMember('3949418f52', [
        'email_address' => request('email'),
        'status' => 'subscribed'
    ]);
    ddd($response);

});

// getting the posts with collect function
Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
// Route::get('categories/{category:slug}', function (Category $category) {
//       return view('posts', [
//         'posts' => $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// })->name('category');

