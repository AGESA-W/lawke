<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttorneyReview extends Model
{
    protected $fillable = [
        'headline','description','attorney_id', 'rating','consultation','recommend',
    ];
    
    // a review belongs to an attorney
    // public function lsk(){
    //     return $this->belongsTo('App\Lsk');
    // }
    
    public function attorney(){
        return $this->belongsTo('App\Attorney');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }

   
}
