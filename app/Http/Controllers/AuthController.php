<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Client;
use App\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /// edit email
    public function editProfileAdmin()
    { 
      $model = User::first();
      return view('authpages.editadminprofile',compact('model'));

    }

    public function editProfileAdminUpdate(Request $request)
    { 
      // dd($request->all());
      $rules = [
        'email'             =>'required|email',
        'username'             =>'required',
        
      ];

      $messages = [
        'email.required'    => 'يرجى إدخال البريد الإلكتروني ',
        'username.required'    => 'يرجى ادخال اسم المستخدم',
        'email.email'    => ' يرجى إدخال البريد الإلكتروني بشكل صحيح ',
      ];

      $this->validate($request, $rules, $messages);
      $model = User::first();

      $model->update($request->all());
      $model->save();
      return redirect(route('admin.dashboard'));

    }



    // return login veiw
    public function login()
    {
      return view('authpages.login');

    }
    
    
    // checking if user is a client or an admin
    public function loginCheck(Request $request)
    {

      // dd($request->all());
      $rules = [
        'username'             =>'required',
        'password'             =>'required',
      ];

      $messages = [
        'username.required'    => 'يرجى إدخال اسم المستخدم',
        'password.required' => 'يرجى إدخال كلمة المرور'
      ];

      $this->validate($request, $rules, $messages);

      $credentials = [
        'username' => $request['username'],
        'password' => $request['password'],
    ];

    // Dump data
    //dd($credentials);

  

    $client = Client::where('username',$request->username)->first();
    // $clients = Client::get();

    
    if($client)
    {
      if($client->activate == 1)
      {
        
        if (auth()->guard('client')->attempt($credentials))
        {
          return redirect(route('client-home'));
        }
        else {
          flash()->error("البيانات غير صحيحة");
          return back();
        }

      }
      else
      {
          flash()->error("لايمكنك الدخول في الوقت الحالي");
          return back();
      }
    }

    else {
      flash()->error("البيانات غير صحيحة");
      return back();
    }
 }

 

  // return register veiw
   public function register()
      {
        return view('authpages.register');
      }

      // register a client
      public function registerSave(Request $request)
      {
        $rules = [
          'username'                =>'required|unique:clients',
          'shop_name'               =>'required|alpha|max:100',
          'responsible_name'        =>'required|alpha|max:100',
          'delegate_name'           =>'required|alpha|max:100',
          'address'                  =>'required|string|max:200',
          'email'                   =>'nullable|email',
          'phone'                   =>'required|numeric|min:11',
          'password'                =>'required|confirmed|min:11',

        ];

        $messages = [
          'username.required' => 'يجب ادخال اسم المستخدم',
          'username.unique'   =>'اسم المستخدم موجود بالفعل',

          'shop_name.required' =>'يجب ادخال اسم المحل',
          'shop_name.alpha' =>'يجب أن يتكون الاسم من حروف فقط',

          'responsible_name.required' =>'يجب ادخال اسم المسؤول',
          'responsible_name.alpha' =>'يجب أن يتكون اسم المسؤول من حروف فقط',

          'delegate_name.required' =>'يجب ادخال اسم المندوب',
          'delegate_name.alpha' =>'يجب ان يتكون اسم المندوب من حروف فقط',

          'address.required' =>'يجب ادخال العنوان',

          'email.email' =>' يجب ادخال الايميل بشكل صحيح',

          'phone.required' =>'يجب ادخال رقم الهاتف',
          'phone.min' =>'يجب ان يكون رقم الهاتف 11 رقم',
          'phone.numeric' =>'يجب ان يكون الهاتف رقما',

          'password.required' =>'يجب ادخال كلمة المرور',
          'password.min' =>'يجب ان لا تكون كلمة المرور اقل من 8 احرف او ارقام',
          'password.confirmed' =>'يجب تأكيد كلمة المرور',
        ];

        $this->validate($request, $rules, $messages);

        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());

        $client->notifications()->create([

          'title'     => 'تسجبل',
          'content'   => 'يوجد تسجيل عميل جديد'
        ]);

        
        $client->save();
        flash()->success("برجاء الانتظار حتي يتم تفعيل حسابك");
        return redirect(route('login-user'));


      }


      // return client's profile
      public function profile()
      {

        $model = Auth::user();
        // $model = Client::first();
        // dd($model);
        return view('authpages.profile',compact('model'));

      }


      // save profile

      public function profileSave(Request $request)
      {
        // dd(Auth::user()->id);
        $rules = [
          'username'                =>'required|unique:clients,username,'.Auth::user()->id,
          'shop_name'               =>'required|alpha|max:100',
          'responsible_name'        =>'required|alpha|max:100',
          'delegate_name'           =>'required|alpha|max:100',
          'address'                  =>'required|string|max:200',
          'email'                   =>'nullable|email',
          'phone'                   =>'required|numeric|min:11',
          'password'                =>'required|confirmed|min:11',

        ];

        $messages = [
          'username.required' => 'يجب ادخال اسم المستخدم',
          'username.unique'   =>'اسم المستخدم موجود بالفعل',

          'shop_name.required' =>'يجب ادخال اسم المحل',
          'shop_name.alpha' =>'يجب أن يتكون الاسم من حروف فقط',

          'responsible_name.required' =>'يجب ادخال اسم المسؤول',
          'responsible_name.alpha' =>'يجب أن يتكون اسم المسؤول من حروف فقط',

          'delegate_name.required' =>'يجب ادخال اسم المندوب',
          'delegate_name.alpha' =>'يجب ان يتكون اسم المندوب من حروف فقط',

          'address.required' =>'يجب ادخال العنوان',

          'email.email' =>' يجب ادخال الايميل بشكل صحيح',

          'phone.required' =>'يجب ادخال رقم الهاتف',
          'phone.min' =>'يجب ان يكون رقم الهاتف 11 رقم',
          'phone.numeric' =>'يجب ان يكون الهاتف رقما',

          'password.required' =>'يجب ادخال كلمة المرور',
          'password.confirmed' =>'يجب تأكيد كلمة المرور',
          'password.min' =>'يجب ان لا تكون كلمة المرور اقل من 8 احرف او ارقام',
        ];

        $this->validate($request, $rules, $messages);
        // dd('dd');
        // $client = Client::first();
        
        $client = Auth::user();
        $client->update($request->all());
        flash()->success("تم التعديل بنجاح");

        return back();

      }


      // admin change his password

      public function getResetAdmin()
         {
             return View ('authpages.admin-reset');
         }


         public function updateResetAdmin(Request $request)
         {



             $this->validate($request,[
                 'old-password' => 'required',
                 'password' => 'required|confirmed',
             ], [
               'old-password.required' =>'يجب ادخال كلمة المرور القديمة',
               'password.required'     =>'يجب ادخال كلمة المرور الجديدة',
               'password.confirmed'    =>'يجب تأكيد كلمة المرور الجديد',
             ], [
                 'old-password' => 'Your Password',
                 'password' => 'new Password'
             ]);


             $user = Auth::user();
             if (Hash::check($request->input('old-password'), $user->password)) {

                 // The passwords match...
                 // $user->password = $request->input('password');
                 $user->password = bcrypt($request->input('password'));
                 $user->save();
                 //dd($user);

                 flash()->success('تم تحديث كلمة المرور');
                 return redirect(route('admin.dashboard'));
             }else{
                 flash()->error('كلمة المرور غير صحيحة');
                 return back();
             }

         }


          // client change his password

      public function getResetClient()
      {
          return View ('client.change_password');
      }


      public function updateResetClient(Request $request)
      {



          $this->validate($request,[
              'old-password' => 'required',
              'password' => 'required|confirmed|min:8',
          ], [
            'old-password.required' =>'يجب ادخال كلمة المرور القديمة',
            'password.required'     =>'يجب ادخال كلمة المرور الجديدة',
            'password.min'     =>'يجب ان لا تكون كلمة المرور اقل من 8 احرف او ارقام',
            'password.confirmed'    =>'يجب تأكيد كلمة المرور الجديد',
          ], [
              'old-password' => 'Your Password',
              'password' => 'new Password'
          ]);

            
          $user = Auth::guard('client')->user();
          if (Hash::check($request->input('old-password'), $user->password)) {

              // The passwords match...
              // $user->password = $request->input('password');
              $user->password = bcrypt($request->input('password'));
              $user->save();
              //dd($user);

              flash()->success('تم تحديث كلمة المرور');
              return redirect(route('client-home'));
          }else{
              flash()->error('كلمة المرور غير صحيحة');
              return back();
          }

      }

         // client logout

         public function logout()
        {
          auth()->guard('client')->logout();
          return redirect(route('login-user'));

        }


      // admin change password for client

      public function adminPasswordClient()
         {
             return View ('authpages.adminpasswordclient');
         }


         public function adminPasswordClientUpdate(Request $request)
         {



             $this->validate($request,[
                 'username' => 'required',
                 'password' => 'required|confirmed',
             ], [
               'username.required' =>'يجب ادخال اسم المستخدم',
               'password.required'     =>'يجب ادخال كلمة المرور الجديدة',
               'password.confirmed'    =>'يجب تأكيد كلمة المرور الجديد',
             ], [
                 'old-password' => 'Your Password',
                 'password' => 'new Password'
             ]);

             $client = Client::where('username',$request->username)->first();
             if($client)
             {
               $client->password = bcrypt($request->input('password'));
               $client->save();
               flash()->success('تم تحديث كلمة المرور');
               return back();
             }
             else
             {
               flash()->error('لايوجد مستخدم بهذا الاسم');
               return back();
             }

         }










}
