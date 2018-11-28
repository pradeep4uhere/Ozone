<?php $__env->startSection('title'); ?>
Home Page
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<link href="<?php echo e(config('global.THEME_URL_CSS').'/profile/dropzone.css'); ?>" rel="stylesheet">
<script src="<?php echo e(config('global.THEME_URL_JS').'/profile/dropzone.min.js'); ?>"></script>
<style>
div.polaroid {
width: 25%;
background-color: white;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

img {width: 100%}

div.container {
text-align: center;
padding: 10px 20px;
}
    
</style>
<div id="page-wrapper">
    <div class="graphs">
        <h3 class="blank1"><?php echo app('translator')->getFromJson('seller.profile.add_new_seller_img'); ?></h3>
        <div class="tab-content">
            
                    <div class="tab-pane active" id="horizontal-form">
                      <?php if(Session::has('flash_message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(Session::get('flash_message')); ?>

                        </div>
                    <?php endif; ?>
                     <b>Please Choose or Drage Images here.</b>
                     <form method="post"  id="my-awesome-dropzone" action="<?php echo e(route('addSellerImg')); ?>" class=" dropzone dz-clickable form-horizontal" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    
                </form>

            </div>
            <hr/>
<?php if(!empty($userProduct)): ?>
<div class="row">
<?php //print_r($userProduct); ?>
<?php $__currentLoopData = $userProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imgObj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($imgObj->status==1): ?>
<div class="col-md-3" style="backgroud-color:green">
  <div class="thumbnail">
    <a href="<?php echo e(config('global.SELLER_IMG_GALLERY').DIRECTORY_SEPARATOR.'seller_'.$imgObj->seller_id.DIRECTORY_SEPARATOR.$imgObj->image_name); ?>" target="_blank">
      <img src="<?php echo e(config('global.SELLER_IMG_GALLERY').DIRECTORY_SEPARATOR.'seller_'.$imgObj->seller_id.DIRECTORY_SEPARATOR.$imgObj->image_name); ?>" alt="Image" style="width:100%">
  
      <div class="caption">
          <div class="btn-group btn-group-justified">
            <?php if($imgObj->is_default==0): ?>
            <a href="<?php echo e(route('setSellerImageAsDefault',['prod_id'=>$imgObj->user_id,'id'=>$imgObj->id])); ?>" class="btn btn-warning" title="Set Default Image on Page">Set As Default</a>
            <?php endif; ?>
            <a href="<?php echo e(route('hideSellerImage',['id'=>$imgObj->id])); ?>" class="btn btn-info" title="Hide Image From Product Page">Hide</a>
            <a href="<?php echo e(route('deleteSellerImage',['id'=>$imgObj->id])); ?>" class="btn btn-danger" title="Delete Image">Remove</a>
          </div>

        
      </div>
    </a>
  </div>
</div>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>
<hr/>
<b>All Hide Images<b>
<hr/>
<?php if(!empty($userProduct->ProductImage)): ?>
<div class="row">
<?php $__currentLoopData = $userProduct->ProductImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imgObj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($imgObj->status==0): ?>
<div class="col-md-3" style="backgroud-color:green">
  <div class="thumbnail">
    <a href="<?php echo e(config('global.PRODUCT_IMG_GALLERY').DIRECTORY_SEPARATOR.'prod_00'.$imgObj->user_product_id.DIRECTORY_SEPARATOR.$imgObj->image_name); ?>" target="_blank">
      <img src="<?php echo e(config('global.PRODUCT_IMG_GALLERY').DIRECTORY_SEPARATOR.'prod_00'.$imgObj->user_product_id.DIRECTORY_SEPARATOR.$imgObj->image_name); ?>" alt="Image" style="width:100%">
  
      <div class="caption">
          <div class="btn-group btn-group-justified">
            
            <a href="<?php echo e(route('showProductImage',['id'=>$imgObj->id])); ?>" class="btn btn-info" title="Show Image From Product Page">Show</a>
            <a href="<?php echo e(route('deleteProductImage',['id'=>$imgObj->id])); ?>" class="btn btn-danger" title="Delete Image">Remove</a>
          </div>

        
      </div>
    </a>
  </div>
</div>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>

            
            
        </div>

    </div>
</div>
<script>

POST_URL="<?php echo e(route('getSubCategory')); ?>";
POST_BRAND_URL="<?php echo e(route('getBrandList')); ?>";
</script>
<script src="<?php echo e(config('global.THEME_URL_JS').'/profile/dropzon_script.js'); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('prssystem.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>