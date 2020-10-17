<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use Cart;
// use Excel;

use App\Exports\OfferCartExport;
use App\Exports\TemplateItemExport;
use App\Exports\TemplatePermanentExport;
use App\Exports\TemplateTemporaryExport;
use App\Models\Order;

use Maatwebsite\Excel\Concerns\FromController;
// use Maatwebsite\Excel\Facades\Excel;
use Excel;

class ExportExcelController extends Controller
{

    public function offerExportSail($id=null)
    {
        
        
        $name = 'file' . $id .'.xlsx'; 
        
        return Excel::download(new OfferCartExport($id) , $name);
            
            
        
    }

 

    public function TemplateItemExport()
    {

        return Excel::download(new TemplateItemExport , 'template_item.xlsx');      
    }

    public function TemplatePermanentExport()
    {

        return Excel::download(new TemplatePermanentExport , 'template_permanent.xlsx');      
    }

    public function TemplateTemporaryExport()
    {

        return Excel::download(new TemplateTemporaryExport , 'template_tempory.xlsx');      
    }


}
