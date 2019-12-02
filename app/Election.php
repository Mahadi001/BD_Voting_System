<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    public function details(){
        return $this->hasMany('App\ElectionDetail');
    }
}
