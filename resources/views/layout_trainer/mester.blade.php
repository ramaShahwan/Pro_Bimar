<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIMAR</title>
    <link rel="icon" href="{{asset('assetss/re.png')}}" type="image/x-icon" />
      <meta name="description" content="BIMAR">
      <!-- BOOTSTRAP STYLES-->
      <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
      <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- FONTAWESOME STYLES-->
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="{{asset('assets/css/basic.css')}}" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{asset('assets/css/form.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/table.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >

    <!-- "{{asset('css/responsive.css')}}" -->
</head>
<body style="    overflow: auto;
    margin: 0;
    padding: 0;">

    <div id="wrapper" style="    ">
    @include('layout_trainer.header')
    @if(Auth::guard('administrator')->check() || Auth::guard('operation_user')->check())
    @include('layout_admin.sidebar')
@elseif(Auth::guard('trainer')->check())
    @include('layout_trainer.sidebar')
@endif
    @yield('content')

    @include('layout_trainer.footer')

    </div>

 <!-- JQUERY SCRIPTS -->
 <script src="{{asset('assets/js/jquery-1.10.2.js')}}"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{asset('assets/js/jquery.metisMenu.js')}}"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
</body>
</html>
