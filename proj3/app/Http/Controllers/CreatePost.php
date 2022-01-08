<?php

namespace App\Http\Controllers;

use App\Mail\NewPost;
use App\Mail\PostGraded;
use App\Mail\ToggleTutorCatgStatus;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Registration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Response;

class CreatePost extends Controller
{
    // -----------------------------------------------------------------------------------------------------------------
    // Create a post but with all students listed (view) (old)
    // -----------------------------------------------------------------------------------------------------------------
    public function create()
    {
//        Get tutor name
        $userId = auth()->id();

        // Get tutor data
        $user = User::where('id', $userId)
            ->where('type', 1)
            ->firstOrFail();


        $query = DB::table('tutoring')
            ->join('categories', 'tutoring.categoryId', '=', 'categories.id')
            ->where('tutorId', '=', $userId)
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

        return view('tutor.createpost', ['categories' => $categories, 'alunos' => $alunos]);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Create a post for a student (view)
    // -----------------------------------------------------------------------------------------------------------------
    public function createPost()
    {
        $attributes = request()->validate([
            'id' => 'required'
        ]);

        $student = DB::table('registrations')
            ->join('users', 'registrations.userId', '=', 'users.id')
            ->where('registrations.id', '=', $attributes['id'])
            ->get();

        if ($student->isEmpty()) {
            return back()->with('error', 'An error occurred');
        }

        return view('tutor.createP', ['student' => $student[0], 'regId' => $attributes['id']]);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Store the data for a Student
    // -----------------------------------------------------------------------------------------------------------------
    public function storePost()
    {
        //  Verify attributes
        $attributes = request()->validate([
            'title' => 'required',
            'arquivo' => 'required|mimes:pdf,jpg,png,jpeg,zip',
            'body' => 'required',
            'registration_id' => 'required',
            'date' => 'required|date'
        ]);
        
        // Verify if ids are valid
        $reg = Registration::where('id', $attributes['registration_id'])->firstOrFail();

        // Verify if tutor = login user
        if ($reg->tutorId != auth()->id()) {
            return redirect('/tutor/dashboard')->with('error', 'An error occurred');
        }

        // Save file and get path
        $attributes['arquivo'] = request()->file('arquivo')->store('arquivos');

        // Save data
        Post::create([
            'title' => $attributes['title'],
            'arquivo' => $attributes['arquivo'],
            'body' => $attributes['body'],
            'registration_id' => $attributes['registration_id'],
            'slug' => md5($attributes['title'] . time()),
            'submit_date' => date("Y-m-d H:i:s", strtotime($attributes['date'])),
            'fileName' => request()->file('arquivo')->getClientOriginalName()
        ]);

        // Get user email
        $mail = User::where('id', $reg->userId)
            ->first();

        // Get discipline name
        $disc = Category::where('id', $reg->categoryId)
            ->first();

        // Send the email
        Mail::to($mail->email)->queue(new NewPost($disc->name, $attributes['title'], date("d-m-Y H:i", strtotime($attributes['date']))));

        return redirect('/tutor/dashboard');
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Store the data (old)
    // -----------------------------------------------------------------------------------------------------------------
    public function store()
    {
        $userId = auth()->id();
        $path = request()->file('arquivo')->store('arquivos');
        //dd(request()->all());
        $attributes = request()->validate([
            'title' => 'required',
            'arquivo' => 'required',
            'body' => 'required',
            'aluno_id' => 'required',
            'category_id' => 'required'
        ]);

        array_push($attributes, ["slug" => "cenas"]);

        ddd($attributes);


        $alunoId = $attributes['aluno_id'];
        $catId = $attributes['category_id'];
        $query = DB::table('registrations')
            ->join('users', 'registrations.userId', '=', 'users.id')
            ->where('tutorId', '=', $userId, 'and', 'userId', '=', $alunoId, 'and', 'categoryId', '=', $catId)
            ->select('registrations.id');

        $registration = Registration::whereIn('id', $query)
            ->firstOrFail();

        $attributes['registration_id'] = $registration->id;
        $attributes['user_id'] = auth()->id();
        $attributes['arquivo'] = request()->file('arquivo')->store('arquivos');


        Post::create($attributes);
        return redirect('/');

    }

    // -----------------------------------------------------------------------------------------------------------------
    // Change Grade
    // -----------------------------------------------------------------------------------------------------------------
    public function changeGrade()
    {
        // verify attributes
        $attributes = request()->validate([
            'grade' => 'required',
            'id' => 'required'
        ]);

        // Verify if grade is valid
        if ($attributes['grade'] < 0 || $attributes['grade'] > 20) {
            return back()->with('error', 'Grade can only be between 0 and 20');
        }

        // Update grade
        $post = Post::find($attributes['id']);
        $post->grade = $attributes['grade'];
        $post->save();

        // Get userId
        $reg = Registration::where('id', $post->registration_id)
            ->first();

        // Get user email
        $mail = User::where('id', $reg->userId)
            ->first();

        // Send the email
        Mail::to($mail->email)->queue(new PostGraded($post->title, $attributes['grade']));

        return back()->with('success', 'Grade submitted successfully');
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Download Files
    // -----------------------------------------------------------------------------------------------------------------
    public function download($id)
    {
        return Response::download(storage_path('app/public/arquivos/' . $id));
    }
}
