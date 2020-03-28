<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
      'attorney_id', 'school_name', 'degree','graduation',
  ];
   //  public function lsk(){
   //     return $this->belongsTo('App\Lsk');
   //  }


   public function attorney(){
      return $this->belongsTo('App\Attorney');
   }
}
