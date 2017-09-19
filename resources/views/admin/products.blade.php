@extends('admin/includes.layout')
@section('content')


				 <!-- Page content -->
                     <div id="page-content">
                        
                         <!-- eCommerce Dashboard Header -->
                            @include('admin/product-header')
                        <!-- END eCommerce Dashboard Header -->

                       

                        <!-- All Products Block -->
                        <div class="block full">
                            <!-- All Products Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                </div>
                                <h2><strong>All</strong> Products</h2>
                            </div>
                            <!-- END All Products Title -->

                            <!-- All Products Content -->
                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 70px;">#</th>
                                        <th class="text-center">Image</th>
                                         <th class="text-center">Code</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Category Name</th>
                                        <th class="text-center hidden-xs">Price</th>
                                        <th class="text-center hidden-xs">Status</th>
                                        <th class="hidden-xs text-center">Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $keyValue => $product)
                                    <tr>
                                        <td class="text-center"><a href="page_ecom_product_edit.html"><strong>{{ $keyValue+1 }}</strong></a></td>
                                        <td class="text-center">
                                            @if($product->productImage)
                                            <img src="/assets/img/products/{{$product->productImage}}" alt="avatar" class="" width="50px">
                                            @else
                                                <img src="{{ url('/assets/img/placeholders/avatars/avatar15.jpg') }}" alt="avatar" class="img-circle" width="30px">
                                            @endif 

                                            </td>
                                        <td class="text-center"><a href="">{{ $product->code }}</a></td>
                                        <td class="text-center">{{ $product->productName }}</td>
                                        <td class="text-center">{{ $product->catName }}</td>
                                        <td class="text-center hidden-xs"><strong>${{ $product->price }}</strong></td>
                                        
                                        @if($product->status == 1)
                                            <td class="text-center"><span class="label label-info">Active</span></td>
                                         @else
                                            <td class="text-center"><span class="label label-danger">Inactive</span></td>
                                        @endif 
                                       
                                        <td class="hidden-xs text-center">{{ date('M, D-Y',strtotime($product->createdAt)) }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                    <a href="/admin/enable-disable-product/{{ $product->productId }}" data-toggle="tooltip" title="Enable/Disable" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                                    <a href="/admin/update-product/{{ $product->productId }}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                                    <a href="/admin/delete-product/{{ $product->productId }}" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
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
		