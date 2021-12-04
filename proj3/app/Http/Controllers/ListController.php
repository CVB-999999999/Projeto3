<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    // -----------------------------------------------------------------------------------------------------------------
    // List all students
    // -----------------------------------------------------------------------------------------------------------------
    public function userList() {
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
    public function tutorList() {
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
    public function catgList() {
        $catgs = DB::table('categories')
            ->orderByDesc('active')
            ->orderByDesc('updated_at');

        return view('admin.editCateg', ['catgs' => $catgs->paginate(20)]);
    }
}
