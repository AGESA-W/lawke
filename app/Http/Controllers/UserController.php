<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
   

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

        return redirect('/admin')->with('success',"User has been updated!");
    }
  
    
    
    
    
    
}
