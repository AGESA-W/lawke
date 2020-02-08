<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function lsk(){
        return $this->belongsTo('App\Lsk');
     }


     public function attorney(){
        return $this->belongsTo('App\Attorney');
     }
}
