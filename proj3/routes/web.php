<?php

use App\Http\Controllers\EditController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
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

// Static Pages
Route::get('/', function () {
    return view('index');
});
Route::get('/contactus', function () {
    return view('contactus');
});
Route::get('/aboutus', function () {
    return view('aboutUs');
});
Route::get('/admin/dashboard', function () {
    return view('admin.adminDash');
})->middleware('auth');

// Register
Route::get('admin/register', [RegisterController::class, 'create'])->middleware('auth');
Route::post('admin/register', [RegisterController::class, 'store'])->middleware('auth');

// Logout
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Login
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

// Reset Paswd
// Get Reset Token
Route::get('/forgot-password', function () {
    return view('sessions.forgot-password');
})->middleware('guest')->name('password.request');
Route::post('/forgot-password', [SessionsController::class, 'resetPasswd'])->middleware('guest')->name('password.request');
// Input Reset Token
Route::get('/reset-password', function () {
    return view('sessions.reset-password');
})->middleware('guest')->name('password.request');
Route::post('/reset-password', [SessionsController::class, 'resetPasswdFinal'])->middleware('guest')->name('password.request');

// Change Passwd
Route::get('change-password', function (){
    return view('sessions.change-password');
})->middleware('auth');
Route::post('/change-password', [SessionsController::class, 'UpdatePassword'])->middleware('auth');

Route::post('admin-change-password', [SessionsController::class, 'resetPasswdAdmin'])->middleware('auth');

// Load All User Related Posts
Route::get('/userposts', function () {
    $posts = Post::latest()->with('category', 'author')->get();
    return view('userposts', ['posts' => $posts,'categories' => Category::all()]);
})->middleware('auth');


// Fetch a Post
Route::get('/post/{post:slug}', function (Post $post) {
    return view('post', ['post' => $post]);
});

// Fetch all posts based on a category
Route::get('categories/{category:slug}', function (Category $category) {
    return view('userposts', ['posts' => $category->posts->load(['category', 'author']),'currentCategory'=>$category,'categories' => Category::all()]);
});

Route::get('authors/{author:username}', function (User $author) {
    return view('userposts', ['posts' => $author->posts->load(['category', 'author']),'categories' => Category::all()]);
});

// List all students
Route::get('admin/users', [ListController::class, 'userList']);
// List all tutors
Route::get('admin/tutors', [ListController::class, 'tutorList']);
// Change user status (active/inactive)
Route::post('/admin-toogle-status', [EditController::class, 'toggleUser']);

//Verify php settings
//Route::get('/test', function () {
//    phpinfo();
//});
