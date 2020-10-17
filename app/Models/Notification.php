<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'client_id','is_read');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}