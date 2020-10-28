<?php

namespace App\Http\Controllers;

use DB;

use PDF;
use App\Lsk;
use App\User;
use App\Answer;
use App\Message;
use App\Attorney;
use App\Location;
use App\Question;
use App\Education;
use App\Endorsment;

use App\PracticeArea;
use App\AttorneyReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DataTables\AttorneyDataTable;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $attorneys=Attorney::all();
        $users=User::all();
        $questions=Question::all();
        $answers=Answer::all();



        return view('admin.admin')
        ->with('attorneys',$attorneys)
        ->with('questions',$questions)
        ->with('answers',$answers)
        ->with('users',$users);

        
    } 

    // lawyers registration Report
    public function lawyerRegReport(Request $request)
    {
        if(request()->ajax())
        {
            if(!empty($request->beginDate)){
                $data = DB::table('attorneys')
                ->whereBetween('created_at', array($request->beginDate, $request->lastDate))
                ->get();
                
            }
        
         else{
            $data = DB::table('attorneys')
            ->get();
        }
        return datatables()->of($data)->make(true);
        }   
        return view('admin.reports');
    } 

     // Users registration Report
     public function userRegReport(Request $request)
     {
         if(request()->ajax())
         {
             if(!empty($request->beginDate)){
                 $data = DB::table('users')
                 ->whereBetween('created_at', array($request->firstDate, $request->finalDate))
                 ->get();
             }
         
          else{
             $data = DB::table('users')
             ->get();
         }
         return datatables()->of($data)->make(true);
        }   
         return view('admin.reports');
     } 


    // rating report
    public function ratingreport(Request $request )
    {
        $data='';
        if(request()->ajax())
        {
            if(!empty($request->startDate)){
               
                if($request->rating == 5){
                $data = Attorney::where('rating',5)->whereBetween('created_at', array($request->startDate, $request->endDate))->get();
                }
                elseif($request->rating == 4){
                    $data = Attorney::where('rating',4)->whereBetween('created_at', array($request->startDate, $request->endDate))->get();
                }
                elseif($request->rating == 3){
                    $data = Attorney::where('rating',3)->whereBetween('created_at', array($request->startDate, $request->endDate))->get();
                }
                elseif($request->rating == 2){
                    $data = Attorney::where('rating',2)->whereBetween('created_at', array($request->startDate, $request->endDate))->get();
                }
                elseif($request->rating == 1){
                    $data = Attorney::where('rating',1)->whereBetween('created_at', array($request->startDate, $request->endDate))->get();
                }
            }
            else{
                $data = DB::table('attorneys')
                ->get();
            }
            return datatables()->of($data)->make(true);
           
        }
   
        return view('admin.reports');
    } 

   

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->stream();
     
    }

    function convert_customer_data_to_html()
    {
     $customer_data = AttorneyReview::all();

     $output = '
     <h3 align="center">Customer Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
        <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
        <th style="border: 1px solid; padding:12px;" width="30%">Address</th>
        <th style="border: 1px solid; padding:12px;" width="15%">City</th>
        <th style="border: 1px solid; padding:12px;" width="15%">Postal Code</th>
      </tr>
     ';  
     foreach($customer_data as $customer)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$customer->id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->attorney_id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->rating.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->headline.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }


    //displaying user data
    public function usersData()
    {   
        if(request()->ajax())
        {
            return datatables()->of(User::latest()->get())
            ->addColumn('action', function($data){
                $button = '<a href="/admin/users/details/'.$data->id.'" class="text-decoration-none"><button class="view btn btn-sm bg-primary" name="view" id="'.$data->id.'"><span class="fa fa-eye"></span></button></a>';
                $button .= '&nbsp;&nbsp;';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.users');
        
    } 


    //updating the user
    public function update(Request $request, $id)
    { 
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'mobile' => ['required','min:10', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255'],
           
    
        ]);
            
        // Update the user
        $user= User::find($id);
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->mobile = $request->input('mobile');
        $user->save();

        return back()->with('success',"User details have been updated!");
    }

    //specific user details
    public function userdetails($id)
    { 
        $user= User::find($id);
        $reviews=AttorneyReview::where('user_id', $user->id)->paginate(5);
        $questions=Question::where('user_id', $user->id)->paginate(5);
        $practiceareas=PracticeArea::orderBy('area_practice','asc')->distinct()->select('area_practice')->get();
        $locations=Lsk::orderBy('county','asc')->distinct()->select('county')->get();

        
        return view('admin.user_details')
        ->with('reviews',$reviews)
        ->with('questions',$questions)
        ->with('practiceareas',$practiceareas)
        ->with('locations',$locations)
        ->with('user',$user);
    }

    // update user reviews
    public function updateReview(Request $request,$id)
    {
        $review=AttorneyReview::findOrFail($id);
        $review->update($request->all());
        return back()->with('success','Review has been updated');
    }

    // delete user reviews
    public function destroyReview($id){
       $review=AttorneyReview::findOrFail($id);
       $review->delete();
       return back()->with('success','Review has been deleted');
    }

    //Delete the user
    public function userDestroy($id){
        $user=User::find($id);
        $user->delete();
        return redirect('/')->with('success','User deleted successfully');
    }

    //display lawyers account information
    public function attorneysaccount()
    {   
        if(request()->ajax())
        {
            return datatables()->of(Attorney::latest()->get())
            ->addColumn('action', function($data){
                $button = '<a href="/admin/attorneys/details/'.$data->id.'" class="text-decoration-none"><button class="view btn btn-sm bg-primary" name="view" id="'.$data->id.'"><span class="fa fa-eye"></span></button></a>';
                $button .= '&nbsp;&nbsp;';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.attorneys');
    } 


     //specific lawyer details
     public function attorneydetails($id)
     { 
         $attorney= Attorney::find($id);
        $answers = $attorney->answers->load('question');

         return view('admin.attorney_details')
        ->with('educations',$attorney->educations)
        ->with('endorsments',$attorney->endorsments)
        ->with('locations',$attorney->locations)
        ->with('answers',$answers)
         ->with('attorney',$attorney);
     }

    // Update lawyers account information
    public function updateaccount(Request $request,$id)
    { 
        $this->validate($request, [
            'firstname' => ['required','string'],
            'lastname' => ['required','string'],
            'email' => ['required','string',],
            'mobile' => ['required','string',],
        ]);
            
        // Update the location
        $attorney= Attorney::find($id);
        $attorney->firstname = $request->input('firstname');
        $attorney->lastname = $request->input('lastname');
        $attorney->email = $request->input('email');
        $attorney->mobile = $request->input('mobile');
        $attorney->save();

        return back()->with('success',"Account information has been updated!");
    }

    //display lawyers work information
    public function attorneyswork()
    {   
        $locations=Location::orderBy('attorney_id','asc')->paginate(10);
        return view('admin.work')->with('locations',$locations);
    } 

     //update lawyer work info
     public function updatework(Request $request,$id)
     { 
        $work=Location::findOrFail($id);
        $work->update($request->all());
        return back()->with('success',"work information has been updated!");
     }

    // Display lawyers education information
    public function attorneyseducation()
    {   
        $educations=Education::orderBy('id','asc')->paginate(10);
        return view('admin.education')->with('educations',$educations);
    } 

    //update lawyer education
    public function updateeducation(Request $request,$id)
    { 
        $education=Education::findOrFail($id);
        $education->update($request->all());
        return back()->with('success',"Education has been updated!");
    }
    
    // Add Lawyer Education
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

        return back()->with('success',"Your Education details have been updated!");
    }

    //deleting Education
    public function educationDestroy($id){
        $education=Education::findOrFail($id);
        $education->delete();
        return back()->with('success','Education details deleted !');
    }


    // update Endorsment
    public function endorsmentUpdate(Request $request,$id)
    { 
        $endorsment=Endorsment::findOrFail($id);
        $endorsment->update($request->all());
        return back()->with('success',"Endorsment has been updated!");
    }

    //deleting Education
    public function endorsmentDestroy($id){
        $endorsment=Endorsment::findOrFail($id);
        $endorsment->delete();
        return back()->with('success','Endorsment has been deleted!');
    }


    //update User Question
    public function updateQuestion(Request $request,$id){

        $this->validate($request, [
            'category' => ['required'],
            'question' => ['required','min:10','max:128'],
            'situation' => ['required','min:40','max:1200'],
            'county' => ['required'],
           
        ]);

        //update Question
        $advice= Question::findOrFail($id);
        $advice->category = $request->input('category');
        $advice->question = $request->input('question');
        $advice->situation = $request->input('situation');
        $advice->county = $request->input('county');
        $advice->save();
 
         return back()->with('success', 'The question has been updated!');

    }

    //delete user question
    public function destroyQuestion($id){
        $question=Question::find($id);
        $question->delete();
        return back()->with('success', 'The question has been deleted!');

    }


     //update Lawyer Answer
     public function updateAnswer(Request $request,$id)
     { 
         $this->validate($request, [
             'answer' => ['required', 'min:40','max:1200'],
         ]);
             
         //Update answer
         $answer= Answer::findOrFail($id);
         $answer->answer = $request->input('answer');
         $answer->save();
 
         return back()->with('success',"The Answer has been updated!");
     }
 
     // delete lawyer answer
     public function deleteAnswer($id){
 
         $answer = Answer::findOrFail($id);
         $answer->delete();
         return back()->with('success',"The Answer has been permanetly deleted!");
 
     }
  
}
