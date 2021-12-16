<?php

namespace App\Http\Controllers;

use App\Mail\AdminForceResetPasswd;
use App\Models\User;
use App\Mail\ResetPassword;
use App\Mail\StatusToggle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EditController extends Controller
{
    // -----------------------------------------------------------------------------------------------------------------
    // Toggle User Status
    // -----------------------------------------------------------------------------------------------------------------
    public function toggleUser() {
        // Verify if email is valid
        $attributes = request()->validate([
            'email' => 'required|email|max:255',
            'active' => 'required|boolean'
        ]);

        // Get current user status
        $status = DB::table('users')
            ->where('email', $attributes['email'])
            ->get();

        // Verify if user is in DB
        if ($status->isEmpty()) {
            return redirect('/admin/users')->with(['error' => 'Could not find the requested user']);
        }

        // Verify if user hasn't already been changed
        if ($status[0]->active != $attributes['active']) {
            return redirect('/admin/users')->with(['error' => 'User status has already been changed']);
        }

        // Change user status
        $active = true;

        if ($attributes['active']) {
            $active = false;
        }

        // Update DB
        DB::table('users')
            ->where('email', $attributes['email'])
            ->update(['active' => $active, 'updated_at' => now()]);

        Mail::to($attributes['email'])->queue(new StatusToggle($active));

        // Return operation status
        return redirect('/admin/users')->with(['success' => 'Users status updated successfully']);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Toggle Category Status
    // -----------------------------------------------------------------------------------------------------------------
    public function toggleCatg() {
        // Verify if slug is valid
        $attributes = request()->validate([
            'slug' => 'required|exists:categories,slug|max:255',
            'active' => 'required|boolean'
        ]);

        // Get current Category status
        $status = DB::table('categories')
            ->where('slug', $attributes['slug'])
            ->get();

        // Verify if category is in DB
        if ($status->isEmpty()) {
            return back()->with(['error' => 'Could not find the requested user']);
        }

        // Verify if category hasn't already been changed
        if ($status[0]->active != $attributes['active']) {
            return back()->with(['error' => 'User status has already been changed']);
        }

        // Change category status
        $active = true;

        if ($attributes['active']) {
            $active = false;
        }

        // Update DB
        DB::table('categories')
            ->where('slug', $attributes['slug'])
            ->update(['active' => $active, 'updated_at' => now()]);

        // Return operation status
        return back()->with(['success' => 'Discipline Status Changed Successfully']);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Toggle User discipline enrollment Status
    // -----------------------------------------------------------------------------------------------------------------
    public function toggleUserDisc() {
        // Verify if id is valid
        $attributes = request()->validate([
            'id' => 'required|exists:registrations,id',
            'active' => 'required|boolean'
        ]);

        // Get current Category status
        $status = DB::table('registrations')
            ->where('id', $attributes['id'])
            ->get();

        // Verify if category is in DB
        if ($status->isEmpty()) {
            return back()->with(['error' => 'Could not find the requested enrollment']);
        }

        // Verify if category hasn't already been changed
        if ($status[0]->active != $attributes['active']) {
            return back()->with(['error' => 'Discipline enrollment status has already been changed']);
        }

        // Change category status
        $active = true;

        if ($attributes['active']) {
            $active = false;
        }

        // Update DB
        DB::table('registrations')
            ->where('id', $attributes['id'])
            ->update(['active' => $active, 'updated_at' => now()]);

        // Return operation status
        return back()->with(['success' => 'Discipline enrollment Status Changed Successfully']);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Toggle Tutor discipline enrollment Status
    // -----------------------------------------------------------------------------------------------------------------
    public function toggleTutorDisc() {
        // Verify if id is valid
        $attributes = request()->validate([
            'id' => 'required|exists:tutoring,id',
            'active' => 'required|boolean'
        ]);

        // Get current Category status
        $status = DB::table('tutoring')
            ->where('id', $attributes['id'])
            ->get();

        // Verify if category is in DB
        if ($status->isEmpty()) {
            return back()->with(['error' => 'Could not find the requested enrollment']);
        }

        // Verify if category hasn't already been changed
        if ($status[0]->active != $attributes['active']) {
            return back()->with(['error' => 'Discipline association status has already been changed']);
        }

        // Change category status
        $active = true;

        if ($attributes['active']) {
            $active = false;
        }

        // Update DB
        DB::table('tutoring')
            ->where('id', $attributes['id'])
            ->update(['active' => $active, 'updated_at' => now()]);

        // Return operation status
        return back()->with(['success' => 'Discipline association Status Changed Successfully']);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Student upload file
    // -----------------------------------------------------------------------------------------------------------------
    public function editPost()
    {
        $attributes = request()->validate([
            'slug' => 'required',
            'arquivo_aluno' => 'required'
        ]);

        $attributes['arquivo_aluno'] = request()->file('arquivo_aluno')->store('arquivos');

        DB::table('posts')
            ->where('slug', $attributes['slug'])
            ->update(['arquivo_aluno' => $attributes['arquivo_aluno'], 'updated_at' => now(), 'submited_date' => now()]);

        return back()->with('success', 'File Submitted Successfully');
    }
}
