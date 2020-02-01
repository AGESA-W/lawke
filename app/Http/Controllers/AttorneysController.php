<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lsk;
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
    public function profile(){
        return view('attorneys.profile');
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
                    'license_no'=>$attorney->license_no
                );
        }
        if(count($data))
             return $data;
        else
            return ['firstname'=>'','lastname'=>''];
        }
}

