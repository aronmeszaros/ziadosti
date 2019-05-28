<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormTemplate extends Model
{
    //One to many
    public function formcomponents(){
      return $this->hasMany('App\FormComponents');
    }
}
