<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    public function rmo(){
        return $this->belongsTo('App\Rmo');
    }
}
