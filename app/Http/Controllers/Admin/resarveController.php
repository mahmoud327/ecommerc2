<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;
use App\Models\Client;
use App\Models\Offer;



class resarveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $records=Order::where('type','reservation')->orderBy('id', 'DESC')->paginate(10);
        // dd($records->first()->client->first()->responsible_name);

        return view ('admin.resarve.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
      
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
        $record=Order::findorfail($id);
        $record->delete();
        return  redirect(route('resarve.index'));


    }
    public function search(Request $request)
{
    
    $query = $request->input('query');

    // $products = Product::where('name', 'like', "%$query%")
    //                    ->orWhere('details', 'like', "%$query%")
    //                    ->orWhere('description', 'like', "%$query%")
    //                    ->paginate(10);
    $clients = Client::search($query)->pluck('id')->all();
    
    $records = Order::where('type','reservation')->whereIn('client_id',$clients)->orderBy('id', 'DESC')->paginate(10);
    // dd($records);
    return view('admin.resarve.res_search-results',compact('records'));
}

}
