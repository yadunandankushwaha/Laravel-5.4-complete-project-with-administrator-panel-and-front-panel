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
                            <li><a href="">Update Profile</a></li>
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
                                     {{ Form::open(array('url' => '/admin/update-profile-data', 'method' => 'post', 'id' => 'form-validation', 'class' => 'form-horizontal form-bordered', 'files' => true)) }}

                                    <!-- <form id="form-validation" action="page_forms_validation.html" method="post" class="form-horizontal form-bordered"> -->

                                        <fieldset>
                                            <legend><i class="fa fa-angle-right"></i> Vital Info</legend>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="val_username">Username <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                    <!--  @foreach($errors->get('email')  as $message)
                                                        {{ $message }}
                                                     @endforeach
 -->
                                                     {{ Form::text('val_username', $data->name ,$attributes = array('placeholder'=>'Your username..', 'class'=>"form-control",'id'=>"val_username") ) }}

                                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                                    </div>
                                                    <p>
                                                        @foreach($errors->get('val_username')  as $message)
                                                            <p class="alerterror"> {{ $message }} </p>
                                                        @endforeach
                                                     </p>
                                                </div>
                                            </div>
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
                                                <label class="col-md-4 control-label" for="val_password">Current Picture <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <img src="/assets/img/users/{{ $data->image }}" alt="Image Not Available" width="70px">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="val_password">Image <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="file" id="userfile" name="userfile" class="form-control" >
                                                    </div>
                                                    <p>
                                                        @foreach($errors->get('userfile')  as $message)
                                                            <p class="alerterror"> {{ $message }} </p>
                                                        @endforeach
                                                     </p>
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
        