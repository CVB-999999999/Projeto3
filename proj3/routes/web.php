<?php

use App\Models\Post;
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
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/contactus', function () {
    return view('contactus');
});

Route::get('/aboutus', function () {
    return view('aboutUs');
});

Route::get('/userposts', function () {
    $posts = Post::all();
    
    return view('userposts', ['posts' => $posts]);
});

Route::get('/post/{post:slug}', function (Post $post) {
    return view('post', ['post' => $post]);
});

Route::get('app/Models/categories/{category:slug}', function (Category $category){
    return view('userposts', ['posts' => $category->posts]);
});