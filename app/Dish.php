<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dish extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function orders(){
        return $this->belongsToMany('App\Order');
    }
}
