@extends('prssystem/layouts/frontDetails')
@section('title'){{$pageRow['title']}}@stop
@section('description'){{$pageRow['title']}}@stop
@section('content')
<section>
<div class="container">
	<div class="row">
    	<div class="col-md-12 responsive-wrap">
			<div class="row detail-filter-wrap">
			    <div class="col-md-4 featured-responsive">
			        <div class="detail-filter-text">
			            <p class="title"><h4>{{$pageRow['title']}}</h4></p>
			        </div>
			    </div>
			</div>
    		<div class="row detail-filter-wrap">
				<p>{!! $pageRow['description'] !!}</p>
	   		</div>
		</div>
	</div>
</div>
</section>
@stop
@section('footer_scripts')
@stop