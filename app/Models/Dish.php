<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{

    protected $fillable = ['user_id', 'name', 'description', "available" => 0, "price", "weigth"];

    // public function setValue(){
    //     if
    // }

    public function orders(){
        return $this->belongsToMany('App\Models\Order');
    }
    
    public function ingredients(){
        return $this->hasMany('App\Models\Ingredient');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
