<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }

    // Create the user
    public function store() {
        // return request()->all();

        // Validate request atributes
        $attributes = request()->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required', 'max:255', 'min:7'],
        ]);

        // dd('Validation success');

        // Encrypt password
        $attributes['password'] = bcrypt($attributes['password']);

        // Insert in BD
        $user = User::create($attributes);

        // Login
        auth()->login($user);

        // Success Message
        session()->flash('success', 'A new account has been created');

        // Redirect
        return redirect('/');
    }
}
