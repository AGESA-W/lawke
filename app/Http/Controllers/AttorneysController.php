<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lsk;
use App\Attorney;
use App\Education;
use App\AttorneyReview;
use App\User;
use DB;


use Auth;

class AttorneysController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // // {
    // //     $this->middleware('auth:attorney');
    // // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable 
     */
    public function profile($id){
       
        // get id of the authenticated user
        //  $user_id=auth()->user()->id;
        // $user=User::find($user_id);

         $user=Auth::user();
     
        // $lsk=Lsk::find($id);
        // return view('attorneys.profile')
        // ->with('lsk',$lsk)
        // ->with('attorneys',$lsk->educations)
        // ->with('works',$lsk->works)
        // ->with('areas',$lsk->practiceareas)
        // ->with('locations',$lsk->locations)
        //  ->with('reviews',$lsk->reviews)
        //  ->with('reviews',$user->reviews);
       
 
        $attorney=Attorney::find($id);
        return view('attorneys.profile')->with('attorney',$attorney)
        ->with('educations',$attorney->educations)
        ->with('works',$attorney->works)
        ->with('areas',$attorney->practiceareas)
        ->with('locations',$attorney->locations)
        ->with('reviews',$attorney->reviews)
        ->with('reviews',$user->reviews);
    
    }


    public function dashboard()
    {
        
        return view('attorneys.attorney_dashboard');
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

