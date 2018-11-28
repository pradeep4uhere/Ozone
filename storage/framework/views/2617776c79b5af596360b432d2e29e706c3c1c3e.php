<?php $__env->startSection('title'); ?>
    Select a delivery address
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="reserve-block" style="font-size: 12px !important">
        <div class="container">
            <div class="row">
				<div class="col-md-12">
				<div class="row">
				<div class="col-md-3">
				 <div style="font-size: 16px;">
				<label class="btn btn-info"><input type="radio" name="shippingType" value="1" class="addressType" checked>&nbsp;&nbsp;I want Item Deliver To My Address</label>
				</div>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-2">
				 <div style="font-size: 16px;">
				<label  class="btn btn-info"><input type="radio" name="shippingType" value="2" class="addressType">&nbsp;&nbsp;I Will Pick From Shop</label>
				</div>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-4">
				<label>
					<a href="javascript:void(0))" class="btn top-btn" style="background-color:#ff3a6d;color:#FFF" id="payment"> Procced To Payment</a>
				</label>
				</div>
				</div>
				<hr/>
				
				</div>
                <div class="col-md-12">
                <div class="">
               
                <div class="card-body" style="font-size: 13px !important" >
					<div class="row" id="delAddress">
                    <?php if(!empty($address)): ?>
                    <?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<div class="col-md-4">
						<div class="card cardClass" id="card_<?php echo e($item->id); ?>">
						<div class="card-header" style="font-size: 16px;"><?php echo e($item->full_name); ?></b></div>
						<div class="card-body" style="font-size: 13px !important">
						<div class="">
						<div><?php echo e($item->address_1); ?></div>	
						<div><?php echo e($item->address_2); ?></div>	
						<div><?php echo e($item->landmarks); ?></div>	
						<div><?php echo e($item->city_id); ?>, <?php echo e($item->state_id); ?>, <?php echo e($item->pincode); ?>, <?php echo e($item->country); ?></div>	
						</div>
						<div>
						<button class="btn btn-info del" style="padding:8px; font-size:12px;margin-top:5px;" id="del_<?php echo e($item->id); ?>" >Delivery Here</button>
						<button class="btn btn-warning edit" style="padding:8px; font-size:12px;margin-top:5px;" id="edit_<?php echo e($item->id); ?>" >&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
						<button class="btn btn-danger remove" style="padding:8px; font-size:12px;margin-top:5px;" id="remove_<?php echo e($item->id); ?>">Remove</button>
						</div>
						</div>
						
						
						</div>
						<br/>
					</div>
					
					
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
					<div class="featured-btn-wrap">
						<div class="card">
						<div class="card-header" style="font-size: 16px;">No Address Found</b></div>
						<div class="card-body" style="font-size: 13px !important">
						<button class="btn btn-info">Add New Delivery Address</button>
						</div>
						</div>
					</div>
			        <?php endif; ?>
					</div>
					
					<div class="row" id="pickAddress" style="display:none">
                    <?php if(!empty($sellerAddress)): ?>
                    <?php $__currentLoopData = $sellerAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name=>$seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-md-12">
					<div style="font-size:16px;"> Pickup Address For Seller :: <?php echo e($name); ?></div>
					<hr/>
					<?php $__currentLoopData = $seller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-md-4">
						<div class="card">
						<div class="card-header" style="font-size: 16px;"><?php echo e($item->full_name); ?></b></div>
						<div class="card-body" style="font-size: 13px !important">
						<div class="">
						<div><?php echo e($item->address_1); ?></div>	
						<div><?php echo e($item->address_2); ?></div>	
						<div><?php echo e($item->landmarks); ?></div>	
						<div><?php echo e($item->city_id); ?>, <?php echo e($item->state_id); ?>, <?php echo e($item->pincode); ?>, <?php echo e($item->country); ?></div>	
						</div>
						<button class="btn btn-danger" style="padding:5px; font-size:12px;margin-top:5px;">Pickup</button>
						</div>
						
						
						</div>
						<br/>
						<br/>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
					</div>
					
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
			        <?php endif; ?>
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
    <form id="cart" action="<?php echo e(route('updatecart')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="qnty" id="qnty">
        <input type="hidden" name="cart_id" id="cart_id">
        
    </form>
	<form id="choosePay" action="<?php echo e(route('choosepayment')); ?>" method="post">
	<input type="hidden" name="pickup" id="pickupAddress">
	<input type="hidden" name="shippingAddress" id="shippingAddress">
	<input type="hidden" name="sessionId" value="<?php echo e($sessionId); ?>">
	<input type="hidden" name="item" id="item" value=<?php echo e($item); ?>>
    <input type="hidden" name="cart_id" value="<?php echo e($cart_id); ?>">
    <input type="hidden" name="tgm" value="<?php echo e($tgm); ?>">
    <input type="text" name="sellerIDArr" value="<?php echo e($sellerIDArr); ?>">
	<?php echo e(csrf_field()); ?>

	</form>
    <script>
	$(document).ready(function(){
	function getAlert(a,b,c){
		swal({
		  title:a,
		  text: b,
		  icon: c,
		});
	}
	
	$('#payment').click(function(){
		var shippingAddress = $('#shippingAddress').val();
		var pickupAddress = $('#pickupAddress').val();
		if(shippingAddress!='' || pickupAddress!=''){
			$('#choosePay').submit();
			
		}else{
			getAlert('Error!','Please Select Shipping Address or Pickup Address!','error');
		}
	});
		
		
		
		
		
		//Select Delevery Address
	$('.del').click(function(){
		var idStr =$(this).attr('id'); 
		var idStrArr =idStr.split('_'); 
		var id =idStrArr[1];
		$('.cardClass').removeClass('bg-info');
		$('#card_'+id).addClass('bg-info');
		$('#shippingAddress').val(id);
	});
	$('.remove').click(function(){
		var idStr =$(this).attr('id'); 
		var idStrArr =idStr.split('_'); 
		var id =idStrArr[1];
		$('#card_'+id).parent('div').remove();
	});
	
	$('.edit').click(function(){
		var idStr =$(this).attr('id'); 
		var idStrArr =idStr.split('_'); 
		var id =idStrArr[1];
		alert('Open Model Box For Update Address');
	});
	
	
	$('.addressType').click(function(){
			if($(this).val()==1){
				$('#delAddress').fadeIn();
				$('#pickAddress').fadeOut();
			}else{
				$('#pickAddress').fadeIn();
				$('#delAddress').fadeOut();
			}
		});
		$('#pickAddress').fadeOut();
	});
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