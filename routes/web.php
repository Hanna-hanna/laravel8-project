<?php

use App\Models\Post;
//use File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get('/', function () {

    $posts = Post::all();

    return view('posts', [
        'posts' => $posts
    ]);

    // $posts = array_map(function ($file) {
    //     $document = YamlFrontMatter::parseFile($file);

    //     return new Post(
    //         $document->title, 
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }, $files);

    // $document = YamlFrontMatter::parseFile(
    //     resource_path('posts/my-fourth-post.html')
    // );

    // ddd($document->excerpt);

});

Route::get('posts/{post}', function ($slug) {
    return view('post', [
        'post' => Post::find($slug)
    ]);
})->where('post', '[A-z_\-]+');