<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lsk extends Model
{
    // public function educations(){
    //    return $this->hasMany('App\Education','attorney_id','id');
    // }

    public function works(){
        return $this->hasMany('App\Work','attorney_id','id');
    }

    public function practiceareas(){
        return $this->hasMany('App\PracticeArea','attorney_id','id');
    }

    public function locations(){
        return $this->hasMany('App\Location','attorney_id','id');
    }
 
    public function attorneys(){
        return $this->hasMany('App\Attorney','attorney_id','id');
    }

   

    // public function attorney(){
    //     return $this->belongsTo('App\Attorney');
    // }

    // review....will need to transfer to attorneys
    // public function reviews(){
    //     return $this->hasMany('App\AttorneyReview','attorney_id','id');
    //     // return $this->hasMany('App\AttorneyReview');
        
    // }

    //get the average reviews
    // public function getStarRating(){
    //     $count = $this->reviews()->count();
    //     if(empty($count)){
    //         return 0;
    //     }
    //     $starCountSum = $this->reviews()->sum('rating');
    //     $average = $starCountSum/$count;

    //     return $average;

    // }

    // //get the num of reviews
    // public function reviewCount(){
    //     $count = $this->reviews()->count();
    //     if(empty($count)){
    //         return 0;
    //     }
    //     return $count;
    // }
}
