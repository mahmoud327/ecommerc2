<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Offer;

// use Carbon\Carbon;

class ProductController extends Controller
{
    public function product($id)
    {

        // dd(\Carbon\Carbon::now()->format('Y-m-d'));

        $records = Product::Where('offer_id', $id)->paginate(30);
        $idoffer = $id;
        // dd($idoffer);
        return view('client.products', compact('records','idoffer'));

    }
    
    public function productsSearchs(Request $request)
      {

        //   dd('aaaaaaaa');
        //   dd($request->price != null && $request->query != null);

          if($request->price != null && $request->query != null )
          {
            $query = $request->input('query');
            $records = Product::search($query)->where('offer_id',$request->offer)->where('price','<',$request->price)->paginate(20);
  
             return view('client.search-product-results',compact('records'));
          }

          elseif( $request->price != null &&  $request->query == null)
          {
            
            $records = Product::where('offer_id',$request->offer)->where('price','<',$request->price)->paginate(20);
  
             return view('client.search-product-results',compact('records'));
          }

          elseif( $request->price == null &&  $request->query != null)
          {
            $query = $request->input('query');
            $records = Product::search($query)->where('offer_id',$request->offer)->paginate(20);
  
             return view('client.search-product-results',compact('records'));
          }

          
          

          
      }

}
