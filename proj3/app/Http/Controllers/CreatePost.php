<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class CreatePost extends Controller
{
    public function create()
    {
        return view('createpost');
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
