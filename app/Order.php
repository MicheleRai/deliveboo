<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name_user','address', 'email_user', 'tot_price', 'note'
    ];

    public function dishes(){
        return $this->belongsToMany('App\Dish');
    }
}
