<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }


    public function edit($id)
    {

      $categories  = Category::where('parent_id',null)->get();
      $model = Product::findOrFail($id);
      // dd($categories);
      return view('admin.products.edit', compact('model','categories'));

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
      $rules=[
          'name'=>'required',
          'quantity'=>'required|numeric',
          'part_number'=>'required',
          'category_id'=>'required',
          'type_id'=>'required',
          'price'=>'numeric',

          // 'max-qun'=>'required',

      ];
      $message=[
          'name.required'=>'الاسم يكون مطلوب',
          'quantity.numeric'=>'يجب ادخال رقم',
          'quantity.required'=>'الكميه تكون مطلوبه',
          'type_id.required'=>'الماركة تكون مطلوبة',
          'category_id.required'=>'يجب ادخال القسم',
          'part_number.required'=>'رقم القطعه',
          'peice.numeric'=>'ادخال رقم للسعر'


      ];
      $this->validate($request,$rules,$message);
      $model=Product::findorfail($id);
      $model->update([
        'name' =>  $request->name,
        'part_number' =>  $request->part_number,
        'price' =>  $request->price,
        'max_qun' =>  $request->max_qun,
        'type_id' =>  $request->type_id,
        'quantity' =>  $request->quantity,
        'category_id' => $request->category_id

      ]);
      $model->save();
      flash()->success("تم التعديل");
      return back();


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function destroy($id)
    {
      $record = Product::findOrFail($id);
      $record->delete();
      flash()->success("تم الحذف بنجاح");
      return back();
    }
    public function search(Request $request)
    {

        $query = $request->input('query');

        // $products = Product::where('name', 'like', "%$query%")
        //                    ->orWhere('details', 'like', "%$query%")
        //                    ->orWhere('description', 'like', "%$query%")
        //                    ->paginate(10);

        $records = Product::search($query)->paginate(10);

        return view('admin.products.search-results',compact('records'));
    }

}
