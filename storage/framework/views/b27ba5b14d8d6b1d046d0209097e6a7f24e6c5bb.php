<div class="container">
            <div class="row">
                <div class="col-md-12 responsive-wrap">
                    <div class="row light-bg detail-options-wrap">
                        <!--Product Box Start-->
                        <?php if(!empty($productList)): ?>
                        <?php $__currentLoopData = $productList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodObj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 featured-responsive" >
                            <div class="featured-place-wrap">
                        <a href="<?php echo e(route('details',['slug'=>str_slug($prodObj['Product']['title']),'id'=>encrypt($prodObj['UserProduct']['id'])])); ?>">
                            <center style="border-bottom:solid 1px #EEE; ">
                                <img style="width:150px;height: 150px; " src="<?php echo e(config('global.PRODUCT_IMG_URL').DIRECTORY_SEPARATOR.$prodObj['UserProduct']['default_images']); ?>" class="img-fluid" alt="#">
                                </center>
                            <span class="featured-rating-orange">₹ <?php echo e($prodObj['UserProduct']['price']); ?></span>
                            <div class="featured-title-box">
                                <p style="font-size: 16px;"><?php echo e(ucwords($prodObj['Product']['title'])); ?></p>
                                <p style="font-size: 12px;">Category ::
                                 <?php echo e($prodObj['Product']['Category']['name']); ?> > <?php echo e(str_limit($prodObj['Product']['SubCategory']['name'],8)); ?></p>
                                <p style="font-size: 12px;">Manufacture By: <span><?php echo e($prodObj['Product']->Brand['name']); ?></span></p><BR/>
                                <p style="font-size: 12px;">Unit: <?php echo e($prodObj['UserProduct']['quantity_in_unit']); ?>&nbsp;<?php echo e($prodObj['Product']->Unit['name']); ?></p>
                                <div class="bottom-icons">
                                <div class="closed-now">
                                    <a href="javascript:void(0)" class="btn" style="background-color:#ff3a6d;color:#FFF;" onClick="addToCart('<?php echo e(encrypt($prodObj['UserProduct']['id'])); ?>','<?php echo e(str_slug($prodObj['Product']['title'])); ?>')">Add To Cart</a>
                                </div>
                                <span class="ti-heart"></span>
                                <span class="ti-bookmark"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                <!--Product Box Ends Here-->   
                </div>
                </div>
                
            </div>
        </div>