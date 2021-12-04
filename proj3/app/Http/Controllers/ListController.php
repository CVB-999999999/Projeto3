<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function userList() {
        $users = DB::table('users')
            ->where('type', '=', '0')
            ->orderByDesc('updated_at');

        // Search stuff
        if (request('search')) {
            $users->where('name', 'like', '%' . request('search') . '%');
            $users->orWhere('email', 'like', '%' . request('search') . '%');
            $users->orWhere('phone', 'like', '%' . request('search') . '%');
            $users->where('type', '=', '0');
        }

        return view('admin.userlist', ['users' => $users->paginate(20)]);
    }

    public function tutorList() {
        $users = DB::table('users')
            ->where('type', '=', '1')
            ->orderByDesc('updated_at');

        // Search stuff
        if (request('search')) {
            $users->where('name', 'like', '%' . request('search') . '%');
            $users->orWhere('email', 'like', '%' . request('search') . '%');
            $users->orWhere('phone', 'like', '%' . request('search') . '%');
            $users->where('type', '=', '1');
        }

        return view('admin.userlist', ['users' => $users->paginate(20)]);
    }
}
