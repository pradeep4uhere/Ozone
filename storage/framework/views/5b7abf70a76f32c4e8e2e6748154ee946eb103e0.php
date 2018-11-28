
<?php $__env->startSection('title'); ?>
<?php echo e($seller['business_name']); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--main section-->
    <!--============================= DETAIL =============================-->
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
				<?php if(!empty($seller->SellerImage)){ 
				foreach($seller->SellerImage as $imgObj){ ?>
                <div class="swiper-slide">
                    <a href="<?php echo e(config('global.SELLER_IMG_GALLERY').DIRECTORY_SEPARATOR.'seller_'.$imgObj->seller_id.DIRECTORY_SEPARATOR.$imgObj->image_name); ?>" class="grid image-link">
                        <img style="height:290px;width:100%" src="<?php echo e(config('global.SELLER_IMG_GALLERY').DIRECTORY_SEPARATOR.'seller_'.$imgObj->seller_id.DIRECTORY_SEPARATOR.$imgObj->image_name); ?>" class="img-fluid" alt="#">
                    </a>
                </div>
				<?php }}else{ ?>
                <div class="swiper-slide">
                    <a href="<?php echo e(Config('global.THEME_URL_FRONT_IMAGE')); ?>/reserve-slide1.jpg" class="grid image-link">
                        <img src="<?php echo e(Config('global.THEME_URL_FRONT_IMAGE')); ?>/reserve-slide1.jpg" class="img-fluid" alt="#">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="<?php echo e(Config('global.THEME_URL_FRONT_IMAGE')); ?>/reserve-slide3.jpg" class="grid image-link">
                        <img src="<?php echo e(Config('global.THEME_URL_FRONT_IMAGE')); ?>/reserve-slide3.jpg" class="img-fluid" alt="#">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="<?php echo e(Config('global.THEME_URL_FRONT_IMAGE')); ?>/reserve-slide1.jpg" class="grid image-link">
                        <img src="<?php echo e(Config('global.THEME_URL_FRONT_IMAGE')); ?>/reserve-slide1.jpg" class="img-fluid" alt="#">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="<?php echo e(Config('global.THEME_URL_FRONT_IMAGE')); ?>/reserve-slide2.jpg" class="grid image-link">
                        <img src="<?php echo e(Config('global.THEME_URL_FRONT_IMAGE')); ?>/reserve-slide2.jpg" class="img-fluid" alt="#">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="<?php echo e(Config('global.THEME_URL_FRONT_IMAGE')); ?>/reserve-slide3.jpg" class="grid image-link">
                        <img src="<?php echo e(Config('global.THEME_URL_FRONT_IMAGE')); ?>/reserve-slide3.jpg" class="img-fluid" alt="#">
                    </a>
                </div>
				<?php  } ?>

                
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>
    </div>
    <!--//END BOOKING -->
    <!--============================= RESERVE A SEAT =============================-->
    <section class="reserve-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><?php echo e($seller['business_name']); ?>&nbsp;<img src="<?php echo e(config('global.THEME_URL_FRONT_IMAGE')); ?>/tick-1.jpg"></h5>
                    <p><span></span></p>
                    <p class="reserve-description"><?php echo e($seller['address_1']); ?>, <?php echo e($seller['address_2']); ?>, 
                                <?php echo e($seller['state_id']); ?></p>
                </div>
                <div class="col-md-6">
                    <div class="reserve-seat-block">
                        
                        <div class="review-btn">
                            <a href="#" class="btn btn-outline-danger">Send Message</a>
                            
                        </div>
                        <div class="reserve-btn">
                            <div class="featured-btn-wrap">
                                <a href="#" class="btn btn-info">Call +91-<?php echo e($seller['contact_number']); ?></a>
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
    <hr style="padding:0px;margin:0px;">
   
    
    <section class="reserve-blockSS" style="width: 100%">
        <?php if(!empty($productList)): ?>
        <?php echo $__env->make('prssystem.frontend._productDetailsRightSide', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php else: ?>
            <center>
                <div class="alert alert-danger">No product added by this seller</div>
            </center>
        
        <?php endif; ?>
    </section>
    <!--//END BOOKING DETAILS -->
    <script>
  var $tabButtonItem = $('#tab-button li'),
      $tabSelect = $('#tab-select'),
      $tabContents = $('.tab-contents'),
      activeClass = 'is-active';

  $tabButtonItem.first().addClass(activeClass);
  $tabContents.not(':first').hide();

  $tabButtonItem.find('a').on('click', function(e) {
    var target = $(this).attr('href');

    $tabButtonItem.removeClass(activeClass);
    $(this).parent().addClass(activeClass);
    $tabSelect.val(target);
    $tabContents.hide();
    $(target).show();
    e.preventDefault();
  });

  $tabSelect.on('change', function() {
    var target = $(this).val(),
        targetSelectNum = $(this).prop('selectedIndex');

    $tabButtonItem.removeClass(activeClass);
    $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
    $tabContents.hide();
    $(target).show();
  });

  
  
function getAlert(a,b,c){
	swal({
	  title:a,
	  text: b,
	  icon: c,
	});
}
//Add To Cart 
function addToCart(pid,title){
<?php if(Auth::check()): ?> 
var Auth ="<?php echo Auth::user()->id ?>";
<?php else: ?>
var Auth =0;
<?php endif; ?>
if(Auth>0){
    var csrf="<?php echo e(csrf_token()); ?>";
    var postJson={_token:csrf,pid:pid,name:title};
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
    			$('#itemCount').text(res.cart.count);
    		}

            if(res.status=='error'){
                getAlert('Great',res.message,res.status);
            }
    	}
    });
}else{
    getAlert('Opps Login Required!!','You have to login first!!','error');
}
}

</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('prssystem/layouts/frontDetails', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>