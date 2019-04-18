@extends('prssystem.layouts.front')
@section('content')
<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row border">
			<div class="col-md-4 col-sm-12 text-white text-center bg-danger">
                <div class="">
                    <div class="card-body">
                        <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                        <h3 class="py-3">Registration</h3>
                        <small>Add your Business infront of millions and earn 3x profits from our listing</small>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            	<div class="col-md-7 py-5 ">
                
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
						<div class="form-row">
						<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} col-md-6 text-left">
						  <label for="name" class="col-md-6 control-label text-left">First Name</label>
						  <input id="name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
						  @if ($errors->has('first_name'))
								<span class="help-block">
									<strong>{{ $errors->first('first_name') }}</strong>
								</span>
							@endif
							
						</div>
						
						
						
						
						
						</div>
						<div class="form-row">
							<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} col-md-6">
						  <label for="last_name" class="col-md-12 control-label text-left">Last Name</label>
						  <input id="name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>
						  @if ($errors->has('first_name'))
								<span class="help-block">
									<strong>{{ $errors->first('first_name') }}</strong>
								</span>
							@endif
							
						</div>
						</div>
						
						
						
						<div class="form-row">
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
						  <label for="email" class="col-md-12 control-label text-left">Email</label>
						  
						  <input type="text" id="email" name="email" class="form-control validate" required="required" placeholder="Enter your email">
						  @if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						  @endif
						  
						</div>
						
						
						
						</div>


						
						
						<div class="form-row">
							<div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }} col-md-6">
						  <label for="mobile" class="col-md-12 control-label text-left">Mobile</label>
						  <input id="mobile" type="phone" class="form-control" name="mobile" value="{{ old('mobile') }}" required>
						@if ($errors->has('mobile'))
							<span class="help-block">
								<strong>{{ $errors->first('mobile') }}</strong>
							</span>
						@endif
						</div>
						</div>


						<div class="form-row">
						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-6">
						  <label for="mobile" class="col-md-12 control-label text-left">Password</label>
						  <input id="password" type="password" class="form-control" name="password" required>
						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
						</div>
						
						
						
						</div>

						<div class="form-row">
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-6">
						  		<label for="mobile" class="col-md-12 control-label text-left">Confirm Password</label>
						  		<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
							</div>
						</div>


						<div class="form-row col-md-12">
                        <div class="form-group">
							  
							  <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
								<small>By clicking Submit, you agree to our <a href="#!" class="main-title red-text" style="color: red; font-weight: bold">Terms & Conditions</a>,  and <a href="#!" class="main-title red-text" style="color: red; font-weight: bold">Privacy Policy</a>
								</small>
							  
                          </div>
                    </div>
                    
					     <div class="form-group">
                            <div class="col-md-6 text-left">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</section>
@endsection
