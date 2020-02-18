<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InboxController extends Controller
{
    public function updateInbox(Request $request){
        $mId =$request->msgId;
        $update=DB::table('attorney_messages')
        ->where('id',$mId)
        ->update(['status'=>1]);
       
    }

    public function updateUserInbox(Request $request){
        $mId =$request->msgId;
        $update=DB::table('user_messages')
        ->where('id',$mId)
        ->update(['status'=>1]);
       
    }
}
