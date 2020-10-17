<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
use Cart;
use Mail;
use App\Mail\OffersMail;
use App\Models\Item;
use App\Models\Client;
use App\Models\Order;
use App\User;

class MainController extends Controller
{


    public function index()
    {
        return view('client.index');
    }


    public function permanent()
    {
        $records = Offer::where('sort', 'permanent')->paginate(20);
        return view('client.permanent', compact('records'));
    }

    public function temporary()
    {
        $records = Offer::where('sort', 'temporary')->paginate(20);
        return view('client.temporary', compact('records'));
    }


    public function newOrder()
    {


        $order = Auth::guard('client')->user()->orders()->create([

            'type'     => 'sail',

        ]);

        $client = Client::where('id', $order->client_id)->first();
            
        
        $cost = 0;

        // $delivery_cost = $restaurants->delivery_cost;

        foreach(Cart::instance('default')->content() as $item)
        {
            
            // dd($product->restaurant()->first()->id . "aaaa");

            $product = Product::findOrFail($item->model->id);

            $readyProduct = [

                $item->model->id => [

                    'product_id'     => $item->model->id,
                    'quantity'       => $item->qty,
                    'price'          => $product->price,
                    'order_id'       => $order->id,

                ]
            ];

             

            $product->orders()->attach($readyProduct);
             
                 
             

            $product->update([

                'quantity'     => ($product->quantity - $item->qty)

            ]);

                
                



                $it = Item::where('type_number', $product->part_number)->first();
                $it->update([
                   'ord_coun' => ($it->ord_coun + $item->qty)
                ]);   
                
   
   
   
                $client->update([
                       
                   'ord_coun' => $client->ord_coun + $item->qty
               ]);
        }

        


        $total = Cart::total();
        $update = $order->update([

            'total'             => $total,
            
        ]);


            $title = ' شراء ';
            $content = 'يوجد عملية شراء جديدة';

            Auth::guard('client')->user()->notifications()->create([

                'title'     => $title,
                'content'   => $content,

            ]);


            Mail::to(User::first()->email)
                ->send(new OffersMail($order->id));

            flash()->success("تمت العملية بنجاح");

            Cart::destroy();
            return redirect(route('offer_export', $order->id));
    }


    public function newReservation()
    {

        $order = Auth::guard('client')->user()->orders()->create([

            'type'     => 'reservation',

        ]);

        $client = Client::where('id', $order->client_id)->first();
        

        foreach(Cart::instance('saveForLater')->content() as $item)
        {
            
            $product = Product::findOrFail($item->model->id);

            $readyProduct = [

                $item->model->id => [
                    'product_id'     => $product->id,
                    'quantity'       => $item->qty,
                    'price'          => $product->price,
                    'order_id'       => $order->id,

                ]
            ];
             
            $product->orders()->attach($readyProduct);
             

             $it = Item::where('type_number', $product->part_number)->first();
             $it->update([
                'res_coun' => ($it->res_coun + $item->qty)
             ]);   
             



             $client->update([
                    
                'res_coun' => $client->res_coun + $item->qty
            ]);
           
        }


            

      
            $total = Cart::instance('saveForLater')->total();
            $update = $order->update([

                'total'             => $total,
                
            ]);

            $title = ' حجز ';
            $content = 'يوجد عملية شراء حجز';;

            Auth::guard('client')->user()->notifications()->create([

                'title'     => $title,
                'content'   => $content,

            ]);
                
            Mail::to(User::first()->email)
                ->send(new OffersMail($order->id));


            flash()->success("تم الحجز بنجاح");
            Cart::instance('saveForLater')->destroy();

            return redirect(route('offer_export', $order->id));
    }


    public function clientSail()
    {

        $records = Auth::guard('client')->user()->orders()->where('type','sail')->orderBy('id', 'DESC')->paginate(10);
        // $records = Order::where('client_id', 1)->where('type','sail')->orderBy('id', 'DESC')->paginate(10);
        
        return view ('client.orders.sail',compact('records'));
    }

    public function clientReservation()
    {

        $records = Auth::guard('client')->user()->orders()->where('type','reservation')->orderBy('id', 'DESC')->paginate(10);
        // $records = Order::where('client_id', 1)->where('type','reservation')->orderBy('id', 'DESC')->paginate(10);
        return view ('client.orders.reservation',compact('records'));
    }
}
