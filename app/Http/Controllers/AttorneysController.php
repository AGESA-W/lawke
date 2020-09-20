<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lsk;
use App\Attorney;
use App\Education;
use App\Location;
use App\AttorneyReview;
use App\AttorneyMessage;
use App\PracticeArea;
use App\User;
use Auth;
use DB;




class AttorneysController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:attorney',['except'=>['profile','getattorneys']]);

    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable 
     */
    public function profile($id){
 
        $attorney=Attorney::findOrFail($id);

        $reviews=AttorneyReview::where('attorney_id',$attorney->id)->paginate(5);
        return view('attorneys.profile')
        ->with('attorney',$attorney)
        ->with('educations',$attorney->educations)
        ->with('works',$attorney->works)
        ->with('areas',$attorney->practiceareas)
        ->with('locations',$attorney->locations)
        // ->with('reviews',$attorney->reviews)
        ->with('reviews',$reviews)

        ->with('endorsments',$attorney->endorsments);
    
    }

    public function dashboard()
    {
        $users = DB::select("select users.id, users.name,users.email 
        from users JOIN  attorney_messages ON users.id=attorney_messages.user_id and attorney_id = " . Auth::id() . " 
        where attorney_id = " . Auth::id() . " 
         group by users.id, users.name, users.email,attorney_id");

        $attorney_id=Auth::id();
        $attorney=Attorney::findOrFail($attorney_id);

        $answers = $attorney->answers->load('question');

        return view('attorneys.attorney_dashboard')
        ->with('attorney',$attorney)
        ->with('messages',$attorney->messages)
        ->with('usermessages',$attorney->usermessages)
        ->with('reviews',$attorney->reviews)
        ->with('educations',$attorney->educations)
        ->with('endorsments',$attorney->endorsments)
        ->with('endorsers',$attorney->doneEndorsments)
        ->with('attorneyMessages',$attorney->attorneyMessages->load('user'))
        ->with('answers',$answers);
        
    }

    // about
    public function aboutAttorney(Request $request,$id){


        $this->validate($request,[
            'about' =>'required'
        ]);

        $abt= Attorney::findOrFail($id);
        $abt->about = $request->input('about');
        $abt->save();

        return redirect('/attorney_dashboard')->with('success',"Your information has been updated!");


    }

    //dashboard location
    public function location(){
        $attorney_id=Auth::id();
        $attorney=Attorney::findOrFail($attorney_id);

        $answers = $attorney->answers->load('question');

        return view('attorneys.locationDashboard')

        ->with('attorney',$attorney);
    }

    //lawyer updates location
    public function updateLocation(Request $request, $id)
    { 
        $this->validate($request, [
            'company_name' => ['required', 'string'],
            'location' => ['required', 'string'],
            'address' => ['required','string',],
        ]);
            
        // Update the location
        $location= Location::findOrFail($id);
        $location->company_name = $request->input('company_name');
        $location->location = $request->input('location');
        $location->address = $request->input('address');
        $location->save();

        return redirect('/attorney_dashboard/location')->with('success',"Your location has been updated!");
    }

     //dashboard education
     public function education(){
        $attorney_id=Auth::id();
        $attorney=Attorney::findOrFail($attorney_id);


        return view('attorneys.educationDashboard')


        ->with('attorney',$attorney)
        ->with('educations',$attorney->educations);
        
    }

    public function updateEducation(Request $request)//update Education
    { 
        // $this->validate($request, [
        //     'school_name' => ['required', 'string'],
        //     'degree' => ['required', 'string'],
        //     'graduation' => ['required','date'],
        //     'attorney_id' => ['required'],
    
        // ]);
            
        // //Update Education
        // $education= Education::find($id);
        // $education->school_name = $request->input('school_name');
        // $education->degree = $request->input('degree');
        // $education->graduation = $request->input('graduation');
        // $education->attorney_id = $request->input('attorney_id');
        // $education->save();

        // return redirect('/attorney_dashboard')->with('success',"Your Education has been updated!");
        $education=Education::findOrFail($request->education_id);
        $education->update($request->all());
        return back()->with('success',"Your Education has been updated!");
    }

    // Add Education
    public function addEducation(Request $request)//Add education
    { 
        $this->validate($request, [
            'school_name' => ['required', 'string'],
            'degree' => ['required', 'string'],
            'graduation' => ['required','date'],
            'attorney_id' => ['required'],
    
        ]);
            
        // add Education
        $education= new Education;
        $education->school_name = $request->input('school_name');
        $education->degree = $request->input('degree');
        $education->graduation = $request->input('graduation');
        $education->attorney_id = $request->input('attorney_id');
        $education->save();

        return back()->with('success',"Your Education has been updated!");
    }

    //dashboard endorsmentDone
    public function endorsmentDone(){
        $attorney_id=Auth::id();
        $attorney=Attorney::findOrFail($attorney_id);


        return view('attorneys.endorsmentDoneDashboard')
        ->with('attorney',$attorney)
        ->with('endorsments',$attorney->endorsments)
        ->with('endorsers',$attorney->doneEndorsments);
            
    }

     //dashboard endorsmentReceived
     public function endorsmentReceived(){
        $attorney_id=Auth::id();
        $attorney=Attorney::findOrFail($attorney_id);


        return view('attorneys.endorsmentReceivedDashboard')

        ->with('attorney',$attorney)
        ->with('endorsments',$attorney->endorsments)
        ->with('endorsers',$attorney->doneEndorsments);
            
    }


     //dashboard review
     public function review(){
        $attorney_id=Auth::id();
        $attorney=Attorney::findOrFail($attorney_id);

        $reviews=AttorneyReview::where('attorney_id',Auth::id())->paginate(5);

        return view('attorneys.reviewDashboard')


        ->with('attorney',$attorney)
        ->with('reviews',$reviews);
            
    }

     //dashboard questionsAnswered
     public function questionsAnswered(){
        $attorney_id=Auth::id();
        $attorney=Attorney::findOrFail($attorney_id);

        $answers = $attorney->answers->load('question');

        return view('attorneys.questionsAnsweredDashboard')


        ->with('attorney',$attorney)
        ->with('answers',$answers);
            
    }



    public function getattorneys(Request $request){
        $query = $request->get('term','');
        $attorneys=DB::table('lsks')
        ->limit(1);

        if($request->type=='national_id'){
            $attorneys->where('national_id','LIKE','%'.$query.'%');
        }

        $attorneys=$attorneys->get();        
        $data=array();
        foreach ($attorneys as $attorney) {
            $data[]=array(
                'national_id'=>$attorney->national_id,
                'firstname'=>$attorney->firstname,
                'lastname'=>$attorney->lastname,
                'email'=>$attorney->email,
                'mobile'=>$attorney->mobile,
                'license_no'=>$attorney->license_no,
                'attorney_id'=>$attorney->id,
                'image'=>$attorney->image,
                'county'=>$attorney->county
            );
        }
        if(count($data))
             return $data;
        else
            return ['firstname'=>'','lastname'=>''];
    }

}

