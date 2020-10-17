<?php

namespace App\Exports;


use App\Models\Order;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Cart;

class OfferCartExport implements FromView
{

    protected $id;

    function __construct($id) 
    {
            $this->id = $id;
    }
    

    public function view(): View
    {
        
       $items = Order::where('id', $this->id )->get();  
       
       
       return view('export', compact('items'));
       

    }
}
