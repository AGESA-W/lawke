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
            'to' => ['required'],
            'from' => ['required'],
            'description' => ['required','string','min:75'],
           
        ]);

        //create new Attorney
        $message= new AttorneyMessage;
        $message->to = $request->input('to');
        $message->from = $request->input('from');
        $message->description = $request->input('description');
        $message->save();
 
      return redirect()->back()->with('success', 'Message sent Successfully');

    }
}
