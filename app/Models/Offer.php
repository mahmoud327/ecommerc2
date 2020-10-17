<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Offer extends Model 
{
   use SearchableTrait;

    
    protected $searchable = [
     
        'columns' => [
            'offers.name' => 10,

          
        ]
        ];
        
    protected $table = 'offers';
    public $timestamps = true;
    protected $fillable = array('product_id', 'sort', 'name','is_activated', 'deadline');

        

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

}