<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endorsment extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'relationship', 'message', 'practicearea','endoser_id','attorney_id',
    ];


    public function attorney(){
        return $this->belongsTo('App\Attorney');
    }
    
    public function endorser()
    {
        return $this->belongsTo('App\Attorney', 'endoser_id');
    }

    public function endorsee()
    {
        return $this->belongsTo('App\Attorney', 'attorney_id');
    }
   

}
