
                <!--<div class="row" style="background-color:#87d372">-->
                <div class="row" style="background-color:#87d372">
				
                    <div class="col-md-3"><nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                                GrabMoreNow
                             </a>
							</div>
                    <div class="col-md-9">
					<div class="row" >
						<div class="col-md-12">
						<nav class="navbar navbar-expand-lg navbar-light">
                        	
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-menu"></span>
              </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item mr-3">
									<a class="nav-link" id="headlocation" href="en/login"><span class="icon-location-pin"></span>Your Location</a>
                                    </li>
                                    
									<?php if(!Auth::check()): ?> 
                                    <li class="nav-item mr-3" style="font-size:10px;">
                                        <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                                    </li>
									<li class="nav-item mr-3">
										<a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
                                        
                                    </li>
									<?php endif; ?>
                                    <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="ti-user"></span> <?php if(Auth::user()): ?> Hello, <?php echo e(Auth::user()->first_name); ?> <?php else: ?> Hi, Guest <?php endif; ?>
                                    <span class="icon-arrow-down"></span>
                                    </a>
									<?php if(Auth::check()): ?> 
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>"><span class="ti-key"></span> Profile</a>
										<a class="dropdown-item" href="#"><span class="ti-key"></span> My Order</a>
                                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"><span class="ti-user"></span> Logout</a>
                                    </div>
									<?php endif; ?>
                                    </li>
									<li class="nav-item mr-3">
                                        
										<a href="<?php echo e(route('cart')); ?>" class="btn btn-info">
											<span class="ti-shopping-cart" style="font-size:20px;"></span>
											<span id="itemCount" style="font-size:16px;"><?php echo e(session('countItem')); ?></span> Item
										</a>
		
										
                                    </li>
									
									<?php if(!Auth::check()): ?> 
                                    <li><a href="<?php echo e(route('register')); ?>" class="btn top-btn" style="background-color:#ff3a6d;color:#FFF"><span class="ti-plus"></span> Become Seller</a></li>
									<?php else: ?>
									<li><a href="<?php echo e(route('sellerregister')); ?>" class="btn top-btn" style="background-color:#ff3a6d;color:#FFF"><span class="ti-plus"></span> Become Seller</a></li>
									<?php endif; ?>
                                </ul>
                            </div>
                        </nav>
						</div>
						
					</div>
					
                        
                    </div>
                </div>
            
        