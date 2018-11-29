
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
				<label class="btn btn-info"><input type="radio" name="shippingType" value="1" class="addressType" id="delivery" checked>&nbsp;&nbsp;I want Item Deliver To My Address</label>
				</div>
				</div>
				<div class="col-md-2" style="margin-left: 5px;margin-right: 5px;">
				 <div style="font-size: 16px;">
				<label  class="btn btn-info"><input type="radio" id="pickup" name="shippingType" value="2" class="addressType">&nbsp;&nbsp;I Will Pick From Shop</label>
				</div>
				</div>
				<hr/>
				</div>
				<hr/>
                <div class="col-md-12">

                <div class="">
               
                <div class="card-body" style="font-size: 13px !important" >
					<div class="row" id="delAddress">
						<?php //dd($address);?>
                    <?php if(count($address)>0): ?>
                    <?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<div class="col-md-4">
						<div class="card cardClass" id="card_<?php echo e($item->id); ?>" >
						<div class="card-header" style="font-size: 16px;"><?php echo e(ucwords($item->full_name)); ?></b></div>
						<div class="card-body" style="font-size: 13px !important">
						<div class="">
						<div><?php echo e($item->address_1); ?></div>	
						<div><?php echo e($item->address_2); ?></div>	
						<div><?php echo e($item->landmarks); ?></div>	
						<div><?php echo e($item->city_id); ?>, <?php echo e($item->state_id); ?>, <?php echo e($item->pincode); ?>, <?php echo e($item->country); ?>

							<input type="hidden" id="shipphide_<?php echo e($item->id); ?>" value="<?php echo e(encrypt($item->id)); ?>"></div>	
						</div>
						<div>Mobile: <?php echo e($item->mobile); ?></div>	
						<div>
						<button class="btn btn-info del" style="padding:8px; font-size:12px;margin-top:5px;" id="del_<?php echo e($item->id); ?>" >Delivery Here</button>
						<button class="btn btn-warning edit" style="padding:8px; font-size:12px;margin-top:5px;" id="edit_<?php echo e(encrypt($item->id)); ?>" >&nbsp;&nbsp;Edit&nbsp;&nbsp;</button>
						<button class="btn btn-danger remove" style="padding:8px; font-size:12px;margin-top:5px;" id="remove_<?php echo e(encrypt($item->id)); ?>">Remove</button>
						</div>
						</div>
						
						
						</div>
						<br/>
					</div>
					
					
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				    <div class="col-md-4">
						<div class="card">
						<div class="card-header" style="font-size: 16px; background-color: #ff3a6d">Add New Address</b></div>
						<div class="card-body" style="font-size: 13px !important;min-height: 186px;">
						<center>
							<a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
						 <img src="<?php echo e(Config('global.THEME_URL_FRONT_IMAGE')); ?>/assaddress.jpg" class="img-fluid" alt="#">	
						</a>
						</center>
						</div>
						</div>
					</div>
                    <?php else: ?>
					 <div class="col-md-4">
						<div class="card">
						<div class="card-header" style="font-size: 16px; background-color: #ff3a6d">Add New Address</b></div>
						<div class="card-body" style="font-size: 13px !important;min-height: 186px;">
						<center>
							<a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
						 <img src="<?php echo e(Config('global.THEME_URL_FRONT_IMAGE')); ?>/assaddress.jpg" class="img-fluid" alt="#">	
						</a>
						</center>
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
						<button class="btn btn-info pic" style="padding:8px; font-size:12px;margin-top:5px;" id="del_<?php echo e($item->id); ?>" >Delivery Here</button>
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
        <hr/>
    <a href="javascript:void(0))" class="btn top-btn" style="background-color:#ff3a6d;color:#FFF" id="payment"> Procced To Payment</a>
    </section>

    
    
    </section>
    <!--//END RESERVE A SEAT -->
    <!--============================= BOOKING DETAILS =============================-->
    <!--//END BOOKING DETAILS -->
    
	<form id="choosePay" action="<?php echo e(route('preorder')); ?>" method="get">
	<input type="hidden" name="pickup" id="pickupAddress">
	<input type="hidden" name="shippingAddress" id="shippingAddress">
	<input type="hidden" name="sellerIDArr" value="<?php echo e($sellerIDArr); ?>">
	<?php echo e(csrf_field()); ?>

	</form>

	<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 817px;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title"><img src="<?php echo e(Config('global.THEME_URL_FRONT_IMAGE')); ?>/addicon.jpg" class="img-fluid" alt="#">&nbsp;<b><span id="addressSpan">Add New Address</span></b></p>
      </div>
      <div class="modal-body">
        <?php echo $__env->make('prssystem.partials.user.addaddress', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script>
	function getCity(state_id){
		var token = "<?php echo e(csrf_token()); ?>";
		var POST_LOCATION_URL = "<?php echo e(route('getcity')); ?>";
	    var postJson={_token:token,state_id:state_id};
		$.ajax({
			type:'POST',
			url:POST_LOCATION_URL,
			data:postJson, 
			beforeSend:function(){
				$('#city').html('Please wait...');
			},       
			success:function(res){
				var result = JSON.parse(res);
				if(result.status=='success'){
					$('#city').html(result.result);
				}
			}
		});

	}



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
			 if($('#delivery').is(':checked')) { 
				getAlert('Error!','Please select atleast one delivery address!','error');
			 }else{
				getAlert('Error!','Please Select Shipping Address or Pickup Address!','error');
			}
		}
	});
		
		
		
		
		
		//Select Delevery Address
	$('.del').click(function(){
		var idStr =$(this).attr('id'); 
		var idStrArr =idStr.split('_'); 
		var id =idStrArr[1];
		$('.cardClass').removeClass('bg-info');
		$('#card_'+id).addClass('bg-info');
		$('#shippingAddress').val($('#shipphide_'+id).val());
		;
	});
	$('.remove').click(function(){
		var idStr =$(this).attr('id'); 
		var idStrArr =idStr.split('_'); 
		var id =idStrArr[1];
		$('#card_'+id).parent('div').remove();
		removeAddress(id);
	});
	
	$('.edit').click(function(){
		var idStr =$(this).attr('id'); 
		var idStrArr =idStr.split('_'); 
		var id =idStrArr[1];
		$("#myModal").modal('show');
		$('#addressSpan').html('Update Address');
		getAddress(id);
		//alert('Open Model Box For Update Address');
	});

	function removeAddress(id){
		var token = "<?php echo e(csrf_token()); ?>";
		var POST_LOCATION_URL = "<?php echo e(route('removeaddress')); ?>";
	    var postJson={_token:token,id:id};
		$.ajax({
			type:'POST',
			url:POST_LOCATION_URL,
			data:postJson,        
			success:function(res){
				var result = JSON.parse(res);
				if(result.status=='success'){
					var idStr= "#card_"+id;
					$(idStr).fadeOut();
					getAlert('Success!','Delivery Address Removed!','success');
				}
			}
		});
	}


	function getAddress(id){
		var token = "<?php echo e(csrf_token()); ?>";
		var POST_LOCATION_URL = "<?php echo e(route('getaddress')); ?>";
	    var postJson={_token:token,id:id};
		$.ajax({
			type:'POST',
			url:POST_LOCATION_URL,
			data:postJson,        
			success:function(res){
				var result = JSON.parse(res);
				if(result.status=='success'){
					$('#full_name').val(result.result.full_name);
					$('#address_1').val(result.result.address_1);
					$('#address_2').val(result.result.address_2);
					
					$('#landmarks').val(result.result.landmarks);
					$('#mobile').val(result.result.mobile);
					$('#pincode').val(result.result.pincode);
					$('select[name=state_id]').val(result.result.state_id).change();
					getCity(result.result.state_id);
					setTimeout(function(){
						$('select[name=city_id]').val(result.result.city_id).change();
					},2000);
					$('#id').val(result.result.id);
				}
			}
		});

	}

	
	
	$('.addressType').click(function(){
			if($(this).val()==1){
				$('#delAddress').fadeIn();
				$('#pickAddress').hide();
			}else{
				$('#pickAddress').fadeIn();
				$('#delAddress').hide();
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