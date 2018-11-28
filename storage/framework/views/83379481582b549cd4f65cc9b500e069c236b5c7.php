<?php $__env->startSection('title'); ?>
    Select a delivery address
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="reserve-block" style="font-size: 12px !important">
        <div class="container">
		<div class="row">
				<div class="col-md-12">
				<p>Order Details</p>
				<p>Total Amount: <?php echo e($totalAmount); ?></p>
				</div>
				
				
				</div>
		<hr/>
            <div class="row">
				<div class="col-md-12">
				<button class="btn btn-info">Cash On Delivery</button>
				</div>
				
				
				</div>
				<hr/>
               
                
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