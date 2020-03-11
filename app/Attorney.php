<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AttorneyResetPasswordNotification;
use DB;
use Auth;
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
        'firstname','lastname', 'license_no','national_id','mobile','about','gender','email','image','county','password',
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
        return $this->belongs(Lsk::class,'attorney_id');
    }

    
    public function reviews(){
        // return $this->hasMany('App\AttorneyReview','attorney_id','attorney_id');
        return $this->hasMany('App\AttorneyReview');
        
    }


    public function educations(){
        return $this->hasMany('App\Education','attorney_id','attorney_id');
    }
 
    public function works(){
        return $this->hasMany('App\Work','attorney_id','attorney_id');
    }
 
    public function practiceareas(){
        return $this->hasMany('App\PracticeArea','attorney_id','attorney_id');
    }
 
     public function locations(){
        return $this->hasMany('App\Location','attorney_id','attorney_id');
    }

    //relationship with attorney messages
    public function messages(){
        return $this->hasMany('App\AttorneyMessage');
    }

    //relationship with user messages
    public function usermessages(){
        return $this->hasMany('App\UserMessage');
    }


    public function getStarRating(){
        $count = $this->reviews()->count();
        if(empty($count)){
            return 0;
        }
        $starCountSum = $this->reviews()->sum('rating');
        $average = $starCountSum/$count;

        return $average;

    }

    //get the num of reviews
    public function reviewCount(){
        $count = $this->reviews()->count();
        if(empty($count)){
            return 0;
        }
        return $count;
    }

    public function countInbox(){

        $test=DB::table('attorney_messages')
        ->where('status',0)
        ->where('attorney_id',Auth::id())
        ->get();
        $total=count($test);
        
        return $total;
    }   




}
