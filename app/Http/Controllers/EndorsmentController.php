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
            'attorney_id' => ['required'],//endosee
    
        ]);
            
        // add Endorsment
        $endorsment= new Endorsment;
        $endorsment->relationship = $request->input('relationship');
        $endorsment->practicearea = $request->input('practicearea');
        $endorsment->message = $request->input('message');
        $endorsment->endoser_id = $request->input('endoser_id');
        $endorsment->attorney_id = $request->input('attorney_id');
        $endorsment->save();

        return back()->with('success',"You have successfully endorsed this lawyer!");
    }
    // update Endorsment
    public function update(Request $request)
    { 
        $endorsment=Endorsment::findOrFail($request->endorsment_id);
        $endorsment->update($request->all());
        return back()->with('success',"Your endorsment has been updated!");
    }


    //Delete Endorsment by lawyer
    public function destroy($id)
    {
        $endorsment= Endorsment::findOrFail($id);
        $endorsment->delete();

        return back()->with('success',"Your endorsment has been Deleted!");
    }
}
