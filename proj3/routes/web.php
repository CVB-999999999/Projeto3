<?php

use App\Http\Controllers\AssignController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CreatePost;
use App\Http\Controllers\StudentPost;

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

// index
Route::get('/', function () {
    return view('index');
});

// contact us page
Route::get('/contactus', function () {
    return view('contactus');
});

// about us page
Route::get('/aboutus', function () {
    $users = User::where('type', 1)
        ->where('active', true)
        ->get();

    return view('aboutUs', ['users' => $users]);
});

// admin dash
Route::get('/admin/dashboard', function () {
    return view('admin.adminDash');
})->middleware('role:2');

// Register
Route::get('/admin/register', [RegisterController::class, 'create'])->middleware('role:2');
Route::post('/admin/register', [RegisterController::class, 'store'])->middleware('role:2');

// Logout
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Login
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');

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
Route::get('/change-password', function () {
    return view('sessions.change-password');
})->middleware('auth');
Route::post('/change-password', [SessionsController::class, 'UpdatePassword'])->middleware('auth');

// Admin Force reset password
Route::post('/admin-change-password', [SessionsController::class, 'resetPasswdAdmin'])->middleware('auth');

// Load All User Related Posts
//Route::get('/userposts', function () {
//    $posts = Post::latest()->with('category', 'author')->get();
//    return view('userposts', ['posts' => $posts, 'categories' => Category::all()]);
//})->middleware('auth');

// User dashboard
Route::get('/dashboard', [StudentPost::class, 'list']);

// View a post
Route::get('/post/{post:slug}', function (Post $post) {
    return view('post', ['post' => $post]);
});

// Broken and not used
// Fetch all posts based on a category Delete?
//Route::get('/categories/{category:slug}', function (Category $category) {
//    return view('userposts', ['posts' => $category->posts->load(['category', 'author']), 'currentCategory' => $category, 'categories' => Category::all()]);
//});

//Route::get('/authors/{author:username}', function (User $author) {
//    return view('userposts', ['posts' => $author->posts->load(['category', 'author']), 'categories' => Category::all()]);
//});

//Route::get('/createpost', [CreatePost::class, 'create']);
//Route::post('/createpost', [CreatePost::class, 'store']);

// Download Files
Route::get('/download/arquivos/{id}', [CreatePost::class, 'download']);

// Upload student file
Route::post('/student/uploadfile', [EditController::class,'editPost']);

// List all students
Route::get('/admin/users', [ListController::class, 'userList'])->middleware('role:2');
// List all tutors
Route::get('/admin/tutors', [ListController::class, 'tutorList'])->middleware('role:2');
// Change user status (active/inactive)
Route::post('/admin-toogle-status', [EditController::class, 'toggleUser'])->middleware('role:2');

// List Assigned categories to tutor
Route::get('/admin/tutors/{user:id}', [ListController::class, 'tutorCatgList']);
// List Assigned categories to student
Route::get('/admin/users/{user:id}', [ListController::class, 'stdCatgList']);

// Edit user Assignments
Route::post('/admin/users/{user:id}/toggle', [EditController::class, 'toggleUserDisc']);
// Edit tutors Assignments
Route::post('/admin/tutors/{user:id}/toggle', [EditController::class, 'toggleTutorDisc']);

// Edit Categories
Route::get('/admin/disciplines', [ListController::class, 'catgList'])->middleware('role:2');
// Disable Category
Route::post('/admin/disciplines', [EditController::class, 'toggleCatg'])->middleware('role:2');

// Assign Category Tutor
Route::get('/admin/tutors/{user:id}/assign', [AssignController::class, 'tutorAsgView']);
Route::post('/admin/tutors/assign', [AssignController::class, 'assignTutor']);
// Assign Category Student
Route::get('/admin/users/{user:id}/assign', [AssignController::class, 'userAsgView']);
Route::post('/admin/users/assign', [AssignController::class, 'assignUser']);

// Create Category
Route::get('/admin/create/discipline', function () {
    return view('admin.addCatg');
})->middleware('role:2');
Route::post('/admin/create/discipline', [RegisterController::class, 'createDisc'])->middleware('role:2');

// Tutor Dashboard
Route::get('/tutor/dashboard', [ListController::class, 'tutorAsgList'])->middleware('role:1');

// View students assigned to a tutor
Route::get('/tutor/assignment/{registration:id}', [ListController::class, 'tutorAssigment']);

// tutor Create Post
Route::post('/tutor/createpost', [CreatePost::class, 'createPost']);
Route::post('/tutor/createpost/save', [CreatePost::class, 'storePost']);

// Assign grade to student
Route::post('/tutor/grade', [CreatePost::class, 'changeGrade']);
