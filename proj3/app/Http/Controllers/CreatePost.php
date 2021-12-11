<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CreatePost extends Controller
{
    public function create()
    {
//        Get tutor name
//        $user = User::where('id', $userId)
//            ->where('type', 1)
//            ->firstOrFail();


        $query = DB::table('tutoring')
            ->join('categories', 'tutoring.categoryId', '=', 'categories.id')
            ->where('tutorId', '=', 1 /* alterar para userId np futuro */)
            ->select('categories.id');

        $categories = Category::whereIn('id', $query)
            ->where('active', '=', true)
            ->get();

//        ddd($categories);

        return view('createpost', ['categories' => $categories]);
    }
    public function store()
    {
            $path = request()->file('arquivo')->store('arquivos');

            $attributes = request()->validate([
                'title' => 'required',
                'arquivo' => 'required',
                'body' => 'required',
                'slug' => 'required',
                'excerpt' => 'required',
                'category_id' => 'required',
            ]);
            $attributes['user_id'] = auth()->id();
            $attributes['arquivo'] = request()->file('arquivo')->store('arquivos');
            Post::create($attributes);

            return redirect('/');

    }
}
