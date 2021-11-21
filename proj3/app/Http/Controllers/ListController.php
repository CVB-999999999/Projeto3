<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function userList() {
        $users = DB::table('users');

        // Search stuff
        if (request('search')) {
            $users->where('name', 'like', '%' . request('search') . '%');
            $users->orWhere('email', 'like', '%' . request('search') . '%');
            $users->orWhere('phone', 'like', '%' . request('search') . '%');
        }

        return view('userlist', ['users' => $users->get()]);
    }
}
