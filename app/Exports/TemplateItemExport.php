<?php

namespace App\Exports;

use App\Models\Offer;
use App\Models\OfferOrder;
use App\Models\Order;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Cart;

class TemplateItemExport implements FromView
{


    public function view(): View
    {         

       return view('admin.export.template_item_export');

    }
}
