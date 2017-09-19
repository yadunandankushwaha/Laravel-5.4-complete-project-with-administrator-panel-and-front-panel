                <div class="content-header">
                    <ul class="nav-horizontal text-center">
                        <li class="active">
                            <a href="{{ url('/admin/product-dashboard') }}"><i class="fa fa-bar-chart"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/product-orders') }}"><i class="gi gi-shopping_cart"></i> Orders</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/add-product') }}"><i class="gi gi-shop_window"></i> Add Product</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/products') }}"><i class="gi gi-shopping_bag"></i> Products</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/product-categories') }}"><i class="gi gi-list"></i> Product Category</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/products') }}"><i class="gi gi-user"></i> Customer View</a>
                        </li>
                    </ul>
                </div>

                 <!-- Quick Stats -->
                        <div class="row text-center">
                            <div class="col-sm-6 col-lg-3">
                                <a href="{{ url('/admin/add-product') }}" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-success">
                                        <h4 class="widget-content-light"><strong>Add New</strong> Product</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="{{ url('/admin/products') }}" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-danger">
                                        <h4 class="widget-content-light"><strong>Out of</strong> Stock</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 text-danger animation-expandOpen">71</span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="{{ url('/admin/products') }}" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Top</strong> Sellers</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">20</span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="{{ url('/admin/products') }}" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>All</strong> Products</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{ count($data) }}</span></div>
                                </a>
                            </div>
                        </div>
                        <!-- END Quick Stats -->