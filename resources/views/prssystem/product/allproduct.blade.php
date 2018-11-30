@extends('prssystem.layouts.list')
@section('title')
Home Page
@stop
@section('content')
<div id="page-wrapper" style="background-color: #FFF">
	
	<div class="graphs">
    	<table style="width: 100%">
		<tr>
			<td><b>@lang('product.all_product')</b></td>
			<td style="text-align: right;font-weight: bold">
				<a href="{{ route('addproduct')}}" style="font-size: 14px;"><i class="fa fa-plus"></i>&nbsp;Add New</a></td>
		</tr>
	</table>
        
        <div class="tab-content" style="font-size: 14px;">
            @if(Session::has('message'))
                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                    @if(Session::has('error'))
                    <p class="alert alert-danger">
                    @foreach(Session::get('error') as $err)
                    {{ $err }}</br>
                    @endforeach
                    </p>
                    @endif
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
	                    <th><input type="checkbox" id="checkall" /></th>
	                    <th>Image</th>
	                    <th>Title</th>
	                    <th>Product SKU</th>
	                    <th>In Stock</th>
	                    <th>Quantity</th>
	                    <th>Price/Unit</th>
	                    <th>Status</th>
	                    <th>Action</th>
                    </thead>
                    <tbody>
                        @if(!empty($userProduct))
                        @foreach($userProduct as $prodObj)
                        <tr>
                            <td><input type="checkbox" class="checkthis" /></td>
                            <td><img src="{{config('global.PRODUCT_THUMB_IMG')}}/{{$prodObj['default_thumbnail'] }}" width="32" /></td>
                            <td>{{$prodObj->product['title']}}<br/>
                              <small>{{$prodObj->product['description']}}</small>
                            </td>
                            <td>{{$prodObj['product_sku']}}</td>
                            <td>{{($prodObj['product_in_stock']==1)?'YES':'NO'}}</td>
                            <td>{{$prodObj['quantity']}}</td>
                            <td>{{number_format($prodObj['price'],2)}}</td>
                            <td><?php echo ($prodObj['status']==1)?"<font color='Green'><b>Active</b></font>":"<font color='Red'><b>InActive</b></font>";?></td>
                            <td>
                            <a href="{{ route('addProductImg',['id'=>$prodObj['id']]) }}" style="font-size: 14px;">
                            	<i class="lnr lnr-picture"></i>
                            </a>&nbsp;&nbsp;
                            <a href="{{ route('editProduct',['id'=>$prodObj['id']]) }}" style="font-size: 14px;">
                            	<i class="lnr lnr-pencil"></i>
                            </a>&nbsp;&nbsp;
                            <a href="{{ route('deleteProduct',['id'=>$prodObj['id']]) }}" style="font-size: 17px;">
                            	<i class="fa fa-times"></i>
                            </a></td>
                            
                            
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="clearfix"></div>
                <ul class="pagination pull-right">
                    <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@stop
@section('footer_scripts')
@stop
