<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function applicant(){
      return $this->belongsTo('App/Applicant');
    }
}
