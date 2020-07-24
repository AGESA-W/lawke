<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\verifyEmail;

use App\Attorney;
use Auth;

class VerifyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:attorney',['except'=>['verify']]);

    }

    public function verify($token){

        $attorney= Attorney::where('token',$token)->firstOrFail()
            ->update(['token' => null]);

            return redirect()
            ->route('attorney_dashboard')
            ->with('success',' Account Verified!');

    }
    public function verifyEmail(){
      
        return view('attorneys/auth.attorneyverify');
    }

    public function resendEmail(Request $request)
    {
        $attorney= Attorney::where('email',$request->email)->first();
        $attorney->sendverificationEmail();
        return back()->with('success','A fresh verification link has been sent to your email.');

    }
}
