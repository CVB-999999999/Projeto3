<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Registration;
use App\Models\Tutoring;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignController extends Controller
{
    // -----------------------------------------------------------------------------------------------------------------
    // Show tutor assigment page
    // -----------------------------------------------------------------------------------------------------------------
    public function tutorAsgView($userId)
    {
        // Verifies if user exists, if not throws 404 page
        $user = User::where('id', $userId)
            ->where('type', 1)
            ->firstOrFail();

        $query = DB::table('tutoring')
            ->join('categories', 'tutoring.categoryId', '=', 'categories.id')
            ->where('tutorId', '=', $userId)
            ->select('categories.id');

        // Get categories to display
        $categories = Category::whereNotIn('id', $query)
            ->where('active', '=', true)
            ->get();
        $assign = Category::whereIn('id', $query)->get();

        return view('admin.tutorCatgAdd', ['user' => $user, 'discs' => $categories, 'assigns' => $assign]);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Show student assigment page
    // -----------------------------------------------------------------------------------------------------------------
    public function userAsgView($userId)
    {
        // Chosen disicpline in stage 2
        $value = null;

        // Verifies if user exists, if not throws 404 page
        $user = User::where('id', $userId)
            ->where('type', 0)
            ->firstOrFail();

        $query = DB::table('registrations')
            ->join('categories', 'registrations.categoryId', '=', 'categories.id')
            ->where('userId', '=', $userId)
            ->select('categories.id');

        // Get categories to display
        $categories = Category::whereNotIn('id', $query)
            ->where('active', '=', true)
            ->get();
        $assign = Category::whereIn('id', $query)->get();

        $tList = $assign;

        // Stage 2 (choosing the tutor for a discipline)
        if (request('discipline')) {
            $value = Category::find(request('discipline'));

            $tList = DB::table('tutoring')
                ->join('users', 'tutoring.tutorId', '=', 'users.id')
                ->where('type', '=', 1)
                ->where('users.active', '=', true)
                ->where('categoryId', '=', request('discipline'))
                ->select('name', 'users.id')
                ->get();
        }

        return view('admin.userCatgAdd', ['user' => $user, 'discs' => $categories, 'assigns' => $assign,
            'value' => $value, 'tList' => $tList]);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Assign a discipline to a tutor
    // -----------------------------------------------------------------------------------------------------------------
    public function assignTutor()
    {
        // Verify if ids are valid
        $attributes = request()->validate([
            'user' => 'required|exists:users,id',
            'disc' => 'required|exists:categories,id'
        ]);

        // Verify if the assigment has already been done
        $ver = Tutoring::where('tutorId', $attributes['user'])
            ->where('categoryId', $attributes['disc'])
            ->get();

        if ($ver->isEmpty()) {
            $tutor = Tutoring::create([
                'tutorId' => $attributes['user'],
                'categoryId' => $attributes['disc']
            ]);
            return redirect('/admin/tutors');
        } else {
            return back()->with(['error' => 'Discipline association has already been created']);
        }
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Assign a discipline to a student
    // -----------------------------------------------------------------------------------------------------------------
    public function assignUser()
    {
        // Verify if ids are valid
        $attributes = request()->validate([
            'user' => 'required|exists:users,id',
            'disc' => 'required|exists:categories,id',
            'tutor' => 'required|exists:users,id'
        ]);

        // Verify if the assigment has already been done
        $ver = Registration::where('tutorId', $attributes['tutor'])
            ->where('categoryId', $attributes['disc'])
            ->where('userid', $attributes['user'])
            ->get();

        if ($ver->isEmpty()) {
            $tutor = Registration::create([
                'tutorId' => $attributes['tutor'],
                'categoryId' => $attributes['disc'],
                'userId' => $attributes['user']
            ]);
            return redirect('/admin/users');
        } else {
            return back()->with(['error' => 'Discipline association has already been created']);
        }
    }
}
