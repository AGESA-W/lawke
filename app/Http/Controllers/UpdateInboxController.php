<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateInboxController extends Controller
{
    public function updateLawyerInbox(Request $request){
        $mId =$request->msgId;
        $update=DB::table('attorney_messages')
        ->where('id',$mId)
        ->update(['status'=>0]);
       if($update){
           echo "status update successfully";
       }
    }

    public function updateUserInbox(Request $request){
        $mId =$request->msgId;
        $update=DB::table('user_messages')
        ->where('id',$mId)
        ->update(['status'=>0]);
       if($update){
           echo "status update successfully";
       }
    }
}
