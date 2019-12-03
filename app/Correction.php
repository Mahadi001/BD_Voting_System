<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correction extends Model
{
    public function division(){
        return $this->hasOne('App\Divisions', 'id', 'division_id');
    }
    public function district(){
        return $this->hasOne('App\Districts', 'id', 'district_id');
    }
    public function upazilla(){
        return $this->hasOne('App\Upazilla', 'id', 'upazilla_id');
    }
    public function rmo(){
        return $this->hasOne('App\Rmo', 'id', 'rmo_id');
    }
    public function union(){
        return $this->hasOne('App\Union', 'id', 'union_id');
    }
}
