<?php

namespace App\Http\Controllers\Auth;

use App\Attorney;
use App\PracticeArea;
use Illuminate\Http\Request;

use App\Notifications\verifyEmail;
use App\Jobs\LawyerRegistrationJob;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class AttorneysRegisterController extends Controller
{
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
            'attorney_id' => ['required'],
            'firstname' => ['required','string','max:255'],
            'lastname' => ['required','string','max:255'],
            'national_id' => ['required','string','min:8','max:8'],
            'license_no' => ['required','string','min:12','max:13'],
            'mobile' => ['required','string','max:255'],
            'gender' => ['required','string','max:255'],
            'image' => ['required','string'],
            'county' => ['required','string'],
            'practice_area' => ['required','string'],
            'email' => ['required','string','email','max:255','unique:attorneys'],
            'password' => ['required','string','min:8','confirmed'],
        ]);


     
        //create new Attorney
        $attorney= new Attorney;
        $attorney->attorney_id = $request->input('attorney_id');
        $attorney->firstname = $request->input('firstname');
        $attorney->lastname = $request->input('lastname');
        $attorney->national_id = $request->input('national_id');
        $attorney->license_no = $request->input('license_no');
        $attorney->mobile = $request->input('mobile');
        $attorney->gender = $request->input('gender');
        $attorney->email = $request->input('email');
        $attorney->image = $request->input('image');
        $attorney->county = $request->input('county');
        $attorney->practice_area = $request->input('practice_area');
        $attorney->password = Hash::make($request->input('password'));

        $attorney->token = str_random(25);
        $attorney->save();

        $attorney->sendverificationEmail();

 
      return redirect('attorney_dashboard')->with('success', 'Account created Successfully');

    }

    public function showRegistrationForm(){
        $practiceareas=PracticeArea::orderBy('id','asc')->distinct()->select('area_practice')->get();
        return view('attorneys/auth.attorney_register')->with('practiceareas',$practiceareas);
    } 

}
