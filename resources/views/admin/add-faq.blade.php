@extends('admin/includes.layout')
@section('content')


				<!-- Page content -->
                    <div id="page-content">
                        <!-- Validation Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="gi gi-warning_sign"></i>Faqs
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Faqs</li>
                            <li><a href="">Add Faqs</a></li>
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
                                     {{ Form::open(array('url' => '/admin/add-faq', 'method' => 'post', 'id' => 'form-validation', 'class' => 'form-horizontal form-bordered', 'files' => true)) }}

                                    <!-- <form id="form-validation" action="page_forms_validation.html" method="post" class="form-horizontal form-bordered"> -->
                                        <fieldset>
                                            <legend><i class="fa fa-angle-right"></i> Faqs Info</legend>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="question">Faq Question <span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                
                                                    <div class="input-group">
                                                    
                                        			 {{ Form::text('question', '',$attributes = array('placeholder'=>'Please type the Question..','class'=>"form-control",'id'=>"question") ) }}
                                                    <span class="input-group-addon"></span>
                                                    </div>

                                                     @foreach($errors->get('question')  as $message)
                                                        <p class="alerterror"> {{ $message }} </p>
                                                    @endforeach
                                                     </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="answer">Description <span class="text-danger">*</span></label>
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                     {{ Form::textarea('answer', '',$attributes = array('placeholder'=>'Answer','class'=>"ckeditor",'id'=>"textarea-ckeditor") ) }}
                                                    </div>
                                                     <p>
                                                    @foreach($errors->get('answer')  as $message)
                                                       <p class="alerterror"> {{ $message }} </p>
                                                    @endforeach
                                                     </p>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="val_confirm_password">Status<span class="text-danger"></span></label>
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                        <input type="checkbox" checked="" value="1" id="status" name="status" class="form-control"">

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
		