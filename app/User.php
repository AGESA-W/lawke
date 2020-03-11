<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Auth;

class User extends Authenticatable  implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','lastname','mobile',
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

    // public function review(){
    //    return $this->hasOne('App\AttorneyReview','user_id','id');
    //    return $this->hasOne('App\AttorneyReview');

    // }

    public function reviews(){
        // return $this->hasmany('App\AttorneyReview','user_id','id');
        return $this->hasmany('App\AttorneyReview');

    }

    //relationship with attorney message
    public function messages(){
    return $this->hasmany('App\AttorneyMessage');

    }

    //relationship with user message
    public function usermessages(){
        return $this->hasmany('App\UserMessage');
    
    }

    public function countUserInbox(){

        $test=DB::table('user_messages')
        ->where('status',0)
        ->where('user_id',Auth::id())
        ->get();
        $total=count($test);
        
        return $total;
    }   
     
}
