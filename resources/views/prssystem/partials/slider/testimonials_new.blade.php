<style type="text/css">
.carousel {
    position: relative
}
.carousel-inner {
    position: relative;
    width: 100%;
    overflow: hidden
}
.carousel-inner>.item {
    position: relative;
    display: none;
    -webkit-transition: .6s ease-in-out left;
    transition: .6s ease-in-out left
}
.carousel-inner>.item>img,
.carousel-inner>.item>a>img {
    display: block;
    height: auto;
    max-width: 100%;
    line-height: 1
}
.carousel-inner>.active,
.carousel-inner>.next,
.carousel-inner>.prev {
    display: block
}
.carousel-inner>.active {
    left: 0
}
.carousel-inner>.next,
.carousel-inner>.prev {
    position: absolute;
    top: 0;
    width: 100%
}
.carousel-inner>.next {
    left: 100%
}
.carousel-inner>.prev {
    left: -100%
}
.carousel-inner>.next.left,
.carousel-inner>.prev.right {
    left: 0
}
.carousel-inner>.active.left {
    left: -100%
}
.carousel-inner>.active.right {
    left: 100%
}
.carousel-control {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    width: 2%;
    font-size: 20px;
    color: #fff;
    text-align: center;
    /*text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);*/
    opacity: .5;
    filter: alpha(opacity=50)
}
.carousel-control.left {
    background-image: transparent;
/*    background-image: -webkit-gradient(linear, 0 top, 100% top, from(rgba(0, 0, 0, 0)), to(rgba(0, 0, 0, 0.0001)));
    background-image: -webkit-linear-gradient(left, color-stop(rgba(0, 0, 0, 0) 0), color-stop(rgba(0, 0, 0, 0.0001) 100%));
    background-image: -moz-linear-gradient(left, rgba(0, 0, 0, 0.5) 0, rgba(0, 0, 0, 0.0001) 100%);
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0.5) 0, rgba(0, 0, 0, 0.0001) 100%);
    background-repeat: repeat-x;
    filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1)
*/}
.carousel-control.right {
    background-image: transparent;
    right: 0;
    left: auto;
    /*background-image: -webkit-gradient(linear, 0 top, 100% top, from(rgba(0, 0, 0, 0.0001)), to(rgba(0, 0, 0, 0.5)));
    background-image: -webkit-linear-gradient(left, color-stop(rgba(0, 0, 0, 0.0001) 0), color-stop(rgba(0, 0, 0, 0.5) 100%));
    background-image: -moz-linear-gradient(left, rgba(0, 0, 0, 0.0001) 0, rgba(0, 0, 0, 0.5) 100%);
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0.0001) 0, rgba(0, 0, 0, 0.5) 100%);
    background-repeat: repeat-x;
    filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1)*/
}
.carousel-control:hover,
.carousel-control:focus {
    color: #fff;
    text-decoration: none;
    opacity: .9;
    filter: alpha(opacity=90)
}
.carousel-control .icon-prev,
.carousel-control .icon-next,
.carousel-control .glyphicon-chevron-left,
.carousel-control .glyphicon-chevron-right {
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 5;
    display: inline-block;
    color: #000
}
.carousel-control .icon-prev,
.carousel-control .icon-next {
    width: 20px;
    height: 20px;
    margin-top: -10px;
    margin-left: -10px;
    font-family: serif
}
.carousel-control .icon-prev:before {
    content: '\2039'
}
.carousel-control .icon-next:before {
    content: '\203a'
}
.carousel-indicators {
    position: absolute;
    bottom: 10px;
    left: 50%;
    z-index: 15;
    width: 60%;
    padding-left: 0;
    margin-left: -30%;
    text-align: center;
    list-style: none
}
.carousel-indicators li {
    display: inline-block;
    width: 10px;
    height: 10px;
    margin: 1px;
    text-indent: -999px;
    cursor: pointer;
    border: 1px solid #fff;
    border-radius: 10px
}
.carousel-indicators .active {
    width: 12px;
    height: 12px;
    margin: 0;
    background-color: #fff
}
.carousel-caption {
    position: absolute;
    right: 15%;
    bottom: 20px;
    left: 15%;
    z-index: 10;
    padding-top: 20px;
    padding-bottom: 20px;
    color: #fff;
    text-align: center;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6)
}
.carousel-caption .btn {
    text-shadow: none
}
@media screen and (min-width: 768px) {
    .carousel-control .icon-prev,
    .carousel-control .icon-next {
        width: 30px;
        height: 30px;
        margin-top: -15px;
        margin-left: -15px;
        font-size: 30px
    }
    .carousel-caption {
        right: 20%;
        left: 20%;
        padding-bottom: 30px
    }
    .carousel-indicators {
        bottom: 20px
    }
}
.styled-heading{
    text-align: center;
    margin-top: 20px;
}
.img-circle img{
        border-radius: 50%;
    }
</style>

<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="styled-heading">
                        <h3>Testimonial</h3>
                    </div>
        <div class="seprator"></div>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                @if(!empty($itemList))
                <?php $count=1;?>
                @foreach($itemList as $testimonials)
                <div class="item <?php if($count==1){?> active <?php }?>">
                  <div class="row" style="padding: 20px">
                    <button style="border: none;"><i class="fa fa-quote-left testimonial_fa" aria-hidden="true"></i></button>
                    <p class="testimonial_para">{{$testimonials['text']}}</p><br>
                    <div class="row">
                    <div class="col-sm-2">
                        <img class="img-circle" src="{{ Config('global.THEME_URL_FRONT_IMAGE') }}/user.jpg" style="width: 100px;height:80px;">
                        </div>
                        <div class="col-sm-10">
                        <h4><strong>-{{$testimonials['full_name']}}</strong></h4>
                        <p class="testimonial_subtitle"><span>Verified Customer</span><br>
                        <span>New Delhi</span>
                        </p>
                    </div>
                    </div>
                  </div>
                </div>
                <?php $count++; ?>
                @endforeach
                @endif
               <div class="item">
                   <div class="row" style="padding: 20px">
                    <button style="border: none;"><i class="fa fa-quote-left testimonial_fa" aria-hidden="true"></i></button>
                    <p class="testimonial_para">The only website I can trust for product online especially Cloths is Go4Shop.online, I have done so much shopping of <b>Go4Shop</b> most of the products I have received were of really good quality and some products I am still using.</p><br>
                    <div class="row">
                    <div class="col-sm-1">
                        <img class="img-circle" src="{{ Config('global.THEME_URL_FRONT_IMAGE') }}/user.jpg" style="width: 100px;height:80px;">
                        </div>
                        <div class="col-sm-10">
                        <h4><strong>-Pradeep Kumar</strong></h4>
                        <p class="testimonial_subtitle"><span>Verified Customer</span><br>
                        <span>Noida, Uttar Pradesh</span>
                        </p>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="controls testimonial_control pull-right">
                <a class="left fa fa-chevron-left btn btn-default testimonial_btn" href="#carousel-example-generic"
                  data-slide="prev"></a>

                <a class="right fa fa-chevron-right btn btn-default testimonial_btn" href="#carousel-example-generic"
                  data-slide="next"></a>
              </div>
        </div>
    </div>
</div>