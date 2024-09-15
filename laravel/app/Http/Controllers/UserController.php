<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();

        return response($users);
    }

    public function show(User $user)
    {
        return response($user);
    }

    public function store(UserRequest $request)
    {
        return User::create($request->all());
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ]
        ]);

        $user->update($request->all());
        return response($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response('', Response::HTTP_NO_CONTENT);
    }

}
