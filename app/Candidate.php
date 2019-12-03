<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public function party(){
        return $this->belongsTo('App\SubAdmin', 'subadmin_id','id');
    }

}
