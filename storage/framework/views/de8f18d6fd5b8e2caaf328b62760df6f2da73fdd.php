
<?php $__env->startSection('title'); ?>
    Select a delivery address
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="reserve-block" style="font-size: 12px !important">
        <div class="container">
		<div class="row">
				<div class="col-md-12">
				<center>
                    <img src="<?php echo e(config('global.THEME_URL_FRONT_IMAGE')); ?>/order_placed.png" class="img-fluid" alt="#"></br>
                    </br>
                    <div style="font-size: 24px;">Thank you for your purchase !</div>
                    <div style="font-size: 16px;">Hi <?php echo e(Auth::user()->first_name); ?>, we're getting your order ready to be shipped. We will notify you when it has been sent.</div>
                    <div style="font-size: 15px;"><strong>Order ID:: <?php echo e($orderID); ?></strong></div>
                </center>
				</div>
		</div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-7">
                <p>Your Order Details</p>
                <?php if(!empty($orderDetails)): ?>
                    <?php $__currentLoopData = $orderDetails['OrderDetail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">

                    <div class="col-sm-2">
                        <a href="<?php echo e(route('details',['slug'=>str_slug($item['product_name']),'id'=>encrypt($item['user_product_id'])])); ?>">
                            <img style="width:200px;height: 100px; " src="<?php echo e($item['default_thumbnail']); ?>" class="img-fluid" alt="#">
                        </a>
                    </div>
                    <div class="col-sm-6 left-align" >
                        <div style="font-size: 16px;"><?php echo e(ucwords($item['product_name'])); ?></div>
                        <div style="font-size: 12px; ">Brand:&nbsp;<span style="color: orange; font-weight: bold"><?php echo e(ucwords($item['brand_name'])); ?></span></div>
                        <div style="font-size: 13px;">Seller:&nbsp;
                            <span style="color: #333; font-weight: bold"><?php echo e(ucwords($item['seller_name'])); ?></span></div>
                        <div style="font-size: 13px;">Quantity:&nbsp;
                            <span style="color: #333; font-weight: bold"><?php echo e($item['quantity']); ?></span></div>
                        <div>Order Id - <?php echo e($item['order_track']); ?></div>
                            
                    </div>
                  
                    <div class="col-sm-3">
                        <div style="font-size: 16px;">
                            <p style="color: black">
                            ₹<?php echo e($item['quantity']*$item['unit_price']); ?>

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

                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-6" >
                            <p>Order Summery</p>
                            <div style="font-size:12px;">Order ID      : <?php echo e($orderID); ?></BR>
                            Order Date    : <?php echo e($orderDate); ?></BR>
                            Order Total   : ₹<?php echo e($totalAmount); ?></BR>
                            Payment Method: Cash On Deleviry</div>
                        </div>
                        <div class="col-md-6">
                            <p>Address Summery</p>
                            <div style="font-size:12px;">
                                <?php echo e($address['full_name']); ?>,<br/>
                                <?php echo e($address['address_1']); ?>,<?php echo e($address['address_2']); ?>,<br/>
                                <?php echo e($address['landmarks']); ?>,<?php echo e($address['pincode']); ?>,<?php echo e($address['country']); ?>

                            </div>
                        </div>
                    </div>
                    <HR/>
                    <center><a href="<?php echo e(route('home')); ?>" class="btn top-btn" style="background-color:#ff3a6d;color:#FFF" id="payment"> Continue For More Shopping</a></center>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('prssystem/layouts/frontDetails', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>