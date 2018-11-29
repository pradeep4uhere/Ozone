
<?php $__env->startSection('title'); ?>
Home Page
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="page-wrapper" style="background-color: #FFF">
    <b><i class="lnr lnr-menu"></i>&nbsp;<?php echo app('translator')->getFromJson('order.order.details'); ?></b>
    <hr/>
    <div class="row">
        <?php if(!empty($orders)): ?>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-12" style="margin-bottom: 25px; font-size: 14px" >
           <div class="row" style="border: solid 1px #CCC;">
                <div style="
                border-bottom: solid 1px #CCC; 
                padding: 5px; height: 50px; 
                background-color: #F9F9F9;
                
                font-size: 14px;">
                <div class="btn btn-info" style="width:250px; margin-left: 10px; float: left;"><?php echo e($item->order_track); ?></div>
                </div>
                <div class="col-md-12" style="border-bottom: solid 1px #CCC;">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="<?php echo e(route('details',['slug'=>str_slug($item->product_name),'id'=>encrypt($item->user_product_id)])); ?>">
                                <img src="<?php echo e($item->default_thumbnail); ?>" align="center" alt="Image" width="100px">
                            </a></div>
                        <div class="col-md-3" style="padding-top: 10px">
                           <p>Product Name -  <?php echo e(ucwords($item->product_name)); ?><p><br/>
                           <small style="color: #999">Band Name    - <?php echo e($item->brand_name); ?></small>
                        </div>
                        <div class="col-md-3" style="padding-top: 10px; text-align: center;">Quantity: <?php echo e($item->quantity); ?></div>
                        <div class="col-md-1" style="padding-top: 10px"><i class="fa fa-inr"></i><?php echo e($item->total_amount); ?></div>
                        <div class="col-md-2" style="padding-top: 10px">In Stock&nbsp;
                            <select name="inStock">
                                <option value="Y" selected="selected">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-12">
                    <div style="width:250px; float: left; color: #777; padding: 5px;">Order Date :: <?php echo e(date("d M Y",strtotime($item->order_date))); ?></div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('prssystem.layouts.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>