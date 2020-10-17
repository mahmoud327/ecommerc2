<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Order extends Model 
{
    use SearchableTrait;

    
    protected $searchable = [
     
        'columns' => [
            'orders.type' => 10,

          
        ]
        ];
        
    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('client_id', 'total', 'type', 'file');
    
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'order_product')->withPivot('price', 'quantity','created_at');
   
    }

}