<link href="http://localhost/laravel/public/css/app.css" rel="stylesheet">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <form class="form-horizontal" method="POST" action="<?php echo e(route('addaddress')); ?>">
                            <?php echo e(csrf_field()); ?>

                <div class="row ">
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label>Full Name</label>
                              <input type="text" id="full_name" name="full_name" class="form-control validate" required="required" placeholder="Enter Your Full Name" value="<?php echo e(old('email')); ?>">
                            </div>
                            
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label>Flat No/Office Address</label>
                              <input type="text" id="address_1" name="address_1" class="form-control validate" required="required" placeholder="Email Your Address">
                            </div>
                            
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label>Full Address</label>
                              <input type="text" id="address_2" name="address_2" class="form-control validate" required="required" placeholder="Enter Full Address">
                            </div>
                            
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label>Landmark</label>
                              <input type="text" id="landmarks" name="landmarks" class="form-control validate" required="required" placeholder="Enter Landmarks">
                            </div>
                            
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label>Mobile No</label>
                              <input type="text" id="mobile" name="mobile" class="form-control validate" required="required" placeholder="Enter Mobile Number" maxlength="10">
                            </div>
                            
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label>State</label>
                              <select class="form-control" name="state_id" onChange="getCity(this.value)" required="required">
                                  <option>Select State</option>
                                  <?php $__currentLoopData = $stateArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($obj->id); ?>"><?php echo e($obj->state_name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            </div>
                            
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label>City</label>
                              <select class="form-control" id="city" name="city_id" required="required">
                                  <option>Select City</option>
                                 
                              </select>
                            </div>
                            
                          </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label>Pincode</label>
                              <input type="text" id="pincode" name="pincode" class="form-control validate" required="required" placeholder="Enter pincode">
                            </div>
                            
                          </div>
                    </div>
                    
                </div>      
                
                   
                    
                    <div class="form-row">
                        <input type="hidden" id="id" name="id">
                        <button type="submit" name="login" class="btn waves-effect waves-light blue right btn-danger">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

