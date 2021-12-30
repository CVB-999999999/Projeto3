<?php

namespace App\Http\Controllers;

use App\Mail\AdminForceResetPasswd;
use App\Mail\ResetPassword;
use App\Mail\UpdatedProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class SessionsController extends Controller
{
    // Log out
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('logout', 'You have been logged out successfully');
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Load Log in page
    // -----------------------------------------------------------------------------------------------------------------
    public function create()
    {
        return view('sessions.login');
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Log in
    // -----------------------------------------------------------------------------------------------------------------
    public function store()
    {

        // Verify if provided data is valid
        $attributes = request()->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
            'remember' => 'boolean',
        ]);

        // Verifies if the user has been disabled
        if((User::where('email', $attributes['email'])
            ->where('active', '=', '0')
            ->first()) != null ) {
            return back()->with('error', 'Your account has been disabled, please contact the admin');
        }

        // Remember me
        $remember = true;

        // if the value has not been sent remember me turns to false
        if(!array_key_exists('remember', $attributes)) {
            $remember = false;
        }

        // Try to authenticate
        if (Auth::attempt(['email' => $attributes['email'], 'password' => $attributes['password']], $remember)) {
            // Auth success
            return redirect('/')->with('login', 'Welcome Back');
        }

        // Auth Failed
        return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified']);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Reset passwd
    // -----------------------------------------------------------------------------------------------------------------
    public function resetPasswd()
    {
        $attributes = request()->validate(['email' => 'required|exists:users,email']);

        // Generate reset token
        $token = mt_rand(10000000, 99999999);

        DB::table('password_resets')->insert([
            'email' => $attributes['email'],
            'token' => $token,
            'created_at' => now()
        ]);

        Mail::to($attributes['email'])->queue(new ResetPassword($token));

        // Simulate user getting new email
        //return redirect('/')->with('success', $token);
        return redirect('/reset-password')->with('success', 'Please check you email for more information');
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Receives the new password to update DB
    // -----------------------------------------------------------------------------------------------------------------
    public function resetPasswdFinal()
    {
        // Verify inputs
        $attributes = request()->validate([
            'email' => 'required|email|max:255',
            'token' => 'required',
            'password' => ['required', 'max:255', 'min:7']]);

        // Get token data
        $resetData = DB::table('password_resets')
            ->where('email', $attributes['email'])
            ->where('token', $attributes['token'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Verify if query found entry
        if ($resetData->isEmpty()) {
            return back()
                ->withInput()
                ->withErrors(['token' => 'Invalid token or email']);
        }

        // Verify the amount of days the token has
        $difference = date_diff(date_create('now'), date_create($resetData[0]->created_at));

        // Verify if token was created <= 24h ago
        if ($difference->days > 0 || $difference->days < 0) {
            return back()
                ->withInput()
                ->withErrors(['token' => 'Your token has expired or could not be verified']);
        } else if ($difference->days == 0) {
            // Double check if right token
            if ($attributes['token'] == $resetData[0]->token) {
                DB::table('users')
                    ->where('email', $attributes['email'])
                    ->update(['password' => bcrypt($attributes['password']), 'updated_at' => now()]);

                Mail::to($attributes['email'])->queue(new UpdatedProfile());

                return redirect('/')->with('success', 'Your password has been changed');
            }
        }

        // Other errors
        return back()
            ->withInput()
            ->withErrors(['token' => 'Unknown error verifying your token please refresh the page and try again']);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Reset passwd Admin
    // -----------------------------------------------------------------------------------------------------------------
    public function resetPasswdAdmin()
    {
        $attributes = request()->validate(['email' => 'required|exists:users,email']);
        $str = rand();
        $new_password = md5($str);

        $affected = DB::table('users')
            ->where('email', $attributes['email'])
            ->update(['password' => bcrypt($new_password), 'updated_at' => now()]);

        Mail::to($attributes['email'])->queue(new AdminForceResetPasswd($str));

        // Simulate user getting new email
        return back()->with('success', 'The password has been changed successfully');
    }
    // -----------------------------------------------------------------------------------------------------------------
    // Update Passwd
    // -----------------------------------------------------------------------------------------------------------------
    public function UpdatePassword()
    {
        // Verify inputs
        $attributes = request()->validate([
            'NewPassword' => ['required', 'max:255', 'min:7'],
            'OldPassword' => ['required', 'max:255', 'min:7']]);

        $curr_password = $attributes['OldPassword'];
        $new_password = $attributes['NewPassword'];

        if (!Hash::check($curr_password, Auth::user()->getAuthPassword())) {
            return back()
                ->withInput()
                ->withErrors(['OldPassword' => 'Your password does not match the current password']);
        } else {
            $affected = DB::table('users')
                ->where('email', Auth::user()->getEmailForPasswordReset())
                ->update(['password' => bcrypt($new_password), 'updated_at' => now()]);

            Mail::to(Auth::user()->getEmailForPasswordReset())->queue(new UpdatedProfile());

            return redirect('/')->with('success', 'You password has been changed');

        }

    }
}
