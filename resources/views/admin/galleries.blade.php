@extends('admin/includes.layout')
@section('content')


				 <!-- Page content -->
                    <div id="page-content">
                        <!-- Datatables Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    Galleries
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Galleries</li>
                            <li><a href="">Galleries List</a></li>
                        </ul>
                        <!-- END Datatables Header -->

                        <!-- Datatables Content -->
                        <div class="block full">
                             <div class="block-title">
                             @if (session('confirm'))
                             <div class="alert alert-success text-center"> {{ session('confirm') }} </div>
                            @endif
                             @if (session('error'))
                             <div class="alert alert-danger text-center"> {{ session('error') }} </div>
                            @endif
                                <h4>
                            @if (session('message'))
                                    <h4 class="alert alert-danger text-left"> {{ session('message') }} </h4>
                            @endif
                                </h4> 
                            </div>
                          <div class="row">

                          <div class="col-md-12">
                                <!-- Advanced Animated Gallery Widget -->
                                <div class="widget">
                                    <div class="widget-advanced widget-advanced-alt">
                                        <!-- Widget Header -->
                                        <div class="widget-header text-left">
                                            <!-- For best results use an image with at least 150 pixels in height (with the width relative to how big your widget will be!) - Here I'm using a 1200x150 pixels image -->
                                            <img src="{{ url('assets/img/placeholders/headers/widget6_header.jpg') }}" alt="background" class="widget-background animation-pulseSlow">
                                            <h3 class="widget-content widget-content-image widget-content-light clearfix">
                                                <a href="javascript:void(0)" class="widget-icon pull-right">
                                                    <i class="fa fa-picture-o"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="themed-color-default">Trip <strong>Gallery</strong></a><br>
                                                <small>8 Photos</small>
                                            </h3>
                                        </div>
                                        <!-- END Widget Header -->

                                        <!-- Widget Main -->
                                        <div class="widget-main">
                                            <p>Manage Galleries</p>
                                            <div class="gallery gallery-widget" data-toggle="lightbox-gallery">
                                                <div class="row">
                                                    
                                                    <div class="col-xs-6 col-sm-3">
                                                        <a href="{{ url('img/placeholders/photos/photo20.jpg') }}" class="gallery-link" title="Image Info">
                                                            <img src="{{ url('img/placeholders/photos/photo20.jpg') }}" alt="image">
                                                        </a>
                                                        <i class="gi gi gi-remove"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Widget Main -->
                                    </div>
                                </div>
                                <!-- END Advanced Animated Gallery Widget -->
                            </div>
                              
                          </div>
                        </div>
                        <!-- END Datatables Content -->
                    </div>
                    <!-- END Page Content -->
		@endsection
		