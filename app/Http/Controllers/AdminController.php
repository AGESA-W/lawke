<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Attorney;
use App\Education;
use App\Location;
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

    public function usersData()
    {   
        $users=User::orderBy('created_at','asc')->paginate(5);
        return view('admin.users')->with('users',$users);
        
    } 
    public function attorneysaccount()
    {   
        $attorneys=Attorney::orderBy('created_at','asc')->paginate(5);
        return view('admin.attorneys')->with('attorneys',$attorneys);
        
    } 

    public function attorneyswork()
    {   
        $locations=Location::orderBy('attorney_id','asc')->paginate(10);
        return view('admin.work')->with('locations',$locations);
        
    } 
    
    public function attorneyseducation()
    {   
        $educations=Education::orderBy('id','asc')->paginate(10);
        return view('admin.education')->with('educations',$educations);
        
    } 
    // public function attorneyslocation()
    // {   
    //     $users=User::orderBy('created_at','asc')->paginate(5);
    //     return view('admin.location')->with('users',$users);
        
    // } 
    
    
}
