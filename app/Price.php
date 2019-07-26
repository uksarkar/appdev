<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Price
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Price extends Model
{
    protected $fillable = ['shop_id','product_id','amounts','description'];

    public function product(){
        return $this->belongsTo("App\Product");
    }
    public function shop(){
        return $this->belongsTo("App\Shop");
    }
}
