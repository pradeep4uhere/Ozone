<?php $__env->startSection('title'); ?>
    Home Page
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="reserve-block" style="font-size: 14px !important">
        <div class="container">
            <div class="row">
				<div class="col-md-12">
				<div class="row">
				<div class="col-md-12">
				<div style="font-size: 16px;">
				<b>Seller :: </b> <?php echo e($seller); ?>

				</div>
				</div>
				</div>
				<hr/>
				</div>
                <div class="col-md-8">
                <div class="card">
                <div class="card-header">Item In Cart (<?php echo e(count($cartItem)); ?> Items)</div>
                <div class="card-body" style="font-size: 13px !important">
				<?php $totalAmount=array();?>
                    <?php if(!empty($cartItem)): ?>
                    
                    <?php $__currentLoopData = $cartItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        
                    <div class="col-sm-2">
                        <img style="width:200px;height: 100px; " src="<?php echo e(config('global.PRODUCT_IMG_URL').DIRECTORY_SEPARATOR.$item['UserProduct']['default_images']); ?>" class="img-fluid" alt="#">
                        </div>
                    <div class="col-sm-4 left-align" >
                        <div style="font-size: 16px;"><?php echo e($item['UserProduct']['Product']['title']); ?></div>
                        <div style="font-size: 12px;">Brand:&nbsp;<?php echo e($item['UserProduct']['Product']['Brand']['name']); ?></div>
                        <div style="font-size: 13px;">Selected Unit:&nbsp;<?php echo e($item['UserProduct']['quantity_in_unit']); ?>&nbsp;<?php echo e($item['UserProduct']['Product']['Unit']['name']); ?></div>
                        <div style="font-size: 13px;">Seller:&nbsp;<?php echo e($item['Seller']['business_name']); ?></div>
                    </div>
                    <div class="col-sm-2">
                    <p><select class="custom-select"  style="font-size: 13px;" onchange="updateCart(this.value,<?php echo e($item['id']); ?>)" id="quantity_<?php echo e($item['id']); ?>">
                                                        <?php for($i=1;$i<100;$i++): ?>
                                                        <option value="<?php echo e($i); ?>" <?php if($item['quantity']==$i): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
                                                        <?php endfor; ?>
                                                </select></p>
                    </div>
                        
                    <div class="col-sm-2">
                        <div style="font-size: 16px;">₹&nbsp;<?php echo e($item['quantity']*$item['UserProduct']['price']); ?></div>
                        
                    </div>
                    <div class="col-sm-2">
                        <p><a style="font-size: 12px; padding:2px; font-weight: bold" href="<?php echo e(route('removeCartItem',['id'=>$item['id']])); ?>"><span>Remove</span></a></p>
                    </div>
                </div> <br/>
                    <?php $totalAmount[]=$item['quantity']*$item['UserProduct']['price'];?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
					<div class="featured-btn-wrap">
						<a href="<?php echo e(route('listing')); ?>" class="btn btn-danger">No Item In your cart, Add Now</a>
					</div>
			        <?php endif; ?>
                </div> 
                </div>
                    
                </div>
                <div class="col-md-4">
                   <div class="card success">
                    <div class="card-header"> Payment Summary</div>
					
                    
                    <div class="card-body" style="font-size: 15px !important">
					<?php if(!empty($cartItem)): ?>
                        <div class="row">
                            <div class="col-sm-9">Subtotal</div>
                            <div class="col-sm-3">₹&nbsp;<?php echo e(array_sum($totalAmount)); ?></div>
                        </div><br/>    
                        <div class="row">
                            <div class="col-sm-9">Shipping Fee </div>
                            <div class="col-sm-3">₹&nbsp;0</div>
                        </div> 
                        <hr style="margin-bottom:1px; padding:5px">
                        <div class="row">
                            <div class="col-sm-9"><b>Total</b> </div>
                            <div class="col-sm-3"><b>₹&nbsp;<?php echo e(array_sum($totalAmount)); ?></b></div>
                        </div> 
                        <hr style="margin-bottom:1px; padding:5px">
                        <center>
                        <div class="reserve-btn row">
                            <div class="featured-btn-wrap">
								<?php if(Auth::check()): ?> 
                                <a href="javascript:$('#cartCheckout').submit()" class="btn btn-danger">Payment Now</a>
								<?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="btn btn-danger">Login To Order</a>
								<?php endif; ?>
                            </div>
                        </div>
                        </center>
						<?php endif; ?>
                    </div> 
					
                  </div>
                </div>
            </div>
            
            <div class="row">
                
            </div>
        </div>
    </section>
    
    
    
    </section>
    <!--//END RESERVE A SEAT -->
    <!--============================= BOOKING DETAILS =============================-->
    <hr style="padding:0px;margin:0px;">
    <section class="reserve-block">
    </section>
    <hr style="padding:0px;margin:0px;">
    <section class="reserve-block">
    </section>
    <!--//END BOOKING DETAILS -->
    <form id="cart" action="<?php echo e(route('updatecart')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="qnty" id="qnty">
        <input type="hidden" name="cart_id" id="cart_id">
    </form>
	
	<form id="cartCheckout" action="<?php echo e(route('checkoutinit')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="qnty" id="qnty" value=<?php echo e(count($cartItem)); ?>>
        <input type="hidden" name="cart_id" value="<?php echo e(encrypt($cart_id)); ?>">
        <input type="hidden" name="gtotal" value="<?php echo e(encrypt(array_sum($totalAmount))); ?>">
    </form>
    <script>
        function updateCart(v,i){
            $('#qnty').val(v);
            $('#cart_id').val(i);
            $('#cart').submit();
        }
		
    </script>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('prssystem/layouts/frontDetails', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>