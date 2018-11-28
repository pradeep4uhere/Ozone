
<?php $__env->startSection('title'); ?>
Home Page
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="page-wrapper" style="background-color: #FFF">
	
	<div class="graphs">
    	<table style="width: 100%">
		<tr>
			<td><b><?php echo app('translator')->getFromJson('product.all_product'); ?></b></td>
			<td style="text-align: right;font-weight: bold">
				<a href="<?php echo e(route('addproduct')); ?>" style="font-size: 14px;"><i class="fa fa-plus"></i>&nbsp;Add New</a></td>
		</tr>
	</table>
        
        <div class="tab-content" style="font-size: 14px;">
            <?php if(Session::has('message')): ?>
                    <p class="alert alert-success"><?php echo e(Session::get('message')); ?></p>
                    <?php endif; ?>
                    <?php if(Session::has('error')): ?>
                    <p class="alert alert-danger">
                    <?php $__currentLoopData = Session::get('error'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($err); ?></br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </p>
                    <?php endif; ?>
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
	                    <th><input type="checkbox" id="checkall" /></th>
	                    <th>Image</th>
	                    <th>Title</th>
	                    <th>Product SKU</th>
	                    <th>In Stock</th>
	                    <th>Quantity</th>
	                    <th>Price/Unit</th>
	                    <th>Status</th>
	                    <th>Action</th>
                    </thead>
                    <tbody>
                        <?php if(!empty($userProduct)): ?>
                        <?php $__currentLoopData = $userProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodObj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><input type="checkbox" class="checkthis" /></td>
                            <td><img src="<?php echo e(config('global.PRODUCT_THUMB_IMG')); ?>/<?php echo e($prodObj['default_thumbnail']); ?>" width="32" /></td>
                            <td><?php echo e($prodObj->product['title']); ?><br/>
                              <small><?php echo e($prodObj->product['description']); ?></small>
                            </td>
                            <td><?php echo e($prodObj['product_sku']); ?></td>
                            <td><?php echo e(($prodObj['product_in_stock']==1)?'YES':'NO'); ?></td>
                            <td><?php echo e($prodObj['quantity']); ?></td>
                            <td><?php echo e(number_format($prodObj['price'],2)); ?></td>
                            <td><?php echo ($prodObj['status']==1)?"<font color='Green'><b>Active</b></font>":"<font color='Red'><b>InActive</b></font>";?></td>
                            <td>
                            <a href="<?php echo e(route('addProductImg',['id'=>$prodObj['id']])); ?>" style="font-size: 14px;">
                            	<i class="lnr lnr-picture"></i>
                            </a>&nbsp;&nbsp;
                            <a href="<?php echo e(route('editProduct',['id'=>$prodObj['id']])); ?>" style="font-size: 14px;">
                            	<i class="lnr lnr-pencil"></i>
                            </a>&nbsp;&nbsp;
                            <a href="<?php echo e(route('deleteProduct',['id'=>$prodObj['id']])); ?>" style="font-size: 17px;">
                            	<i class="fa fa-times"></i>
                            </a></td>
                            
                            
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="clearfix"></div>
                <ul class="pagination pull-right">
                    <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('prssystem.layouts.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>