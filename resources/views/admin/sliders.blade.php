@extends('admin/includes.layout')
@section('content')


				 <!-- Page content -->
                    <div id="page-content">
                        <!-- Datatables Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    Sliders
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Sliders</li>
                            <li><a href="">Sliders List</a></li>
                            <ul style="float: right; list-style: none; margin-top: 3px;">
                            <li class="label label-success" style="padding: 8px;"><b><a href="/admin/add-slider" style="color: #ffffff;">Add Slider</a></b></li>
                            </ul>
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
                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center"><i class="hi hi-picture"></i></th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $keyvalue => $slider)
                                        <tr>
                                            <td class="text-center">{{ $keyvalue+1 }}</td>
                                            <td class="text-center">
                                            @if($slider->image)
                                            <img src="/assets/img/sliders/{{ $slider->image }}" alt="avatar" class="" width="50px">
                                            @else
                                                <i class="hi hi-picture"></i>
                                            @endif 

                                            </td>
                                            <td>{{ $slider->title }}</td>
                                            
                                            @if($slider->status == 1)
                                                <td><span class="label label-info">Active</span></td>
                                             @else
                                                <td><span class="label label-danger">Inactive</span></td>
                                            @endif 
                                            
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="/admin/enable-disable-slider/{{ $slider->id }}" data-toggle="tooltip" title="Enable/Disable" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                                    <a href="/admin/update-slider/{{ $slider->id }}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                                    <a href="/admin/delete-slider/{{ $slider->id }}" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Datatables Content -->
                    </div>
                    <!-- END Page Content -->
		@endsection
		