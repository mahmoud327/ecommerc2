<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Item extends Model 
{
     use SearchableTrait;

    
    protected $searchable = [
     
        'columns' => [
            'items.name' => 100,
            'items.type_number' => 10,
            'items.quantity' => 10,
            'categories.name' => 20,

            
        ],
        'joins' => [
            'categories' => ['items.category_id','categories.id'],
        ],
        ];
      

    protected $table = 'items';
    public $timestamps = true;
    protected $fillable = array('type_number', 'quantity', 'name', 'ord_coun', 'res_coun','type_id', 'category_id');

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

}