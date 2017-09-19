  
                        <div class="row text-center">
                            <div class="col-sm-6 col-lg-3">
                                <a href="{{ url('/admin/add-product-category') }}" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-success">
                                        <h4 class="widget-content-light"><strong>Add New</strong> Category</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="{{ url('/admin/product-categories') }}" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-dark">
                                        <h4 class="widget-content-light"><strong>Total</strong> Enabled </h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{ count($productcatsEnableTotal) }}</span></div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="{{ url('/admin/product-categories') }}" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-danger">
                                        <h4 class="widget-content-light"><strong>Total </strong>Disabled </h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 text-danger animation-expandOpen">{{ count($productcatsDisableTotal) }}</span></div>
                                </a>
                            </div>
                            
                            <div class="col-sm-6 col-lg-3">
                                <a href="{{ url('/admin/product-categories') }}" class="widget widget-hover-effect2">
                                    <div class="widget-extra themed-background-info">
                                        <h4 class="widget-content-light"><strong>Total</strong> Category</h4>
                                    </div>
                                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">  {{ count($data) }}</span></div>
                                </a>
                            </div>
                        </div>
                        <!-- END Quick Stats -->