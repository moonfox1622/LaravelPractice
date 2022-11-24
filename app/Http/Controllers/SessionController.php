<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    //登入頁面
    public function create()
    {
        return view('session.create');
    }

    //登入:Session
    public function store()
    {

        $attr = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!auth()->attempt($attr)) {
            throw ValidationException::withMessages([
                'email' => 'Your provideed credentials could not be verified.'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');
    }

    //登出
    public function destory()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
