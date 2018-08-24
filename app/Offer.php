<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'id',
        'price',
        'amount',
        'sales',
        'article'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}
