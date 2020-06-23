<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lsk;
use App\PracticeArea;
use App\Question;
use App\Answer;
use App\Attorney;

use Auth;




class QuestionController extends Controller

{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['getadvice','clientQuestionStore','topic','answers']]);

    }


    //get-advice
    public function getadvice(){
        $topics=Question::orderBy('category','asc')->distinct()->select('category')->get();
        return view('get_advice')
        ->with('topics', $topics);
    }

    //question form
    public function asklawyer(){
        $locations=Lsk::orderBy('id','desc')->distinct()->select('county')->get();
        $practiceareas=PracticeArea::orderBy('id','asc')->distinct()->select('area_practice')->get();
        
        return view('ask_lawyer')
        ->with('locations',$locations)
        ->with('practiceareas',$practiceareas);
        
    }


    public function clientQuestionStore(Request $request)
    {
        $this->validate($request, [
            'category' => ['required'],
            'question' => ['required','min:10','max:128'],
            'situation' => ['required','min:40','max:1200'],
            'county' => ['required'],
            'user_id' => ['required'],
            'anonymous' => ['required'],
           
        ]);

        //create new  Question
        $advice= new Question;
        $advice->category = $request->input('category');
        $advice->question = $request->input('question');
        $advice->situation = $request->input('situation');
        $advice->county = $request->input('county');
        $advice->user_id = $request->input('user_id');
        $advice->anonymous = $request->input('anonymous');
        $advice->save();
 
         return back()->with('success', 'Your question has been shared anonymously');
    }

    // update question
    public function updateQuestion(Request $request,$id){

        $this->validate($request, [
            'category' => ['required'],
            'question' => ['required','min:10','max:128'],
            'situation' => ['required','min:40','max:1200'],
            'county' => ['required'],
            'anonymous' => ['required'],
           
        ]);

        //update Question
        $advice= Question::findOrFail($id);
        $advice->category = $request->input('category');
        $advice->question = $request->input('question');
        $advice->situation = $request->input('situation');
        $advice->county = $request->input('county');
        $advice->anonymous = $request->input('anonymous');
        $advice->save();
 
         return back()->with('success', 'Your question has been updated!');

    }
    //individual topic 
    public function topic($category){
        $topics=Question::where('category', $category)->orderBy('created_at','desc')->get();
        return view('topic')
        ->with('topics',$topics);
 
    } 

    public function answers($question){
        
        $question=Question::where('question', $question)->first();
        $answers = $question->answers->load('attorney');
            // dd($question, $answers->load('attorney'));
        return view('individual_question')
        ->with('answers',$answers)
        ->with('question',$question);
 
    } 
}
