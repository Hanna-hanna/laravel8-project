<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Log\Logger;
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

    Illuminate\Support\Facades\DB::listen(function ($query) {
        //Illuminate\Support\Facades\Log::info('foo');
        Logger($query->sql, $query->bindings);
    });
    

    return view('posts', [
        'posts' => Post::with('category')->get()
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

Route::get('posts/{post:slug}', function (Post $post) { //Post::where('slug', $post)->firstOrFail()
  
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});