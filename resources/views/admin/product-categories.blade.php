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
                                
                                <h2><strong>All</strong> Products <small>Category</small></h2>
                            </div>
                            <!-- END All Products Title -->
                            @if (session('confirm'))
                                 <h4 class="alert alert-success text-center">{{ session('confirm') }}</h4>
                            @endif
                            @if (session('message'))
                                    <h4 class="alert alert-danger text-left"> {{ session('message') }} </h4>
                            @endif
                            <!-- All Products Content -->
                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 70px;">#</th>
                                        <th>Category Name</th>
                                        <th class="hidden-xs">Status</th>
                                        <th class="hidden-xs text-center">Created Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $keyValue => $product_category)
                                    <tr>
                                        <td class="text-center"><strong>{{ $keyValue+1 }}</strong></td>
                                        <td class="text-center">{{ $product_category->cat_name }}</td>
                                        @if($product_category->status == 1)
                                            <td class="text-center"><span class="label label-success">Active</span></td>
                                        @else
                                            <td class="text-center"><span class="label label-danger">Inactive</span></td>
                                        @endif 
                                        <td class="hidden-xs text-center">{{ date('M, D-Y',strtotime($product_category->created_at)) }}</td>
                                        <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="/admin/enable-disable-product-category/{{ $product_category->id }}" data-toggle="tooltip" title="Enable/Disable" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                                    <a href="/admin/update-product-category/{{ $product_category->id }}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                                    <a href="/admin/delete-product-category/{{ $product_category->id }}" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                </div>
                                            </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            <!-- END All Products Content -->
                        </div>
                        <!-- END All Products Block -->
                    </div>
                    <!-- END Page Content -->
		@endsection
		