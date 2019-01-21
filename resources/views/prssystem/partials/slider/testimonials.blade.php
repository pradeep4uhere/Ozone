 <link rel="stylesheet" href="{{config('global.THEME_URL_FRONT_CSS').'/lightslider.css'}}">
    <style>
        ul{
            list-style: none outside none;
            padding-left: 0;
            margin: 0;
        }
        .demo .item{
            margin-bottom: 60px;
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

            blockquote h3,div {
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
    
    <script src="{{config('global.THEME_URL_FRONT_JS').'/lightslider.js'}}"></script>
    <script>
         $(document).ready(function() {
            $("#testimonial-slider").lightSlider({
                loop:true,
                keyPress:true,
                item:1,
                thumbItem:10,
                slideMargin: 0,
                speed:300,
                auto:true,
                loop:true,
                auto:true,
            });
        });
    </script>
    <hr/>
    <div class="demo">
        <div class="item">
            <ul id="testimonial-slider" class="content-slider">
                <li>
                    <blockquote>
                    <div class="col-md-12">
                           <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam totam nulla est, illo molestiae maxime officiis, quae ad, ipsum vitae deserunt molestias eius alias.
                            <div>--Pradeep Kumar</div>
                        
                    </div>
                    </blockquote>
                </li>
                <li>
                    <blockquote>
                        <div class="col-md-12">
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam totam nulla est, illo molestiae maxime officiis, quae ad, ipsum vitae deserunt molestias eius alias</h3>
                            <div>--Pradeep Kumar</div>
                        
                    </div>
                    </blockquote> 
                </li>
            </ul>
        </div>

    </div>  
    <hr/>