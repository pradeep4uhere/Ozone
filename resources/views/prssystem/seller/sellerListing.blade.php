@extends('prssystem/layouts/listing')
@section('title')
    Home Page
@stop
@section('content')
<!--============================= FEATURED PLACES =============================-->
    <section class="light-bg">
        <div class="container-fluid">
             <div class="row detail-filter-wrap">
                        <div class="col-md-4 featured-responsive">
                            <div class="detail-filter-text">
                                <p>{{count($sellerArr)}} Result Found</p>
                            </div>
                        </div>
                        <div class="col-md-4 featured-responsive">
                            <div class="detail-filter-text">
                                 @if(Session::has('flash_message'))
                                 <div class="alert alert-success" style="padding: 6px">
                                    {{ Session::get('flash_message') }}
                                </div>
                                @endif
                                 @if(Session::has('error_message'))
                                 <div class="alert alert-danger" style="padding: 6px">
                                    {{ Session::get('error_message') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4 featured-responsive">
                            <div class="detail-filter">
                                <p>Filter by</p>
                                <form class="filter-dropdown" id="catForm">
                                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="categoryName" name="category" onchange="getList(this.value)">    
                                    @foreach($Category as $cat)
                                    <option value="{{$cat}}" @if($cat==$searchCat) selected @endif>{{$cat}}</option>
                                    @endforeach
                                    </select>
                                </form>
                                <div class="map-responsive-wrap">
                                    <a class="map-icon" href="#"><span class="icon-location-pin"></span></a>
                                </div>
                            </div>
                        </div>
                        
                    
                    </div>

            <div class="row" style="background-color: #FFF; padding: 15px 05px 05px 05px;">
				<?php foreach($sellerArr as $seller){?>
                <div class="col-md-3 featured-responsive">
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

             <div class="row justify-content-center" style="background-color: #FFF; margin-bottom: 15px;">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        <a href="#" class="btn btn-danger">VIEW ALL</a>
                    </div>
                </div>
            </div>
          
        </div>
    </section>
    <!--//END FEATURED PLACES -->
@stop

@section('footer_scripts')
    
@stop

