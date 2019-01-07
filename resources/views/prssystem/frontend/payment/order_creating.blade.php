@extends('prssystem/layouts/blank')
@section('title')
    Please Wait...
@stop
@section('content')
<?php 
function getCallbackUrl()
{
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . 'response';
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<center>
    <div style="margin-top: 10%">
    <p><img style="width:200px;height: 100px; " src="{{config('global.THEME_URL_IMAGE')}}/loading.gif" class="img-fluid" alt=""></p>
    <h4>Please Wait...</h4>
    <p>Do not refresh this page, your order is creating, you will auto redirect.<br/><small>Your Ip Address: <?php echo $_SERVER['REMOTE_ADDR']?></small></p>

    <div>
</center>

<form action="<?php echo $PAYU_BASE_URL; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $merchentKey ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $transxId ?>" />
      <input name="amount" value="<?php echo $total; ?>" />
      <input name="firstname" id="firstname" value="<?php echo $customerName; ?>" />
      <input name="email" id="email" value="<?php echo $customerEmail; ?>" />
      <input name="phone" value="<?php echo $mobile; ?>" />
      <textarea name="productinfo"><?php echo $productInfo; ?></textarea>
      <input name="surl" value="<?php echo $successUrl ?>"/>
      <input name="furl" value="<?php echo $failedUrl ?>" />
      <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
      <input name="lastname" id="lastname" value="" />
      <input name="curl" value="" />
      <input name="address1" value="" />
      <input name="address2" value="" />
      <input name="city" value="" />
      <input name="state" value="" />
      <input name="country" value="" />
      <input name="zipcode" value="" />
      <input name="udf1" value="" />
      <input name="udf2" value="" />
      <input name="udf3" value="" />
      <input name="udf4" value="" />
      <input name="udf5" value="" />
      <input name="pg" value="" />
    </form>
<script type="text/javascript">
submitPayuForm();
var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
var payuForm = document.forms.payuForm;
payuForm.submit();
}
</script>	
@stop
