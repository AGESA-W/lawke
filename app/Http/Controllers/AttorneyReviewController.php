<?php

namespace App\Http\Controllers;

use App\AttorneyReview;
use App\Attorney;
use Auth;
use Illuminate\Http\Request;

class AttorneyReviewController extends Controller
{

      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create_form($id)
    {
        $attorney=Attorney::find($id);
        return view('reviews.review_form')->with('attorney',$attorney);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attorney=Attorney::where('id',$request->attorney_id)->first();
        // $attorney->rr();
        // auth()->user()->reviews()->create($request->all());

       
        $this->validate($request, [
            'attorney_id' => ['required'],
            'headline' => ['required'],
            'description' => ['required'],
            'rating' => ['required'],
            'recommend' => ['required'],
            'consultation' => ['required'],
    
        ]);

        //create new Attorney
        $review= new AttorneyReview;
        $review->attorney_id = $request->input('attorney_id');
        $review->user_id = auth()->user()->id;
        $review->headline = $request->input('headline');
        $review->description = $request->input('description');
        $review->consultation = $request->input('consultation');
        $review->recommend = $request->input('recommend');
        $review->rating = $request->input('rating');
        $review->save();
        $attorney->rr();

      return redirect('/')->with('success', 'Account created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $review=AttorneyReview::find($id);
        return view('reviews.update_review_form')->with('review',$review);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { 

        $review=AttorneyReview::findOrFail($request->review_id);
        $review->update($request->all());
        return back()->with('success',"Your review has been updated!");

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete AttorneyReview by user
        $review= AttorneyReview::find($id);
        $review->delete();

        return redirect('/home')->with('success',"Your review has been Deleted!");
    }
}
