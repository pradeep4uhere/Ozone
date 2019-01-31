<div style="background-color: #FFF; width: 100%;">
         <div id="shopify-section-header-top" class="shopify-section">
            <div id="header" data-section-id="header-top" data-section-type="header-section">
               <header class="site-header" role="banner">
                  <div class="header-nav">
                     <div class="page-width">
                        <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-10 left-nav">
                              <div id="ishiheaderblock" class="ishiheaderblockTop">
                                 <span>BECOME SELLER CALL US +(91) 9015446567</span>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-12 col-md-2 right-nav rowInner" >
                              <div class="follow-us">
                                 <div id="social-icon-container" class="social-icon-inner">
                                    <div class="social-media-blocks">
                                       <div class="social-icon-inner">
                                          <div class="header-social">
                                             <ul class="list--inline site-footer__social-icons social-icons">
                                                <li class="facebook">
                                                   <a class="social-icons__link" href="https://www.facebook.com/Go4shop-328846894387347" title="smartshop.ishi on Facebook" target="_blank">
                                                   <i class="fa fa-facebook" aria-hidden="true"></i>
                                                   <span class="icon__-text">Facebook</span>
                                                   </a>
                                                </li>
                                                <li class="twitter">
                                                   <a class="social-icons__link" href="https://twitter.com/go4shoponline" title="smartshop.ishi on Twitter" target="_blank">
                                                   <i class="fa fa-twitter" aria-hidden="true"></i>
                                                   <span class="icon__-text">Twitter</span>
                                                   </a>
                                                </li>
                                                <li class="pinterest">
                                                   <a class="social-icons__link" href="#" title="smartshop.ishi on Pinterest" target="_blank">
                                                   <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                                   <span class="icon__-text">Pinterest</span>
                                                   </a>
                                                </li>
                                                <li class="instagram">
                                                   <a class="social-icons__link" href="#" title="smartshop.ishi on Instagram" target="_blank">
                                                   <i class="fa fa-instagram" aria-hidden="true"></i>
                                                   <span class="icon__-text">Instagram</span>
                                                   </a>
                                                </li>
                                                <li class="youtube">
                                                   <a class="social-icons__link" href="https://plus.google.com/u/0/116367403319178553544" title="smartshop.ishi on YouTube" target="_blank">
                                                   <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                                   <span class="icon__-text">YouTube</span>
                                                   </a>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="header-top site-header-inner rowInner">
                     <div class="page-width">
                        <div class="row">
                           <div class="header-logo-section header-top-left col-md-1">
                              <h1 class="h2 header__logo" itemscope="" itemtype="http://schema.org/Organization">
                                 <a href="{{env('APP_URL')}}" itemprop="url" class="header__logo-image">
                                 <img src="{{ Config('global.THEME_URL_FRONT_IMAGE') }}/rsz_go4shoponline.jpg" alt="discover" class="logo-bar__image" height="80" style="border-radius: 15%">
                                 </a>
                              </h1>
                           </div>
                           <div id="_desktop_search" class="site-header__search  hidden-lg-down col-md-4">
                              <div class="search-title clearfix collapsed" data-target="#search-container-full" data-toggle="collapse">
                                 <span class="search-toggle"></span>
                              </div>
                           </div>

                           <div class="header-top-right-corner col-md-6">
                              <div id="_desktop_cart" class="hidden-lg-down">
                                 <div class="cart-display">
                                    <!-- <div class="cart-title clearfix collapsed" data-target="#cart-container" data-toggle="collapse"> -->
                                    <div class="cart-title clearfix collapsed">
                                       <div class="site-header__cart expand-more">
                                          <div class="cart-img">
                                             <span class="cart-logo"></span>
                                             <span class="cart-qty hidden-lg-up">{{session('countItem')}}</span>
                                          </div>
                                          <a href="{{route('cart')}}">
                                          <div class="cart-price text-content hidden-lg-down">
                                             <span class="cart-count main-title">
                                             <span class="cart-title">Shopping Cart - 
                                             <span class="cart-qty">{{session('countItem')}}</span>
                                             </span>
                                             </span>
                                          </div>
                                       </a>
                                       </div>
                                    </div>
                                   <!--  <div id="cart-container" class="cart-dropdown-inner cart-dropdown collapse">
                                       <div class="cart-container-inner" data-section-id="header-top" data-section-type="cart-template">
                                          <div class="product-list hide"></div>
                                          <div class="cart__footer hide">
                                             <div class="grid">
                                                <div class="grid__item ">
                                                   <div>
                                                      <span class="cart__subtotal-title">Subtotal</span>
                                                      <span class="cart__subtotal">$0.00</span>          
                                                   </div>
                                                   <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>
                                                   <div class="cart-links">
                                                      <a class="btn checkout-btn" href="https://smartshop-ishi.myshopify.com/checkout">checkout</a>
                                                      <a class="view-cart btn" href="https://smartshop-ishi.myshopify.com/cart">Your cart</a>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="cart__empty">
                                             <span class="cart--empty-message">Your cart is currently empty.</span>
                                             <div class="cookie-message">
                                                <p>Enable cookies to use the shopping cart</p>
                                             </div>
                                          </div>
                                       </div>
                                    </div> -->
                                 </div>
                              </div>
                              
                              <div id="_desktop_user_info" class="user_info full-width hidden-lg-down">
                                 <div class="userinfo-title clearfix collapsed" data-target="#userinfo-container" data-toggle="collapse">
                                    <span class="userinfo-toggle"></span>
                                    <span class="user-content text-content">
                                    <span class="user-title main-title">
                                    Account
                                    </span>
                                    </span>
                                 </div>
                                 <div id="userinfo-container" class="userinfo-inner collapse">
                                    <ul class="header-bar__module header-bar__module--list">
                                       @if(Auth::user())
                                          <li class="log-in">
                                            <a href="{{route('dashboard')}}" id="customer_login_link">Profile</a>
                                          </li>
                                          <li class="logout">
                                            <a href="{{route('logout')}}" id="customer_register_link">Logout</a>
                                          </li>
                                       @else
                                          <li class="log-in">
                                            <a href="{{route('login')}}" id="customer_login_link">Log In</a>
                                          </li>

                                          <li class="create_account">
                                            <a href="{{route('register')}}" id="customer_register_link">Create Account</a>
                                          </li>
                                          
                                          <li class="wishlist"><a href="/pages/wishlist">Wishlist</a></li>
                                       @endif
                                    </ul>
                                    
                                 </div>
                              </div>


                              <div id="ishiheadercontactblock">
                                 <div class="call-img"></div>
                                 <div class="call-num">+91-9015446567</div>
                              </div>
                           </div>
                              
                        </div>
                     </div>
                  </div>
                  <div class="mobile-width hidden-lg-up">
                     <div class="page-width">
                        <!--Mobile Menu Start Here-->
                              @include('prssystem.partials.mobilemenu')
                              <!--Mobile Menu Ends Here-->
                        <div class="row">
                           <div class="mobile-width-left col-xs-12">
                              <div style="width: 100px; float: left;">
                                 <div id="menu-icon" class="menu-icon hidden-lg-up">
                                   <i class="fa fa-bars" aria-hidden="true"></i>
                                   <a href="{{env('APP_URL')}}" itemprop="url" class="header__logo-image">
                                   <span style="color: #FFF;font-size: 18px;font-weight: bold; font-family:cursive;display: block;position: relative;top:-13px;left: 40%">Go4Shop</span></a>
                                </div>
                              </div>
                              <div style="width:200px;float: right; text-align: right;">
                                 <div id="menu-icon" class="menu-icon hidden-lg-up collapsed" data-target="#userinfo-container-m" data-toggle="collapse">
                                    <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                 </div>
                                 
                              </div>
                           </div>
                           <div id="userinfo-container-m" class="userinfo-inner collapse" style="background-color: #FFF; width: 100%; padding:5px 5px 10px 5px; font-size: 14px;">
                              <ul class="header-bar__module header-bar__module--list">
                                 @if(Auth::user())
                                    <li class="log-in" style="margin-bottom:5px;">
                                      <a href="{{route('dashboard')}}" id="customer_login_link">Profile</a>
                                    </li>
                                    <li class="logout" style="margin-bottom:5px;">
                                      <a href="{{route('logout')}}" id="customer_register_link">Logout</a>
                                    </li>
                                 @else
                                    <li class="log-in" style="margin-bottom:5px;">
                                      <a href="/account/login" id="customer_login_link">Log In</a>
                                    </li>

                                    <li class="create_account" style="margin-bottom:5px;">
                                      <a href="/account/register" id="customer_register_link">Create Account</a>
                                    </li>
                                 @endif
                              </ul>
                              
                           </div>
                        </div>

                     </div>
                  </div>
               </header>
            </div>
         </div>
         <div class="wrapper-nav hidden-lg-down">
            <div class="navfullwidth">
               <div class="page-width">
                  <div class="row">
                     <div id="shopify-section-Ishi_megamenu" class="shopify-section">
                        <div data-section-id="Ishi_megamenu" data-section-type="megamenu-section" class="megamenu-section hidden-lg-down">
                           <div id="_desktop_top_menu" class="menu js-top-menu hidden-sm-down" role="navigation">
                              <ul class="top-menu" id="top-menu">
                                 <li class="category">
                                    <span class="float-xs-right hidden-lg-up">
                                    <span data-target="#_n_child-one1" data-toggle="collapse" class="navbar-toggler collapse-icons clearfix collapsed">
                                    <i class="material-icons add"></i>
                                    <i class="material-icons remove"></i>
                                    </span>
                                    </span>
                                    <a href="https://smartshop-ishi.myshopify.com/collections/organics" class="dropdown-item">
                                       <h3 class="title">ORGANICS</h3>
                                    </a>
                                    <div class="popover sub-menu js-sub-menu collapse" id="_n_child-one1" style="width: 630px;">
                                       <ul class="top-menu mainmenu-dropdown">
                                          <li class="sub-category">
                                             <span class="float-xs-right hidden-lg-up">
                                             <span data-target="#_n_grand-child-one1" data-toggle="collapse" class="navbar-toggler collapse-icons clearfix collapsed">
                                             <i class="material-icons add"></i>
                                             <i class="material-icons remove"></i>
                                             </span>
                                             </span>
                                             <a href="https://smartshop-ishi.myshopify.com/collections/fruits" class="dropdown-item dropdown-submenu">
                                                <h3 class="inner-title">Fruits</h3>
                                             </a>
                                             <div class="top-menu collapse" id="_n_grand-child-one1">
                                                <ul class="top-menu">
                                                   <li class="category">
                                                      <a href="https://smartshop-ishi.myshopify.com/collections/vegetables" class="dropdown-item">peach</a>
                                                   </li>
                                                   <li class="category">
                                                      <a href="https://smartshop-ishi.myshopify.com/collections/fruits" class="dropdown-item">kiwi</a>
                                                   </li>
                                                   <li class="category">
                                                      <a href="https://smartshop-ishi.myshopify.com/collections/organic-products" class="dropdown-item">apple</a>
                                                   </li>
                                                </ul>
                                             </div>
                                          </li>
                                          <li class="sub-category">
                                             <span class="float-xs-right hidden-lg-up">
                                             <span data-target="#_n_grand-child-two1" data-toggle="collapse" class="navbar-toggler collapse-icons clearfix collapsed">
                                             <i class="material-icons add"></i>
                                             <i class="material-icons remove"></i>
                                             </span>
                                             </span>
                                             <a href="https://smartshop-ishi.myshopify.com/collections/vegetables" class="dropdown-item dropdown-submenu">
                                                <h3 class="inner-title">Vegetables</h3>
                                             </a>
                                             <div class="top-menu collapse" id="_n_grand-child-two1">
                                                <ul class="top-menu">
                                                   <li class="category">
                                                      <a href="https://smartshop-ishi.myshopify.com/collections/vegetables" class="dropdown-item">cucumber</a>
                                                   </li>
                                                   <li class="category">
                                                      <a href="https://smartshop-ishi.myshopify.com/collections/fruits" class="dropdown-item">cherry tomatoes</a>
                                                   </li>
                                                   <li class="category">
                                                      <a href="https://smartshop-ishi.myshopify.com/collections/organic-products" class="dropdown-item">broccoli</a>
                                                   </li>
                                                </ul>
                                             </div>
                                          </li>
                                          <li class="sub-category">
                                             <span class="float-xs-right hidden-lg-up">
                                             <span data-target="#_n_grand-child-three1" data-toggle="collapse" class="navbar-toggler collapse-icons clearfix collapsed">
                                             <i class="material-icons add"></i>
                                             <i class="material-icons remove"></i>
                                             </span>
                                             </span>
                                             <a href="https://smartshop-ishi.myshopify.com/collections/organic-products" class="dropdown-item dropdown-submenu">
                                                <h3 class="inner-title">Organic Products</h3>
                                             </a>
                                             <div class="top-menu collapse" id="_n_grand-child-three1">
                                                <ul class="top-menu">
                                                   <li class="category">
                                                      <a href="https://smartshop-ishi.myshopify.com/collections/vegetables" class="dropdown-item">dry fruits</a>
                                                   </li>
                                                   <li class="category">
                                                      <a href="https://smartshop-ishi.myshopify.com/collections/fruits" class="dropdown-item">dairy products</a>
                                                   </li>
                                                   <li class="category">
                                                      <a href="https://smartshop-ishi.myshopify.com/collections/organic-products" class="dropdown-item">beverages</a>
                                                   </li>
                                                </ul>
                                             </div>
                                          </li>
                                       </ul>
                                       <div class="img-container row">
                                          <div class="col-xs-12 imagecontainer1">
                                             <a href="https://smartshop-ishi.myshopify.com/collections/fruits" class="link">
                                             <img class="feature-row__image lazyautosizes lazyloaded" src="./smartshop.ishi_files/Category_600x150.jpg" data-widths="[180, 360, 540, 720, 900, 1080, 1296, 1512, 1728, 2048]" data-aspectratio="4.2" data-sizes="auto" alt="" sizes="600px">
                                             </a>
                                          </div>
                                          <div class="col-xs-6 imagecontainer2">
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="category">
                                    <span class="float-xs-right hidden-lg-up">
                                    <span data-target="#_n_child-one2" data-toggle="collapse" class="navbar-toggler collapse-icons clearfix collapsed">
                                    <i class="material-icons add"></i>
                                    <i class="material-icons remove"></i>
                                    </span>
                                    </span>
                                    <a href="https://smartshop-ishi.myshopify.com/collections/organics" class="dropdown-item">
                                       <h3 class="title">SHOP</h3>
                                    </a>
                                    <div class="popover sub-menu js-sub-menu collapse" id="_n_child-one2" style="width: 430px;">
                                       <ul class="top-menu mainmenu-dropdown">
                                          <li class="sub-category">
                                             <span class="float-xs-right hidden-lg-up">
                                             <span data-target="#_n_grand-child-one2" data-toggle="collapse" class="navbar-toggler collapse-icons clearfix collapsed">
                                             <i class="material-icons add"></i>
                                             <i class="material-icons remove"></i>
                                             </span>
                                             </span>
                                             <a href="https://smartshop-ishi.myshopify.com/collections/fruits" class="dropdown-item dropdown-submenu">
                                                <h3 class="inner-title">organics linkmenu</h3>
                                             </a>
                                             <div class="top-menu collapse" id="_n_grand-child-one2">
                                                <ul class="top-menu">
                                                   <li class="category">
                                                      <a href="https://smartshop-ishi.myshopify.com/" class="dropdown-item">Fruits</a>
                                                   </li>
                                                   <li class="category">
                                                      <a href="https://smartshop-ishi.myshopify.com/" class="dropdown-item">Vegetables</a>
                                                   </li>
                                                   <li class="category">
                                                      <a href="https://smartshop-ishi.myshopify.com/" class="dropdown-item">Chocolate</a>
                                                   </li>
                                                   <li class="category">
                                                      <a href="https://smartshop-ishi.myshopify.com/" class="dropdown-item">personal care</a>
                                                   </li>
                                                </ul>
                                             </div>
                                          </li>
                                          <li class="sub-category product_container hidden-lg-down">
                                             <a href="https://smartshop-ishi.myshopify.com/collections/new-organics" class="dropdown-item dropdown-submenu">
                                                <h3 class="inner-title">special</h3>
                                             </a>
                                             <div class="grid__item grid__item--Ishi_megamenu">
                                                <div class="grid-view-item__link grid-view-item__image-container">
                                                   <div class="grid-view-item__image-wrapper js">
                                                      <a href="#">
                                                         <div class="image-inner">
                                                            <div class="reveal">
                                                               <img class="grid-view-item__image  main-img lazyloaded" src="./smartshop.ishi_files/1_43066bb6-41b4-4ba9-b16e-aba7b55bb2ad_130x168.jpg" alt="Aliquam rutrum mollis">
                                                            </div>
                                                            <div class="hide imgurl-for-quickview">
                                                               <span>
                                                                  <src img="//cdn.shopify.com/s/files/1/0016/4891/8628/products/1_43066bb6-41b4-4ba9-b16e-aba7b55bb2ad_370x480.jpg?v=1543213942">
                                                               </span>
                                                               <span>
                                                                  <src img="//cdn.shopify.com/s/files/1/0016/4891/8628/products/2_c1e17a33-4a02-4a0f-b282-2b14ca458f7d_370x480.jpg?v=1543213961">
                                                               </span>
                                                               <span>
                                                                  <src img="//cdn.shopify.com/s/files/1/0016/4891/8628/products/10_f9d48086-3f1c-4175-9cac-5e82811f2ccf_370x480.jpg?v=1543213968">
                                                               </span>
                                                               <span>
                                                                  <src img="//cdn.shopify.com/s/files/1/0016/4891/8628/products/11_90d78e7d-1752-4e64-ba0b-640a28823f0f_370x480.jpg?v=1543213969">
                                                               </span>
                                                               <span>
                                                                  <src img="//cdn.shopify.com/s/files/1/0016/4891/8628/products/12_8127092d-633a-4526-b9e6-12f8821be997_370x480.jpg?v=1543213970">
                                                               </span>
                                                            </div>
                                                         </div>
                                                      </a>
                                                   </div>
                                                   <div class="product-description">
                                                      <div class="product-detail">
                                                         <div class="h4 grid-view-item__title">Aliquam rutrum mollis</div>
                                                      </div>
                                                      <div class="grid-view-item__meta">
                                                         <!-- snippet/product-price.liquid -->
                                                         <!-- <div class="flags">
                                                            <div class="new-lbl">
                                                              
                                                                
                                                                
                                                                new
                                                            </div>
                                                            <div class="sale-lbl">
                                                            </div>
                                                            </div> -->
                                                         <span class="visually-hidden">Regular price</span>
                                                         <span class="original is-bold">$10.00</span>
                                                         <span class="product-price__sold-out">OUT OF STOCK</span>
                                                      </div>
                                                   </div>
                                                   <noscript>
                                                      <img class="grid-view-item__image" src="//cdn.shopify.com/s/files/1/0016/4891/8628/products/1_43066bb6-41b4-4ba9-b16e-aba7b55bb2ad.jpg?v=1543213942" alt="Aliquam rutrum mollis" style="max-width: 0.0px;">
                                                   </noscript>
                                                </div>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </li>
                                 <li class="category">
                                    <span class="float-xs-right hidden-lg-up">
                                    </span>
                                    <a href="https://smartshop-ishi.myshopify.com/blogs/organics" class="dropdown-item">
                                       <h3 class="title">BLOG</h3>
                                    </a>
                                 </li>
                                 <li class="category">
                                    <span class="float-xs-right hidden-lg-up">
                                    <span data-target="#_n_child-one4" data-toggle="collapse" class="navbar-toggler collapse-icons clearfix collapsed">
                                    <i class="material-icons add"></i>
                                    <i class="material-icons remove"></i>
                                    </span>
                                    </span>
                                    <a href="https://smartshop-ishi.myshopify.com/collections/organic-products" class="dropdown-item">
                                       <h3 class="title">ACCESSORIES</h3>
                                    </a>
                                    <div class="popover sub-menu js-sub-menu collapse" id="_n_child-one4" style="width: 230px;">
                                       <ul class="top-menu mainmenu-dropdown">
                                          <li class="sub-category">
                                             <span class="float-xs-right hidden-lg-up">
                                             <span data-target="#_n_grand-child-one4" data-toggle="collapse" class="navbar-toggler collapse-icons clearfix collapsed">
                                             <i class="material-icons add"></i>
                                             <i class="material-icons remove"></i>
                                             </span>
                                             </span>
                                             <a href="https://smartshop-ishi.myshopify.com/collections/organics" class="dropdown-item dropdown-submenu">
                                                <h3 class="inner-title">Organics</h3>
                                             </a>
                                             <div class="top-menu collapse" id="_n_grand-child-one4">
                                                <ul class="top-menu">
                                                   <li class="category">
                                                      <a href="https://smartshop-ishi.myshopify.com/collections/vegetables" class="dropdown-item">Vegetables</a>
                                                   </li>
                                                   <li class="category">
                                                      <a href="https://smartshop-ishi.myshopify.com/collections/fruits" class="dropdown-item">Fruits</a>
                                                   </li>
                                                   <li class="category">
                                                      <a href="https://smartshop-ishi.myshopify.com/collections/organic-products" class="dropdown-item">Organic Products</a>
                                                   </li>
                                                </ul>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </li>
                                 <li class="category">
                                    <span class="float-xs-right hidden-lg-up">
                                    </span>
                                    <a href="https://smartshop-ishi.myshopify.com/collections" class="dropdown-item">
                                       <h3 class="title">COLLECTION</h3>
                                    </a>
                                 </li>
                                 <li class="category">
                                    <span class="float-xs-right hidden-lg-up">
                                    </span>
                                    <a href="https://smartshop-ishi.myshopify.com/pages/contact-us" class="dropdown-item">
                                       <h3 class="title">CONTACT</h3>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div id="shopify-section-Ishi_offer" class="shopify-section shopify-section" style="display: none;">
                        <div id="ishioffersblock">
                           <div class="offer-title"> 
                              SPECIAL OFFER !
                           </div>
                           <div class="typed"><a href="https://smartshop-ishi.myshopify.com/">
                              <span>FLAT 30% OFF ALL PURCHASE</span>
                              </a>
                           </div>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>

         
      </div>
<div class="clearfix"></div>