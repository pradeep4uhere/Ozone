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
                    
                    <form method="post" action=""class="form-horizontal" >
                    {{csrf_field()}}
                    
                   
                    
                    
                    <div class="form-group">
                        <label for="disabledinput" class="col-sm-2 control-label">@lang('Mobile No:')</label>
                        <div class="col-sm-4">
                        <input  type="text" class="form-control1" id="title" placeholder="Enter Mobile Number" name="title" value="{{$seller->contact_number}}">
                        </div>
                        <!-- <div class="col-sm-1">
                        <input  type="text" class="form-control1" id="title" placeholder="OTP" name="OTP">
                        </div> -->
                        <!-- <div class="col-sm-4">&nbsp;<a href=""  class="btn btn-success">Verify</a></div> -->
                    </div>
                    <div class="form-group">
                        <label for="disabledinput" class="col-sm-2 control-label">@lang('Email Address:')</label>
                        <div class="col-sm-4">
                            <input  type="text" class="form-control1" id="description" placeholder="Enter Email Address" name="description" value="{{$seller->email_address}}">
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <hr>
                      <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-success pull-right" style="margin-left:38px">Update</button>
                      </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
