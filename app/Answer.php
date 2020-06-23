<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'attorney_id','question_id', 'need_lawyer', 'answer',
    ];
    
    //relationship with an attorney
    public function attorney(){
        return $this->belongsTo('App\Attorney','attorney_id');
    }


    public function question(){
        return $this->belongsTo('App\Question','question_id');
    }
}
