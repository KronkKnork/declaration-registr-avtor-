<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Declarations extends Model
{
    protected $User;
    protected $time;

    public function User()
    {
        return $this->belongsTo('App\User','users_id','id');
    }
}
