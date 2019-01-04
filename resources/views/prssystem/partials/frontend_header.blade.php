
                <!--<div class="row" style="background-color:#87d372">-->
                <div class="row" style="background-color:#87d372">
				
                    <div class="col-md-3"><nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="{{route('home')}}" style="font-size: 24px;">
                                <img src="{{config('global.LOGO')}}">&nbsp;Go4shop

                             </a>
                             <span class="navbar-toggler">
                             @if(Auth::user()) Hello, {{Auth::user()->first_name}} @else Hi, Guest @endif
                            </span>
                             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-menu"></span>
                            </button>
							</div>
                    <div class="col-md-9">
					<div class="row" >
						<div class="col-md-12">
						<nav class="navbar navbar-expand-lg navbar-light">
                        	
                            
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item mr-3">
									<a class="nav-link" id="headlocation" href="en/login"><span class="icon-location-pin"></span>Your Location</a>
                                    </li>
                                    
									@if(!Auth::check()) 
                                    <li class="nav-item mr-3" style="font-size:10px;">
                                        <a class="nav-link" href="{{route('login')}}">Login</a>
                                    </li>
									<li class="nav-item mr-3">
										<a class="nav-link" href="{{route('register')}}">Register</a>
                                        
                                    </li>
									@endif
                                    <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="ti-user"></span> @if(Auth::user()) Hello, {{Auth::user()->first_name}} @else Hi, Guest @endif
                                    <span class="icon-arrow-down"></span>
                                    </a>
									@if(Auth::check()) 
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="{{route('dashboard')}}"><span class="ti-key"></span> Profile</a>
										<a class="dropdown-item" href="#"><span class="ti-key"></span> My Order</a>
                                        <a class="dropdown-item" href="{{route('logout')}}"><span class="ti-user"></span> Logout</a>
                                    </div>
									@endif
                                    </li>
									<li class="nav-item mr-3">
                                        
										<a href="{{route('cart')}}" class="btn btn-info">
											<span class="ti-shopping-cart" style="font-size:20px;"></span>
											<span id="itemCount" style="font-size:16px;">{{session('countItem')}}</span> Item
										</a>
		
										
                                    </li>
									
									@if(!Auth::check()) 
                                    <li><a href="{{route('register')}}" class="btn top-btn" style="background-color:#ff3a6d;color:#FFF"><span class="ti-plus"></span> Become Seller</a></li>
									@else
									<li><a href="{{route('sellerregister')}}" class="btn top-btn" style="background-color:#ff3a6d;color:#FFF"><span class="ti-plus"></span> Become Seller</a></li>
									@endif
                                </ul>
                            </div>


                        </nav>
						</div>

						
					</div>
					
                        
                    </div>
                </div>
            
        