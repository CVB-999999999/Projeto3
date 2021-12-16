<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Response;

class StudentPost extends Controller
{
    // -----------------------------------------------------------------------------------------------------------------
    // List all posts for a student
    // -----------------------------------------------------------------------------------------------------------------
    public function list()
    {
        $userId = auth()->id();
        $res = [];
        $res1 = [];

        // Get all post id from the registrations for a student
        $query = DB::table('registrations')
            ->join('posts', 'registrations.id', '=', 'posts.registration_id')
            ->where('userId', '=', $userId);

        // Get all posts
        $posts = Post::whereIn('id', $query->select('posts.id'))
            ->orderByDesc('created_at');

        $categories = Category::whereIn('id', $query->select('registrations.categoryId'));

        // Search stuff, title and filename
        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');
            $posts->orWhere('fileName', 'like', '%' . request('search') . '%');
        }

        // Show only a given category
        if (request('discipline')) {
            $catgId = Category::where('name', request('discipline'))->firstOrFail();

            $query->where('categoryId', 'like', '%' . $catgId->id . '%');
            $posts = Post::whereIn('id', $query->select('posts.id'));
        }

        foreach ($posts->paginate() as $post) {
            $query1 = DB::table('registrations')
                ->join('users', 'users.id', '=', 'registrations.tutorId')
                ->where('registrations.id', $post->registration_id)
                ->first();

            $query2 = DB::table('registrations')
                ->join('categories', 'categories.id', '=', 'registrations.categoryId')
                ->where('registrations.id', $post->registration_id)
                ->first();

            array_push($res, $query1);
            array_push($res1, $query2);
        }

        return view('userposts', ['posts' => $posts->paginate(), 'categories' => $categories->get(), 'tutors' => $res, 'catgs' => $res1]);
    }
}
