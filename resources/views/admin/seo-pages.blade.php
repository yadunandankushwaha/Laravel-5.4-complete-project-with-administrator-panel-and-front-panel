@extends('admin/includes.layout')
@section('content')


                 <!-- Page content -->
                    <div id="page-content">
                        <!-- Datatables Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    Seos Pages
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Seos Pages</li>
                            <li><a href="">Seos Pages List</a></li>
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
                                            <th class="text-center">ID</th>
                                            <th>Page Name</th>
                                            <th>Title</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $seo)
                                        <tr>
                                            <td class="text-center">{{$seo->id}}</td>
                                            
                                            <td><a href="">{{ $seo->page_name }}</a></td>
                                            
                                            <td><span>{{ $seo->title }}</span></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    
                                                    <a href="/admin/update-seo-page/{{ $seo->id }}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                                   
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
        