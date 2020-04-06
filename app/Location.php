<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{


  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'company_name', 'address', 'location',
  ];


  public function lsk(){
      return $this->belongsTo('App\Lsk');
  }


   //   public function attorney(){
   //      return $this->belongsTo('App\Attorney');
   //   }
}
