<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attr = request()->validate([
            'name' => ['required', 'max:20', 'min:3'],
            'username' => ['required', 'max:20', 'min:3', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'max:20', 'min:7']
        ]);

        $user = User::create($attr);
        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created');
    }
}
