<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'county','question', 'practicearea','situation'
    ];
     //relationship with answers
    public function answers(){
        return $this->hasMany('App\Answer');
    }

 //relationship with questions
    public function user(){
        return $this->belongsTo('App\User');
    }
}
