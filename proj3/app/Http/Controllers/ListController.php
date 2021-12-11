<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    // -----------------------------------------------------------------------------------------------------------------
    // List all students
    // -----------------------------------------------------------------------------------------------------------------
    public function userList()
    {
        $users = DB::table('users')
            ->where('type', '=', '0')
            ->orderByDesc('updated_at');

        // Search stuff
        if (request('search')) {
            $users->where('name', 'like', '%' . request('search') . '%');
            $users->orWhere('email', 'like', '%' . request('search') . '%');
            $users->orWhere('phone', 'like', '%' . request('search') . '%');
            $users->having('type', '=', '0');
        }

        $type = 'Students';

        return view('admin.userlist', ['type' => $type, 'users' => $users->paginate(20)]);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // List all Tutors
    // -----------------------------------------------------------------------------------------------------------------
    public function tutorList()
    {
        $users = DB::table('users')
            ->where('type', '=', '1')
            ->orderByDesc('updated_at');

        // Search stuff
        if (request('search')) {
            $users->where('name', 'like', '%' . request('search') . '%');
            $users->orWhere('email', 'like', '%' . request('search') . '%');
            $users->orWhere('phone', 'like', '%' . request('search') . '%');
            $users->having('type', '=', '1');
        }

        $type = 'Tutors';

        return view('admin.userlist', ['type' => $type, 'users' => $users->paginate(20)]);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // List all Disciplines (Categories)
    // -----------------------------------------------------------------------------------------------------------------
    public function catgList()
    {
        $catgs = DB::table('categories')
            ->orderByDesc('active')
            ->orderByDesc('updated_at');

        // Search stuff
        if (request('search')) {
            $catgs->where('name', 'like', '%' . request('search') . '%');
            $catgs->orWhere('slug', 'like', '%' . request('search') . '%');
            $catgs->orWhere('grade', 'like', '%' . request('search') . '%');
        }

        return view('admin.editCateg', ['catgs' => $catgs->paginate(20)]);
    }

    // -----------------------------------------------------------------------------------------------------------------
    // List all Tutor Assigned Disciplines
    // -----------------------------------------------------------------------------------------------------------------
    public function tutorCatgList($tutor)
    {
        // Get user data
        $users = DB::table('users')
            ->where('id', '=', $tutor)
            ->having('type', '=', '1')
            ->orderByDesc('updated_at');

        $users = $users->get();
        $arr = array();
        $insc = 0;

        // verifies if a tutor as been found
        if ($users->isEmpty()) {
            $users[0] = 'sad';

            // Gets all assigned catgs
        } else {
            $insc = DB::table('tutoring')
                ->where('tutorId', '=', $tutor)
                ->get();

            // Fetch all categories the tutor is assigned
            foreach ($insc as $inc) {
                $catg = DB::table('categories')
                    ->where('id', '=', $inc->categoryId)
                    ->get();
                array_push($arr, $catg[0]);
            }
        }

        if ($users->isNotEmpty()) {
            return view('admin.tutorCategList', ['users' => $users[0], 'discs' => $arr, 'insc' => $insc]);
        } else {
            return redirect('/')->with('error', 'An error ocurred');
        }
    }

    // -----------------------------------------------------------------------------------------------------------------
    // List all student Assigned Disciplines
    // -----------------------------------------------------------------------------------------------------------------
    public function stdCatgList($std)
    {
        // Get user data
        $users = DB::table('users')
            ->where('id', '=', $std)
            ->having('type', '=', '0')
            ->orderByDesc('updated_at');

        $users = $users->get();
        $arr1 = array();
        $arr2 = array();
        $insc = 0;

        // verifies if a student as been found
        if ($users->isEmpty()) {
            $users[0] = 'sad';

            // Gets all assigned catgs
        } else {
            $insc = DB::table('registrations')
                ->where('userId', '=', $std)
                ->get();

            // Fetch all categories the student is assigned
            foreach ($insc as $inc) {
                $catg = Category::where('id', $inc->categoryId)->get();

                $tutor = User::where('id', $inc->tutorId)
                    ->where('type', 1)
                    ->orderByDesc('updated_at')
                    ->get();

//                echo('<br> <h1> cenas </h1> <br>');
//                var_dump($tutor);

//                If can not find any stuff from the registration
                if ($tutor->isEmpty() || $catg->isEmpty()) {
                    break;
                }

                $catg = $catg[0];
                $tutor = $tutor[0];

                array_push($arr1, $catg);
                array_push($arr2, $tutor);
            }
        }

        if ($users->isNotEmpty()) {
            return view('admin.usersCategList', ['users' => $users[0], 'discs' => $arr1, 'insc' => $insc, 'tutors' => $arr2,]);
        } else {
            return redirect('/')->with('error', 'An error ocurred');
        }
    }
}
