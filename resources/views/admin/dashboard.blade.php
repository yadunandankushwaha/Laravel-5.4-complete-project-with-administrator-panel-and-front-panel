@extends('admin/includes.layout')
@section('content')
<style type="text/css">
.alert-success.dashboard-success {
    color: #000;
    padding: 4px;
    width: 55%;
    font-weight: 400;
    border-radius: 7px;
    font-family: initial;
}
</style>

				<!-- Page content -->
				<div id="page-content">
					<!-- Dashboard Header -->
					<!-- For an image header add the class 'content-header-media' and an image as in the following example -->
					<div class="content-header content-header-media">
						<div class="header-section">
							<div class="row">
								<!-- Main Title (hidden on small devices for the statistics to fit) -->
								<div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
									<h1>
										Welcome <strong>Admin</strong>
										 @if (session('message'))
                                    		<h4 class="alert-success dashboard-success"> {{ session('message') }} </h4>
                                    	 @else
                                    	<br> <small>You Look Awesome!</small>
                           				 @endif
                                	</h4> 										 
                                </h4> 
									</h1>
								</div>
								<!-- END Main Title -->

								<!-- Top Stats -->
								<div class="col-md-8 col-lg-6">
									<div class="row text-center">
										<div class="col-xs-4 col-sm-3">
											<h2 class="animation-hatch">
												$<strong>93.7k</strong><br> <small><i
													class="fa fa-thumbs-o-up"></i> Great</small>
											</h2>
										</div>
										<div class="col-xs-4 col-sm-3">
											<h2 class="animation-hatch">
												<strong>167k</strong><br> <small><i class="fa fa-heart-o"></i>
													Likes</small>
											</h2>
										</div>
										<div class="col-xs-4 col-sm-3">
											<h2 class="animation-hatch">
												<strong>101</strong><br> <small><i class="fa fa-calendar-o"></i>
													Events</small>
											</h2>
										</div>
										<!-- We hide the last stat to fit the other 3 on small devices -->
										<div class="col-sm-3 hidden-xs">
											<h2 class="animation-hatch">
												<strong>27&deg; C</strong><br> <small><i
													class="fa fa-map-marker"></i> Sydney</small>
											</h2>
										</div>
									</div>
								</div>
								<!-- END Top Stats -->
							</div>
						</div>
						<!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
						<img src="{{ url('assets/img/placeholders/headers/dashboard_header.jpg') }}"
							alt="header image" class="animation-pulseSlow">
					</div>
					<!-- END Dashboard Header -->

					<!-- Mini Top Stats Row -->
					<div class="row">
						<div class="col-sm-6 col-lg-3">
							<!-- Widget -->
							<a href="/admin/blogs"
								class="widget widget-hover-effect1">
								<div class="widget-simple">
									<div
										class="widget-icon pull-left themed-background-autumn animation-fadeIn">
										<i class="fa fa-file-text" style="margin-top: 16px;"></i>
									</div>
									<h3 class="widget-content text-right animation-pullDown">
										{{ $blogCount }} <strong>Article</strong><br> <small>Total counts</small>
									</h3>
								</div>
							</a>
							<!-- END Widget -->
						</div>
						<div class="col-sm-6 col-lg-3">
							<!-- Widget -->
							<a href="page_comp_charts.html"
								class="widget widget-hover-effect1">
								<div class="widget-simple">
									<div
										class="widget-icon pull-left themed-background-spring animation-fadeIn">
										<i class="gi gi-usd" style="margin-top: 18px;"></i>
									</div>
									<h3 class="widget-content text-right animation-pullDown">
										+ <strong>250%</strong><br> <small>Sales Today</small>
									</h3>
								</div>
							</a>
							<!-- END Widget -->
						</div>
						<div class="col-sm-6 col-lg-3">
							<!-- Widget -->
							<a href="page_ready_inbox.html"
								class="widget widget-hover-effect1">
								<div class="widget-simple">
									<div
										class="widget-icon pull-left themed-background-fire animation-fadeIn">
										<i class="gi gi-envelope" style="margin-top: 18px;"></i>
									</div>
									<h3 class="widget-content text-right animation-pullDown">
										5 <strong>Messages</strong> <small>Support Center</small>
									</h3>
								</div>
							</a>
							<!-- END Widget -->
						</div>
						<div class="col-sm-6 col-lg-3">
							<!-- Widget -->
							<a href="page_comp_gallery.html"
								class="widget widget-hover-effect1">
								<div class="widget-simple">
									<div
										class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
										<i class="gi gi-picture" style="margin-top: 18px;"></i>
									</div>
									<h3 class="widget-content text-right animation-pullDown">
										+30 <strong>Photos</strong> <small>Gallery</small>
									</h3>
								</div>
							</a>
							<!-- END Widget -->
						</div>
					</div>
					<!-- END Mini Top Stats Row -->

					<!-- Widgets Row -->
					<div class="row">
						<div class="col-md-6">
							<!-- Timeline Widget -->
							<div class="widget">
								<div class="widget-extra themed-background-dark">
									<h3 class="widget-content-light">
										Latest <strong>Users</strong> <small><a
											href="/admin/users"><strong> View all</strong></a></small>
									</h3>
								</div>
							<div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center"><i class="gi gi-user"></i></th>
                                            <th>Name</th>
                                            <th>Email</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $indexKey => $users)
                                        <tr>
                                            <td class="text-center">{{ $indexKey+1 }}</td>
                                            <td class="text-center"><img src="{{ url('/assets/img/placeholders/avatars/avatar15.jpg') }}" alt="avatar" class="img-circle" width="30px"></td>
                                            <td><a href="/admin/update-user/{{ $users->id }}">{{$users->name}}</a></td>
                                            <td>{{$users->email}}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="/admin/enable-disable-user/{{ $users->id }}" data-toggle="tooltip" title="Enable/Disable" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                                    <a href="/admin/update-user/{{ $users->id }}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                                    <a href="/admin/delete-user/{{ $users->id }}" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                     @endforeach
                                    </tbody>
                                </table>
								</div>
							</div>
							<!-- END Timeline Widget -->
						</div>
						<div class="col-md-6">
							<!-- Your Plan Widget -->
							<div class="widget">
								<div class="widget-extra themed-background-dark">
									<h3 class="widget-content-light">
										Latest <strong>Comments</strong> <small><a
											href="/admin/comments"><strong> View all</strong></a></small>
									</h3>
								</div>
								<div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Posted By</th>
                                            <th>Type</th>
                                            <th>Comment</th>
                                            <th>Posted Date</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($comments as $indexKey => $comment)
                                        <tr>
                                            <td class="text-center">{{ $indexKey+1 }}</td>
                                            <td><a href="/admin/update-blog-comment/{{ $comment->id }}">{{$comment->userName}}</a></td>
                                            <td>{{$comment->type}}</td>
                                             <td>{{ substr($comment->comment,0,15) }}...</td>
                                             <td>{{ date("M d, Y", strtotime($comment->createdAt)) }}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="/admin/enable-disable-blog-comment/{{ $comment->id }}" data-toggle="tooltip" title="Enable/Disable" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                                    <a href="/admin/update-blog-comment/{{ $comment->id }}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                                    <a href="/admin/delete-blog-comment/{{ $comment->id }}" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                     @endforeach
                                    </tbody>
                                </table>
								</div>
							</div>
							<!-- END Your Plan Widget -->

							

				</div>
				</div>
				<!-- END Page Content -->
		
		@endsection
