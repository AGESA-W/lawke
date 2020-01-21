<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttorneysController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:attorney');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile(){
        return view('attorneys.profile');
    }


    public function dashboard()
    {
        return view('attorneys.attorney_dashboard');
    }
}
