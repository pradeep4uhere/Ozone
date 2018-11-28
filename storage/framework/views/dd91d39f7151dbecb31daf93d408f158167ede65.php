<div class="container" style="width: 100% !important">
            <div class="row">
                <div class="col-md-9 responsive-wrap">
					<div class="wrapper row">
						<?php echo $__env->make('prssystem.frontend._productImage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<div class="details col-md-5 " style="margin:10px;">
												<?php //echo "<pre>";print_r($productDetails);?>
												<p style=" border-bottom: dashed 1px;font-size:24px; font-weight: bold; text-transform: capitalize"><?php echo e($productDetails->product['title']); ?></p>
												
												<p class="product-description" style="display:none;font-size:12px;"></p>
							<p class="price" style="font-size:20px; font-weight: bold;">current price: <span>MRP ₹ <?php echo e($productDetails['price']); ?></span><br/>
												<small  style="font-size:8px;">Inclusive of all Taxes</small>
												</p>
													<p>Category :: <?php echo e($productDetails->product->Category['name']); ?> > <?php echo e($productDetails->product->SubCategory['name']); ?></p>
							<p class="vote"><strong>Unit:</strong> <?php echo e($productDetails['quantity_in_unit']); ?>&nbsp;<?php echo e($productDetails->product->Unit['name']); ?></p>
													<div class="action">
														<p  style="font-size:13px;"> Manufacture By: <strong><?php echo e($productDetails->product->Brand['name']); ?></strong>&nbsp;&nbsp;&nbsp;  <img src="<?php echo e(config('global.THEME_URL_FRONT_IMAGE')); ?>/Liefstatus_Gruen_04de426b.png.gif"> Certified Brand Seller</p>
													</div>
													<br/>
													<div class="action">
														<p>
													Select Quantity <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
															<option selected="">Select Item</option>
															<?php for($i=1;$i<100;$i++): ?>
															<option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
															<?php endfor; ?>
													</select></p>
													</div>
													<br/>
													<div class="action">
								<a href="javascript:void(0)" class="btn" style="background-color:#ff3a6d;color:#FFF;" onClick="addToCart('<?php echo e(encrypt($productDetails->id)); ?>')">Add To Cart</a>
															<a href="#" class="btn btn-success">Buy Now </a>
								
							</div>
							
							
						</div>
						
						
						
						<div class="details col-md-12">
						<div class="tabs">
	  <div class="tab-button-outer">
		<ul id="tab-button">
		  <li><a href="#tab01">Overview</a></li>
		  <li><a href="#tab02">Product Highlights</a></li>
		  <li><a href="#tab03">Offers</a></li>
		  <li><a href="#tab04">About Brand</a></li>
		  <li><a href="#tab05">Return Policy</a></li>
		</ul>
	  </div>
	  <div class="tab-select-outer">
		<select id="tab-select">
		  <option value="#tab01">Overview</option>
		  <option value="#tab02">Product Highlights</option>
		  <option value="#tab03">Offers</option>
		  <option value="#tab04">About Brand</option>
		  <option value="#tab05">Return Policy</option>
		</select>
	  </div>

	  <div id="tab01" class="tab-contents">
		<h5>Overview</h5>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quos aliquam consequuntur, esse provident impedit minima porro! Laudantium laboriosam culpa quis fugiat ea, architecto velit ab, deserunt rem quibusdam voluptatum.</p>
	  </div>
	  <div id="tab02" class="tab-contents">
		<h5>Product Highlights</h5>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quos aliquam consequuntur, esse provident impedit minima porro! Laudantium laboriosam culpa quis fugiat ea, architecto velit ab, deserunt rem quibusdam voluptatum.</p>
	  </div>
	  <div id="tab03" class="tab-contents">
		<h5>Offers</h5>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quos aliquam consequuntur, esse provident impedit minima porro! Laudantium laboriosam culpa quis fugiat ea, architecto velit ab, deserunt rem quibusdam voluptatum.</p>
	  </div>
	  <div id="tab04" class="tab-contents">
		<h5>About Brand</h5>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quos aliquam consequuntur, esse provident impedit minima porro! Laudantium laboriosam culpa quis fugiat ea, architecto velit ab, deserunt rem quibusdam voluptatum.</p>
	  </div>
	  <div id="tab05" class="tab-contents">
		<h5>Return Policy</h5>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quos aliquam consequuntur, esse provident impedit minima porro! Laudantium laboriosam culpa quis fugiat ea, architecto velit ab, deserunt rem quibusdam voluptatum.</p>
	  </div>
	</div>
						</div>
					</div>
				</div>
				
										<div class="col-md-3 sdBox">
										<div class="wrapper row">
											<p class="vote">Discount</p>
											<p style="font-size:13px;">This product is not in offer for this seller.</p>
											<hr/>
											
											<div class="reserve-btn">
											<center>
											
											<div class="featured-btn-wrap">
												<a href="#" class="btn btn-danger">Buy Now in <span>₹ <?php echo e($productDetails['price']); ?></span></a>
													
											</div>
											
											<hr/>
											<p  style="font-size:13px;">
												<img src="<?php echo e(Config('global.THEME_URL_FRONT_IMAGE')); ?>/map.jpg" class="img-fluid" alt="#">
												</p>
											</center>
											<p  style="font-size:13px;">
												 <span class="icon-location-pin"></span>
												<?php echo e($seller['business_name']); ?>&nbsp; <br> 
												<?php echo e($seller['address_1']); ?>,<?php echo e($seller['address_2']); ?><br> 
												<?php echo e($seller['state_id']); ?>,<?php echo e($seller['city_id']); ?>- <?php echo e($seller['pincode_id']); ?>

											</p>

											<p  style="font-size:13px;"><span class="icon-clock"></span>
												Mon - Sun 09:30 am - 05:30 pm 

											</p>
											<hr/>
											<center><span class="open-now">OPEN NOW</span></center>
								
							
										
										</div>
										
										</div>
				</div>
				</div>
				
            </div>
</div>