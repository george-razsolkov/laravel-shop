<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function showUsers() {
        $users = User::get()->toArray();
        if (isset($users) && !empty($users))
            return view('users')->withUsers($users);

        return view('error');

    }
}
