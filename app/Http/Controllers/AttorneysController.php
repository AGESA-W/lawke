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
 
        $attorney=Attorney::find($id);
        return view('attorneys.profile')
        ->with('attorney',$attorney)
        ->with('educations',$attorney->educations)
        ->with('works',$attorney->works)
        ->with('areas',$attorney->practiceareas)
        ->with('locations',$attorney->locations)
        ->with('reviews',$attorney->reviews)
        ->with('endorsments',$attorney->endorsments);
        //  ->with('reviews',$user->reviews);
    
    }

    public function dashboard()
    {
        $users = DB::select("select users.id, users.name,users.email 
        from users JOIN  attorney_messages ON users.id=attorney_messages.user_id and attorney_id = " . Auth::id() . " 
        where attorney_id = " . Auth::id() . " 
         group by users.id, users.name, users.email,attorney_id");

        $attorney_id=Auth::id();
        $attorney=Attorney::find($attorney_id);
        return view('attorneys.attorney_dashboard')
        ->with('attorney',$attorney)
        ->with('messages',$attorney->messages)
        ->with('usermessages',$attorney->usermessages)
        ->with('reviews',$attorney->reviews)
        ->with('educations',$attorney->educations)
        ->with('endorsments',$attorney->endorsments)
        ->with('endorsers',$attorney->endorsers)
        ->with('users',$users);
        
    }

    public function updateLocation(Request $request, $id)//lawyer updates location
    { 
        $this->validate($request, [
            'company_name' => ['required', 'string'],
            'location' => ['required', 'string'],
            'address' => ['required','string',],
        ]);
            
        // Update the location
        $location= Location::find($id);
        $location->company_name = $request->input('company_name');
        $location->location = $request->input('location');
        $location->address = $request->input('address');
        $location->save();

        return redirect('/attorney_dashboard')->with('success',"Your location has been updated!");
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

