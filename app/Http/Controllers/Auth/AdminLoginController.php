<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Auth;


class AdminLoginController extends Controller
{   
    public function __construct(){
        $this->middleware('guest:admin',['except'=>['Adminlogout']]);

    }
    //Show login form
   public function showLoginForm(){
       return view('admin/auth.admin_login');
   }

   public function Login(Request $request)
   {
        //validation
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        //attempt login the user
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember)){
            //if successful redirect to intended location
            return redirect()->intended(route('admin.dashboard'));
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


    //Logout the Admin
    public function Adminlogout(){
        Auth::guard('admin')->logout();
  
        return  redirect('/');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }


    public function username()
    {
        return 'email';
    }

    
 
  
    

}
