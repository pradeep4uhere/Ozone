@extends('prssystem/layouts/front')
@section('title')
    Home Page
@stop
@section('content')
<style>

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
                                    <h5>Let's uncover the best places to eat, drink, and shop nearest to you.</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10">
							
                                <form class="form-wrap mt-4" action="{{route('listing')}}" autocomplete="off" >
								{{ csrf_field() }}
                                    <div class="btn-group" role="group" aria-label="Basic example">
									    <div class="autocomplete" >
                                        <input type="text" placeholder="e.g Food, Water, Electronics..." class="btn-group1" id="myInput" name="category">
										</div>
										<!--<div class="autocomplete" >
                                        <input type="text" placeholder="Enter Your ZIPCODE OR Locality Name" class="btn-group2" id="myInput2" name="city">
										</div>-->
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
	
	<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
      });
}

/*An array containing all the country names in the world:*/
//var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
var countries =<?php echo $catJson; ?>; 
var city =<?php echo $cityArr; ?>; 

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
autocomplete(document.getElementById("myInput2"), city);
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
