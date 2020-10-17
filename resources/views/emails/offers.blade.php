<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        
    
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
    <!-- END Page Level CSS-->
    <link rel="stylesheet" href="{{asset('assets/fontawesome-free/css/all.min.css')}}">
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/style-rtl.css')}}">
    <!-- END Custom CSS-->
    
    <link rel="stylesheet" type="text/css" href="{{asset('assets/AdminLTE.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/style_client.css')}}">


    <style>

        .myButton {
            background:linear-gradient(to bottom, #44c767 5%, #5cbf2a 100%);
            background-color:#44c767;
            border-radius:28px;
            border:1px solid #18ab29;
            display: block;
            height: 40px;
            width: 215px;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:17px;
            padding:16px 31px;
            line-height: 50%;
            text-align: center;
            margin: 0 auto;
            text-decoration:none;
            text-shadow:0px 1px 0px #2f6627;
        }
        .myButton:hover {
            background:linear-gradient(to bottom, #5cbf2a 5%, #44c767 100%);
            background-color:#5cbf2a;
        }
        .myButton:active {
            position:relative;
            top:1px;
        }
    </style>
</head>
<body>

<h2 style="text-align: center">لديك طلب جديد</h2>

 <a href="{{route('offer_export', $id )}}" class="myButton" style="text-align: center">تنزيل الطلب  </a>
        


</body>
</html>
