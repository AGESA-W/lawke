<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Attorney;
use Illuminate\Support\Facades\Hash;

class AttorneysRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:attorney');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => ['required','string','max:255'],
            'lastname' => ['required','string','max:255'],
            'national_id' => ['required','string','min:8','max:255'],
            'license_no' => ['required','string','min:12','max:255'],
            'mobile' => ['required','min:10','max:10'],
            'gender' => ['required','string','max:255'],
            'status' => ['required','string','max:255'],
            'about' => ['required'],
            'email' => ['required','string','email','max:255','unique:attorneys'],
            'password' => ['required','string','min:8','confirmed'],
        ]);


      
        //create new Attorney
        $attorney= new Attorney;
        $attorney->firstname = $request->input('firstname');
        $attorney->lastname = $request->input('lastname');
        $attorney->national_id = $request->input('national_id');
        $attorney->license_no = $request->input('license_no');
        $attorney->mobile = $request->input('mobile');
        $attorney->gender = $request->input('gender');
        $attorney->status = $request->input('status');
        $attorney->about = $request->input('about');
        $attorney->email = $request->input('email');
        $attorney->password = Hash::make($request->input('password'));
        $attorney->save();
 
      return redirect('attorney_dashboard')->with('success', 'Account created Successfully');

    }

    public function showRegistrationForm(){
        return view('attorneys/auth.attorney_register');
    } 

}
