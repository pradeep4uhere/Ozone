 <link rel="stylesheet" href="{{config('global.THEME_URL_FRONT_CSS').'/lightslider.css'}}">
    <style>
        ul{
            list-style: none outside none;
            padding-left: 0;
            margin: 0;
        }
        .demo .item{
            background-color: #FFF;
        }
        .content-slider li{
            background-color: #FFF;
            text-align: center;
            color: #FFF;
        }
        .content-slider img {
            margin: 0;
            padding:0;
        }
        .demo{
            width: 100%;
        }

        blockquote {
            border:none;
            font-family:Georgia, "Times New Roman", Times, serif;
            margin-bottom:-30px;
            }

            blockquote h3 {
                font-size:21px;
                color: #666
            }


            blockquote h3:before { 
                content: open-quote;
                font-weight: bold;
                font-size:100px;
                color:#888;
            } 
            blockquote h3:after { 
                content: close-quote;
                font-weight: bold;
                font-size:100px;
                color:#888;
            }
    </style>
    <style type="text/css">
        /* carousel */
#quote-carousel 
{
  padding: 0 10px 10px 10px;
  margin-top: 30px;
}

/* Control buttons  */
#quote-carousel .carousel-control
{
  background: none;
  color: #222;
  font-size: 22px;
  text-shadow: none;
}
/* Previous button  */
#quote-carousel .carousel-control.left 
{
  left: -12px;
}
/* Next button  */
#quote-carousel .carousel-control.right 
{
  right: -12px !important;
}

#quote-carousel img
{
  width: 250px;
  height: 100px
}
/* End carousel */

.item blockquote {
    border-left: none; 
    margin: 0;
}

.item blockquote img {
    margin-bottom: 10px;
    border-radius: 50%;
}

.item blockquote p {
    font-size: 20px;
    color: #666
}

.item blockquote p:before {
    content: "\f10d";
    font-family: 'Fontawesome';
    float: left;
    margin-right: 10px;
    font-size: 20px;
    color: #666
}
.item blockquote small {
    color: #666;
    font-size: 16px;
}




/**
  MEDIA QUERIES
*/

/* Small devices (tablets, 768px and up) */
@media (min-width: 768px) { 
    #quote-carousel 
    {
      margin-bottom: 0;
      padding: 0 40px 30px 40px;
    }
    .img-circle img{
        border-radius: 50%;
    }
    
}

/* Small devices (tablets, up to 768px) */
@media (max-width: 768px) { 
    .img-circle img{
        border-radius: 50%;
    }
}
    </style>
    
    <script src="{{config('global.THEME_URL_FRONT_JS').'/lightslider.js'}}"></script>
    <script>
         $(document).ready(function() {
            $("#testimonial-slider").lightSlider({
                loop:true,
                keyPress:true,
                item:1,
                thumbItem:10,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                auto:true,
            });
        });
    </script>
    <hr/>
    <div class="demo row" style="padding-top: 40px;">
            <div class="col-sm-2">&nbsp;</div>
            <div class="item col-sm-8 text-center">
            <ul id="testimonial-slider" class="content-slider">
                <li>
                 <div class="carousel-inner">
                  <!-- Quote 3 -->
                  <div class="item">
                    <blockquote>
                      <div class="row">
                        <div class="col-sm-2 text-center">
                          <img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/keizgoesboom/128.jpg" style="width: 100px;height:100px;">
                        </div>
                        <div class="col-sm-9">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris.</p>
                          <small>--Someone famous</small>
                        </div>
                      </div>
                    </blockquote>
                  </div>
                  </div>  
                </li>
                <li>
                    <div class="carousel-inner">
                    <!-- Quote 2 -->
                  <div class="item">
                    <blockquote>
                      <div class="row">
                        <div class="col-sm-2 text-center">
                          <img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/mijustin/128.jpg" style="width: 100px;height:100px;">
                        </div>
                        <div class="col-sm-9">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.</p>
                          <small>--Someone famous</small>
                        </div>
                      </div>
                    </blockquote>
                  </div>
                  </div>
                </li>

                <li>
                    <div class="carousel-inner">
                    <!-- Quote 1 -->
                      <div class="item active">
                        <blockquote>
                          <div class="row">
                            <div class="col-sm-2 text-center">
                              <img class="img-circle" src="http://www.reactiongifs.com/r/overbite.gif" style="width: 100px;height:100px;">
                            </div>
                            <div class="col-sm-9">
                              <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
                              <small>--Someone famous</small>
                            </div>
                          </div>
                        </blockquote>
                      </div>
                      </div>

                </li>
            </ul>
        </div>
    </div>  
<hr style="margin:0px;">