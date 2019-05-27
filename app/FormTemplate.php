<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormTemplate extends Model
{
    //One to many
    public function components(){
      return $this->hasMany('App\FormComponents');
    }
}
