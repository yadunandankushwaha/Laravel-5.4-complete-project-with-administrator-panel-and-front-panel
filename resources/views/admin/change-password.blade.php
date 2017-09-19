@extends('admin/includes.layout')
@section('content')


                <!-- Page content -->
                    <div id="page-content">
                        <!-- Validation Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    Profile
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Profile</li>
                            <li><a href="">Change Password</a></li>
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
                                     {{ Form::open(array('url' => '/admin/change-password-data', 'method' => 'post', 'id' => 'form-validation', 'class' => 'form-horizontal form-bordered')) }}

                                    <!-- <form id="form-validation" action="page_forms_validation.html" method="post" class="form-horizontal form-bordered"> -->

                                        <fieldset>
                                            <legend><i class="fa fa-angle-right"></i> Vital Info</legend>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="val_email">Email <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">

                                                     {{ Form::email('val_email', $data->email ,$attributes = array('placeholder'=>'test@example.com','class'=>"form-control",'id'=>"val_email",'readonly'=>"readonly") ) }}

                                                        <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="val_password">Current Password <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="password" id="password" name="old" class="form-control" autocomplete="off" placeholder="Insert Your Current Password">
                                                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                                    </div>
                                                    @if ($errors->has('old'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('old') }}</strong>
                                                    </span>
                                                @endif
                                                </div>
                                                 
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="val_password">New Password <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="password" id="password" name="password" class="form-control" placeholder="Choose a crazy one..">
                                                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                                    </div>
                                                     @if ($errors->has('password'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="val_confirm_password">Confirm Password <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="password" id="val_confirm_password" 
                                                        name="password_confirmation" class="form-control" placeholder="..and confirm it!">
                                                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                                    </div>
                                                     @if ($errors->has('password_confirmation'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                    </span>
                                                    @endif
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
        