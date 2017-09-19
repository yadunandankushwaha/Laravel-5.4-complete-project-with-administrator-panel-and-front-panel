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
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-danger">
                                        <h4 class="widget-content-light"><strong>Pending</strong> Orders</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 animation-expandOpen">3</span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-success">
                                        <h4 class="widget-content-light"><strong>Orders</strong> Today</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">120</span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-info">
                                        <h4 class="widget-content-light"><strong>Orders</strong> This Month</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">3.200</span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Orders</strong> Last Month</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">2.850</span></div>
                                </a>
                            </div>
                        </div>
                        <!-- END Quick Stats -->

                        <!-- All Orders Block -->
                        <div class="block full">
                            <!-- All Orders Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                </div>
                                <h2><strong>All</strong> Orders</h2>
                            </div>
                            <!-- END All Orders Title -->

                            <!-- All Orders Content -->
                             <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 100px;">ID</th>
                                        <th class="visible-lg">Customer</th>
                                        <th class="text-center visible-lg">Products</th>
                                        <th class="hidden-xs">Payment</th>
                                        <th class="text-right hidden-xs">Value</th>
                                        <th>Status</th>
                                        <th class="hidden-xs text-center">Submitted</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"><a href="page_ecom_order_view.html"><strong>ORD.685199</strong></a></td>
                                        <td class="visible-lg"><a href="javascript:void(0)">Ryan Hopkins</a></td>
                                        <td class="text-center visible-lg"><a href="javascript:void(0)">4</a></td>
                                        <td class="hidden-xs">Credit Card</td>
                                        <td class="text-right hidden-xs"><strong>$1776,00</strong></td>
                                        <td><span class="label label-warning">Processing</span></td>
                                        <td class="hidden-xs text-center">25/12/2014</td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="page_ecom_order_view.html" data-toggle="tooltip" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><a href="page_ecom_order_view.html"><strong>ORD.685198</strong></a></td>
                                        <td class="visible-lg"><a href="javascript:void(0)">Patrick Bates</a></td>
                                        <td class="text-center visible-lg"><a href="javascript:void(0)">1</a></td>
                                        <td class="hidden-xs">Check</td>
                                        <td class="text-right hidden-xs"><strong>$251,00</strong></td>
                                        <td><span class="label label-warning">Processing</span></td>
                                        <td class="hidden-xs text-center">27/08/2014</td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="page_ecom_order_view.html" data-toggle="tooltip" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><a href="page_ecom_order_view.html"><strong>ORD.685140</strong></a></td>
                                        <td class="visible-lg"><a href="javascript:void(0)">Ethan Greene</a></td>
                                        <td class="text-center visible-lg"><a href="javascript:void(0)">5</a></td>
                                        <td class="hidden-xs">Paypal</td>
                                        <td class="text-right hidden-xs"><strong>$1929,00</strong></td>
                                        <td><span class="label label-warning">Processing</span></td>
                                        <td class="hidden-xs text-center">15/04/2014</td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="page_ecom_order_view.html" data-toggle="tooltip" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                            <!-- END All Orders Content -->
                        </div>
                        <!-- END All Orders Block -->
                    </div>
                    <!-- END Page Content -->

		@endsection
		