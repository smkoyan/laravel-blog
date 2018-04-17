<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only(['create', 'store']);
        $this->middleware('auth')->only('destroy');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store() {
        $validatedData = $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ( auth()->attempt($validatedData) ) {
            return redirect()->home();
        }

        return back()->withErrors([
            'message' => 'Wrong email or password'
        ]);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }
}
