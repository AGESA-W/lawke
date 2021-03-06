<?php

namespace App\Http\Controllers;

use DB;
use App\Lsk;
use App\User;
use App\Message;
use App\Attorney;
use App\Question;
use Pusher\Pusher;


use App\PracticeArea;
use App\AttorneyReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // //select all users except logged in user
        // $users=User::where('id','!=',Auth::id())->get();

        // count how many message are unread from the selected user
        // $users = DB::select("select users.id, users.name,users.email, count(is_read) as unread 
        // from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        // where users.id != " . Auth::id() . " 
        // group by users.id, users.name, users.email");
        // return view('home')->with('users',$users);


        $user_id=auth()->user()->id;
        $user=User::find($user_id);

        $locations=Lsk::orderBy('id','desc')->distinct()->select('county')->get();
        $practiceareas=PracticeArea::orderBy('id','asc')->distinct()->select('area_practice')->get();
        $questions=Question::where('user_id',$user_id)->orderBy('id','desc')->paginate(5);

        return view('home')->with('user',$user)
        ->with('messages',$user->messages)
        ->with('usermessages',$user->usermessages)
        ->with('reviews',$user->reviews)
        ->with('questions',$questions)
        ->with('locations',$locations)
        ->with('practiceareas',$practiceareas);

        
    } 
    public function reviews(){
        

        $reviews=AttorneyReview::where('user_id',Auth::id())->paginate(5);
        return view('users.reviews')
        ->with('reviews',$reviews);
    }
    
    public function questions(){
        
        $user_id=auth()->user()->id;
        $user=User::find($user_id);

        $locations=Lsk::orderBy('id','desc')->distinct()->select('county')->get();
        $questions=Question::where('user_id',$user_id)->orderBy('id','desc')->paginate(5);
        $practiceareas=PracticeArea::orderBy('id','asc')->distinct()->select('area_practice')->get();

        return view('users.questions')
        ->with('questions',$questions)
        ->with('user',$user)

        ->with('practiceareas',$practiceareas)
        ->with('practiceareas',$user->questions)
        ->with('locations',$locations);
    }

    //deleting User
    public function destroy($id){
        $user=User::find($id);
        $user->delete();
        return redirect('/')->with('success','Account deleted successfully');
    }

    // public function getMessage($user_id)
    // {
      
    //     $my_id = Auth::id();

    //     // // clear Message notification when read
    //     Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

    //     // Get all message from selected user
    //     $messages = Message::where(function ($query) use ($user_id, $my_id) {
    //         $query->where('from', $user_id)->where('to', $my_id);
    //     })->oRwhere(function ($query) use ($user_id, $my_id) {
    //         $query->where('from', $my_id)->where('to', $user_id);
    //     })->get();

    //     return view('messages.index', ['messages' => $messages]);
    
    // }

    // public function sendMessage(Request $request)
    // {
    //     $from = Auth::id();
    //     $to = $request->receiver_id;
    //     $message = $request->message;

    //     $data = new Message();
    //     $data->from = $from;
    //     $data->to = $to;
    //     $data->message = $message;
    //     $data->is_read = 0; // message will be unread when sending message
    //     $data->save();



    //      // pusher
    //      $options = array(
    //         'cluster' => 'mt1',
    //         'useTLS' => true
    //     );

    //     $pusher = new Pusher(
    //         env('PUSHER_APP_KEY'),
    //         env('PUSHER_APP_SECRET'),
    //         env('PUSHER_APP_ID'),
    //         $options
    //     );

    //     $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
    //     $pusher->trigger('my-channel', 'my-event', $data);
    // }

}
