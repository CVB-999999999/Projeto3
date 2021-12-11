<?php

namespace App\Http\Controllers;

use App\Mail\AdminForceResetPasswd;
use App\Mail\NewAccount;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    //------------------------------------------------------------------------------------------------------------------
    // Return view to register the user
    //------------------------------------------------------------------------------------------------------------------
    public function create()
    {
        return view('register.create');
    }

    //------------------------------------------------------------------------------------------------------------------
    // Create the user
    //------------------------------------------------------------------------------------------------------------------
    public function store()
    {

        // Validate request atributes
        $attributes = request()->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'numeric',
            'type' => 'numeric|min:0|max:1',
        ]);

        // Generate Passwd
        $str = rand();

        // Encrypt password
        $attributes['password'] = bcrypt($str);

        // Create username from email
        $prefix = substr($attributes['email'], 0, strrpos($attributes['email'], '@'));

        $username = array('username' => $prefix);

        $attributes = array_merge($attributes, $username);

        // Insert in BD
        $user = User::create($attributes);

        // Success Message
        session()->flash('success', 'A new account has been created');

        // Email credentials to user
        Mail::to($attributes['email'])->queue(new NewAccount($str));

        // Redirect to discipline association/assignment page
        if ($user->type == 0) {
            // Student
            return redirect('/admin/users/' . $user->id);
        } else {
            // Tutor
            return redirect('/admin/tutors/' . $user->id);
        }
    }

    //------------------------------------------------------------------------------------------------------------------
    // Create Category
    //------------------------------------------------------------------------------------------------------------------
    public function createDisc()
    {
        // Validate request atributes
        $attributes = request()->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'slug' => 'required|max:255|unique:categories,slug',
            'grade' => 'max:255|min:1',
        ]);

        // Insert in BD
        Category::create($attributes);

        return redirect('/admin/disciplines')->with('success', 'Discipline Created Successfully');
    }
}
