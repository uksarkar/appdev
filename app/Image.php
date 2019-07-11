<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['url','imageable_id','imageable_type'];
    private $dir = '/images/';
    /**
     * Get all of the owning imageable models.
     */
    public function getUrlAttribute($url){
        return $this->dir.$url ;
    }

    public function imageable()
    {
        return $this->morphTo();
    }
}
