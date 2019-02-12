<div class="page-width collection_templete">
   <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12 normal-sidebar sidebar_content">
         @include('prssystem.partials.product.productListSideBar')
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12 normal_main_content">
         <div id="shopify-section-collection-template" class="shopify-section">
            <div data-section-id="collection-template" data-section-type="collection-template" class="collection__main">
               <header class="collection-header">
                  <div class="collection-hero">
                     <img class="collection-hero__image ratio-container js lazyloaded" src="{{ Config('global.THEME_URL_FRONT_IMAGE') }}/{{$store_type}}" data-widths="[1170]" alt="Furniture Shop"  style="width: 100%">
                     <div class="collection-hero__title-wrapper">
                        <h1 class="collection-hero__title page-width">Furniture Shop</h1>
                     </div>
                  </div>
                  <div class="category-info">
                     <h1 class="category_name"> 
                        ALL PRODUCTS LISTS
                     </h1>
                     <p class="collection-heading">All procuts collections by seller.</p>
                     <!-- <div class="collection-desc">
                        <p>This category includes all the basics of your wardrobe and much more:&nbsp;</p>
                        <p>shoes, accessories, printed t-shirts, feminine dresses, women's jeans!</p>
                     </div> -->
                  </div>
                  <div class="filters-toolbar-wrapper">
                     <div class="filters-toolbar">
                        <div class="collection-view">
                           <div id="grid-img" class="grid-img checked">  
                           </div>
                           <div id="list-img" class="list-img"> 
                           </div>
                        </div>
                        <div class="filters-toolbar__item filters-toolbar__item--count">
                           <span class="filters-toolbar__product-count">There are {{count($productList)}} products</span>
                        </div>
                        <div class="filters-toolbar__item">
                           <label for="SortBy" class="sort-label">Sort by:</label>
                           <div class="select-wrapper">
                              <select name="SortBy" id="SortBy" class="filters-toolbar__input filters-toolbar__input--sort" style="width: 89px;">
                                 <option value="title-ascending" selected="selected">Sort by:</option>
                                 <option value="best-selling">Best Selling</option>
                                 <option value="title-ascending">Alphabetically, A-Z</option>
                                 <option value="title-descending">Alphabetically, Z-A</option>
                                 <option value="price-ascending">Price, low to high</option>
                                 <option value="price-descending">Price, high to low</option>
                                 <option value="created-descending">Date, new to old</option>
                                 <option value="created-ascending">Date, old to new</option>
                              </select>
                           </div>
                           <input class="collection-header__default-sort" type="hidden" value="manual">
                        </div>
                     </div>
                  </div>
               </header>
               <div class="row" id="Collection">
                  <div class="products-display products-display-collection grid grid--uniform grid--view-items" id="results">
                    @if(!empty($productList))
                      @foreach($productList as $prodObj)
                        <!-- <div class="grid__item grid__item--collection-template col-xs-6 col-sm-4 col-md-4 col-lg-3 col-xl-3"> -->
                        <div class="grid__item grid__item--collection-template col-xs-6 col-sm-4 col-md-4 col-lg-3 col-xl-3">
                           <div class="grid-view-item ">
                              <div class="grid-view-item__link grid-view-item__image-container">
                                 <div class="grid-view-item__image-wrapper js">
                                    <a href="{{route('details',['slug'=>str_slug($prodObj['Product']['title']),'id'=>encrypt($prodObj['UserProduct']['id'])])}}">
                                       <div class="image-inner">
                                          <div class="reveal">
                                             <img class="grid-view-item__image  main-img lazyloaded" src="{{ config('global.PRODUCT_IMG_URL').DIRECTORY_SEPARATOR.$prodObj['UserProduct']['default_images'] }}" class="img-fluid" alt="#" onerror="this.onerror=null;this.src='{{ Config('global.THEME_URL_FRONT_IMAGE') }}/default250x250.jpg';">
                                             <img class="extra-img" src="{{ config('global.PRODUCT_IMG_URL').DIRECTORY_SEPARATOR.$prodObj['UserProduct']['default_images'] }}" alt="image" onerror="this.onerror=null;this.src='{{ Config('global.THEME_URL_FRONT_IMAGE') }}/default250x250.jpg';">

                                             <span class="spr-badge" id="spr_badge_1639015841892" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty"></i><i class="spr-icon spr-icon-star-empty"></i><i class="spr-icon spr-icon-star-empty"></i><i class="spr-icon spr-icon-star-empty"></i><i class="spr-icon spr-icon-star-empty"></i></span><span class="spr-badge-caption">No reviews</span>
                                             </span>
                                          </div>
                                          <div class="hide socialurl-for-quickview">
                                             <span>
                                             </span>
                                          </div>
                                       </div>
                                    </a>
                                    <div class="quick-view">
                                       <button class="btn" data-toggle="modal"><span> quick view</span></button>
                                    </div>
                                    <div class="add-to-wishlist">
                                       <div class="show">
                                          <div class="default-wishbutton-grinders-cafe loading"><a class="add-in-wishlist-js btn" data-href="grinders-cafe"><i class="fa fa-heart-o"></i><span class="tooltip-label">Add to wishlist</span></a></div>
                                          <div class="loadding-wishbutton-grinders-cafe loading btn loader-btn" style="display: none; pointer-events: none"><a class="add_to_wishlist" data-href="grinders-cafe"><i class="fa fa-circle-o-notch fa-spin"></i></a></div>
                                          <div class="added-wishbutton-grinders-cafe loading" style="display: none;"><a class="added-wishlist btn add_to_wishlist" href="/pages/wishlist"><i class="fa fa-heart"></i><span class="tooltip-label">View Wishlist</span></a></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="product-description">
                                    <div class="product-detail">
                                       <div class="h4 grid-view-item__title"><?php if($prodObj['Product']['title']!=''){ ?>{{ str_limit(ucwords($prodObj['Product']['title']), $limit = 25, $end = '...') }}<?php }else{ echo "Unknown Name"; } ?></div>
                                    </div>
                                    <div class="grid-view-item__meta">
                                       <span class="visually-hidden">Regular price</span>
                                       <span class="regular" style="text-decoration: line-through;">₹{{$prodObj['UserProduct']['price']}}</span>
                                       <span class="discount-percentage">
                                       <span>save</span>0%</span>
                                       <span class="product-price__price product-price__sale">
                                       <s class="product-price__price is-bold"> ₹{{$prodObj['UserProduct']['price']}} </s>
                                       </span><br/><br/>
                                       <span>Unit: {{$prodObj['UserProduct']['quantity_in_unit']}}&nbsp;{{$prodObj['Product']['Unit']['name']}}</span>
                                    </div>
                                    <div class="thumbnail-buttons">
                                       <div class="product-block-hover grid-hover">
                                          <div class="nm-cartmain add_to_cart_main grid-cart">
                                            <div class="product-form__item product-form__item--submit">
                                               <a href="javascript:void(0)" class="btn" style="background-color:#ff3a6d;color:#FFF;" onClick="addToCart('{{encrypt($prodObj['UserProduct']['id'])}}','{{str_slug($prodObj['Product']['title'])}}')">Add To Cart</a>
                                            </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @endforeach
                     @else
                      <center>
                          <div class="alert alert-danger">No product added by this seller</div>
                      </center>
                    @endif

                  </div>

               </div>
               <center><div class="ajax-loading" style="display: none"></div></center>
            </div>
         </div>
      </div>
      <div class="responsive-sidebar sidebar_content"></div>
   </div>
</div>
<script type="text/javascript">
var page = 1; //track user scroll as page number, right now page number is 1
load_more(page); //initial content load
$(window).scroll(function() { 
   //detect page scroll
    if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled from top to bottom of the page
        page++; //page number increment
        load_more(page); //load content   
    }
});     
function load_more(page){
  $.ajax(
        {
         url: '?page=' + page,
         type: "get",
         datatype: "html",
         beforeSend: function()
         {
             $('.ajax-loading').show();
             $('.ajax-loading').addClass('alert alert-danger');
             $('.ajax-loading').html('Loading...');
         }
        })
        .done(function(data)
        {
            if(data.length == 0){
            console.log(data.length);
                //notify user if nothing to load
                $('.ajax-loading').addClass('alert alert-danger');
                $('.ajax-loading').html('No More Product.');
                return;
            }
            $('.ajax-loading').hide(); //hide loading animation once data is received
            $("#results").append(data); //append data into #results element          
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              //alert('No response from server');
              $('.ajax-loading').show();
              $('.ajax-loading').addClass('alert alert-danger');
              $('.ajax-loading').html('No More Product.');

        });
 }
</script>