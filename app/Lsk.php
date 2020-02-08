<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lsk extends Model
{
    public function educations(){
       return $this->hasMany('App\Education','attorney_id','id');
    }

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
}
