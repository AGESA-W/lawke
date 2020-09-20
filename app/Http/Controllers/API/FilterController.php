<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Attorney;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class FilterController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   

    public function index()
    {
      

        //  return Attorney::first()->paginate(25);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $q =$request->search;
        if($q != ''){
          $data = Attorney::where('firstname','LIKE','%'.$q.'%')
                              ->OrWhere('lastname','LIKE','%'.$q.'%')
                              ->OrWhere('county','LIKE','%'.$q.'%');
                            //   ->paginate(10)
                            //   ->setpath('');
        //   $data->appends(array(
        //     'q' => $request->search,
        //   ));
          return  $data;
        }
        
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::findOrfail($id);

        $this-> validate($request,[
            'name' =>'required|string|max:191',
            'email'=>'required|string|email|max:191|unique:users,email,'.$user->id,
            'type'=>'required',
            'password'=>'sometimes|string|min:6'
        ]);

        $user->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrfail($id);
        $user->delete();
        return['message'=>'User Deleted'];
    }
}
