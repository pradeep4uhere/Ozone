@extends('prssystem/layouts/front')
@section('title')
    Home Page
@stop
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
    <section class="slider d-flex align-items-center">
         <!--<img src="{{ Config('global.THEME_URL_FRONT_IMAGE') }}/slider.jpg" class="img-fluid" alt="#">--> 
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="slider-title_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-content_wrap">
                                    <h5>Let's uncover the best grocery shop nearest to you.</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10">
							
                                <form class="form-wrap mt-4" action="{{route('listing')}}" autocomplete="off" >
								{{ csrf_field() }}
                                    <div class="btn-group" role="group" aria-label="Basic example">
									<div class="autocomplete">
                                        <input type="text" placeholder="Enter your location" class="btn-group1" id="myInput" name="place">
										<div id="display" style="z-index:9999; position: absolute;border-top: none;z-index: 99;top: 100%;left: 0;right: 0;height: 250px; overflow: auto; font-size: 12px; "></div>
                                    </div>
										<!--<div class="autocomplete" >
                                        <input type="text" placeholder="Enter Your ZIPCODE OR Locality Name" class="btn-group2" id="myInput2" name="city">
										</div>-->
                                        <input type="hidden" name="locationId" id="locationIdStr">
                                        <button type="submit" class="btn-form"><span class="icon-magnifier search-icon"></span>SEARCH<i class="pe-7s-angle-right"></i></button>
                                    </div>
                                </form>
                                <div class="slider-link"><center><b><span class="icon-location-pin"></span> Your Current Location</b></center>
                                    <a href="#" id="location" style="font-size:16px">Choose You Location</a>
                                </div>
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
	
	<hr/>
	<style>
.widget-container {
    -webkit-border-radius: 2px;
    -webkit-background-clip: padding-box;
    -moz-border-radius: 2px;
    -moz-background-clip: padding;
    border-radius: 2px;
    background-clip: padding-box;
    -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .07);
    -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .07);
    box-shadow: 0 1px 2px rgba(0, 0, 0, .07);
    margin-bottom: 30px
}

.widget-container .widget {
    margin-bottom: 0
}

.widget-container>.row {
    margin-right: 0 !important;
    margin-left: 0 !important
}

.widget-container>.row>[class*="col-"] {
    padding-left: 0 !important;
    padding-right: 0 !important
}

.widget {
    -webkit-border-radius: 2px;
    -webkit-background-clip: padding-box;
    -moz-border-radius: 2px;
    -moz-background-clip: padding;
    border-radius: 2px;
    background-clip: padding-box;
    background-color: #fff;
    font-weight: 300;
    margin-bottom: 30px;
    position: relative;
    vertical-align: middle
}

.widget .row {
    font-size: 0;
    margin-left: 0;
    margin-right: 0
}

.widget .row:before {
    display: none
}

.widget .row .col {
    font-size: 11px
}

.widget .row .col:first-child {
    -webkit-border-radius: 2px 0 0 2px;
    -webkit-background-clip: padding-box;
    -moz-border-radius: 2px 0 0 2px;
    -moz-background-clip: padding;
    border-radius: 2px 0 0 2px;
    background-clip: padding-box
}

.widget .row .col:last-child {
    -webkit-border-radius: 0 2px 2px 0;
    -webkit-background-clip: padding-box;
    -moz-border-radius: 0 2px 2px 0;
    -moz-background-clip: padding;
    border-radius: 0 2px 2px 0;
    background-clip: padding-box
}

.widget .col {
    display: inline-block;
    vertical-align: top
}

.widget [class*=col-] {
    font-size: 11px;
    margin: 0;
    padding: 0
}

.image-tile {
    border: 1px solid #fff
}

.image-tile .tile {
    border: 1px solid #fff;
    height: 180px;
    margin: 0;
    padding: 0;
    text-align: center;
    vertical-align: bottom
}

.image-tile .tile:hover {
    cursor: pointer
}

.image-tile .tile:hover>p {
    background-color: rgba(3, 3, 3, .5);
    color: #fff
}

.image-tile .tile>p {
    background-color: rgba(3, 3, 3, 0);
    color: rgba(6, 6, 6, 0);
    font-size: 13px;
    font-weight: 300;
    height: 100%;
    padding-top: 50px;
    width: 100%
}

.image-tile .tile.more-images {
    background-color: #29c7ca;
    color: #fff;
    font-size: 15px;
    font-weight: 300
}

.image-tile .tile.more-images .images-number {
    font-size: 25px;
    margin-top: 20px
}

                                    
</style>

	<section class="main-block" style="width:100%; padding:5px;">	
	 
<div class="col-md-12">
    <div class="widget-container">
        <div class="widget row image-tile">
            <div class="tile col-md-3" style="background: url('{{ Config('global.THEME_URL_FRONT_IMAGE') }}/cat/11.png') no-repeat center top; background-size: cover;">
                <p>View</p>
            </div>
            <div class="tile col-md-2" style="background: url('{{ Config('global.THEME_URL_FRONT_IMAGE') }}/cat/22.png') no-repeat center top; background-size: cover;">
                <p>view  </p>
            </div>
			<div class="tile col-md-1" style="background: url('{{ Config('global.THEME_URL_FRONT_IMAGE') }}/cat/33.jpg') no-repeat center top; background-size: cover;">
                <p>view  </p>
            </div>
            <div class="tile col-md-4" style="background: url('{{ Config('global.THEME_URL_FRONT_IMAGE') }}/cat/44.jpg') no-repeat center top; background-size: cover;">
                <p>view  </p>
            </div>
            <div class="tile col-md-2" style="background: url('{{ Config('global.THEME_URL_FRONT_IMAGE') }}/cat/55.jpeg') no-repeat center top; background-size: cover;">
                <p>view  </p>
            </div>
            <div class="tile col-md-1" style="background: url('{{ Config('global.THEME_URL_FRONT_IMAGE') }}/cat/66.jpg') no-repeat center top; background-size: cover;">
                <p>view  </p>
            </div>
            <div class="tile col-md-3" style="background: url('{{ Config('global.THEME_URL_FRONT_IMAGE') }}/cat/77.jpg') no-repeat center top; background-size: cover;">
                <p>view  </p>
            </div>
            <div class="tile col-md-2" style="background: url('{{ Config('global.THEME_URL_FRONT_IMAGE') }}/cat/88.jpg') no-repeat center top; background-size: cover;">
                <p>view  </p>
            </div>
			<div class="tile col-md-3" style="background: url('{{ Config('global.THEME_URL_FRONT_IMAGE') }}/cat/99.jpg') no-repeat center top; background-size: cover;">
                <p>view  </p>
            </div>
			
          

            <div class="tile col-md-2" style="background: url('{{ Config('global.THEME_URL_FRONT_IMAGE') }}/cat/10.jpg') no-repeat center top; background-size: cover;">
                <p>view  </p>
            </div>
            <div class="tile more-images col-md-1" style="background-color:#ff3a6d; padding-top:25px" >
                <div>42+</div>
                More
            </div>
        </div>
    </div>
</div>
    
</section>
        
	<hr/>
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
						<?php //sprint_r($SellerImage);?>
							@if($SellerImage->is_default==1)
                            <img height="250px" src="{{config('global.SELLER_IMG_GALLERY').DIRECTORY_SEPARATOR.'seller_'.$SellerImage->seller_id.DIRECTORY_SEPARATOR.$SellerImage->image_name}}" />
							@endif
							@endforeach
							@else
							<img src="{{ Config('global.THEME_URL_FRONT_IMAGE') }}/featured1.jpg" class="img-fluid" alt="#">
							@endif
                            <div class="featured-title-box">
                                <h6>{{$seller['business_name']}}</h6>
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
    <section class="main-block ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="add-listing-wrap">
                        <h2>Reach millions of People</h2>
                        <p>Add your Business infront of millions and earn 3x profits from our listing</p>
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
    <script>
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



<script>

	//Note: this script should be placed at the bottom of the page, or after the slider markup. It cannot be placed in the head section of the page.
	var thumbs1 = document.getElementById("thumbnail-slider");
	var thumbs2 = document.getElementById("thumbs2");
	var closeBtn = document.getElementById("closeBtn");
	var slides = thumbs1.getElementsByTagName("li");
	for (var i = 0; i < slides.length; i++) {
	
		slides[i].index = i;
		slides[i].onclick = function (e) {
			var li = this;
			var clickedEnlargeBtn = false;
			if (e.offsetX > 220 && e.offsetY < 25) clickedEnlargeBtn = true;
			if (li.className.indexOf("active") != -1 || clickedEnlargeBtn) {
				thumbs2.style.display = "block";
				mcThumbs2.init(li.index);
			}
		};
	}

	thumbs2.onclick = closeBtn.onclick = function (e) {
		//This event will be triggered only when clicking the area outside the thumbs or clicking the CLOSE button
		thumbs2.style.display = "none";
	};
</script>
		
@stop

@section('footer_scripts')
    
@stop
