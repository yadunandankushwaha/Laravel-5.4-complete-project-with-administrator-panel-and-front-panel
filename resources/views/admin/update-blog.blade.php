@extends('admin/includes.layout')
@section('content')


                <!-- Page content -->
                    <div id="page-content">
                        <!-- Validation Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                   Blogs
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Blogs</li>
                            <li><a href="">Update Blogs</a></li>
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
                                     {{ Form::open(array('url' => '/admin/update-blog-data', 'method' => 'post', 'id' => 'form-validation', 'class' => 'form-horizontal form-bordered', 'files' => true)) }}

                                     <input type="hidden" name="id" value="{{ $data->id }}">

                                    <!-- <form id="form-validation" action="page_forms_validation.html" method="post" class="form-horizontal form-bordered"> -->
                                        <fieldset>
                                            <legend><i class="fa fa-angle-right"></i> Blog Info</legend>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="title">Blog Title <span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                
                                                    <div class="input-group">
                                                    
                                                     {{ Form::text('title', $data->title ,$attributes = array('placeholder'=>'Your Title..','class'=>"form-control",'id'=>"title") ) }}
                                                    <span class="input-group-addon"></span>
                                                    </div>

                                                     @foreach($errors->get('title')  as $message)
                                                        <p class="alerterror"> {{ $message }} </p>
                                                    @endforeach
                                                     </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="description">Description <span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                     {{ Form::textarea('description', $data->description ,$attributes = array('placeholder'=>'Description','class'=>"ckeditor",'id'=>"textarea-ckeditor") ) }}
                                                    </div>
                                                     <p>
                                                    @foreach($errors->get('description')  as $message)
                                                       <p class="alerterror"> {{ $message }} </p>
                                                    @endforeach
                                                     </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="val_password">Old Image <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <img src="/assets/img/blogs/{{$data->image}}" alt="No Image" class="" width="50px">
                                                    </div>
                                                    <p>
                                                        
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
                                                        <input type="checkbox" id="status"  name="status" class="form-control" @if($data->status == 'Active') checked  @endif >

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
        