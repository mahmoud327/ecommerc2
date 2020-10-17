<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Cart;
class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.reservation');
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
        
        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use($request) {
            return $cartItem->id === $request->id;
        });
        
        
        
        
        if($duplicates->isNotEmpty())
        {
            flash()->success("هذا المنتج موجود في العربة. ");
            return redirect()->back();
        }
        

        Cart::instance('saveForLater')->add($request->id, $request->name, 1, $request->price)->associate('App\Models\Product');
        flash()->success("تم الاضافة الي العربة ");
        return redirect()->back();
    }


    public function empty()
    {
        Cart::instance('saveForLater')->destroy();    
        // flash()->success("تم الحذف بنجاح");
        return back();
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
    public function update(Request $request)
    {
         $item = Cart::instance('saveForLater')->get($request->id);
            
         Cart::update($request->id, $request->quantity);
         
         $response = [

            'status'    => 1,
            'message'   => 'suc',
            'data'      => $request->id,
    
        ];
    
        return response()->json($response);
         // flash()->success("  المنتج الذي اسمه " . $item->name . " أصبحت كميته " . $request->quantity);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Cart::instance('saveForLater')->remove($id);

        // flash()->success("تم الحذف بنجاح ");
        return redirect(route('reservation.index'));
    }
}
