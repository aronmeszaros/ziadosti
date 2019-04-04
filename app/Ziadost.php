<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ziadost extends Model
{
    //Create One to Many relationship
    public function user(){
      return $this->belongsTo('App\User');
    }

    public function applicant(){
      return $this->hasOne('App\Applicant');
    }
}
