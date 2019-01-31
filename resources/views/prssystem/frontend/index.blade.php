@extends('prssystem/layouts/front')
@include('prssystem.partials.metatags',array('meta'=>$metaTags))
@section('content')
<style>
.listItem{ cursor: pointer; }
.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
  width: 100%;
  text-align:left;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}

.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>

    <!--main section-->
     <!-- SLIDER -->
    <section class="slider d-flex align-items-center" style="background-image: url('{{ Config('global.THEME_URL_FRONT_IMAGE') }}/slider.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
         <!-- <img src="{{ Config('global.THEME_URL_FRONT_IMAGE') }}/slider.jpg" class="img-fluid" alt="#">  -->
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="slider-title_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-content_wrap">
                                    <h3>Let's uncover the best shops nearest to you.</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-12">
                                <form class="form-wrap mt-4" action="{{route('listing')}}" autocomplete="off" >
                                  <div class="col-md-12">
                    								{{ csrf_field() }}
                                    <div class="btn-group col-md-12" role="group" aria-label="Basic example">
									                   <div class="autocomplete" style="margin-bottom:1px;">
                                     <input type="text" placeholder="e.g Bisrakh Gautam Buddha nagar 201301 Uttar Pradesh" class="btn-group1" id="myInput" name="place">
                                     
										                 <div id="display" style="z-index:9999; position: absolute;border-top: none;z-index: 99;top: 100%;left: 0;right: 0;height: 250px; overflow: auto; font-size: 12px; ">
                                     </div>
                                     </div>
                                     <button type="submit" class="btn-form"><span class="icon-magnifier search-icon"></span>SEARCH<i class="pe-7s-angle-right"></i></button>
                                    <input type="hidden" name="locationId" id="locationIdStr">
                                    </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// SLIDER -->
    <!--//END HEADER -->
    <!--============================= FIND PLACES =============================-->

	 <!--Start Caegory SliderList-->
   <section class="main-block light-bg" style="margin-bottom:1px; padding-bottom:1px;margin-top:1px;padding-top:30px;">
        <div class="row justify-content-center">
            <div class="styled-heading">
              <h3>Featured Seller</h3>
            </div>
        </div>
	      @include('prssystem.partials.slider.featuresSeller',array('sellerArr'=>$sellerArr))
   </section>
    <!--End Caegory Slider List-->
    

<section class="main-block" style="margin:0px;padding: 0px">
  @include('prssystem.partials.slider.topfocus')
</section>
<section class="main-block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>What do you need to find?</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="find-place-img_wrap">
                        <div class="grid">
                            <figure class="effect-ruby">
                                <img src="{{ Config('global.THEME_URL_FRONT_IMAGE') }}/cat/74652abbffda340829982304bb56434d.png" class="img-fluid" alt="img13" />
                                <figcaption>
                                    <h5>Men's Fashion</h5>
                                    <p>385 Listings</p>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row find-img-align">
                        <div class="col-md-12">
                            <div class="find-place-img_wrap">
                                <div class="grid">
                                    <figure class="effect-ruby">
                                        <img src="{{ Config('global.THEME_URL_FRONT_IMAGE') }}/cat/images.jpeg" class="img-fluid" alt="img13" />
                                        <figcaption>
                                            <h5>Restaurant</h5>
                                            <p>210 Listings</p>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="find-place-img_wrap">
                                <div class="grid">
                                    <figure class="effect-ruby">
                                        <img src="{{ Config('global.THEME_URL_FRONT_IMAGE') }}/find-place3.jpg" class="img-fluid" alt="img13" />
                                        <figcaption>
                                            <h5>Women's Fashion</h5>
                                            <p>114 Listings</p>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row find-img-align">
                        <div class="col-md-12">
                            <div class="find-place-img_wrap">
                                <div class="grid">
                                    <figure class="effect-ruby">
                                        <img src="{{ Config('global.THEME_URL_FRONT_IMAGE') }}/cat/groc.jpg" class="img-fluid" alt="img13" />
                                        <figcaption>
                                            <h5>Grocery </h5>
                                            <p>577 Listings</p>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="find-place-img_wrap">
                                <div class="grid">
                                    <figure class="effect-ruby">
                                        <img src="{{ Config('global.THEME_URL_FRONT_IMAGE') }}/cat/books-news.jpg" class="img-fluid" alt="img13" />
                                        <figcaption>
                                            <h5>Books & Stationery </h5>
                                            <p>79 Listings</p>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
            </div>
        </div>
    </section>
    <!--//END FIND PLACES -->
    <!--============================= FEATURED PLACES =============================-->
    <section class="main-block light-bg" style="width:100%; padding:5px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Featured Stores Near You</h3>
                    </div>
                </div>
            </div>
            <div class="row">
				<?php foreach($sellerArr as $seller){?>
                <div class="col-md-4 featured-responsive">
                    <div class="featured-place-wrap"><?php //print_r($seller['SellerImage']);?>
                        <a href="{{route('sellerview',['seller'=>str_slug($seller['business_name']),'id'=>encrypt($seller['id'])])}}">
                            @if(count($seller['SellerImage']))
							@foreach($seller['SellerImage'] as $SellerImage)
							@if($SellerImage->is_default==1)
                            <img height="250px" src="{{config('global.SELLER_IMG_GALLERY').DIRECTORY_SEPARATOR.'seller_'.$SellerImage->seller_id.DIRECTORY_SEPARATOR.$SellerImage->image_name}}" />
							@endif
							@endforeach
							@else
							<img src="{{ Config('global.THEME_URL_FRONT_IMAGE') }}/default250x250.jpg" class="img-fluid" alt="image" style="height: 245px;">
							@endif
              <div class="featured-title-box">
              <h2>{{$seller['business_name']}}</h2>
              <p>{{$seller['StoreType']['name']}} </p> <span>• </span>
              <p>3 Reviews</p> <span> • </span>
              <p><span>Open Now</span></p>
              <ul>
              <li><span class="icon-location-pin"></span>
                  <p>{{$seller['address_1']}}</p>
              </li>
              </ul>
              </div>
              </a>
              </div>
              </div>
				    <?php } ?>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        <a href="#" class="btn btn-danger">VIEW ALL</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END FEATURED PLACES -->
    <!--============================= CATEGORIES =============================-->
    <!--//END CATEGORIES -->
    <!--============================= ADD LISTING =============================-->

    <section>
      @include('prssystem.partials.slider.testimonials',array('itemList'=>$Testimonials))
    </section>
    <section class="main-block light-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="add-listing-wrap">
                        <h2>Reach millions of People</h2>
                        <p>Add your Business infront of millions and earn 3X profits from your own listing</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        <a href="#" class="btn btn-danger"><span class="ti-plus"></span> ADD BUSINESS LISTING</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
      @include('prssystem.partials.slider.focus')
    </section>
    <script>
        $(window).scroll(function() {
            // 100 = The point you would like to fade the nav in.

            if ($(window).scrollTop() > 100) {

                $('.fixed').addClass('is-sticky');

            } else {

                $('.fixed').removeClass('is-sticky');

            };
        });
    </script>
	
<script type="text/javascript">
function setLocationId(id){
    $("#locationIdStr").val(id);
    var location = $("#listid_"+id).text();
    $("#myInput").val(location);
    $("#display").hide();
}
$(document).ready(function() {
    //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#myInput").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#myInput').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display").html("");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "api/en/v1/getlocation",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   text: name,
                   type: 'list',
                   token:"09bb3d1bd096e366b2fd039b4b8b8206"
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display").html(html.result).show();
               }
           });
       }
   });
});
</script>
@stop
@section('footer_scripts')
@stop
