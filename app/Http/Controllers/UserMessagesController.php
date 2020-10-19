<?php

namespace App\Http\Controllers;

use App\User;
use App\Attorney;
use App\UserMessages;
use App\AttorneyMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserMessagesController extends Controller
// Thsis are messages created by the lawyer and they belong to the user
{
    public function __construct()
    {
        $this->middleware('auth:attorney');

    }

    public function index(){
        $attorneyMessages=AttorneyMessages::where('attorney_id',Auth::id())->orderby('created_at', 'desc')->get();
        $userMessages=UserMessages::where('attorney_id',Auth::id())->orderby('created_at', 'desc')->get();
     

        return view('attorneys\messenger.index')
        ->with('attorneyMessages',$attorneyMessages)
        ->with('userMessages',$userMessages);
        
    }

    // display the message form
    public function createMessage(){
        return view('attorneys\messenger.create');
    }

    //Show the lawyers inbox
    public function showInbox(){
        $attorney_id= Auth::id();
        $attorney=Attorney::findOrFail($attorney_id);

        $attorneyMessages=AttorneyMessages::where('attorney_id',$attorney_id)->orderby('created_at','desc')->paginate(10);
           


        return view('attorneys\messenger.inbox')
        ->with('attorneyMessages',$attorneyMessages);
        
    }

    //show individual message
    public function showMessage($id){
        $attorney_id= Auth::id();
        $attorney=Attorney::findOrFail($attorney_id);

        $message=AttorneyMessages::findOrFail($id);

        $replyMessages=UserMessages::where('replied_id',$message->id)->get();
        
        // $userReplyMessages=AttorneyMessages::where('subject','=',$message->subject)->get();

      
        
        return view('attorneys\messenger.show')
        ->with('message',$message)
        ->with('replyMessages',$replyMessages)
        // ->with('userReplyMessages',$userReplyMessages)
        ->with('attorneyMessages',$attorney->attorneyMessages->load('user'));
    }


    // reply to message page
    public function replyMessage($id){
        $message=AttorneyMessages::findOrFail($id);
        return view('attorneys\messenger.reply')->with('message',$message);
    }
    
    // post the reply
    public function storeReply(Request $request){
        $this->validate($request,[
            'subject'=>'required',
            'content'=>'required',
            'replied_id'=>'required',
            'user_id'=>'required',
        ]);
        
        $userMessage = new UserMessages;
        $userMessage->subject =  $request->input('subject');
        $userMessage->content =  $request->input('content');
        $userMessage->replied_id = $request->input('replied_id');
        $userMessage->user_id = $request->input('user_id');
        $userMessage->attorney_id = $request->input('attorney_id');
        $userMessage->save();
        
        return redirect('/attorney_dashboard/messenger/inbox')->with('success','Your reply has been sent');
    }

    public function showOutbox(){
        $userMessages = UserMessages::where('attorney_id', Auth::id())
        ->orderby('created_at', 'desc')
            ->get();

            $attorney_id= Auth::id();
            $attorney=Attorney::findOrFail($attorney_id);

        return view('attorneys\messenger.outbox')->with('userMessages',$attorney->userMessages->load('user'));
    }

      // show outbox message
      public function showOutboxMessage($id){
        $attorney_id= Auth::id();
        $attorney=Attorney::findOrFail($attorney_id);

        $message=UserMessages::findOrFail($id);
        return view('attorneys\messenger.showOutbox')
        ->with('message',$message)
        ->with('attorneyMessages',$attorney->attorneyMessages->load('user'));
    }


    public function storeMessage(Request $request ){
        $this->validate($request,[
            'email'=>'email|required|exists:users,email',
            'subject'=>'required',
            'content'=>'required',
        ]);
        
        if($request->email == auth()->user()->email){
            return redirect('/attorney_dashboard')->with('error','You cannot send a message to yourself!');

        }
        $user=User::where('email',$request->email)->first();

        $userMessage = new UserMessages;
        // $userMessage->email =  $request->input('email');
        $userMessage->subject =  $request->input('subject');
        $userMessage->content =  $request->input('content');
        if($request->email == $user->email){
            $userMessage->user_id = $user->id;
        }
        $userMessage->attorney_id = $request->input('attorney_id');
        $userMessage->save();
        
        return redirect('/attorney_dashboard/messenger')->with('success','Messsage sent');       
    }

    public function destroy( $id){
        $message = AttorneyMessages::findOrFail($id);
        $message->delete();
        return back()->with('success','Messsage Deleted');       

    }
}
