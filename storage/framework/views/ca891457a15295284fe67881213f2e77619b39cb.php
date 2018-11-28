<?php $__env->startSection('content'); ?>
<link href="http://localhost/laravel/public/css/app.css" rel="stylesheet">
<br/><br/>
<!--<link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
<section class="testimonial py-5" id="testimonial">
    <div class="container" >
        <div class="row " >
            <div class="col-md-1">
                
            </div>
			<div class="col-md-3 text-white text-center bg-danger">
                <div class="">
                    <div class="card-body">
                        
                        <h3 class="py-3">Thank You !</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-7 py-5 border bg-default ">
			<form>
							<h4 class="text-center">Thank You</h4>
							<p class="text-center">Your submissions has been sent successfully!</p>
							<p class="text-center"><b>Please check your email for further instructions on how to complete your account setup.</b></p>
               							<p class="text-center">By Clicking <a href="<?php echo e(route('login')); ?>" class="main-title red-text">Login</a> You can  login into your account.							</p>
                
               </form> 
                                    </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('prssystem.layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>