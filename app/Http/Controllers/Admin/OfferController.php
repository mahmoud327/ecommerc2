<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Offer;
use App\Models\Item;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Excel;
use App\Imports\PermanentImport;
use App\Imports\TemporaryImport;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function permanent()
    {
      $records = Offer::where('sort','permanent')->orderBy('id', 'DESC')->paginate(20);
      return view ('admin.offers.permanent',compact('records'));
    }

    public function temporary()
    {
      $records = Offer::where('sort','temporary')->orderBy('id', 'DESC')->paginate(20);
      return view ('admin.offers.temporary',compact('records'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.offers.create');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all());
      $rules = [
        'name' => 'required',
        'import_file' => 'required|mimes:xlsx',
        'sort' => 'required',
      ];

      $messages = [
        'name.required' => 'يجب ادخال اسم العرض',
        'import_file.required' => ' يجب ادخال ملف',
        'sort.required' => 'يجب ادخال نوع العرض',
        'import_file.mimes'=>'لا يمكنك اختيار غير ملف اكسل',
      ];

      $this->validate($request, $rules, $messages);

      $record = Offer::create($request->all());
      if ($request->hasFile('image')) {
             $path = public_path();
             $destinationPath = $path . '/uploads/posts/'; // upload path
             $logo = $request->file('image');
             $extension = $logo->getClientOriginalExtension(); // getting image extension
             $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
             $logo->move($destinationPath, $name); // uploading file to given path
             $record->image = 'uploads/posts/' . $name;
             $record->save();
         }

      $id = $record->id;

         

      if($record->sort == 'permanent')
      {
        
        Excel::import(new PermanentImport($id), $request->file('import_file') );
        
      }else
      {
        Excel::import(new TemporaryImport($id), $request->file('import_file') );

      }
      
      

      flash()->success('تم اضافة عرض بنجاح'); 
      return back();
    }

    public function show($id)
    {
       $offer = Offer::where('id',$id)->first();
        $records=Product::where('offer_id',$id)->paginate(10);
        return view('admin.products.detailstemp',compact('records','offer'));
      
    }

    public function edit($id)
    {


      $model = Offer::findOrFail($id);

      return view('admin.offers.edit', compact('model'));

    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $id)
    {


      // dd($request->all());
      $rules = [
        'name' => 'required',
      ];

      $messages = [
        'name.required' => 'يجب ادخال اسم العرض',

      ];

      $this->validate($request, $rules, $messages);
      $record = Offer::findOrFail($id);
      $record->update($request->except('image'));
        
      if ($request->hasFile('image')) {
           $path = public_path();
           $destinationPath = $path . '/uploads/posts/'; // upload path
           $logo = $request->file('image');
           $extension = $logo->getClientOriginalExtension(); // getting image extension
           $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
           $logo->move($destinationPath, $name); // uploading file to given path
           $record->image = 'uploads/posts/' . $name;
           $record->save();
       }

       else {
         // $record->update(['image' =>  'NULL']);
       }

      flash()->success('تم التعديل بنجاح');
      return back();


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function showOffer($id)
    {
        $post = Offer::findOrFail($id);
        $post->update(['is_activated' => 1]);
        flash()->success('تم تفعيل العرض');
        return back();
    }
    public function hideOffer($id)
    {
        $post = Offer::findOrFail($id);
        $post->update(['is_activated' => 0]);
        flash()->success('تم اخفاء العرض');
        return back();
    }


    public function destroy($id)
    {
      $record = Offer::findOrFail($id);
      $record->delete();
      flash()->success("تم الحذف بنجاح");
      return back();
    }


    public function search(Request $request)
    {
        
        $query = $request->input('query');

       

        
        $records = Offer::where('sort','permanent')->search($query)->orderBy('id', 'DESC')->paginate(10);
        return view('admin.offers.per_search-results',compact('records'));
    }

    public function searchTemp(Request $request)
    {
        
        $query = $request->input('query');

        

        $records = Offer::where('sort','temporary')->search($query)->orderBy('id', 'DESC')->paginate(10);

        return view('admin.offers.temp-search-results',compact('records'));
    }
    

}
