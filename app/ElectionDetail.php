<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElectionDetail extends Model
{
    public function candidates(){
        return $this->hasMany('App\Candidate', 'election_detail' , 'id');
    }
    
    

}
