<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\PostDec;
use Psy\Command\WhereamiCommand;

use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\fileExists;

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

    return view('posts',[
        'posts' => $posts
    ]);
});

Route::get('posts/{post}', function ($slug) {
    return view('post', [
        'post'=> Post::find($slug)
    ]);
    
});
