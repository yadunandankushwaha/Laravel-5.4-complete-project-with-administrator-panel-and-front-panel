@extends('admin/includes.layout')
@section('content')


                <!-- Page content -->
                    <div id="page-content">
                        <!-- Validation Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                   Seos Pages
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Seos Pages</li>
                            <li><a href="">Update Seos Page</a></li>
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
                                     {{ Form::open(array('url' => '/admin/update-seo-page', 'method' => 'post', 'id' => 'form-validation', 'class' => 'form-horizontal form-bordered', 'files' => true)) }}

                                     <input type="hidden" name="id" value="{{ $data->id }}">

                                    <!-- <form id="form-validation" action="page_forms_validation.html" method="post" class="form-horizontal form-bordered"> -->
                                        <fieldset>
                                            <legend><i class="fa fa-angle-right"></i> Seo page Info</legend>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="question">Page Name <span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                     {{ Form::text('page_name', $data->page_name ,$attributes = array('placeholder'=>'page name','class'=>"form-control",'id'=>"page_name",'readonly'=>"readonly") ) }}
                                                    <span class="input-group-addon"></span>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-2 control-label" for="question">Page Title <span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                     {{ Form::text('title', $data->title ,$attributes = array('placeholder'=>'Page Title','class'=>"form-control",'id'=>"title") ) }}
                                                    <span class="input-group-addon"></span>
                                                    </div>
                                                     @foreach($errors->get('title')  as $message)
                                                       <p class="alerterror"> {{ $message }} </p>
                                                    @endforeach
                                                     </p>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-2 control-label" for="question">Keywords <span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                     {{ Form::text('keywords', $data->keywords ,$attributes = array('placeholder'=>'Keywords','class'=>"form-control",'id'=>"keywords") ) }}
                                                    <span class="input-group-addon"></span>
                                                    </div>
                                                    <p>
                                                    @foreach($errors->get('keywords')  as $message)
                                                       <p class="alerterror"> {{ $message }} </p>
                                                    @endforeach
                                                     </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="description">Description <span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                     {{ Form::textarea('description', $data->description ,$attributes = array('placeholder'=>'description','class'=>"ckeditor",'id'=>"textarea-ckeditor") ) }}
                                                    </div>
                                                     <p>
                                                    @foreach($errors->get('description')  as $message)
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
        