<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\User;
use App\Mail\WelcomeNew;

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
     * @param  RegistrationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrationRequest $request)
    {
        // Create user
        $user = User::create(
            $request->validated()
        );

        // login user
        auth()->login($user);

        // send welcome email
        // \Mail::to($user)->send( new WelcomeNew($user) );

        // redirect user to home page
        return redirect()->home();
    }
}
