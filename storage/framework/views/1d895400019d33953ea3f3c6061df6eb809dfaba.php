<?php $__env->startSection('content'); ?>
<!------ Include the above in your HEAD tag ---------->
<!------ Include the above in your HEAD tag ---------->
<br/><br/>
<!--<link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
<link href="http://localhost/laravel/public/css/app.css" rel="stylesheet">

<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-1">
                
            </div>
			<div class="col-md-4 text-white text-center bg-danger">
                <div class="">
                    <div class="card-body">
                        <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                        <h3 class="py-3">Sign in</h3>
                        <p>Already Register Member Login</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 py-5 border ">
                <h4 class="text-left">Login Details</h4>
                <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo e(csrf_field()); ?>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <input type="email" id="email" name="email" class="form-control validate" required="required" placeholder="Email Address" value="<?php echo e(old('email')); ?>">
                        </div>
                        
                      </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="password" id="pass" name="password" class="form-control validate" required="required" placeholder="Password">
                        </div>
                    </div>
                    <div class="signup-toggle center" >
                                    <small><a href="#!" class="main-title red-text" style="color: red; font-weight: bold">Forgot Password ?</a></small>
                                  </div>
					<div class="signup-toggle center" >
                            <p class="center">Have No Account ? <a href="<?php echo e(route('register')); ?>" class="main-title red-text" style="color: red; font-weight: bold">Sign Up</a></p>
                        </div>
                    
                    <div class="form-row">
                        <button type="submit" name="login" class="btn waves-effect waves-light blue right btn-danger">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('prssystem.layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>