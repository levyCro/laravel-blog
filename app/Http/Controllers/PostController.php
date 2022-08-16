<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
        'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
        ]);
    }
    
    public function show(Post $post)
    {
        Cache::rememberForever('users', function () {
        return DB::table('users')->get();
        }); 

        return view('posts.show', [
        'post' => $post
        ]);
    }


}
