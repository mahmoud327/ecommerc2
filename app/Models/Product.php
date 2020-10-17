<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model 
{
    use SearchableTrait;

    
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */

        'columns' => [
            'products.name' => 100,
            'products.part_number' => 10, 
            'categories.name' => 20,
            'types.name' => 20,

            
        ],
        'joins' => [
            'categories' => ['products.category_id','categories.id'],
            'types' => ['products.type_id','types.id'],
        ],
        ];
        
    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('part_number', 'quantity', 'price', 'name', 'type_id', 'category_id', 'max_qun', 'min_qun', 'offer_id');

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'order_product');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }


    public function offer()
    {
        return $this->belongsTo('App\Models\Offer');
    }

}