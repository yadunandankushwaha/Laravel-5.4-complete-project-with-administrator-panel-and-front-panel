@extends('admin/includes.layout')
@section('content')


				 <!-- Page content -->
                     <div id="page-content">
                        
                         <!-- eCommerce Dashboard Header -->
                            @include('admin/product-header')
                        <!-- END eCommerce Dashboard Header -->

                        <!-- Quick Stats -->
                        <div class="row text-center">
                            <div class="col-sm-6 col-lg-3">
                                <a href="page_ecom_product_edit.html" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-success">
                                        <h4 class="widget-content-light"><strong>Add New</strong> Category</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Total</strong> Enabled </h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">20</span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-danger">
                                        <h4 class="widget-content-light"><strong>Total </strong>Disabled </h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 text-danger animation-expandOpen">71</span></div>
                                </a>
                            </div>
                            
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-info">
                                        <h4 class="widget-content-light"><strong>Total</strong> Category</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">4.982</span></div>
                                </a>
                            </div>
                        </div>
                        <!-- END Quick Stats -->

                        <!-- All Products Block -->
                        <div class="block full">
                            <!-- All Products Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                </div>
                                <h2><strong>All</strong> Products <small>Category</small></h2>
                            </div>
                            <!-- END All Products Title -->

                            <!-- All Products Content -->
                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 70px;">ID</th>
                                        <th>Product Name</th>
                                        <th class="text-right hidden-xs">Price</th>
                                        <th class="hidden-xs">Status</th>
                                        <th class="hidden-xs text-center">Added</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"><a href="page_ecom_product_edit.html"><strong>PID.8799</strong></a></td>
                                        <td><a href="page_ecom_product_edit.html">Product #99</a></td>
                                        <td class="text-right hidden-xs"><strong>$899,00</strong></td>
                                        <td class="hidden-xs">
                                            <span class="label label-success">Available (7)</span>
                                        </td>
                                        <td class="hidden-xs text-center">03/10/2014</td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="page_ecom_product_edit.html" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><a href="page_ecom_product_edit.html"><strong>PID.8798</strong></a></td>
                                        <td><a href="page_ecom_product_edit.html">Product #98</a></td>
                                        <td class="text-right hidden-xs"><strong>$1351,00</strong></td>
                                        <td class="hidden-xs">
                                            <span class="label label-success">Available (227)</span>
                                        </td>
                                        <td class="hidden-xs text-center">18/02/2014</td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="page_ecom_product_edit.html" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><a href="page_ecom_product_edit.html"><strong>PID.8797</strong></a></td>
                                        <td><a href="page_ecom_product_edit.html">Product #97</a></td>
                                        <td class="text-right hidden-xs"><strong>$618,00</strong></td>
                                        <td class="hidden-xs">
                                            <span class="label label-danger">Out of Stock</span>
                                        </td>
                                        <td class="hidden-xs text-center">21/08/2014</td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="page_ecom_product_edit.html" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                            <!-- END All Products Content -->
                        </div>
                        <!-- END All Products Block -->
                    </div>
                    <!-- END Page Content -->
		@endsection
		