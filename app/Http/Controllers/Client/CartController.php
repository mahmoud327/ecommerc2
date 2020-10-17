<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Cart::instance('default')->content());
        return view('client.cart');
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
        $duplicates = Cart::search(function ($cartItem, $rowId) use($request) {
            return $cartItem->id === $request->id;
        });
        
        
        
        
        if($duplicates->isNotEmpty())
        {
            flash()->success("هذا المنتج موجود في العربة. ");
            return redirect()->back();
        }
        

        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Models\Product');
        flash()->success("تم الاضافة الي العربة ");
        return redirect()->back();
    }

    public function empty()
    {
        Cart::destroy();    
        flash()->success("تم الحذف بنجاح");
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
        $item = Cart::get($request->id);

        Cart::update($request->id, $request->quantity);
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
        Cart::remove($id);

        // flash()->success("تم الحذف بنجاح ");
        return redirect(route('cart.index'));
    }



}
