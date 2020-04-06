<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attorney;
use App\PracticeArea;
use  App\Lsk;
use DB;
use Auth;

class PagesController extends Controller
{

    public function index(){
        $letters = range('A', 'Z');
        $practiceareas=PracticeArea::orderBy('id','asc')->distinct()->select('area_practice')->get();
        $locations=Lsk::orderBy('id','desc')->distinct()->select('county')->get();
        $attorneys=Attorney::orderBy('firstname','desc')->take(6)->get(); 
        return view('pages.index')->with('attorneys',$attorneys)
        ->with('practiceareas',$practiceareas)
        ->with('locations',$locations)
        ->with('letters',$letters);
    }

    // practice areas 
    public function practiceAreas(){
        return view('pages.practice-areas');
    }

    //about page
    public function about(){
        return view('pages.about');
    }

    //contact page
    public function contact(){
        return view('pages.contact');
    }

    //get lawyers by practice area
    public function areas($practicearea){
        $locations=Lsk::orderBy('id','desc')->distinct()->select('county')->get();
        $practiceareas=PracticeArea::where('area_practice', $practicearea)->get();

        return view('pages.areas')->with('practiceareas',$practiceareas)
        ->with('locations',$locations);
 
    } 

    //get lawyers by county
    public function county($practicearea,$county){
    
        $attorneys=Attorney::whereHas('practiceareas' , function ($builder) use($practicearea) {
              return $builder->where('area_practice', $practicearea);
            }
        )
        ->where('county', $county)
        ->get();
        return view('pages.counties')->with('attorneys',$attorneys);
    }


    public function AllLocations($county){//display practice area of county

        $locations=Lsk::where('county', $county)->get();
        $practiceareas=PracticeArea::orderBy('id','asc')->distinct()->select('area_practice')->get();
       
        return view('pages.location')->with('locations',$locations)
        ->with('practiceareas',$practiceareas); 
 
    }


}
