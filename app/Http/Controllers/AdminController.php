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


    //displaying user data
    public function usersData()
    {   
        $users=User::orderBy('created_at','asc')->paginate(5);
        return view('admin.users')->with('users',$users);
        
    } 


    //updating the user
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'mobile' => ['required','min:10', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255'],
           
    
        ]);
            
        // Update the user
        $user= User::find($id);
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->mobile = $request->input('mobile');
        $user->save();

        return back()->with('success',"User has been updated!");
    }

    //specific user details
    public function userdetails($id)
    { 
        $user= User::find($id);
        return view('admin.user_details')->with('user',$user);
    }


    //Delete the user
    public function userDestroy($id){
        $user=User::find($id);
        $user->delete();
        return redirect('/')->with('success','User deleted successfully');
    }

    //display lawyers account information
    public function attorneysaccount()
    {   
        $attorneys=Attorney::orderBy('created_at','asc')->paginate(5);
        return view('admin.attorneys')->with('attorneys',$attorneys);
        
    } 


     //specific lawyer details
     public function attorneydetails($id)
     { 
         $attorney= Attorney::find($id);
         return view('admin.attorney_details')
        ->with('educations',$attorney->educations)
        ->with('locations',$attorney->locations)
         ->with('attorney',$attorney);
     }

    // Update lawyers account information
    public function updateaccount(Request $request,$id)
    { 
        $this->validate($request, [
            'firstname' => ['required','string'],
            'lastname' => ['required','string'],
            'email' => ['required','string',],
            'mobile' => ['required','string',],
        ]);
            
        // Update the location
        $attorney= Attorney::find($id);
        $attorney->firstname = $request->input('firstname');
        $attorney->lastname = $request->input('lastname');
        $attorney->email = $request->input('email');
        $attorney->mobile = $request->input('mobile');
        $attorney->save();

        return back()->with('success',"Account information has been updated!");
    }

    //display lawyers work information
    public function attorneyswork()
    {   
        $locations=Location::orderBy('attorney_id','asc')->paginate(10);
        return view('admin.work')->with('locations',$locations);
    } 

     //update lawyer work info
     public function updatework(Request $request)
     { 
        $work=Location::findOrFail($request->work_id);
        $work->update($request->all());
        return back()->with('success',"work information has been updated!");
     }

    // Display lawyers education information
    public function attorneyseducation()
    {   
        $educations=Education::orderBy('id','asc')->paginate(10);
        return view('admin.education')->with('educations',$educations);
    } 

    //update lawyer education
    public function updateeducation(Request $request)
    { 
        $education=Education::findOrFail($request->education_id);
        $education->update($request->all());
        return back()->with('success',"Education has been updated!");
    }

    // public function attorneyslocation()
    // {   
    //     $users=User::orderBy('created_at','asc')->paginate(5);
    //     return view('admin.location')->with('users',$users);
        
    // } 
    
    
}
