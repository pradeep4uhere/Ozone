<?php $__env->startSection('content'); ?>
<link href="http://localhost/laravel/public/css/app.css" rel="stylesheet">
<br/><br/>
<!--<link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
<style>
label{
font-size:14px;
}
</style>
<section class="testimonial py-5" id="testimonial">
	<?php if(Session::has('message')): ?>
	<p class="alert alert-success"><?php echo e(Session::get('message')); ?></p>
	<?php endif; ?>
	<?php if(Session::has('error')): ?>
	<p class="alert alert-danger">
	<?php $__currentLoopData = Session::get('error'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php echo e($err); ?></br>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</p>
	<?php endif; ?>
    <div class="container">
        <div class="row ">
            <div class="col-md-1">
                
            </div>
			<div class="col-md-4 text-white text-center bg-danger">
                <div class="">
                    <div class="card-body">
                        <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                        <h3 class="py-3">Seller New Account</h3>
                        <h5>Welcome Back, <?php echo e(Auth::user()->first_name); ?> </h5>
						<br/><br/><br/>
						<h6>Reach millions of People</h6>
<p>
Add your Business infront of millions and earn 3x profits from our listing
</p>
                    </div>
                </div>
            </div>
            <div class="col-md-7 py-5 border ">
                
                <form method="post" action="<?php echo e(route('updateSellerProfile',['id'=>'1'])); ?>"class="form-horizontal" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

						<div class="form-row">
						<div class="form-group col-md-6 text-left">
						  <label for="name" class="col-md-12 control-label">Choose Business Type</label>
						  <select class="form-control" data-live-search="true" id="store_type_id" name="store_type_id">
                                <option data-tokens="">Choose Store Type</option>
                                <?php if(!empty($businessType)): ?>
                                <?php $__currentLoopData = $businessType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($obj['id']); ?>"><?php echo e($obj['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              </select>
							
						</div>
						
						<div class="form-group col-md-6 text-left">
						  <label for="name" class="col-md-12 control-label">Business Name</label>
						  <input id="business_name" type="text" class="form-control" name="business_name" value="<?php echo e(old('business_name')); ?>" required autofocus>
						  <?php if($errors->has('business_name')): ?>
								<span class="help-block">
									<strong><?php echo e($errors->first('business_name')); ?></strong>
								</span>
							<?php endif; ?>
							
						</div>
						
						
						
						
						</div>
						
						
						
						<div class="form-row">
						<div class="form-group col-md-6">
						  <label for="email" class="col-md-12 control-label">Address-1</label>
						  
						  <input type="text" id="address_1" name="address_1" class="form-control validate" required="required" placeholder="Enter your address-1">
						  <?php if($errors->has('address_1')): ?>
							<span class="help-block">
								<strong><?php echo e($errors->first('address_1')); ?></strong>
							</span>
						  <?php endif; ?>
						  
						</div>
						
						<div class="form-group col-md-6">
						  <label for="email" class="col-md-12 control-label">Address-2</label>
						  
						  <input type="text" id="address_2" name="address_2" class="form-control validate" required="required" placeholder="Enter your address-2">
						  <?php if($errors->has('address_2')): ?>
							<span class="help-block">
								<strong><?php echo e($errors->first('address_2')); ?></strong>
							</span>
						  <?php endif; ?>
						  
						</div>
						
						<div class="form-group<?php echo e($errors->has('state_id') ? ' has-error' : ''); ?> col-md-6">
						  <label for="mobile" class="col-md-12 control-label">State</label>
						  
						  <select class="form-control" data-live-search="true" id="state_id" name="state_id">
                                <option data-tokens="">Choose State</option>
                                <?php if(!empty($stateList)): ?>
                                <?php $__currentLoopData = $stateList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id); ?>" <?php if(!empty($user)): ?> <?php if($user->state_id==$id): ?> <?php echo e("selected"); ?> <?php endif; ?> <?php endif; ?>><?php echo e($name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              </select>
							  
							  
						<?php if($errors->has('state_id')): ?>
							<span class="help-block">
								<strong><?php echo e($errors->first('state_id')); ?></strong>
							</span>
						<?php endif; ?>
						</div>
						
						<div class="form-group col-md-6">
                        <label for="inputPassword" class="col-sm-2 control-label"><?php echo app('translator')->getFromJson('seller.profile.city'); ?></label>
                        <select class="form-control" data-live-search="true" id="city_id" name="city_id">
                                <option data-tokens="">Choose City</option>
                                <?php if(!empty($cityList)): ?>
                                <?php $__currentLoopData = $cityList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id); ?>" <?php if(!empty($user)): ?> <?php if($user->city_id==$id): ?> <?php echo e("selected"); ?> <?php endif; ?> <?php endif; ?>><?php echo e($name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              </select>
                        
                    </div>
						
						</div>
						
						
						<div class="form-row">
						<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?> col-md-6">
						 <label for="mobile" class="col-md-12 control-label">Contact Number</label>
						 <div class="form-row">
						<div class="col-sm-3">
                            <input disabled=""  type="text" class="form-control" placeholder="+91" value="+91">
                        </div> 
						<div class="col-sm-9">
                            <input  type="text" class="form-control" id="contact_number" placeholder="Enter Mobile Number" name="contact_number" value="<?php echo e((!empty($user))?$user->contact_number:old('contact_number')); ?>">
                        </div>
                        </div>

						
						</div>
						
						
						<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?> col-md-6">
						  <label for="mobile" class="col-md-12 control-label">Pincode</label>
						  <input  type="text" class="form-control" id="pincode_id" placeholder="Enter Pincode" name="pincode_id" required>
						</div>
						
						<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?> col-md-6">
						  <label for="mobile" class="col-md-12 control-label">Email Address</label>
						  <input  type="text" class="form-control" id="email_address" placeholder="Enter Email address" name="email_address" required>
						</div>
						</div>
						<div class="form-row col-md-12">
                        <div class="form-group">
							  <label class="form-check-label" for="invalidCheck2">
							  <input  type="hidden" class="form-control1" id="country_id" placeholder="Choose Country" name="country_id" value="1">
							  <input  type="hidden" class="form-control1" id="user_id" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
							  <input  type="hidden" class="form-control1" id="id" name="id" value="<?php echo e((!empty($user))?$user->id:'0'); ?>">
							  <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
								<small>By clicking Submit, you agree to our <a href="#!" class="main-title red-text">Terms & Conditions</a>, <a href="#!" class="main-title red-text">Visitor Agreement</a> and <a href="#!" class="main-title red-text">Privacy Policy</a>.</small>
							  </label>
                          </div>
                    </div>
                    
					     <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('prssystem.layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>