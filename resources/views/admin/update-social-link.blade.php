@extends('admin/includes.layout')
@section('content')


                <!-- Page content -->
                    <div id="page-content">
                        <!-- Validation Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    Social Link
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Social Link</li>
                            <li><a href="">update Social Link</a></li>
                            <ul style="float: right; list-style: none; margin-top: 3px;">
                            <li class="label label-success" style="padding: 8px;"><b><a href="/admin/add-social-link" style="color: #ffffff;">Add Social link</a></b></li>
                            </ul>
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
                                     {{ Form::open(array('url' => '/admin/update-social-link', 'method' => 'post', 'id' => 'form-validation', 'class' => 'form-horizontal form-bordered', 'files' => true)) }}


                                        {{ Form::hidden('id', $data->id ,$attributes = array('id'=>"name") ) }}
                                    <!-- <form id="form-validation" action="page_forms_validation.html" method="post" class="form-horizontal form-bordered"> -->
                                        <fieldset>
                                            <legend><i class="fa fa-angle-right"></i> Social Link Info</legend>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="name">Social Link Name <span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                
                                                    <div class="input-group">
                                                    
                                                     {{ Form::text('name', $data->name ,$attributes = array('placeholder'=>'Please type Social Link Name..','class'=>"form-control",'id'=>"name") ) }}
                                                    <span class="input-group-addon"></span>
                                                    </div>

                                                     @foreach($errors->get('name')  as $message)
                                                        <p class="alerterror"> {{ $message }} </p>
                                                    @endforeach
                                                     </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="link">Social Link URL <span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                     {{ Form::url('link', $data->link ,$attributes = array('placeholder'=>'Please write  Social Link URL','class'=>"form-control") ) }}
                                                     <span class="input-group-addon"></span>
                                                    </div>
                                                     <p>
                                                    @foreach($errors->get('link')  as $message)
                                                       <p class="alerterror"> {{ $message }} </p>
                                                    @endforeach
                                                     </p>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="val_confirm_password">Status<span class="text-danger"></span></label>
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                       <input type="checkbox" id="status" value="1" name="status" class="form-control"" @if($data->status == 1) checked  @endif>

                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        
                                        <div class="form-group form-actions">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" name="add_faq" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>

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
        