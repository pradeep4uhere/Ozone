<div id="mobile_top_menu_wrapper" class="hidden-lg-up" style="display: none">
    <div id="top_menu_closer">
        <i class="material-icons"></i>
    </div>
    <div class="js-top-menu mobile" id="_mobile_top_menu">
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><i class="fa fa-home"></i>&nbsp;<a href="{{route('home')}}" id="customer_login_link">Home</a></li>
          <li class="list-group-item"><i class="fa fa-shopping-cart"></i>&nbsp;<a href="{{route('cart')}}">Shopping Cart -</a>(<a href="{{route('cart')}}">{{session('countItem')}}</a>)</li>
          @if(Auth::user())
          <li class="list-group-item"><i class="fa fa-user"></i>&nbsp;<a href="{{route('dashboard')}}" id="customer_login_link">Profile</a></li>
          <li class="list-group-item"><i class="fa fa-bank"></i>&nbsp;<a href="{{route('seller')}}" id="customer_login_link">Seller Profile</a></li>
          <li class="list-group-item"><i class="fa fa-first-order"></i>&nbsp;<a href="{{route('dashboard')}}" id="customer_login_link">My Orders</a></li>
          <li class="list-group-item"><i class="fa fa-sign-out"></i>&nbsp;<a href="{{route('logout')}}" id="customer_register_link">Logout</a></li>
          @else
          <li class="list-group-item"><i class="fa fa-sign-in"></i>&nbsp;<a href="{{route('login')}}" id="customer_login_link">Log In</a></li>
          <li class="list-group-item"><i class="fa fa-user-plus"></i>&nbsp;<a href="{{route('register')}}" id="customer_register_link">Create Account</a></li>
          @endif
        </ul>
    </div>
</div>
