<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Attorney;
use App\AttorneyReview;
use App\Message;
use DB;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('admin.admin');
        
        
    } 
    
    
}
