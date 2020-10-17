<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
   use SearchableTrait;

    protected $searchable = [
      
        'columns' => [
            'clients.shop_name' => 10,
            'clients.responsible_name' => 10,
            'clients.delegate_name' => 10,
            'clients.email' => 10,
            'clients.address' => 10,
            'clients.phone' => 10,
            
          
        ]
        ];
        
    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('shop_name', 'responsible_name', 'delegate_name', 'address', 'email', 'username', 'password', 'phone', 'ord_coun', 'res_coun','activate');

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

}