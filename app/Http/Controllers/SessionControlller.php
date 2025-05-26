<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionControlller extends Controller
{
    public function create()
    {
        return view("auth.login");
    }

    public function store()
    {
        $validatedAttributes = request()->validate([
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($validatedAttributes)) {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        request()->session()->regenerate();

        return redirect("/jobs");
    }

    public function destroy()
    {
        Auth::logout();

        return redirect("/");
    }
}
