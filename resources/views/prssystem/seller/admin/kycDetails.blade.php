                    <div class="tab-content">
                    <div class="tab-pane active" id="horizontal-form">
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
                    
                    <form method="post" action="{{route('updateKYC')}}"class="form-horizontal" >
                    {{csrf_field()}}
                    
                   
                    
                    
                    <div class="form-group">
                        
                        <div class="col-sm-4">
                        <label for="disabledinput" class="control-label">@lang('First Name:')</label>
                        <input  type="text" class="form-control1" id="title" placeholder="Enter First Name" name="first_name" value="{{$seller->user->first_name}}">
                        
                        </div>
                        <div class="col-sm-4">
                            <label for="disabledinput" class="control-label">@lang('Last Name:')</label>
                       
                        <input  type="text" class="form-control1" id="title" placeholder="Enter Last Name" name="last_name" value="{{$seller->user->last_name}}">
                        </div>
                         <div class="col-sm-4">
                            <label for="disabledinput" class="control-label">@lang('Gender:')</label>
                            <select name="gender" class="form-control1">
                                <option value="1" selected="selected">Male</option>
                                <option value="2">Female</option>
                            </select>
                        
                        </div> 
                           
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="disabledinput" class="control-label">@lang('DOB:')</label>
                            <input  type="text" class="form-control1 datepicker" id="datepicker" name="dob" placeholder="Enter DOB DD/MM/YYYY" value="{{$seller->user->dob}}">
                        
                        </div> 
                        <div class="col-sm-4">
                            <label for="disabledinput" class="control-label">@lang('PAN:')</label>
                            <input  type="text" class="form-control1 datepicker" id="panno" name="pan_no" placeholder="e.g BDWPK5434A" value="{{strtoupper($seller->user->pan_no)}}">
                        
                        </div> 
                         <div class="col-sm-4">
                            <label for="disabledinput" class="control-label">@lang('Aadhar No:')</label>
                            <input  type="text" class="form-control1 datepicker" id="aadhar" name="aadhar_no" placeholder="e.g 4345-5443-2232" value="{{strtoupper($seller->user->aadhar_no)}}">
                        
                        </div> 

                       
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <hr>
                      <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-success pull-right" style="margin-left:38px">Update</button>
                        <input type="hidden" name="act" value="kycd">
                      </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
