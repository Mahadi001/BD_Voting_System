<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    public function rmo(){
        return $this->belongsTo('App\Rmo');
    }
    public function division(){
        return $this->hasOne('App\Divisions', 'id', 'division_id');
    }
    public function district(){
        return $this->hasOne('App\Districts', 'id', 'district_id');
    }
    public function upazilla(){
        return $this->hasOne('App\Upazilla', 'id', 'upazilla_id');
    }
}
