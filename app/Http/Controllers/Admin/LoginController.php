<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Client;

class LoginController extends Controller
{
    //
    
    public function getlogin(){
        return view('admin.Auth.login');

    }

  
    public function login(Request $request){
     
        {
          $rules = [
            'email'             =>'required',
            'password'          =>'required',
          ];
    
          $messages = [
            'email.required'    => 'البريد الالكترونى يكون مطلوب',
            'password.required' => 'الباسورد يكون مطلوب'
          ];
    
          $this->validate($request, $rules, $messages);
    
          $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
    
    
    
        if (auth()->guard('client')->attempt($credentials))
        {
          return redirect(route('/'));
        }
    
        elseif (auth()->guard('web')->attempt($credentials))
        {
          return redirect(route('admin.dashboard'))->with(['success' =>'نم تسجيل الدخول']);
        }
    
    
    
        else {
          return back()->with(['error' => 'هناك خطا بالبيانات']);
        }
     
        }
    
       // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
        
    }
    public function register()
  {
    return view('admin.Auth.register');
  }
  public function registerSave(Request $request)
  {
    $rules = [
      'shop_name'              =>'required',
      'password'          =>'required|confirmed',
      'phone'             =>'required',
      'email'             =>'nullable',
      '	responsible_name'       =>'required',
      'username'=>'required',
      'delegate_name'=>'required',
      'address'=>'required',
    ];

    $messages = [
      'name.required' => 'الاسم مطلوب',
      'shop_name'=>'اسم المحل مطلوب',
      'password'=>'الباسورد مطلوب',
      'responsible_name'=>'اسم المسئول مطلوب',
      'delegate_name'=>'اسم المندوب',
      'address'=>'العنوان مطلوب'


    ];

    $this->validate($request, $rules, $messages);

    $request->merge(['password' => bcrypt($request->password)]);
    $client = Client::create($request->all());
    $client->save();

    auth()->guard('client')->login($client);
    return redirect(route(''));


  }


}