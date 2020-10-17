<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $records=Type::paginate(10);
        return view ('admin.type.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
     
        $rules=[
          
           
            'name'=>'required|unique:types',
         

  
        ];
        $message=[
            'name.required'=>'الاسم يكون مطلوب',
            'name.unique'=>'هذه الماركة موجودة بالفعل لا يمكن انشاءها مرة أخرى',
         

        ];
        $this->validate($request,$rules,$message);
        $model=Type::create($request->all());
  
        flash()->success("تم انشاء ماركة بنجاح");
        
        return  redirect(route('type.index'));
  
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
        //

        $model=Type::findorfail($id);
        return view('admin.type.edit',compact('model'));
  
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
          $rules=[
              
              
            'name'=>'required|unique:types,name,'.$id,
        


        ];
        $message=[
            'name.required'=>'الاسم يكون مطلوب',
            'name.unique'=>'هذه الماركة موجودة بالفعل لا يمكن انشاءها مرة أخرى',
        

        ];
        $this->validate($request,$rules,$message);
        $model=Type::findorfail($id);
        $model->update($request->all());
        $model->save();
        flash()->success("تم التعديل بنجاح");
        return  redirect(route('type.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $record=Type::findorfail($id);
        $record->delete();
        flash()->success("تم الحذف بنجاح");
        return  redirect(route('type.index'));


    }
   
}
