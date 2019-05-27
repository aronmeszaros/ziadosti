<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormComponents extends Model
{
  //Create Many to one relationship
  public function template(){
    return $this->belongsTo('App\FormTemplate');
  }
}
