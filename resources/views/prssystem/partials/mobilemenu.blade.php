<div id="mobile_top_menu_wrapper" class="hidden-lg-up" style="">
    <div id="top_menu_closer">
        <i class="material-icons"></i>
    </div>
    <div class="js-top-menu mobile" id="_mobile_top_menu">
        <ul class="top-menu" id="top-menu" data-depth="0">
            <li class="cms-category" id="cms-category-1">
                
                <li class="log-in" style="margin-bottom:5px;">
                <a href="{{route('home')}}" id="customer_login_link">Home</a>
                </li>
                @if(Auth::user())
                <li class="log-in" style="margin-bottom:5px;">
                <a href="{{route('dashboard')}}" id="customer_login_link">Profile</a>
                </li>
                <li class="log-in" style="margin-bottom:5px;">
                <a href="{{route('dashboard')}}" id="customer_login_link">My Orders</a>
                </li>
                <li class="log-in" style="margin-bottom:5px;">
                    
                        <span class="cart-count main-title">
                        <span class="cart-title"><a href="{{route('cart')}}">Shopping Cart -</a> 
                        <span class="cart-qty"><a href="{{route('cart')}}">{{session('countItem')}}</a></span>
                        </span>
                        </span>
                </li>
                <li class="logout" style="margin-bottom:5px;">
                <a href="{{route('logout')}}" id="customer_register_link">Logout</a>
                </li>
                @else
                <li class="log-in" style="margin-bottom:5px;">
                <a href="{{route('login')}}" id="customer_login_link">Log In</a>
                </li>

                <li class="create_account" style="margin-bottom:5px;">
                <a href="{{route('register')}}" id="customer_register_link">Create Account</a>
                </li>
                @endif    
            
            
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
