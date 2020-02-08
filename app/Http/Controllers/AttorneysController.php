<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lsk;
use App\Attorney;
use App\Education;
use DB;

class AttorneysController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:attorney');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable 
     */
    public function profile($id){
        // $attorneys=DB::table('lsks')
        // ->join('education','lsks.id','=','education.attorney_id')
        // ->join('locations','locations.attorney_id','=','lsks.id')
        // ->join('practice_areas','practice_areas.attorney_id','=','lsks.id')
        // ->join('works','works.attorney_id','=','lsks.id')
        //  ->select('lsks.*','locations.*','practice_areas.*','education.*','works.*')
        //  ->where('lsks.id',$id )
        //  ->get();
        // return view('attorneys.profile')->with('attorneys',$attorneys);


        $lsk=Lsk::find($id);
        return view('attorneys.profile')->with('lsk',$lsk)
        ->with('attorneys',$lsk->educations)
        ->with('works',$lsk->works)
        ->with('areas',$lsk->practiceareas)
        ->with('locations',$lsk->locations);

    //     $attorney=Attorney::find($id);
    //     return view('attorneys.profile')->with('lsk',$attorney)
    //     ->with('attorneys',$attorney->educations)
    //     ->with('works',$attorney->works)
    //     ->with('areas',$attorney->practiceareas)
    //     ->with('locations',$attorney->locations);
    // 
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
                'attorney_id'=>$attorney->id
            );
        }
        if(count($data))
             return $data;
        else
            return ['firstname'=>'','lastname'=>''];
        }
}

