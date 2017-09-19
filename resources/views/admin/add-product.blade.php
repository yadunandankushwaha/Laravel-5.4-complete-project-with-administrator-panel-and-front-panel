@extends('admin/includes.layout')
@section('content')

             <!-- Page content -->
                    <div id="page-content">
                        <!-- eCommerce Product Edit Header -->
                            @include('admin/product-header')
                        <!-- END eCommerce Product Edit Header -->

                        <!-- Product Edit Content -->
                        <div class="row">

                        @if (session('confirm'))
                                 <div class="alert alert-success text-center"> {{ session('confirm') }} </div>
                            @endif
                            @if (session('message'))
                                    <h4 class="alert alert-danger text-left"> {{ session('message') }} </h4>
                            @endif

                       {{ Form::open(array('url' => '/admin/add-product', 'method' => 'post', 'id' => 'form-validation', 'files' => true)) }}

                            <div class="col-lg-6">
                                <!-- General Data Block -->
                                <div class="block">
                                    <!-- General Data Title -->
                                    <div class="block-title">
                                        <h2><i class="fa fa-pencil"></i> <strong>General</strong> Data</h2>
                                    </div>
                                    <!-- END General Data Title -->

                                    <!-- General Data Content -->
                                    <!--  -->
                                     <div class="form-horizontal form-bordered">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="product-id">Product ID <span style="color: red">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="product-id" name="code" class="form-control" value="{{ 'PID'.rand(10000,100000) }}">
                                                @foreach($errors->get('code')  as $message)
                                                    <p class="alerterror"> {{ $message }} </p>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="product-name">Name <span style="color: red">*</span></label>
                                            <div class="col-md-9">
                                             {{ Form::text('name', '' ,$attributes = array('placeholder'=>'Enter product name..','class'=>"form-control",'id'=>"product-name") ) }}

                                                @foreach($errors->get('name')  as $message)
                                                    <p class="alerterror"> {{ $message }} </p>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="product-name">Quantity</label>
                                            <div class="col-md-9">
                                                <input type="text" id="product-name" name="quantity" class="form-control" placeholder="Enter product Quantity..">
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="product-short-description">Short Description <span style="color: red">*</span></label>
                                            <div class="col-md-9">
                                                <textarea id="product-short-description" name="short_description" class="form-control" rows="3"></textarea>
                                                @foreach($errors->get('short_description')  as $message)
                                                    <p class="alerterror"> {{ $message }} </p>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="product-category">Category <span style="color: red">*</span></label>
                                            <div class="col-md-8">
                                                <!-- Chosen plugin (class is initialized in js/app.js -> uiInit()), for extra usage examples you can check out http://harvesthq.github.io/chosen/ -->
                                                <select id="product-category" name="cat_id" class="select-chosen" data-placeholder="Choose Category.." style="width: 250px;">
                                                     <option></option>
                                                   @foreach ($data as $category)
                                                    <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="product-sellet">Seller <span style="color: red">*</span></label>
                                                <div class="col-md-8">
                                                    <select id="product-seller" name="seller_id" class="select-chosen" data-placeholder="Choose Seller.." style="width: 250px;">
                                                        <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                                       @foreach ($seller as $sellers)
                                                        <option value="{{ $sellers->id }}">{{ $sellers->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="product-price">Price <span style="color: red">*</span></label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                                    <input type="text" id="product-price" name="price" class="form-control" placeholder="0,00">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Condition</label>
                                            <div class="col-md-9">
                                                <label class="radio-inline" for="product-condition-new">
                                                    <input type="radio" id="product-condition-new" name="condition" value="new" checked> New
                                                </label>
                                                <label class="radio-inline" for="product-condition-used">
                                                    <input type="radio" id="product-condition-used" name="condition" value="used"> Used
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Published?</label>
                                            <div class="col-md-9">
                                                <label class="switch switch-primary">
                                                    <input type="checkbox"  value="1" id="product-status" name="status" checked><span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END General Data Content -->
                                </div>
                                <!-- END General Data Block -->
                            </div>
                            <div class="col-lg-6">
                                <!-- Meta Data Block -->
                                <div class="block">
                                    <!-- Meta Data Title -->
                                    <div class="block-title">
                                        <h2><i class="fa fa-google"></i> <strong>Meta</strong> Data</h2>
                                    </div>
                                    <!-- END Meta Data Title -->

                                    <!-- Meta Data Content -->
                                    <div class="form-horizontal form-bordered">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="product-meta-title">Meta Title</label>
                                            <div class="col-md-9">
                                                <input type="text" id="product-meta-title" name="seo_title" class="form-control" placeholder="Enter meta title..">
                                                <div class="help-block">55 Characters Max</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="product-meta-keywords">Meta Keywords</label>
                                            <div class="col-md-9">
                                                <input type="text" id="product-meta-keywords" name="seo_keywords" class="form-control" placeholder="keyword1, keyword2, keyword3">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="product-meta-description">Meta Description</label>
                                            <div class="col-md-9">
                                                <textarea id="product-meta-description" name="seo_description" class="form-control" rows="6" placeholder="Enter meta description.."></textarea>
                                                <div class="help-block">115 Characters Max</div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <!-- END Meta Data Content -->
                                </div>
                                <!-- END Meta Data Block -->
                            </div>


                            <div class="col-lg-6">
                                <!-- Meta Data Block -->
                                <div class="block">
                                    <!-- Meta Data Title -->
                                    <div class="block-title">
                                        <h2><i class="hi hi-picture sidebar-nav-icon"></i> <strong>Product </strong> Images</h2>
                                    </div>
                                    <!-- END Meta Data Title -->

                                    <!-- Meta Data Content -->
                                    <div class="form-horizontal form-bordered">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="product-image">Product Image <span style="color: red">*</span></label>
                                            <div class="col-md-8">
                                                 <input type="file" id="product-meta-keywords" name="userfile" class="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="product-id">Favourite</label>
                                             <div class="col-md-8">
                                             <label class="switch switch-primary">
                                                    <input type="checkbox" value="1" id="product-status" name="favourite"><span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="product-image">Color</label>
                                            <div class="col-md-8">
                                                 <input type="color" id="color" name="color" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Meta Data Content -->
                                </div>
                                <!-- END Meta Data Block -->
                            </div>

                            <div class="col-lg-12">
                                 <div class="block">
                                    <!-- Meta Data Title -->
                                    <div class="block-title">
                                        <h2><i class="gi gi-text_underline sidebar-nav-icon"></i> <strong>Product </strong> Description <span style="color: red">*</span></h2>
                                    </div>
                                    <div class="form-horizontal form-bordered">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <textarea id="product-description" name="description" class="ckeditor"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="block">
                                    <div class="form-horizontal form-bordered">
                                        <div class="form-group form-actions text-center">
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </br>

                        </form>




                        </div>
                        <!-- END Product Edit Content -->
                    </div>
                    <!-- END Page Content -->
                
@endsection
        