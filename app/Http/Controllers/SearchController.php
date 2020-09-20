<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Attorney;
use App\AttorneyReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller

{
  public function index(Request $request){
    
    return view('search');
  }

  public function Search(){
    $q = Input::get('q');
    if($q != ''){
      $data = Attorney::where('firstname','LIKE','%'.$q.'%')
                          ->OrWhere('lastname','LIKE','%'.$q.'%')
                          ->OrWhere('county','LIKE','%'.$q.'%')
                          ->paginate(10)
                          ->setpath('');
      $data->appends(array(
        'q' => Input::get('q'),
      ));
      if(count($data)>0){
        return view('LawyerSearch')->withData($data);
      }
      else{
        // return redirect('/search')->with('error', "Missing data matching your search results !"); 
        return view('noSearch'); 

      }
    }

  
   
    
  }

  public function rating(Request $request){
 
  $q=Attorney::where('rating', $request->rating)->get();
    return  $q;

  }



   function action($data)
  {
    if($request->ajax())
    {
    $output = '';
    $query = $request->get('query');//query user searches
    if($query != '')
    {
      $data = DB::table('attorneys')
      ->where('firstname', 'like', '%'.$query.'%')
      ->orWhere('lastname', 'like', '%'.$query.'%')
      ->orWhere('county', 'like', '%'.$query.'%') 
      ->orderBy('id', 'desc')
      ->get();

    }
    else
    {
      // $data = DB::table('attorneys')
      // ->orderBy('id', 'desc')
      // ->get();
      
      unset($data);
    }

    //count query results
    $total_row = $data->count();
    if($total_row >0)
    {
      $output .= 
      '
      <h4 class="text-center text-secondary mt-2">Total results : <span id="total_records"></span></h4>
      ';
      
      
      foreach($data as $row)
      {
      $output .= '
      <div class="row mt-2 justify-content-center">
        <div class="col-12 col-md-4">
            <a href="/profile/'.$row->id.'"><img style="width:130px;height:130px" src="'.$row->image.'" alt="'.$row->firstname.'"></a>
        </div>
        <div class="col-12 col-md-8" style="margin-left:-145px;">
          <p class="mb-0"><b><a href="/profile/'.$row->id.'" class="text-decoration-none text-dark">'.$row->firstname.' '.$row->lastname.'</a></b></p>
          <small class="text-muted mb-0">'.$row->county.' county</small>
          <p class="attorney-county-smalltext mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit nesciunt fuga laudantium veniam est. Quisquam, modi et! Nisi, cumque earum, sapiente ut ipsa expedita Excepturi et tenetur hic quam nemo molestiae nihil sequi assumenda harum...</p>
          <div class="row text-center attorney-county-smalltext mt-2">
            <div class="col-md-4 text-primary"><span class="fa fa-phone"></span> '.$row->mobile.'</div>
            <div class="col-md-4 icon-center "><a class="text-decoration-none" href="/attorney-message/'.$row->id.'"><span class="fa fa-envelope"></span> Message</a></div>
            <div class="col-md-4"><a class="text-decoration-none" href="/profile/'.$row->id.'#contact"><span class="fa fa-map-marker"></span> Location</a></div>
          </div>
        </div>
      </div>
      <hr>
      ';
      }
  
    }
    else
    {
      $output = '
      <p class="lead text-primary mt-3 text-center">Missing data matching your search results !</p>
      ';
    }

    $data = array(
      'table_data'  => $output,
      'total_data'  => $total_row
    );

    echo json_encode($data);
    }
  }



  

}
