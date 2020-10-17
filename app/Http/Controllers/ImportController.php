<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Models\Item;

use App\Imports\ItemImport;
use App\Imports\PermanentImport;
use App\Imports\TemporaryImport;

class ImportController extends Controller
{

    

    public function importItem(Request $request)
    {
        $rules=[
            'import_file'  => 'required|mimes:xlsx'

  
        ];
        $message=[
            'import_file.required'  =>  'أدخل ملف الاكسل',
            'import_file.mimes'=>'لا يمكنك اختيار غير ملف اكسل',
            


        ];

        $this->validate($request,$rules,$message);

         Excel::import(new ItemImport, $request->file('import_file') );
         return redirect()->back();
    }

    // public function PermanentItem(Request $request)
    // {

      

    //      Excel::import(new PermanentImport, $request->file('import_file') );
    //      return redirect()->back();
    // }


    public function TemporaryItem(Request $request)
    {
        $rules=[
            'import_file'  => 'required|mimes:xlsx'

  
        ];
        $message=[
            'import_file.required'  =>  'أدخل ملف الاكسل',
            'import_file.mimes'=>'لا يمكنك اختيار غير ملف اكسل',
            


        ];

        $this->validate($request,$rules,$message);

         Excel::import(new TemporaryImport, $request->file('import_file') );
         return redirect()->back();
    }
}
