<?php $__env->startSection('title'); ?>
Home Page
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
    <div class="graphs">
        <h3 class="blank1"><?php echo app('translator')->getFromJson('seller.title'); ?>, <?php echo e(Auth::user()->first_name); ?></h3>
        <div class="tab-content">
            
                    <div class="tab-pane active" id="horizontal-form">
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
                    <form method="post" action="<?php echo e(route('updateSellerProfile',['id'=>'1'])); ?>"class="form-horizontal" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label"><?php echo app('translator')->getFromJson('seller.profile.business_type'); ?>:</label>
                        <div class="col-sm-8">
                           <select class="form-control" data-live-search="true" id="store_type_id" name="store_type_id">
                                <?php if(!empty($businessType)): ?>
                                <?php $__currentLoopData = $businessType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($obj['id']); ?>" <?php if(!empty($user)): ?> <?php if($user->store_type_id==$obj['id']): ?> <?php echo e("selected"); ?> <?php endif; ?> <?php endif; ?>><?php echo e($obj['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              </select>
                        </div>
                        <div class="col-sm-2 jlkdfj1" style="display: none">
                            <p class="help-block">Error!</p>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label"><?php echo app('translator')->getFromJson('seller.profile.business_name'); ?>:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="business_name" placeholder="Enter Business Name" name="business_name" value="<?php echo e((!empty($user))?$user->business_name:''); ?>">
                        </div>
                        <div class="col-sm-2 jlkdfj1" style="display: none">
                            <p class="help-block">Error!</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="disabledinput" class="col-sm-2 control-label"><?php echo app('translator')->getFromJson('seller.profile.address1'); ?></label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control1" id="address_1" placeholder="Address-1" name="address_1" value="<?php echo e((!empty($user))?$user->address_1:''); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label"><?php echo app('translator')->getFromJson('seller.profile.address2'); ?></label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control1" id="address_2" placeholder="Addres-2" name="address_2" value="<?php echo e((!empty($user))?$user->address_2:''); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label"><?php echo app('translator')->getFromJson('seller.profile.state'); ?></label>
                        <div class="col-sm-8">
                            <select class="form-control1" data-live-search="true" id="state_id" name="state_id">
                                <option data-tokens="">Choose State</option>
                                <?php if(!empty($stateList)): ?>
                                <?php $__currentLoopData = $stateList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id); ?>" <?php if(!empty($user)): ?> <?php if($user->state_id==$id): ?> <?php echo e("selected"); ?> <?php endif; ?> <?php endif; ?>><?php echo e($name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label"><?php echo app('translator')->getFromJson('seller.profile.city'); ?></label>
                        <div class="col-sm-8">
                        <select class="form-control1" data-live-search="true" id="city_id" name="city_id">
                                <option data-tokens="">Choose City</option>
                                <?php if(!empty($cityList)): ?>
                                <?php $__currentLoopData = $cityList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id); ?>" <?php if(!empty($user)): ?> <?php if($user->city_id==$id): ?> <?php echo e("selected"); ?> <?php endif; ?> <?php endif; ?>><?php echo e($name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              </select>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label"><?php echo app('translator')->getFromJson('seller.profile.pincode'); ?></label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control1" id="pincode_id" placeholder="Enter Pincode" name="pincode_id" value="<?php echo e((!empty($user))?$user->pincode_id:''); ?>">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label"><?php echo app('translator')->getFromJson('seller.profile.contact_number'); ?></label>
                        <div class="col-sm-1">
                            <input disabled=""  type="text" class="form-control1" placeholder="+91" value="+91">
                        </div>
                        <div class="col-sm-7">
                            <input  type="text" class="form-control1" id="contact_number" placeholder="Enter Contact Number" name="contact_number" value="<?php echo e((!empty($user))?$user->contact_number:old('contact_number')); ?>">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label"><?php echo app('translator')->getFromJson('seller.profile.upload_business_logo'); ?></label>
                       
                        <div class="col-sm-8">
                            <input  type="file" class="form-control1" id="logo"  name="logo">
                        </div>
                    </div>
                    <?php if(!empty($user->image_thumb)): ?>
                     <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label"><?php echo app('translator')->getFromJson('seller.profile.preview'); ?></label>
                        <div class="col-sm-2">
                            <img src="<?php echo e(config('global.BUSINESS_THUMB_IMG')); ?>/<?php echo e($user->image_thumb); ?>" />
                        </div>
                        <div class="col-sm-6 jlkdfj1">
                            <p id="msg" class="help-block" style="color: red"></p>
                        </div>
                    </div>
                    <?php endif; ?>
                     <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label"><?php echo app('translator')->getFromJson('seller.profile.email_address'); ?></label>
                        <div class="col-sm-8">
                            <input readonly=""  type="text" maxlength="100" class="form-control1" id="email_address" placeholder="Email Address" name="email_address" value="<?php echo e((!empty($user))?$user->email_address:Auth::user()->email); ?>">
                            <input  type="hidden" class="form-control1" id="country_id" placeholder="Choose Country" name="country_id" value="1">
                            <input  type="hidden" class="form-control1" id="user_id" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                            <input  type="hidden" class="form-control1" id="id" name="id" value="<?php echo e((!empty($user))?$user->id:'0'); ?>">
                        </div>
                    </div>   
                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
                        <button type="button" class="btn btn-danger" style="margin-left:38px">Cancel</button>
                      </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script>
$("#logo").change(function () {
        var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            $('#msg').html("Only formats are allowed : "+fileExtension.join(', '));
            $('#logo').val('');
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('prssystem.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>