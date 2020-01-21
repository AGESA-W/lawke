<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use illuminate\Http\Request;
use Password;
use Auth;

class AttorneysResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/attorney_dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:attorney');
    }

    protected function guard()
    {
        return Auth::guard('attorney');
    }

    protected function broker()
    {
        return Password::broker('attorneys');
    }

     /**
     * Display the password reset view for the given token.
     * If no token is present, display the link request form.
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('attorneys/auth/passwords.attorney_reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
