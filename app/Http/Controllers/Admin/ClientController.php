<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    //
    public function index()
    {
        $records=Client::orderBy('id', 'DESC')->paginate(10);
        return view('admin.clients.index',compact('records'));
    }
  

    public function clientMore()
    {
        // dd("d");
        $records=Client::orderBy('ord_coun', 'DESC')->paginate(10);
        
        return view('admin.clients.clientmore',compact('records'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
  
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
  
    }
  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
  
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
  
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
  
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $record=Client::findorfail($id);
        $record->delete();
        return  redirect(route('clients.index'));
    }
    public function showclient($id)
    {
        $client = Client::findOrFail($id);
        $client->update(['activate' => 1]);
        flash()->success('تم تفعيل هذا الحساب');
        return back();
    }
    public function hideclient($id)
    {
        $client = Client::findOrFail($id);
        $client->update(['activate' => 0]);
        flash()->success('تم تعطيل هذا الحساب ');
        return back();
    }
      public function search(Request $request)
      {
          
          $query = $request->input('query');
  
          // $products = Product::where('name', 'like', "%$query%")
          //                    ->orWhere('details', 'like', "%$query%")
          //                    ->orWhere('description', 'like', "%$query%")
          //                    ->paginate(10);
  
          $records = Client::search($query)->orderBy('id', 'DESC')->paginate(10);
  
          return view('admin.clients.search-results',compact('records'));
      }

  
}
