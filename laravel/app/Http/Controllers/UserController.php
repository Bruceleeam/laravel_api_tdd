<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all(); 

        return response($users);
    }

    public function show(User $user_id)
    {
        return response($user_id);

    }
}
