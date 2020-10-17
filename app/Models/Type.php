<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Nicolaslopezj\Searchable\SearchableTrait;

class Type extends Model 
{

    protected $table = 'types';
    public $timestamps = true;
    protected $fillable = array('name');

    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

}