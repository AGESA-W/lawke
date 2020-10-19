<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserMessages extends Model

{
    use SoftDeletes;


    protected $fillable = [
        'email','content','subject',
    ];

    public function attorney(){
        return $this->belongsTo('App\Attorney');
     }

     public function user(){
        return $this->belongsTo('App\User');
     }

     public function ror(){
       

        $update=DB::table('attorney_messages')
        ->where('replied_id','=',$this->id)
        ->get();
      
        return  $update;

    }
}
