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
    public function list()
    {
        $userId = auth()->id();
        $query = DB::table('registrations')
            ->join('posts', 'registrations.id', '=', 'posts.registration_id')
            ->where('userId', '=', $userId/* alterar para userId np futuro */)
            ->select('registrations.id');
        
        $posts = Post::whereIn('id', $query)
            ->get();

        return view('userposts', ['posts' => $posts,'categories' => Category::all()]);
    }
}
