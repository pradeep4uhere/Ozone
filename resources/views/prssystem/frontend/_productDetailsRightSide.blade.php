<div class="container">
            <div class="row">
                <div class="col-md-12 responsive-wrap">
                    <div class="row light-bg detail-options-wrap">
                        <!--Product Box Start-->
                       
                        @if(!empty($productList))
                        @foreach($productList as $prodObj)
                        <div class="col-md-3 featured-responsive" >
                            <div class="featured-place-wrap">
                        <a href="{{route('details',['slug'=>str_slug($prodObj['Product']['title']),'id'=>encrypt($prodObj['UserProduct']['id'])])}}">
                            <center style="border-bottom:solid 1px #EEE; ">
                                <img style="width:150px;height: 150px; " src="{{ config('global.PRODUCT_IMG_URL').DIRECTORY_SEPARATOR.$prodObj['UserProduct']['default_images'] }}" class="img-fluid" alt="#" onerror="this.onerror=null;this.src='{{ Config('global.THEME_URL_FRONT_IMAGE') }}/default250x250.jpg';">
                                </center>
                            <span class="featured-rating-orange">₹ {{$prodObj['UserProduct']['price']}}</span>
                            <div class="featured-title-box">
                                <p style="font-size: 16px;">{{ucwords($prodObj['Product']['title'])}}</p>
                                <p style="font-size: 12px;">Category ::
                                 {{$prodObj['Product']['Category']['name']}} > {{str_limit($prodObj['Product']['SubCategory']['name'],8)}}</p>
                                <p style="font-size: 12px;">Manufacture By: <span>{{$prodObj['Product']['Brand']['name']}}</span></p><BR/>
                                <p style="font-size: 12px;">Unit: {{$prodObj['UserProduct']['quantity_in_unit']}}&nbsp;{{$prodObj['Product']['Unit']['name']}}</p>
                                <div class="bottom-icons">
                                <div class="closed-now">
                                    <a href="javascript:void(0)" class="btn" style="background-color:#ff3a6d;color:#FFF;" onClick="addToCart('{{encrypt($prodObj['UserProduct']['id'])}}','{{str_slug($prodObj['Product']['title'])}}')">Add To Cart</a>
                                </div>
                                <span class="ti-heart"></span>
                                <span class="ti-bookmark"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                        @endforeach
                        @endif
                <!--Product Box Ends Here-->   
                </div>
                </div>
                
            </div>
        </div>