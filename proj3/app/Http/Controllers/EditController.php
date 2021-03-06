<?php

namespace App\Http\Controllers;

use App\Mail\AdminForceResetPasswd;
use App\Mail\PostGraded;
use App\Mail\StdSub;
use App\Mail\StdSubTutor;
use App\Mail\ToggleTutorCatgStatus;
use App\Mail\ToggleUsrCatgStatus;
use App\Models\Category;
use App\Models\Post;
use App\Models\Registration;
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

        $mail = User::where('id', $status[0]->userId)
            ->first();

        $disc = Category::where('id', $status[0]->categoryId)
            ->first();

        Mail::to($mail->email)->queue(new ToggleUsrCatgStatus($disc->name, $attributes['active']));

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

        // Get student mail
        $mail = User::where('id', $status[0]->tutorId)
            ->first();

        // Get discipline name
        $disc = Category::where('id', $status[0]->categoryId)
            ->first();

        // Send the mail
        Mail::to($mail->email)->queue(new ToggleTutorCatgStatus($disc->name, $attributes['active']));

        // Return operation status
        return back()->with(['success' => 'Discipline assigment status changed successfully']);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Student upload file
    // -----------------------------------------------------------------------------------------------------------------
    public function editPost()
    {
        // Validate attributes
        $attributes = request()->validate([
            'slug' => 'required',
            'arquivo_aluno' => 'required|mimes:pdf,jpg,png,jpeg,zip'
        ]);

        // Save file and get path
        $attributes['arquivo_aluno'] = request()->file('arquivo_aluno')->store('arquivos');

        // Update file path
        DB::table('posts')
            ->where('slug', $attributes['slug'])
            ->update(['arquivo_aluno' => $attributes['arquivo_aluno'], 'updated_at' => now(), 'submited_date' => now()]);

        // Get registration id
        $p = DB::table('posts')
            ->where('slug', $attributes['slug'])
            ->join('registrations', 'posts.registration_id', '=', 'registrations.id')
            ->select('registrations.id')
            ->first();

        // Get ids from registration
        $r = Registration::where('id', $p->id)->first();

        // Get various data
        $tutor = User::where('id', $r->tutorId)->first();
        $std = User::where('id', $r->userId)->first();
        $disc = Category::where('id', $r->categoryId)->first();

        // Send the email std
        Mail::to($std->email)->queue(new StdSub($disc->name));
        // Send the email tutor
        Mail::to($tutor->email)->queue(new StdSubTutor($disc->name, $std->name, $std->email));

        return back()->with('success', 'File Submitted Successfully');
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Delete Post
    // -----------------------------------------------------------------------------------------------------------------
    public function deletePost($id){
        $query = DB::table('posts')
            ->where('posts.id', '=', $id)
            ->update(['posts.deleted' => true, 'updated_at' => now()]);

        return back()->with('success', 'Post Deleted Successfully');
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Toggle Hide Post
    // -----------------------------------------------------------------------------------------------------------------
    public function hidePost($id, $bol){

        if ($bol) {
            $bol = 0;
        } else {
            $bol = 1;
        }

        $query = DB::table('posts')
            ->where('posts.id', '=', $id)
            ->update(['posts.hidden' => $bol, 'updated_at' => now()]);

        return back()->with('success', 'Post Hidden Status Changed Successfully');
    }
}
