
<?php $__env->startSection('title'); ?>
Home Page
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
.treeview .list-group-item{cursor:pointer}.treeview span.indent{margin-left:10px;margin-right:10px}
.treeview span.icon{width:12px;margin-right:5px}.treeview .node-disabled{color:silver;cursor:not-allowed}
</style>
<script src="<?php echo e(Config('global.THEME_URL_JS')); ?>/profile/bootstrap-treeview.min.js"></script>
<div id="page-wrapper">
    <div class="graphs">
        
        <div class="tab-content">
					
					<div class="col-md-6">

					<!--panel-->
					<div class="panel panel-default">
					<div class="panel-heading">
					<h53class="blank1"><?php echo app('translator')->getFromJson('category.all_category'); ?></h3>
					</div>
					<div class="panel-body">
					

					<div class="row">
						<div class="col-md-8" id="treeview_json" style="font-size:14px;">
							
						</div>
					</div>
						
					</div>
					</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
						<div class="panel-heading">
							<h53class="blank1"><?php echo app('translator')->getFromJson('category.add_category'); ?></h3>
						</div>
						<div class="row">
						<div class="col-md-12">
						<?php if(Session::has('message')): ?>
						<p class="alert alert-success" style="padding:10px; margin:5px; font-size:12px;"><?php echo e(Session::get('message')); ?></p>
						<?php endif; ?>
						<?php if(Session::has('error')): ?>
						<p class="alert alert-danger">
						<?php $__currentLoopData = Session::get('error'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php echo e($err); ?></br>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</p>
						<?php endif; ?>
					</div>
					</div>
						<div class="row">
						<form method="post" action="<?php echo e(route('savecategory')); ?>"class="form-horizontal" enctype="multipart/form-data">
						<?php echo e(csrf_field()); ?>

						</br/>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-3 control-label"><?php echo app('translator')->getFromJson('product.choose_category'); ?></label>
							<div class="col-sm-8">
								<select class="form-control1" data-live-search="true" id="parent_id" name="parent_id">
									<option data-tokens="">Choose Category</option>
									<?php if(!empty($categoryArr)): ?>
									<?php $__currentLoopData = $categoryArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								  </select>
							</div>
						</div>
						<div class="form-group">
                        <label for="disabledinput" class="col-sm-3 control-label"><?php echo app('translator')->getFromJson('category.title'); ?></label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control1" id="name" placeholder="Enter the Category Name" name="name">
                        </div>
                    </div>
					<div class="form-group">
                        <label for="disabledinput" class="col-sm-3 control-label"><?php echo app('translator')->getFromJson('category.description'); ?></label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control1" id="description" placeholder="Enter the Category Description" name="description">
                            <input  type="hidden" class="form-control1" id="id" name="id">
                        </div>
                    </div>
					<div class="form-group">
                        <label for="inputPassword" class="col-sm-3 control-label"><?php echo app('translator')->getFromJson('category.status'); ?></label>
                        <div class="col-sm-8">
                            <select class="form-control1" data-live-search="true" id="status" name="status" >
                            <option value='1' >Active</option>
                            <option value='0' >In-Active</option>
                            </select>
                        </div>
                         <div class="col-sm-6">
                             <p id="qntyId" style="margin-top: 5px;"></p>
                        </div>
                    </div>
						<div class="row">
                      <div class="col-md-4"></div>
                      <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
                        <button type="button" class="btn btn-danger" style="margin-left:38px">Cancel</button>
                      </div>
                    </div>
                </form>
						</div>
						</div>
						
					</div>
    </div>
</div>
</div>


<script type="text/javascript">
$(document).ready(function(){ 
   $.ajax({
   type: "GET",  
   url: "<?php echo e(route('getcategory')); ?>",
   dataType: "json",       
   success: function(response)  
   {
		initTree(response)
   }   
 });
 function initTree(treeData) {
	$('#treeview_json').treeview(
	{data: treeData,
	onNodeSelected: function(event, data) {
		//$("#mi-modal").modal('show');
		// Your logic goes here
		var id = data.id;
		var parent_id = data.parent_id;
		if(parent_id>0){
			var name = data.name;
			var description = data.text;
			var status = data.status;
			$('#name').val(name);
			$('#parent_id').val(parent_id);
			$('#id').val(id);
			$('#description').val(description);
			$('#status').val(status);
			$("#mi-modal").modal('show');
		}
	}
  });
 }
 

 
 
$("#modal-btn-no").on("click", function(){
	$("#mi-modal").modal('hide');
});

$("#modal-btn-si").on("click", function(){
	var cat_id=$('#id').val();
	$.ajax({
		type: "POST",  
		url: "<?php echo e(route('delcategory')); ?>",
		dataType: "json",
		data: {_token:'<?php echo e(csrf_token()); ?>',id:cat_id},      
		success: function(response){
			$("#mi-modal").modal('hide');
		}   
   });
});
});
</script>

<!-- set up the modal to start hidden and fade in and out -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Do you want to Remove ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="modal-btn-si">Remove</button>
        <button type="button" class="btn btn-primary" id="modal-btn-no">Edit</button>
      </div>
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('prssystem.layouts.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>