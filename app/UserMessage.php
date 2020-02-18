<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    protected $fillable = [
        'attorney_id','user_id','status', 'description','message_id',
    ];

    public function attorney(){
       return $this->belongsTo('App\Attorney');
    }

    public function user(){
        return $this->belongsTo('App\User');
     }
}
