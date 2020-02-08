<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AttorneyResetPasswordNotification;
class Attorney extends Authenticatable
{
    use Notifiable;
    
    protected $guard ='attorney';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname', 'license_no','national_id','mobile','about','gender','status','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AttorneyResetPasswordNotification($token));
    }



    public function lsk(){
        return $this->belongsTo('App\Lsk');
     }



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
}
