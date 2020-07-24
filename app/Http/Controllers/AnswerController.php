<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\User;
use App\Mail\QuestionAnswered;
use App\Jobs\QuestionAnsweredJob;
use Illuminate\Support\Facades\Mail;


use App\Notifications\repliedToQuestion;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:attorney',['except'=>['attorneyAnswerStore']]);

    }

    public function answer($question){
        $questions=Question::where('question', $question)->get();
        return view('add_answer')
        ->with('questions',$questions);
 
    } 


    public function attorneyAnswerStore(Request $request)
    {
        
        $user=User::where('id',$request->user_id)->first();

        $this->validate($request, [
            'attorney_id' => ['required'],
            'question_id' => ['required'],
            'answer' => ['required','min:40','max:1200'],
            'need_lawyer' => ['required'],
        ]);

        //create new Attorney Answer
        $answer= new Answer;
        $answer->attorney_id = $request->input('attorney_id');
        $answer->question_id= $request->input('question_id');
        $answer->user_id= $request->input('user_id');
        $answer->answer = $request->input('answer');
        $answer->need_lawyer = $request->input('need_lawyer');
        // $user->notify(new repliedToQuestion($user));
        $answer->save();
         
        //trigger email
        dispatch(new QuestionAnsweredJob($user));

         return back()->with('success', 'Your answer has been shared');
    }

    //update Answer
    public function updateAnswer(Request $request,$id)
    { 
        $this->validate($request, [
            'answer' => ['required', 'min:40','max:1200'],
        ]);
            
        //Update answer
        $answer= Answer::findOrFail($id);
        $answer->answer = $request->input('answer');
        $answer->save();

        return back()->with('success',"Your Answer has been updated!");
    }

    // delete answer
    public function deleteAnswer($id){

        $answer = Answer::findOrFail($id);
        $answer->delete();
        return back()->with('success',"Your Answer has been permanetly Deleted!");

    }
}
