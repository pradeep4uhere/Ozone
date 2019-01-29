<!DOCTYPE html>
<html lang="en">
    <head>
    @include('prssystem.layouts.metaHead')
    
    <!-- Bootstrap CSS -->
    <link href="{{config('global.THEME_URL_FRONT_CSS').'/bootstrap.min.css'}}" rel="stylesheet">
    <link href="{{config('global.THEME_URL_FRONT_CSS').'/font-awesome-4.7.0/css/font-awesome.min.css'}}" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="{{config('global.THEME_URL_FRONT_CSS').'/simple-line-icons.css'}}">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="{{config('global.THEME_URL_FRONT_CSS').'/themify-icons.css'}}">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="{{config('global.THEME_URL_FRONT_CSS').'/set1.css'}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{config('global.THEME_URL_FRONT_CSS').'/thumbs2.css'}}">
    <link rel="stylesheet" href="{{config('global.THEME_URL_FRONT_CSS').'/thumbnail-slider.css'}}">
    <link rel="stylesheet" href="{{config('global.THEME_URL_FRONT_CSS').'/style.css'}}">
	<script src="{{config('global.THEME_URL_FRONT_JS').'/jquery-3.2.1.min.js'}}"></script>
	<script src="{{config('global.THEME_URL_FRONT_JS').'/sweetalert.min.js'}}"></script>
     <!-- Hotjar Tracking Code for www.go4shop.online -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1168165,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
</head>
<body>
<div class="nav-menu">
        <div class="bg transition">
            <div class="container-fluid fixed">
<!--============================= HEADER START HERE =============================-->
@include('prssystem.partials.frontend_header')
<!--============================= HEADER ENDS HERE=============================-->
</div>    
</div>    
</div>  
<!-- BEGIN MAIN CONTENT -->
   @yield('content')
<!-- END MAIN CONTENT -->
<!--============================= FOOTER =============================-->
@include('prssystem.partials.theme_footer')
<script>
	var CSRF_TOKEN = '{{csrf_token()}}';
	var POST_LOCATION_URL = '{{route('getlocation')}}';
</script>
<!--//END FOOTER -->
<!-- jQuery, Bootstrap JS. -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{config('global.THEME_URL_FRONT_JS').'/popper.min.js'}}"></script>
<script src="{{config('global.THEME_URL_FRONT_JS').'/bootstrap.min.js'}}"></script>
<script src="{{config('global.THEME_URL_FRONT_JS').'/custome.js'}}"></script>
<!-- begin page level js -->
@yield('footer_scripts')
<!-- end page level js -->
    </body>
</html>
