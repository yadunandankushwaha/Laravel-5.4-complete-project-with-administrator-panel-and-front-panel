@extends('admin/includes.layout')
@section('content')


				 <!-- Page content -->
                    <div id="page-content">
                        <!-- Datatables Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    Social links
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Social links</li>
                            <li><a href="">Social links List</a></li>
                            
                            <ul style="float: right; list-style: none; margin-top: 3px;">
                            <li class="label label-success" style="padding: 8px;"><b><a href="/admin/add-social-link" style="color: #ffffff;">Add Social link</a></b></li>
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
                                            <th>Name</th>
                                            <th>Link</th>
                                            <th>Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data  as $keyValue => $sl)
                                        <tr>
                                            <td class="text-center">{{ $keyValue+1 }}</td>
                                           
                                            <td>{{ $sl->name }}</td>
                                            <td><a href="{{ $sl->link }}" target="_blank">{{ $sl->link }}</a></td>
                                             @if($sl->status == 1)
                                                <td><span class="label label-info">Active</span></td>
                                             @else
                                                <td><span class="label label-danger">Inactive</span></td>
                                            @endif 
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="/admin/enable-disable-social-link/{{ $sl->id }}" data-toggle="tooltip" title="Enable/Disable" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                                    <a href="/admin/update-social-link/{{ $sl->id }}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                                    <a href="/admin/delete-social-link/{{ $sl->id }}" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
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
		