<div class="container" style="width: 100% !important">
            <div class="row">
                <div class="col-md-9 responsive-wrap">
					<div class="wrapper row">
						@include('prssystem.frontend._productImage')
						<div class="details col-md-5 " style="margin:10px;">
												<?php //echo "<pre>";print_r($productDetails);?>
												<p style=" border-bottom: dashed 1px;font-size:24px; font-weight: bold; text-transform: capitalize">{{$productDetails->product['title']}}</p>
												
												<p class="product-description" style="display:none;font-size:12px;"></p>
							<p class="price" style="font-size:20px; font-weight: bold;">current price: <span>MRP ₹ {{$productDetails['price']}}</span><br/>
												<small  style="font-size:8px;">Inclusive of all Taxes</small>
												</p>
													<p style="font-size: 12px">Category :: {{$productDetails->product->Category['name']}} > {{$productDetails->product->SubCategory['name']}}</p>
							<p class="vote" style="font-size: 12px"><strong>Unit:</strong> {{$productDetails['quantity_in_unit']}}&nbsp;{{$productDetails->product->Unit['name']}}</p>
													<div class="action">
														<p  style="font-size:13px;"> Manufacture By: <strong>{{$productDetails->product->Brand['name']}}</strong>&nbsp;&nbsp;&nbsp;  <img src="{{config('global.THEME_URL_FRONT_IMAGE')}}/Liefstatus_Gruen_04de426b.png.gif"> Certified Brand Seller</p>
													</div>
													<br/>
													<div class="action">
														<p style="font-size: 12px">
													Select Quantity <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
															<option selected="">Select Item</option>
															@for($i=1;$i<100;$i++)
															<option value="{{$i}}">{{$i}}</option>
															@endfor
													</select></p>
													</div>
													<br/>
													<div class="action">
								<a href="javascript:void(0)" class="btn" style="background-color:#ff3a6d;color:#FFF;" onClick="addToCart('{{encrypt($productDetails->id)}}','{{str_slug($productDetails->product['title'])}}')">Add To Cart</a>
															<a href="javascript:void(0)" onClick="buyNow('{{encrypt($productDetails->id)}}','{{str_slug($productDetails->product['title'])}}')" class="btn btn-success">Buy Now </a>
								
							</div>

							
							
						</div>
						
						
		<div class="col-md-12">
			<div class="tabs">
				<div class="sharethis-inline-share-buttons"></div>				
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
					<p>{!! $productDetails['about_product'] !!}</p>
				  </div>
				  <div id="tab02" class="tab-contents">
					<h5>Product Highlights</h5>
					<p>{!! $productDetails['offers'] !!}</p>
				  </div>
				  <div id="tab03" class="tab-contents">
					<h5>Offers</h5>
					<p>{!! $productDetails['offers'] !!}</p>
				  </div>
				  <div id="tab04" class="tab-contents">
					<h5>About Brand</h5>
					<p>{!! $productDetails['offers'] !!}</p>
				  </div>
				  <div id="tab05" class="tab-contents">
					<h5>Return Policy</h5>
					<p>{!! $productDetails['return_policy'] !!}</p>
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
												<a href="javascript:void(0)" onClick="buyNow('{{encrypt($productDetails->id)}}','{{str_slug($productDetails->product['title'])}}')" class="btn btn-danger">Buy Now in <span>₹{{$productDetails['price']}}</span></a>
													
											</div>
											
											<hr/>
											<p  style="font-size:13px;">
												<img src="{{ Config('global.THEME_URL_FRONT_IMAGE') }}/map.jpg" class="img-fluid" alt="#">
												</p>
											</center>
											<p  style="font-size:13px;">
												 <span class="icon-location-pin"></span>
												{{$seller['business_name']}}&nbsp; <br> 
												{{$seller['address_1']}},{{$seller['address_2']}}<br> 
												{{$seller['state_id']}},{{$seller['city_id']}}- {{$seller['pincode_id']}}
											</p>

											<p  style="font-size:13px;"><span class="icon-clock"></span>
												Mon - Sun 09:30 am - 05:30 pm 

											</p>
											<hr/>
											<center><span class="open-now">OPEN NOW</span></center>
											<hr/>
							
										
										</div>
										
										</div>
				</div>
				</div>
				
            </div>
</div>