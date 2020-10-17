<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Item;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $records = Category::where('parent_id',null)->paginate();
      // dd();
      // dd($records->first()->children->first()->children->first()->name);
      return view('admin.categories.index',compact('records'));
    }

    public function categorychildren($id)
    {
      $records = Category::where('parent_id',$id)->paginate();
      $category = Category::where('id',$id)->first();
      // dd();
      // dd($records->first()->children->first()->children->first()->name);
      return view('admin.categories.categorychildren',compact('records','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id',null)->get();
        return view ('admin.categories.create',compact('categories'));
    }


    public function children(Request $request)
    {
      $subs = Category::where('parent_id',$request->parent_id)->get();
      if(count($subs))
      {
        $response    = [
         'status'  => 1,
         'message' =>'success',
         'data'    => $subs
       ];
       return response()->json($response);
      }

      else {
        $response    = [
         'status'  => 0,
         'message' =>'fals',
         'data'    => $subs
       ];
       return response()->json($response);
      }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $rules = [
        'name' => 'required'
      ];

      $messages = [
        'name.required' => 'اسم القائمة مطلوب'
      ];

      $this->validate($request, $rules, $messages);

      $record = Category::create([
            'name' =>  $request->name,
            'parent_id' => $request->parent_id

          ]);

      flash()->success("تم إضافة قسم بنجاح");
      return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // dd($id);
        $category = Category::where('id',$id)->first();
        // dd($category->id);

        $chelderncategories=[];

        if ($category->children)
        {
          $chelderncategories=array_merge($chelderncategories,$category->children->pluck('id')->all());
          foreach ($category->children as $child)
          {
            if ($child->children)
            {
                $chelderncategories=array_merge($chelderncategories,$child->children->pluck('id')->all());
            }
            else
            {
              $chelderncategories=array_merge($chelderncategories,$child->id);

            }

          }
          // $chelderncategories=[];
        }

            // dd($chelderncategories);

        if($chelderncategories)
          {
            // dd(Item::paginate()->first()->category->name);
              $records = Item::whereIn('category_id', $chelderncategories)->paginate();

          }

          else
          {
            $records = Item::where('category_id', $category->id)->paginate();
          }
          // dd($records->first()->type_number);
          return view('admin.categories.show',compact('records','category'));

    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit($id)
    {


      $model = Category::findOrFail($id);

      return view('admin.categories.edit', compact('model'));

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
      $record = Category::findOrFail($id);



      $rules = [
        'name' => 'required'
      ];

      $messages = [
        'name.required' => 'اسم القائمة مطلوب'
      ];

      $this->validate($request, $rules, $messages);


      $record = $record->update([
        'name' =>  $request->name,
        
      ]);

      flash()->success("تم التعديل بنجاح");

      return back();


    }
    //
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
      $record = Category::findOrFail($id);
      $record->delete();
      flash()->success("تم الحذف بنجاح");
      return back();
    }
}
