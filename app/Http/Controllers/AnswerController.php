<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;


class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:attorney');

    }

    public function answer($question){
        $questions=Question::where('question', $question)->get();
        return view('add_answer')
        ->with('questions',$questions);
 
    } 


    public function attorneyAnswerStore(Request $request)
    {
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
        $answer->answer = $request->input('answer');
        $answer->need_lawyer = $request->input('need_lawyer');
        $answer->save();
 
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
