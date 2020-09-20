<?php

namespace App;

use App\AttorneyMessages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttorneyMessages extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id','content','subject',
    ];

    public function attorney(){
        return $this->belongsTo('App\Attorney');
     }

     public function user(){
        return $this->belongsTo('App\User');
     }

     
    public function associateMessage(){
      
        $attorneyMessage = new AttorneyMessages;
        $attorneyMessage->messagerep_id=$this->id;
        $attorneyMessage->save();
       
    }
}
