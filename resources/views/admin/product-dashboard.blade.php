@extends('admin/includes.layout')
@section('content')


				 <!-- Page content -->
                    <div id="page-content" style="min-height: 1187px;">
                        
                        <!-- eCommerce Dashboard Header -->
                      @include('admin/product-header')
                        <!-- END eCommerce Dashboard Header -->

                        <!-- Quick Stats -->
                        <div class="row text-center">
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background">
                                        <h4 class="widget-content-light"><strong>Pending</strong> Orders</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 animation-expandOpen">3</span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Conversion</strong> Rate</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">4.7%</span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Orders</strong> Today</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">120</span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Earnings</strong> Today</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">$ 4.250</span></div>
                                </a>
                            </div>
                        </div>
                        <!-- END Quick Stats -->

                        <!-- Orders and Products -->
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Latest Orders Block -->
                                <div class="block">
                                    <!-- Latest Orders Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="page_ecom_orders.html" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Show All"><i class="fa fa-eye"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog"></i></a>
                                        </div>
                                        <h2><strong>Latest</strong> Orders</h2>
                                    </div>
                                    <!-- END Latest Orders Title -->

                                    <!-- Latest Orders Content -->
                                    <table class="table table-borderless table-striped table-vcenter table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="text-center" style="width: 100px;"><a href="javascript:void(0)"><strong>ORD.685116</strong></a></td>
                                                <td class="hidden-xs"><a href="javascript:void(0)">Gerald Berry</a></td>
                                                <td class="hidden-xs">Paypal</td>
                                                <td class="text-right"><strong>$65,00</strong></td>
                                                <td class="text-right"><span class="label label-success">Delivered</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><a href="javascript:void(0)"><strong>ORD.685115</strong></a></td>
                                                <td class="hidden-xs"><a href="javascript:void(0)">Patrick Bates</a></td>
                                                <td class="hidden-xs">Bank wire</td>
                                                <td class="text-right"><strong>$268,00</strong></td>
                                                <td class="text-right"><span class="label label-danger">Canceled</span></td>
                                            </tr>
                                          
                                        </tbody>
                                    </table>
                                    <!-- END Latest Orders Content -->
                                </div>
                                <!-- END Latest Orders Block -->
                            </div>
                            <div class="col-lg-6">
                                <!-- Top Products Block -->
                                <div class="block">
                                    <!-- Top Products Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="page_ecom_products.html" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Show All"><i class="fa fa-eye"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog"></i></a>
                                        </div>
                                        <h2><strong>Top</strong> Products</h2>
                                    </div>
                                    <!-- END Top Products Title -->

                                    <!-- Top Products Content -->
                                    <table class="table table-borderless table-striped table-vcenter table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="text-center" style="width: 100px;"><a href="page_ecom_product_edit.html"><strong>PID.8765</strong></a></td>
                                                <td><a href="page_ecom_product_edit.html">iPhone 6 Plus 32GB</a></td>
                                                <td class="text-center"><strong>435</strong> orders</td>
                                                <td class="hidden-xs text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center" style="width: 100px;"><a href="page_ecom_product_edit.html"><strong>PID.8764</strong></a></td>
                                                <td><a href="page_ecom_product_edit.html">Wii U</a></td>
                                                <td class="text-center"><strong>502</strong> orders</td>
                                                <td class="hidden-xs text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- END Top Products Content -->
                                </div>
                                <!-- END Top Products Block -->
                            </div>
                        </div>
                        <!-- END Orders and Products -->
                    </div>
                    <!-- END Page Content -->
		@endsection
		