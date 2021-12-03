<?php

namespace App\Http\Controllers;

use App\Mail\AdminForceResetPasswd;
use App\Mail\NewAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }

    // Create the user
    public function store() {

        // Validate request atributes
        $attributes = request()->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'numeric',
            'type' => 'numeric|min:0|max:1',
        ]);

        $str=rand();

        // Encrypt password
        $attributes['password'] = bcrypt($str);

        // Create username from email
        $prefix = substr($attributes['email'], 0, strrpos($attributes['email'], '@'));

        $username = array('username'=>$prefix);

        $attributes = array_merge($attributes, $username);

        // Insert in BD
        $user = User::create($attributes);

        // Login the user (testing only)
        //auth()->login($user);

        // Success Message
        session()->flash('success', 'A new account has been created');

        Mail::to($attributes['email'])->queue(new NewAccount($str));

        // Redirect
        return redirect('/admin/dashboard');
    }
}
