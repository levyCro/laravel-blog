<?php

use App\models\Post;
use Faker\Provider\File as ProviderFile;
use Illuminate\Http\Testing\File as TestingFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\FrontMatter\Data\SymfonyYamlFrontMatterParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('/', function () {
   $files = File::files(resource_path("posts"));
   $document = [];

   foreach ($files as $file) {
    $document = YamlFrontMatter::parseFile($file);

    $posts[] = new Post(
        $document->title,
        $document->excerpt,
        $document->date,
        $document->body,
    );
   }

   dd($posts);

   


    // $posts = Post::all();

    // return view('posts', [
    //     'posts' => $posts
    // ]);
});

Route::get('posts/{post}', function ($slug) {

    return view('post', [
        'post' => Post::find($slug)
    ]);
 
})->where('post', '[A-z_\-]+');
