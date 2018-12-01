@extends('prssystem/layouts/blank')
@section('title')
    Please Wait...
@stop
@section('content')
<center>
    <div style="margin-top: 10%">
    <p><img style="width:200px;height: 100px; " src="{{config('global.THEME_URL_IMAGE')}}/loading.gif" class="img-fluid" alt="#"></p>
    <h4>Please Wait...</h4>
    <p>Do not refresh this page, your order is creating, you will auto redirect.<br/><small>Your Ip Address: <?php echo $_SERVER['REMOTE_ADDR']?></small></p>

    <div>
</center>
@stop
