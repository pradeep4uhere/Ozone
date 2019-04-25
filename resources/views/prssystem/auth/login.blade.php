@extends('prssystem.layouts.front')
@section('content')
<script type="text/javascript">
   
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
    FB.init({
      appId      :  "{{env('FACEBOOK_APP_ID')}}",
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v3.2' // The Graph API version to use for the call
    });

    // Now that we've initialized the JavaScript SDK, we call 
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.

    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?fields=id,name,email,first_name,last_name,picture', function(response) {
       // alert("OK");
      getMessage(response);
      //document.getElementById('status').innerHTML ='Thanks for logging in, ' + response.name + '!';
    });
  }
  function getMessage(responseJson) {
    console.log(responseJson);
    //var responseJson._token = "<?php echo csrf_token() ?>";
    $.ajax({
       type:'POST',
       dataType: "json",
       url:"/api/en/v1/fblogin",
       data:responseJson,
       success:function(data) {
           console.log(data);
           if(data.status){
               window.location.href = "{{route('homePage')}}";
           }else{
               alert('Please try after sometime.');
           }
          //console.log('Successful login for: ' + JSON.stringify(data));
       }
    });
    }
</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&autoLogAppEvents=1&version=v3.2&appId=171052846975740"></script>

<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row border">
			<div class="col-md-3 text-white text-center bg-danger">
                <div class="">
                    <div class="card-body">
                        <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                        <h3 class="py-3">Sign in</h3>
                        <p>Already Register Member Login</p>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4 py-5 ">
                <h4 class="text-left">Login Details</h4>
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                          <input type="email" id="email" name="email" class="form-control validate" required="required" placeholder="Email Address" value="{{ old('email') }}">
                        </div>
                        
                      </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="password" id="pass" name="password" class="form-control validate" required="required" placeholder="Password">
                        </div>
                    </div>
                    <div class="signup-toggle center" >
                                    <small><a href="#!" class="main-title red-text" style="color: red; font-weight: bold">Forgot Password ?</a></small>
                                  </div>
					<div class="signup-toggle center" >
                            <p class="center">Have No Account ? <a href="{{route('register')}}" class="main-title red-text" style="color: red; font-weight: bold">Sign Up</a></p>
                        </div>
                    
                    <div class="form-row">
                        <button type="submit" name="login" class="btn waves-effect waves-light blue right btn-danger">Log in</button>
                    </div>
                </form>
            </div>

            <div class="col-md-4 py-5 ">
                
                <div class="form-row">
                   <h4 class="text-left">Login With</h4>
                        <div class="form-group col-md-12">
                           <div class="fb-login-button" data-size="large" data-button-type="continue_with" data-auto-logout-link="false" data-use-continue-as="true"></div>
                        
                        </div>
                        
                      </div>
            </div>
        </div>
    </div>
</section>



@endsection