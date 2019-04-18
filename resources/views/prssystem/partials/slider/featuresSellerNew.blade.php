<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style type="text/css">
    .col-centered {
    float: none;
    margin: 0 auto;
}

.carousel-control { 
    width: 1%;
    width: 0px;
}
.carousel-control.left,
.carousel-control.right { 
    margin-right: 0px;
    margin-left: 0px; 
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
    padding-left:1px;
  }

}


@media (max-width: 767px) {
  .carousel-inner .active.left { left: -50%; }
  .carousel-inner .active.right { left: 50%; }
    .carousel-inner .next        { left:  50%; }
    .carousel-inner .prev            { left: -50%; }
  .carousel-col                { width: 50%; }
    .active > div:first-child + div { display:block; }
    .address {
    font-size: 10px;
    padding-left:1px;
  }
}

/*sm*/
@media (min-width: 768px) and (max-width: 991px) {
  .carousel-inner .active.left { left: -50%; }
  .carousel-inner .active.right { left: 50%; }
    .carousel-inner .next        { left:  50%; }
    .carousel-inner .prev            { left: -50%; }
  .carousel-col                { width: 50%; }
    .active > div:first-child + div { display:block; }
    .address {
    font-size: 10px;
    padding-left:1px;
  }
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
  .address {
    font-size: 10px;
    padding-left:1px;
  }
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
    .address {
    font-size: 10px;
    padding-left:1px;
  }
}

.block {
    width: 350px;
    height: 230px;
}

.red {background: red;}
.blue {background: blue;}
.green {background: green;}
.yellow {background: yellow;}
.glyphicon-chevron-left:before{
  content:'';
}
.glyphicon-chevron-right:before{
  content:'';
}

.featured-title-box .title{
  font-weight: 500;
  font-size: 15px;
  color: inherit;
  font-family: sans-serif;
  font-weight: 500;
  margin-bottom: 5px
}
.featured-place-wrap{
  min-height: 350px;
}
.featured-place-wrap img{
  min-height: 300px;
  width: 100%;
}
.styled-heading {
    text-align: center;
    margin: 0 0 0px;
}

</style>
<div class="container-fluid featureSeller">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-centered">
            <div id="carousel" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="9500">
                <div class="carousel-inner">
                   <?php $count=0;foreach($sellerArr as $seller){ ?>
                   <div class="item <?php if($count==0){ echo "active";  } ?>" >
                   <div class="carousel-col" id="{{$seller['id']}}">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="featured-place-wrap">
                              <a href="{{route('sellerview',['seller'=>str_slug($seller['business_name']),'id'=>encrypt($seller['id'])])}}">
                                <img height="300"  src="{{config('global.SELLER_STORAGE_DIR').'/250X250/'.$seller['image_thumb']}}" onerror="this.onerror=null;this.src='{{ Config('global.THEME_URL_FRONT_IMAGE') }}/default250x250.jpg';"/>
                                <div class="featured-title-box">
                                    <h2 class='title'>{{ucwords($seller['business_name'])}}</h2>
                                    <p style="margin-bottom:1px;width: 100%">Type: {{$seller['StoreType']['name']}}</p>
                                    <p class='address' style="padding-top: 0px"> <i class="fa fa-map-marker"></i> {{$seller['address_1']}}, {{$seller['location']}}</p>
                                   
                                </div>
                            </a>
                        </div>
                        </div>
                      </div>
                    </div>
                 </div>
                <?php $count++; } ?>
                </div>

                <!-- Controls -->
                <div class="left carousel-control">
                    <a href="#carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                        <span class="sr-only">Previous</span>
                    </a>
                </div>
                <div class="right carousel-control">
                    <a href="#carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
  
    $('.carousel .item').each(function() {
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
