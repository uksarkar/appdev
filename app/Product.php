<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','user_id','shope_id'];

    public function user(){
        return $this->hasOne('App\User');
    }
    public function image(){
        return $this->morphOne('App\Image', 'imageable');
    }
}
