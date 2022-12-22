<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', ['title' => 'Login']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        $logged = Auth::attempt($validated);

        if ($logged)
        {
            return redirect()->intended('/');
        }
        else
        {
            return back()->with('error_login', 'Usuário ou senha incorreto');
        }

    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->back();
    }
}
