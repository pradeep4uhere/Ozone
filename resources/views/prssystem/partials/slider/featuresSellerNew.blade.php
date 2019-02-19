<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style type="text/css">
    .col-centered {
    float: none;
    margin: 0 auto;
}

.carousel-control { 
    width: 8%;
    width: 0px;
}
.carousel-control.left,
.carousel-control.right { 
    margin-right: 40px;
    margin-left: 32px; 
    background-image: none;
    opacity: 1;
}
.carousel-control > a > span {
    color: white;
      font-size: 29px !important;
}

.carousel-col { 
    position: relative; 
    min-height: 1px; 
    padding: 5px; 
    float: left;
 }

 .active > div { display:none; }
 .active > div:first-child { display:block; }

/*xs*/
@media (max-width: 375px) {
  .carousel-inner .active.left { left: -50%; }
  .carousel-inner .active.right { left: 50%; }
    .carousel-inner .next        { left:  50%; }
    .carousel-inner .prev            { left: -50%; }
  .carousel-col                { width: 50%; }
    .active > div:first-child + div { display:block; }
  .address {
    font-size: 10px;
    padding: 5px;
  }

}


@media (max-width: 767px) {
  .carousel-inner .active.left { left: -50%; }
  .carousel-inner .active.right { left: 50%; }
    .carousel-inner .next        { left:  50%; }
    .carousel-inner .prev            { left: -50%; }
  .carousel-col                { width: 50%; }
    .active > div:first-child + div { display:block; }
}

/*sm*/
@media (min-width: 768px) and (max-width: 991px) {
  .carousel-inner .active.left { left: -50%; }
  .carousel-inner .active.right { left: 50%; }
    .carousel-inner .next        { left:  50%; }
    .carousel-inner .prev            { left: -50%; }
  .carousel-col                { width: 50%; }
    .active > div:first-child + div { display:block; }
}

/*md*/
@media (min-width: 992px) and (max-width: 1199px) {
  .carousel-inner .active.left { left: -33%; }
  .carousel-inner .active.right { left: 33%; }
    .carousel-inner .next        { left:  33%; }
    .carousel-inner .prev            { left: -33%; }
  .carousel-col                { width: 33%; }
    .active > div:first-child + div { display:block; }
  .active > div:first-child + div + div { display:block; }
}

/*lg*/
@media (min-width: 1200px) {
  .carousel-inner .active.left { left: -25%; }
  .carousel-inner .active.right{ left:  25%; }
    .carousel-inner .next        { left:  25%; }
    .carousel-inner .prev            { left: -25%; }
  .carousel-col                { width: 25%; }
    .active > div:first-child + div { display:block; }
  .active > div:first-child + div + div { display:block; }
    .active > div:first-child + div + div + div { display:block; }
}

.block {
    width: 350px;
    height: 230px;
}

.red {background: red;}

.blue {background: blue;}

.green {background: green;}

.yellow {background: yellow;}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-centered">

            <div id="carousel" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="2500">
                <div class="carousel-inner">
                   <?php $count=0;foreach($sellerArr as $seller){ if($count<=10){ ?>
                   <div class="item @if($count==1) active @endif" style="border: soild 1px #000;">
                   <div class="carousel-col">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="featured-place-wrap">
                              <a href="{{route('sellerview',['seller'=>str_slug($seller['business_name']),'id'=>encrypt($seller['id'])])}}">
                                <img height="200" src="{{config('global.SELLER_STORAGE_DIR').'/250X250/'.$seller['image_thumb']}}" onerror="this.onerror=null;this.src='{{ Config('global.THEME_URL_FRONT_IMAGE') }}/default250x250.jpg';"/>
                                <div class="featured-title-box">
                                    <h2>{{ucwords($seller['business_name'])}}</h2>
                                    <p>{{$seller['StoreType']['name']}} </p><span>• </span>
                                    <p>3 Reviews</p> <span> • </span>
                                    <p><span>Open Now</span></p>
                                    <ul>
                                    <li style="text-align: left;">
                                        <p class='address'> <i class="fa fa-map-marker"></i> {{$seller['address_1']}}, {{$seller['location']}},{{$seller['district']}},{{$seller['state']}},{{$seller['pincode']}}</p>
                                    </li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        </div>
                      </div>
                    </div>
                 </div>
                <?php $count++; }} ?>
                </div>

                <!-- Controls -->
                <div class="left carousel-control">
                    <a href="#carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                </div>
                <div class="right carousel-control">
                    <a href="#carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $('.carousel[data-type="multi"] .item').each(function() {
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i = 0; i < 2; i++) {
        next = next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
    }
});
</script>