@extends('admin/includes.layout')
@section('content')


				<!-- Page content -->
                    <div id="page-content">
                        <!-- Validation Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="gi gi-warning_sign"></i>Teams
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Teams</li>
                            <li><a href="">Add Teams</a></li>
                        </ul>
                        <!-- END Validation Header -->

                        <div class="row">
                            <div class="col-md-12">

                            @if (session('confirm'))
			                  	 <div class="alert alert-success text-center"> {{ session('confirm') }} </div>
							@endif
							@if (session('message'))
									<h4 class="alert alert-danger text-left"> {{ session('message') }} </h4>
			                @endif

                                <!-- Form Validation Example Block -->
                                <div class="block">

                                    <!-- Form Validation Example Content -->
                                     {{ Form::open(array('url' => '/admin/add-team', 'method' => 'post', 'id' => 'form-validation', 'class' => 'form-horizontal form-bordered', 'files' => true)) }}

                                    <!-- <form id="form-validation" action="page_forms_validation.html" method="post" class="form-horizontal form-bordered"> -->
                                        <fieldset>
                                            <legend><i class="fa fa-angle-right"></i> Teams Info</legend>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="title">Teams Name <span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                
                                                    <div class="input-group">
                                                    
                                        			 {{ Form::text('name', '',$attributes = array('placeholder'=>'Team Name..','class'=>"form-control",'id'=>"name") ) }}
                                                    <span class="input-group-addon"></span>
                                                    </div>

                                                     @foreach($errors->get('name')  as $message)
                                                        <p class="alerterror"> {{ $message }} </p>
                                                    @endforeach
                                                     </p>
                                                </div>
                                            </div>
                                              <div class="form-group">
                                                <label class="col-md-2 control-label" for="designation">Teams Designation <span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                
                                                    <div class="input-group">
                                                    
                                                     {{ Form::text('designation', '',$attributes = array('placeholder'=>'Team Designation..','class'=>"form-control",'id'=>"designation") ) }}
                                                    <span class="input-group-addon"></span>
                                                    </div>

                                                     @foreach($errors->get('designation')  as $message)
                                                        <p class="alerterror"> {{ $message }} </p>
                                                    @endforeach
                                                     </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="description">Description <span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                     {{ Form::textarea('description', '',$attributes = array('placeholder'=>'Description','class'=>"ckeditor",'id'=>"textarea-ckeditor") ) }}
                                                    </div>
                                                     <p>
                                                    @foreach($errors->get('description')  as $message)
                                                       <p class="alerterror"> {{ $message }} </p>
                                                    @endforeach
                                                     </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="val_password">Image <span class="text-danger">*</span></label>
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
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="val_confirm_password">Status<span class="text-danger"></span></label>
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                        <input type="checkbox" id="status" name="status" class="form-control"">

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
		