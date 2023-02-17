<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Slugger;

class Category extends Model
{
    use Slugger;
    
    public function users(){

        return $this->belongsToMany('App\User');
    }
}
