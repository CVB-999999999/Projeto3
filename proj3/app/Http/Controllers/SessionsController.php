<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    // Log out
    public function destroy() {
        auth()->logout();

        return redirect('/')->with('success', 'You have been logged out successfully');
    }

    // Load Log in page
    public function create() {
        return view('sessions.login');
    }

    // Log in
    public function store() {

        // Verify if provided data is valid
        $attributes = request()->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);

        // Try to authenticate
        if(auth()->attempt($attributes)) {
            // Auth success
            return redirect('/')->with('success', 'Welcome Back');
        }

        // Auth Failed
        return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified']);
    }
}
