<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view("auth.register");
    }

    public function store()
    {
        $validatedAttrbiutes = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(6), 'confirmed'],
        ]);

        $user = User::create($validatedAttrbiutes);

        Auth::login($user);

        return redirect("/jobs");
    }
}
