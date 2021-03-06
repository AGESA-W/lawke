<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttorneyMessage extends Model
{
    protected $fillable = [
        'attorney_id','user_id','message_id','status', 'description',
    ];

    public function attorney(){
       return $this->belongsTo('App\Attorney');
    }

    public function user(){
        return $this->belongsTo('App\User');
     }

}
