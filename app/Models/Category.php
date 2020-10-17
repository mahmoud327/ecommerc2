<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('parent_id', 'name');

    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }
}
