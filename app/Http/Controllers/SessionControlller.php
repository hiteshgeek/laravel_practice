<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionControlller extends Controller
{
    public function create()
    {
        return view("auth.login");
    }

    public function store()
    {
        $validatedAttrbiutes = request()->validate([
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required'],
        ]);
    }

    public function destroy()
    {
        Auth::logout();

        return redirect("/");
    }
}
