<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    public function permanent()
    {
        
        $records = Offer::Where('sort', 'permanent')->paginate(30);
        // dd($records);
        return view('client.offers.permanent', compact('records'));

    }

    public function temporary()
    {
        
        $records = Offer::Where('sort', 'temporary')->paginate(30);
        return view('client.offers.temporary', compact('records'));

    }
}
