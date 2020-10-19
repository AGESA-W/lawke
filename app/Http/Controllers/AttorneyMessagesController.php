<?php

namespace App\Http\Controllers;

use App\User;
use App\Attorney;
use App\UserMessages;
use App\AttorneyMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttorneyMessagesController extends Controller
//This messages are created by the client and the belong to the lawyer
{

    public function __construct()
    {
        $this->middleware('auth');

    }

     // display the message form
     public function createMessage(){
        return view('users\messenger.create');
    }

    //from dashboard
    public function storeUserMessage(Request $request ){
        $this->validate($request,[
            'email'=>'email|required|exists:attorneys,email',
            'subject'=>'required',
            'content'=>'required|max:4000',
    
        ]);
        
       
        if($request->email == auth()->user()->email){
            return redirect('/home')->with('error','You cannot send a message to yourself!');

        }
        $attorney=Attorney::where('email',$request->email)->first();
       

        $attorneyMessage = new AttorneyMessages;
        // $attorneyMessage->email =  $request->input('email');
        $attorneyMessage->subject =  $request->input('subject');
        $attorneyMessage->content =  $request->input('content');
        if($request->email == $attorney->email){
            $attorneyMessage->attorney_id = $attorney->id;
        }
        $attorneyMessage->user_id =  $request->input('user_id');
        $attorneyMessage->save();
        
        return redirect('/home/messenger')->with('success','Messsage sent');
    }

     //from lawyers profile
     public function storeMessageProfile(Request $request ){
        $this->validate($request,[
            'email'=>'email|required|exists:attorneys,email',
            'subject'=>'required',
            'content'=>'required|max:4000',
    
        ]);
        
       
        if($request->email == auth()->user()->email){
            return redirect('/home')->with('error','You cannot send a message to yourself!');

        }
        $attorney=Attorney::where('email',$request->email)->first();
       

        $attorneyMessage = new AttorneyMessages;
        // $attorneyMessage->email =  $request->input('email');
        $attorneyMessage->subject =  $request->input('subject');
        $attorneyMessage->content =  $request->input('content');
        if($request->email == $attorney->email){
            $attorneyMessage->attorney_id = $attorney->id;
        }
        $attorneyMessage->user_id =  $request->input('user_id');
        $attorneyMessage->save();
        
        return redirect( route('profile',$attorney->id))->with('success','Messsage sent');
    }


    public function index(){
        $attorneyMessages=AttorneyMessages::where('user_id',Auth::id())->orderby('created_at', 'desc')->get();
        $userMessages=UserMessages::where('user_id',Auth::id())->orderby('created_at', 'desc')->get();
        // dd($userMessages);
        return view('users\messenger.index')
        ->with('attorneyMessages',$attorneyMessages)
        ->with('userMessages',$userMessages);
        
    }


    //Show the lawyers inbox
    public function showUserInbox(){
        $user_id= Auth::id();
        $user=User::findOrFail($user_id);

        $userMessages=UserMessages::where('user_id',$user_id)->orderby('created_at','desc')->paginate(10);

        return view('users\messenger.inbox')
        ->with('userMessages',$userMessages);
        
    }

    //show individual message
    public function showMessage($id){
        $user_id= Auth::id();
        $user=User::findOrFail($user_id);

        $message=UserMessages::findOrFail($id);
        return view('users\messenger.show')
        ->with('message',$message)
        ->with('userMessages',$user->userMessages->load('attorney'));
    }


    // reply to message page
    public function replyMessage($id){
        $message=UserMessages::findOrFail($id);
        // dd($message);
        return view('users\messenger.reply')->with('message',$message);
    }
    
    // post the reply
    public function storeReply(Request $request){

        $this->validate($request,[
            'subject'=>'required',
            'content'=>'required',
            'replied_id'=>'required',
            'attorney_id'=>'required',
        ]);
        
        $userMessage = new AttorneyMessages;
        $userMessage->subject =  $request->input('subject');
        $userMessage->content =  $request->input('content');
        $userMessage->replied_id = $request->input('replied_id');
        $userMessage->user_id = $request->input('user_id');
        $userMessage->attorney_id = $request->input('attorney_id');
        $userMessage->save();
        
        return redirect('/home/messenger/inbox')->with('success','Your reply has been sent');
    }

    public function showOutbox(){
        $attorneyMessages = AttorneyMessages::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

            $user_id= Auth::id();
            $user=User::findOrFail($user_id);

        return view('users\messenger.outbox')->with('attorneyMessages',$user->attorneyMessages->load('attorney'));
    }

      // show outbox message
      public function showOutboxMessage($id){
        $user_id= Auth::id();
        $user=User::findOrFail($user_id);

        $message=AttorneyMessages::findOrFail($id);
        return view('users\messenger.showOutbox')
        ->with('message',$message)
        ->with('userMessages',$user->attorneyMessages->load('attorney'));
    }

    public function destroy( $id){
        $message = AttorneyMessages::findOrFail($id);
        $message->delete();
        return back()->with('success','Messsage Deleted');       

    }
}
