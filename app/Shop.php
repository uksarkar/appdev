<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ["name","description","user_id","location"];

    public function user(){
        return $this->belongsTo("App\User");
    }
    public function products(){
        return $this->hasMany("App\Product");
    }
    public function image(){
        return $this->morphOne("App\Image", "imageable");
    }
}
