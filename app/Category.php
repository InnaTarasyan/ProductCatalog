<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id',
        'title',
        'alias',
        'parent'];


    public function subCategories()
    {
        return $this->hasMany('App\Category', 'parent', 'id');
    }

    public function product()
    {
        return $this->belongsToMany('App\Product', 'product_category');
    }
}
