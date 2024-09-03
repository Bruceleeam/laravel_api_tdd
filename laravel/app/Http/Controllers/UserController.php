<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'password' => [
                'required',
                'string',
                'min:8',             // Minimo 8 caratteri
                'regex:/[a-z]/',     // Deve contenere almeno una lettera minuscola
                'regex:/[A-Z]/',     // Deve contenere almeno una lettera maiuscola
                'regex:/[0-9]/',     // Deve contenere almeno un numero
                'regex:/[@$!%*#?&]/' // Deve contenere almeno un carattere speciale
            ]
        ]);

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
