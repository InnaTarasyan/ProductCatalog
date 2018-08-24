<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'title',
        'image',
        'description',
        'first_invoice',
        'url',
        'price',
        'amount'];

    public function offer(){
        return $this->belongsTo('App\Offer',  'product_offer', 'product_id', 'offer_id');
    }

    public function category(){
        return $this->belongsToMany('App\Category', 'product_category');
    }
}
