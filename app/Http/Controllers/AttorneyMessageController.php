<?php

namespace App\Http\Controllers;

use App\AttorneyMessage;
use App\Attorney;
use Illuminate\Http\Request;

class AttorneyMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    Public function getMessageForm($id){
        
        $attorney=Attorney::find($id);
    
        return view('attorneys/messages.message_form')->with('attorney', $attorney);
     
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            // 'message_id'=>['required'],
            'attorney_id' => ['required'],
            'user_id' => ['required'],
            'description' => ['required','string'],
           
        ]);

        //create new Attorney Message
        $message= new AttorneyMessage;
        $message->attorney_id = $request->input('attorney_id');
        $message->user_id = $request->input('user_id');
        // $message->message_id = $request->input('message_id');
        $message->description = $request->input('description');
        $message->save();
 
      return back()->with('success', 'Message sent Successfully');

    }

}
