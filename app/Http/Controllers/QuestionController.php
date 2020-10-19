<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Lsk;
use App\User;
use App\Answer;
use App\Attorney;
use App\Question;
use App\PracticeArea;

use Illuminate\Http\Request;
use App\Notifications\QuestionAsked;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

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
        $attorneys=Attorney::where('practice_area',$request->category)->get();

        $this->validate($request, [
            'category' => ['required'],
            'question' => ['required','min:10','max:128'],
            'situation' => ['required','min:30','max:1200'],
            'county' => ['required'],
            'user_id' => ['required'],
            'anonymous' => ['required'],
           
        ]);

        //create new  Question
        $question= new Question;
        $question->category = $request->input('category');
        $question->question = $request->input('question');
        $question->situation = $request->input('situation');
        $question->county = $request->input('county');
        $question->user_id = $request->input('user_id');
        $question->anonymous = $request->input('anonymous');
        $question->save();


            // dd($attorney);
            Notification::send($attorneys, new QuestionAsked($question));

 
         return back()->with('success', 'Your question has been shared and you will be emailed as soon as a lawyer answers.');
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
        $topics=Question::where('category', $category)->orderBy('created_at','desc')->paginate(7);
        return view('topic')
        ->with('topics',$topics);
 
    } 

    public function answers($id,$swali){

        $question=Question::where('id', $id)
                            // ->where('question', $swali)
                            ->first();
        $answers = $question->answers->load('attorney');
        $user = User::where('id', $question->user_id)->first();
        // dd(  $user);


        return view('individual_question')
        ->with('answers',$answers)
        ->with('user',$user)
        ->with('question',$question);
 
    } 
    
  

}