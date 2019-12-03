<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateRequest extends Model
{
    public function election(){
        return $this->hasOne('App\Election', 'id', 'election_id');
    }

    public function electionDetail(){
        return $this->hasOne('App\ElectionDetail', 'id', 'election_detail');
    }

    public function party(){
        return $this->belongsTo('App\SubAdmin', 'subadmin_id','id');
    }
}
