<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMessage;

class UserMessageController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'attorney_id' => ['required'],
            'user_id' => ['required'],
            'message_id' => ['required'],
            'description' => ['required','string'],
           
        ]);

        //create new Attorney Message
        $usermessage= new UserMessage;
        $usermessage->attorney_id = $request->input('attorney_id');
        $usermessage->user_id = $request->input('user_id');
        $usermessage->message_id = $request->input('message_id');
        $usermessage->description = $request->input('description');
        $usermessage->save();
            
        return redirect()->intended(route('attorney_dashboard'))->with('success', 'Message sent Successfully');
    
}
}
