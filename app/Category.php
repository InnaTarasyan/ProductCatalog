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

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function subCategories()
    {
        return $this->hasMany('App\Category', 'parent', 'id');
    }

}
