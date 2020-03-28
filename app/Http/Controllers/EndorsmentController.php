<?php

namespace App\Http\Controllers;


use App\Attorney;
use App\Endorsment;
use App\PracticeArea;

use Illuminate\Http\Request;

class EndorsmentController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:attorney');

    }

    public function endorsment($id){
        $attorney=Attorney::find($id);
        $practiceareas=PracticeArea::orderBy('id','asc')->distinct()->select('area_practice')->get();
        return view('attorneys.endorsment')
        ->with('practiceareas',$practiceareas)
        ->with('attorney',$attorney);
    }

    public function store(Request $request){

        $this->validate($request, [
            'relationship' => ['required', 'string'],
            'message' => ['required'],
            'practicearea' => ['required','string'],
            'endoser_id' => ['required'],
            'endosee_id' => ['required'],
    
        ]);
            
        // add Education
        $endorsment= new Endorsment;
        $endorsment->relationship = $request->input('relationship');
        $endorsment->practicearea = $request->input('practicearea');
        $endorsment->message = $request->input('message');
        $endorsment->endoser_id = $request->input('endoser_id');
        $endorsment->endosee_id = $request->input('endosee_id');
        $endorsment->save();

        return back()->with('success',"You have successfully endorsed this lawyer!");
    }
}
