<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttorneyMessage extends Model
{
    protected $fillable = [
        'to','from', 'description',
    ];
}
