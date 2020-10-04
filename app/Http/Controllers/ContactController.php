<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ContactEmailJob;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{

    public $data;
    public function getSupport(){
        return view('contact.support');
    }
    public function postSupport(Request $request){
        $this->validate($request,[
        'email' => 'required|email',
        'subject' => 'required|max:255|min:5',
        'description' => 'required|max:400|min:15'
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodydescription' => $request->description
        );

        Mail::send('emails.contact',$data, function($message) use ($data){
            $message->to('info@legalmeet.com');
            $message->from( $data['email']);
            $message->subject( $data['subject']);
        });

        // dispatch(new ContactEmailJob ($data));

        // Session::flash('success','Mail Sent!!');
        return back()->with('success','Your message has been sent');
        
    }

    /***lawyers */
    public function contact(){
        return view('contact\lawyers.contacting');
    }

    public function resetPassword(){
        return view('contact\lawyers.resetPassword');
    }

    public function information(){
        return view('contact\lawyers.lawyersInformation');
    }

    public function reviewContacts(){
        return view('contact\lawyers.reviewsContact');
    }

    /***clients */
    public function contactClient(){
        return view('contact\clients.contacting');
    }

    public function review(){
        return view('contact\clients.myReview');
    }

    public function search(){
        return view('contact\clients.searchLawyer');
    }

    public function message(){
        return view('contact\clients.sendMessage');
    }

//    post new request
    
}
