
<?php $__env->startSection('title'); ?>
    Select a delivery address
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="reserve-block" style="font-size: 12px !important">
        <div class="container">
		<div class="row">
				<div class="col-md-12">
				<span style="font-size:16px; font-weight: bold ">You Order Details</span>
				</div>
				</div>
			<hr/>
            <div class="row">
				<div class="col-md-12">
				<div style="font-size:14px;" class="alert alert-success">
					<span style="font-size:16px; font-weight: bold ">Shipping Address</span><br/>
					<?php echo e($address['full_name']); ?>,<br/>
					<?php echo e($address['address_1']); ?>,<?php echo e($address['address_2']); ?>,<br/>
					<?php echo e($address['landmarks']); ?>,<?php echo e($address['pincode']); ?>,<?php echo e($address['country']); ?>

				</div>
				<span style="font-size:16px; font-weight: bold ">Your Item List</span>
				</div>
				
				
				</div>
				<hr/>
				<div class="row">
					<div class="col-md-12">
					<?php if(!empty($cartItem)): ?>
                    <?php $__currentLoopData = $cartItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                    <div class="col-sm-2">
                    	<a href="<?php echo e(route('details',['slug'=>str_slug($item['name']),'id'=>encrypt($item['id'])])); ?>">
                        <img style="width:200px;height: 100px; " src="<?php echo e($item['attributes']['default_thumbnail']); ?>" class="img-fluid" alt="#">
                    </a>
                        </div>
                    <div class="col-sm-6 left-align" >
                        <div style="font-size: 16px;"><?php echo e(ucwords($item['name'])); ?></div>
                        <div style="font-size: 12px; ">Brand:&nbsp;<span style="color: orange; font-weight: bold"><?php echo e(ucwords($item['attributes']['brandName'])); ?></span></div>
                        <div style="font-size: 13px;">Seller:&nbsp;
                            <span style="color: #333; font-weight: bold"><?php echo e(ucwords($item['attributes']['seller'])); ?></span></div>
                        <div style="font-size: 13px;">Quantity:&nbsp;
                            <span style="color: #333; font-weight: bold"><?php echo e($item['quantity']); ?></span></div>
                            
                    </div>
                  
                    <div class="col-sm-3">
                        <div style="font-size: 16px;">
                            <p style="color: black">
                            ₹<?php echo e($item['quantity']*$item['price']); ?>

                            </p>

                        </div>
                        
                    </div>
                    <div class="col-sm-1">
                    	<a href="#">
         					 <i class="fa fa-edit" style="font-size:24px"></i>
        				</a>
                    </div>
                </div> 
                    <hr/>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-6" style="font-size: 16px;"><p style="color: black">Total Pay:</p></div>
                    <div class="col-sm-3" style="font-size: 16px;"><p style="color: black">₹<?php echo e($total); ?> </p></div>

                </div>
                <hr/>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-6"></div>
                    <div class="col-sm-3">
                    	<a href="<?php echo e(route('checkoutinit')); ?>" class="btn top-btn" style="background-color:#017eb0;color:#FFF" id="payment"> Back</a>
                        &nbsp;<a href="<?php echo e(route('choosepayment')); ?>?act=paymentOptions&t=<?php echo e(encrypt($total)); ?>&s=<?php echo e(encrypt($address['id'])); ?>" class="btn top-btn" style="background-color:#ff3a6d;color:#FFF" id="payment"> Procced To Payment</a>
                    </div>
                </div>
					
				</div>
				</div>
				
				
               
                
            </div>
            
           
        </div>
    </section>
    
    
    
    </section>
    <!--//END RESERVE A SEAT -->
    <!--============================= BOOKING DETAILS =============================-->
    <!--//END BOOKING DETAILS -->
    
<script>
$(document).ready(function(){
	function getAlert(a,b,c){
		swal({
		  title:a,
		  text: b,
		  icon: c,
		});
	}
	});
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('prssystem/layouts/frontDetails', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>