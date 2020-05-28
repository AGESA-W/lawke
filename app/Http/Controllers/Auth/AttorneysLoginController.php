<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Auth;


class AttorneysLoginController extends Controller
{   
    public function __construct(){
        $this->middleware('guest:attorney',['except'=>['logout']]);

    }
    //Show login form
   public function showLoginForm(){
       return view('attorneys/auth.attorney_login');
   }

   public function Login(Request $request)
   {
        //validation
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        //attempt login the lawyer
        if(Auth::guard('attorney')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember)){
            // if successful redirect to intended location
            return redirect()->intended(route('attorney_dashboard'));

        }

         // if not successful then redirect back to login with form data and error message
        else
        {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
           
            return redirect()->back()->withInput($request->only('email','remember'));
        }

    }


    //Logout the attorney
    public function logout(){
        Auth::guard('attorney')->logout();
  
        return  redirect('/');
    }
    protected function guard()
    {
        return Auth::guard('attorney');
    }


    public function username()
    {
        return 'email';
    }

    
 
  
    

}
