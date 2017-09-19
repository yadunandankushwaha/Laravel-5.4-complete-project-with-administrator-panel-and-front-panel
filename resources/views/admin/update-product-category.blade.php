@extends('admin/includes.layout')
@section('content')


                 <!-- Page content -->
                     <div id="page-content">
                        
                        <!-- eCommerce Dashboard Header -->
                            @include('admin/product-header')
                        <!-- END eCommerce Dashboard Header -->

                        <!-- Quick Stats -->
                            @include('admin/product-category-stats')
                        <!--END Quick Stats -->

                        <!-- All Products Block -->
                        <div class="block full">
                            <!-- All Products Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                </div>
                                <h2><strong>Add</strong> Products <small>Category</small></h2>
                            </div>
                            <!-- END All Products Title -->

                            <!-- General Data Content -->
                                    <!--  -->
                                     <div class="form-horizontal form-bordered">

                                        @if (session('confirm'))
                                             <div class="alert alert-success text-center">{{ session('confirm') }}</div>
                                        @endif
                                        @if (session('message'))
                                                <h4 class="alert alert-danger text-left"> {{ session('message') }} </h4>
                                        @endif

                                        {{ Form::open(array('url' => '/admin/update-product-category', 'method' => 'post','files' => true)) }}

                                        {{ Form::hidden('id', $data->id ,$attributes = array('id'=>"id") ) }} 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="category-name">Name</label>
                                            <div class="col-md-9">
                                             {{ Form::text('cat_name', $data->cat_name ,$attributes = array('placeholder'=>'Enter Category name..','class'=>"form-control",'id'=>"category-name") ) }} 

                                             @foreach($errors->get('cat_name')  as $message)
                                                <p class="alerterror"> {{ $message }} </p>
                                            @endforeach

                                            </div>
                                            
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Published?</label>
                                            <div class="col-md-9">
                                                <label class="switch switch-primary">
                                                     <input type="checkbox" id="status"  name="status" class="form-control" @if($data->status == 1) checked  @endif>
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label"></label>
                                            <div class="col-md-9">
                                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Update</button>
                                                        <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                                   <span></span>
                                            </div>
                                        </div>

                                    </form>
                                        
                                    </div>
                                    <!-- END General Data Content -->
                           
                    </div>
                    <!-- END Page Content -->
        @endsection
        