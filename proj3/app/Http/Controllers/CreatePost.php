<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Response;

class CreatePost extends Controller
{
    public function create()
    {
//        Get tutor name
        $userId = auth()->id();
        $user = User::where('id', $userId)
            ->where('type', 1)
            ->firstOrFail();


        $query = DB::table('tutoring')
            ->join('categories', 'tutoring.categoryId', '=', 'categories.id')
            ->where('tutorId', '=', $userId/* alterar para userId np futuro */)
            ->select('categories.id');

        $categories = Category::whereIn('id', $query)
            ->where('active', '=', true)
            ->get();
        
        $query2 = DB::table('registrations')
            ->join('users', 'registrations.userId', '=', 'users.id')
            ->where('tutorId', '=', $userId/* alterar para userId np futuro */)
            ->select('users.id');
        
        $alunos = User::whereIn('id', $query2)
            ->get();
        
        return view('createpost', ['categories' => $categories, 'alunos' => $alunos]);
    }
    public function store()
    {
            $path = request()->file('arquivo')->store('arquivos');
            //dd(request()->all());
            $attributes = request()->validate([
                'title' => 'required',
                'arquivo' => 'required',
                'body' => 'required',
                'slug' => 'required',
                'registration_id' => 'required',
                'category_id' => 'required'
            ]);
            
            $attributes['user_id'] = auth()->id();
            $attributes['arquivo'] = request()->file('arquivo')->store('arquivos');
            Post::create($attributes);
            
            return redirect('/');
            
    }
    public function download($id)
    {
        return Response::download(storage_path('app/public/arquivos/'.$id));
    }
}