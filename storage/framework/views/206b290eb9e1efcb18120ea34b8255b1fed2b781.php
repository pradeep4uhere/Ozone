<?php $__env->startSection('title'); ?>
    Home Page
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!--main section-->
    <!--============================= DETAIL =============================-->
    <section>
        <div class="container-fluid">
            <div class="row">
			<div class="col-md-2 responsive-wrap">
			</div>
            <div class="col-md-12 responsive-wrap">
                    <div class="row detail-filter-wrap">
                        <div class="col-md-4 featured-responsive">
                            <div class="detail-filter-text">
                                <p><?php echo e(count($productList)); ?> Result Found</span></p>
                            </div>
                        </div>
                        <div class="col-md-4 featured-responsive">
                            <div class="detail-filter-text">
                                 <?php if(Session::has('flash_message')): ?>
                                 <div class="alert alert-success" style="padding: 6px">
                                    <?php echo e(Session::get('flash_message')); ?>

                                </div>
                                <?php endif; ?>
                                 <?php if(Session::has('error_message')): ?>
                                 <div class="alert alert-danger" style="padding: 6px">
                                    <?php echo e(Session::get('error_message')); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4 featured-responsive">
                            <div class="detail-filter">
                                <p>Filter by</p>
                                <form class="filter-dropdown" id="catForm">
                                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="categoryName" name="category" onchange="getList(this.value)">	
									<?php $__currentLoopData = $Category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($cat); ?>" <?php if($cat==$searchCat): ?> selected <?php endif; ?>><?php echo e($cat); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
                                </form>
                                <div class="map-responsive-wrap">
                                    <a class="map-icon" href="#"><span class="icon-location-pin"></span></a>
                                </div>
                            </div>
                        </div>
						
					
                    </div>
                    <div class="row detail-checkbox-wrap">
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                           <p>Category :: <?php echo e($searchCat); ?></p>
                        </div>
                       
                    </div>
					<!--Product Box Start-->
                        <?php if(!empty($productList)): ?>
                    <div class="row light-bg detail-options-wrap">
                        
                        <?php $__currentLoopData = $productList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodObj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-3 featured-responsive">
                            <div class="featured-place-wrap" >
                        <a href="<?php echo e(route('details',['slug'=>str_slug($prodObj['Product']['title']),'id'=>encrypt($prodObj['UserProduct']['id'])])); ?>">
                            <center style="border-bottom:solid 1px #EEE; ">
                                <img style="width:150px;height: 150px; " src="<?php echo e(config('global.PRODUCT_IMG_URL').DIRECTORY_SEPARATOR.$prodObj['UserProduct']['default_images']); ?>" class="img-fluid" alt="#">
                                </center>
                            <span class="featured-rating-orange">₹ <?php echo e($prodObj['UserProduct']['price']); ?></span>
                            <div class="featured-title-box">
                                <h6><?php echo e($prodObj['Product']['title']); ?></h6>
                                <ul>
                                    <li><span class="icon-location-pin"></span>
                                        <p><span><?php echo e($prodObj['Product']->Brand['name']); ?></span></p>
                                    </li>
                                    <li><span class="icon-location-pin"></span>
                                        <p><b>₹&nbsp;<?php echo e($prodObj['UserProduct']['price']); ?></b>&nbsp;&nbsp;&nbsp; Unit: <?php echo e($prodObj['UserProduct']['quantity_in_unit']); ?>&nbsp;<?php echo e($prodObj['Product']->Unit['name']); ?></p>
                                    </li>
                                    <li><span class="icon-location-pin"></span>
                                        <p><?php echo e($prodObj['Seller']['business_name']); ?></p>
                                    </li>
                                  
                                </ul>
                                <div class="bottom-icons">
                                    <div class="closed-now"><a href="javascript:void(0)" onClick="addToCart('<?php echo e(encrypt($prodObj['UserProduct']['id'])); ?>')" class="btn" style="background-color:#ff3a6d;color:#FFF; ">Add To Cart</a></div>
                                    <span class="ti-heart"></span>
                                    <span class="ti-bookmark"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
                <!--Product Box Ends Here-->   
                </div>
				<?php else: ?>
					<center>
						<div class="alert alert-danger">
														<strong>No Result Found in your area!</strong>
						</div>
					</center>
                        <?php endif; ?>
            </div>
        </div>
    </section>
    <!--//END DETAIL -->
<script>
function getAlert(a,b,c){
	swal({
	  title:a,
	  text: b,
	  icon: c,
	});
}
//Add To Cart 
function addToCart(pid){
var csrf="<?php echo e(csrf_token()); ?>";
var postJson={_token:csrf,pid:pid};
$.ajax({
	type:'POST',
	url:"<?php echo e(route('addtocart')); ?>",
	data:postJson,        
	dataType:'json',        
	success:function(res){
		//var result = JSON.parse(res);
		console.log(res);
		if(res.status=='success'){
			getAlert('Great',res.message,res.status);
			$('#itemCount').text(res.cart.length);	
		}
	}
});
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('prssystem/layouts/listing', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>