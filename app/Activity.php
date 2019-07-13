<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ["activity"];
    public function users(){
        return $this->belongsTo("App\User");
    }
}
