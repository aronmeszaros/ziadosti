<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    public function ziadost(){
      return $this->belongsTo('App\Ziadost');
    }

    public function person(){
      return $this->hasMany('App\Person');
    }
}
