<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $records=Item::orderBy('id', 'DESC')->paginate(10);
        return view ('admin.items.index',compact('records'));
    }

    public function moreSail()
    {
        //

        $records=Item::orderBy('ord_coun', 'DESC')->paginate(10);
        return view ('admin.items.moresail',compact('records'));
    }


    public function moreRes()
    {
        //

        $records=Item::orderBy('res_coun', 'DESC')->paginate(10);
        return view ('admin.items.moreres',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         //
         $categories = Category::where('parent_id',null)->get();
         
         return view('admin.items.create',compact('categories'));
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

         $rules=[
             'name'=>'required',
             'quantity'=>'required|numeric',
             'type_number'=>'required|unique:items',
             'category_id'=>'required',
             'type_id'=>'required',

         ];
         $message=[
             'name.required'=>'الاسم يكون مطلوب',
             'quantity.required'=>'الكميه تكون مطلوبه',
             'quantity.numeric'=>'يجب ادخال رقم للكميه',
             'type_id.required'=>'الماركة تكون مطلوبة',
             'type_number.unique'=>'هذا المنتج موجود بالفعل ولايمكن إضافته مرة أخرى',
             'category_id.required'=>'يجب ادخال القسم',
             'type_number.required'=>'رقم القطعه'


         ];
         $this->validate($request,$rules,$message);


         $model = Item::create([
               'name' =>  $request->name,
               'type_number' =>  $request->type_number,
               'type_id' =>  $request->type_id,
               'quantity' =>  $request->quantity,
               'category_id' => $request->category_id

             ]);
        flash()->success('تم اضافة منتج بنجاح'); 
        return redirect(route(('item.index')));
        

     }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {

         $categories = Category::where('parent_id',null)->get();
         $model=Item::findorfail($id);
         return view('admin.items.edit',compact('model','categories'));

     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
     {
         // dd($request->all());
         $rules=[
             'name'=>'required',
             'quantity'=>'required',
             'type_number'=>'required|unique:items,type_number,'.$id,
             'category_id'=>'required',
             'type_id'=>'required',

         ];
         $message=[
             'name.required'=>'الاسم يكون مطلوب',
             'quantity.required'=>'الكميه تكون مطلوبه',
             'type_id.required'=>'الماركة تكون مطلوبة',
             'type_number.unique'=>'هذا المنتج موجود بالفعل ولايمكن إضافته مرة أخرى',
             'category_id.required'=>'يجب ادخال القسم',
             'type_number.required'=>'رقم القطعه'


         ];
         $this->validate($request,$rules,$message);
         $model=Item::findorfail($id);
         $model->update([
           'name' =>  $request->name,
           'type_number' =>  $request->type_number,
           'type_id' =>  $request->type_id,
           'quantity' =>  $request->quantity,
           'category_id' => $request->category_id

         ]);
         $model->save();
         flash()->success('تم التعديل بنجاح'); 
         return redirect(route(('item.index')));
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         // dd('j');
         $record=Item::findorfail($id);
         $record->delete();
         flash()->success('تم حذف المنتج بنجاح'); 
         return  back();


     }

     public function search(Request $request)
    {
        
        $query = $request->input('query');

        

        $records = Item::search($query)->orderBy('id', 'DESC')->paginate(10);

        return view('admin.items.search-results',compact('records'));
    }
    
  
    
}
