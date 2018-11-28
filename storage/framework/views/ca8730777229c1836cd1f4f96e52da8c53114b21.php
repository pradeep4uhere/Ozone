
<?php $__env->startSection('title'); ?>
Home Page
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="page-wrapper" style="background-color: #FFF">
	
	<div class="graphs">
    	<table style="width: 100%">
		<tr>
			<td><b><?php echo app('translator')->getFromJson('order.order.list'); ?></b></td>
			<td style="text-align: right; font-size: 12px;">
            <form action="" method="get">
            <label>Order ID:</label>
            <label><input type="text" name="orderid" class="form-control" placeholder="Enter Order ID" value="<?php echo e($orderid); ?>"></label>&nbsp;&nbsp;
            <label>Mobile Number:</label>
            <label><input type="text" maxlength="10" min="
                10" name="mobile" class="form-control" value="<?php echo e($mobile); ?>" placeholder="Enter Mobile Number"></label>&nbsp;&nbsp;
            <label>Order Date:</label>
            <label><input type="text" name="date" value="<?php echo e($date); ?>" class="datepicker form-control" placeholder="Enter Order Date"></label>&nbsp;&nbsp;
            <label>Choose Order Types:</label>
            <label><select id="orderStatus" onchange="getOrderList(this.value)" class="form-control">
                <option value="All">All</option>
                <option value="Open" <?php if($type=='Open'): ?> selected=selected <?php endif; ?>>Open</option>
                <option value="Processing" <?php if($type=='Processing'): ?> selected=selected <?php endif; ?>>Processing</option>
                <option value="Complete" <?php if($type=='Complete'): ?> selected=selected <?php endif; ?>>Complete</option>
                <option value="Canceled" <?php if($type=='Canceled'): ?> selected=selected <?php endif; ?>>Canceled</option>
                <option value="return" <?php if($type=='return'): ?> selected=selected <?php endif; ?>>Return</option>
                <option value="OnHold" <?php if($type=='OnHold'): ?> selected=selected <?php endif; ?>>On Hold</option>
                <option value="Pending" <?php if($type=='Pending'): ?> selected=selected <?php endif; ?>>Pending</option>
                <option value="PaymentReview" <?php if($type=='PaymentReview'): ?> selected=selected <?php endif; ?>>Payment Review</option>
                <option value="PendingPayment" <?php if($type=='PendingPayment'): ?> selected=selected <?php endif; ?>>Pending Payment</option>
                <option value="SuspectedFraud" <?php if($type=='SuspectedFraud'): ?> selected=selected <?php endif; ?>>Suspected Fraud</option>
                <option value="Closed" <?php if($type=='Closed'): ?> selected=selected <?php endif; ?>>Closed</option>
            </select> 
            </label>
            <input type="submit" style="position: absolute; left: -9999px"/>
            </form>
			</td>
		</tr>
	</table>
    <hr/>
        
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
	                    <th>#SN</th>
	                    <th>OrderID</th>
	                    <th>Date</th>
	                    <th>Name</th>
	                    <th>Mobile</th>
                        <th>Address</th>
	                    <th>Amount</th>
	                    <th>Payment Status</th>
                        <th>Order Status</th>
	                </thead>
                    <tbody>
                        <?php if(!empty($orders)): ?>
                        <?php @$count=1 ?>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Obj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr 
                        <?php if($Obj->order_status=='Complete'): ?> style="background-color: lightgreen;" <?php endif; ?>
                        <?php if($Obj->order_status=='Canceled'): ?> style="background-color: red;" <?php endif; ?>>
                            <td><?php echo e($count++); ?></td>
                            <td><a href="<?php echo e(route('orderdetails',['id'=>encrypt($Obj->id)])); ?>" target="_blank"><?php echo e($Obj->orderID); ?></a></td>
                            <td><?php echo e(date("d, M h:i A",strtotime($Obj->created_at))); ?></td>
                            <td><?php echo e($Obj->name); ?></td>
                            <td><?php echo e($Obj->mobile); ?></td>
                            <td><?php echo e($Obj->address_1); ?></br><?php echo e($Obj->address_2); ?></br><?php echo e($Obj->landmarks); ?></td>
                            <td><b>₹<?php echo e($Obj->totalAmount); ?></b></td>
                            <td>
                                <?php if($Obj->payment_status=='Pending'): ?>
                                <font color="red"><b><?php echo e($Obj->payment_status); ?></b>
                                <?php elseif($Obj->payment_status=='Success'): ?>
                                <font color="green"><b><?php echo e($Obj->payment_status); ?></b>
                                </font>
                                <?php endif; ?>
                            </td>
                            <td>
                                <select  <?php if($Obj->order_status=='Complete'): ?> disabled <?php endif; ?> class="form-control" style="width:120px" onChange="updateStatus(this.value,'<?php echo e(encrypt($Obj->id)); ?>')">
                                    <option value="Open" <?php if($Obj->order_status=='Open'): ?> selected=selected <?php endif; ?>>Open</option>
                                    <option value="Processing" <?php if($Obj->order_status=='Processing'): ?> selected=selected <?php endif; ?>>Processing</option>
                                    <option value="Complete" <?php if($Obj->order_status=='Complete'): ?> selected=selected <?php endif; ?>>Complete</option>
                                    <option value="Canceled" <?php if($Obj->order_status=='Canceled'): ?> selected=selected <?php endif; ?>>Canceled</option>
                                    <option value="return" <?php if($Obj->order_status=='return'): ?> selected=selected <?php endif; ?>>Return</option>
                                    <option value="OnHold" <?php if($Obj->order_status=='OnHold'): ?> selected=selected <?php endif; ?>>On Hold</option>
                                    <option value="Pending" <?php if($Obj->order_status=='Pending'): ?> selected=selected <?php endif; ?>>Pending</option>
                                    <option value="PaymentReview" <?php if($Obj->order_status=='PaymentReview'): ?> selected=selected <?php endif; ?>>Payment Review</option>
                                    <option value="PendingPayment" <?php if($Obj->order_status=='PendingPayment'): ?> selected=selected <?php endif; ?>>Pending Payment</option>
                                    <option value="SuspectedFraud" <?php if($Obj->order_status=='SuspectedFraud'): ?> selected=selected <?php endif; ?>>Suspected Fraud</option>
                                    <option value="Closed" <?php if($Obj->order_status=='Closed'): ?> selected=selected <?php endif; ?>>Closed</option>
                                </select>
                           
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        </tr>
                        <td colspan="9">
                           <div class="alert alert-danger"><center>No Order Found</center></div>
                        </td>
                        </tr>

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
<script type="text/javascript">
    function updateStatus(e,id){
        var strUrl = window.location.href.split("&");
        window.location.href = strUrl[0]+"&ord="+id+'&ty='+e;
    }
    function getOrderList(type){
        var strUrl = window.location.href.split("?");
        window.location.href = strUrl[0] +'?type='+ type ;
    }
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('prssystem.layouts.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>