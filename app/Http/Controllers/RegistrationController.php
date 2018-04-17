<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate request
        $validatedData = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        // Create user
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);

        // login user
        auth()->login($user);

        // redirect user to home page
        return redirect()->home();
    }
}
