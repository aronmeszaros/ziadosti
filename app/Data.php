<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    public function ziadost(){
      return $this->belongsTo('App\Ziadost');
    }
}
