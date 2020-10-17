<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Notification;
use App\Models\Item;
use App\Http\Controllers\Controller;
class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function notification(Request $request)
     {
      $notifications  = Notification::where('is_read',0)->orderBy('id', 'DESC')->take(25)->get();

         $response    = [
          'status'  => 1,
          'message' =>'success',
          'data'    => $notifications
        ];
        return response()->json($response);


     }


     public function updateClient($id)
     {
       $record = Notification::where('id',$id)->first();
       $record->update([
             'is_read' =>  1,

           ]);

       return redirect(route('clients.index'));
     }

     public function updateSail($id)
     {
       $record = Notification::where('id',$id)->first();
       $record->update([
             'is_read' =>  1,

           ]);

       return redirect(route('order.index'));
     }

     public function updateReservation($id)
     {
       $record = Notification::where('id',$id)->first();
       $record->update([
             'is_read' =>  1,

           ]);

           return redirect(route('resarve.index'));
     }

}
