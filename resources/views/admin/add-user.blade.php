@extends('admin/includes.layout')
@section('content')


				<!-- Page content -->
                    <div id="page-content">
                        <!-- Validation Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="gi gi-warning_sign"></i>Users<br><small>Add Users</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Users</li>
                            <li><a href="">Add Users</a></li>
                        </ul>
                        <!-- END Validation Header -->

                        <div class="row">
                            <div class="col-md-12">

                            @if (session('confirm'))
			                  	 <div class="alert alert-success text-center">
			                   		{{ session('confirm') }}
			                     </div>
							@endif
								<h4>
							@if (session('message'))
									<h4 class="alert alert-danger text-left"> {{ session('message') }} </h4>
			                @endif
								</h4> 

                                <!-- Form Validation Example Block -->
                                <div class="block">

                                    <!-- Form Validation Example Content -->
                                     {{ Form::open(array('url' => '/admin/add-user', 'method' => 'post', 'id' => 'form-validation', 'class' => 'form-horizontal form-bordered')) }}

                                    <!-- <form id="form-validation" action="page_forms_validation.html" method="post" class="form-horizontal form-bordered"> -->
                                        <fieldset>
                                            <legend><i class="fa fa-angle-right"></i> Vital Info</legend>
                                           

                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="val_role">Role <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                    <select id="val_role" class="form-control" name="val_role" class="select-chosen" data-placeholder="Choose Category.." style="width: 250px;">
                                                         <option value="User" >User</option>
                                                            <option value="Seller">Seller</option>
                                                             </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="val_username">Username <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                    <!--  @foreach($errors->get('email')  as $message)
					                       				{{ $message }}
                                        			 @endforeach
 -->
                                        			 {{ Form::text('val_username', '',$attributes = array('placeholder'=>'Your username..','class'=>"form-control",'id'=>"val_username") ) }}

                                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="val_email">Email <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">

                                                     {{ Form::email('val_email', '',$attributes = array('placeholder'=>'test@example.com','class'=>"form-control",'id'=>"val_email") ) }}

                                                        <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="val_password">Password <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="password" id="val_password" name="val_password" class="form-control" placeholder="Choose a crazy one..">
                                                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="val_confirm_password">Confirm Password <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="password" id="val_confirm_password" name="val_confirm_password" class="form-control" placeholder="..and confirm it!">
                                                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        
                                        <div class="form-group form-actions">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" name="add_user" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>

                                                <!-- {{ Form::submit('Submit',$attributes = array('class'=>"btn btn-sm btn-primary") ) }} -->

                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                   {{ Form::close() }}
                                    <!-- END Form Validation Example Content -->

                                   
                                </div>
                                <!-- END Validation Block -->
                            </div>
                           
                        </div>
                    </div>
                    <!-- END Page Content -->
		@endsection
		