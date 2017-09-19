<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">

<title>Admin</title>

<meta name="description"
	content="astha">
<meta name="author" content="pixelcave">
<meta name="robots" content="noindex, nofollow">
<meta name="viewport"
	content="width=device-width,initial-scale=1.0,user-scalable=0">
	<style type="text/css">
		.nav.navbar-nav-custom > li a:hover {
    		min-height: 50px !important;
			}
			.alerterror{
				font-color: red;
				color: red;
			}
			.overdatarightmenu ul li a:hover{
				height: 25px !important;
			}
			
	</style>
<!-- Icons -->
<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
<link rel="shortcut icon" href="{{ URL::to('assets/img/favicon.png') }}">

<!-- END Icons -->

<!-- Stylesheets -->
        
<!-- Bootstrap is included in its original form, unaltered -->
<link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.min.css') }}">

<!-- Related styles of various icon packs and plugins -->
<link rel="stylesheet" href="{{ URL::to('assets/css/plugins.css') }}">

<!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
<link rel="stylesheet" href="{{ URL::to('assets/css/main.css') }}">

<!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

<!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
<link rel="stylesheet" href="{{ URL::to('assets/css/themes.css') }}">
<!-- END Stylesheets -->

<!-- Modernizr (browser feature detection library) -->
<script src="{{ URL::to('assets/js/vendor/modernizr.min.js') }}"></script>
</head>
<body class="page-loading">
	<div id="page-wrapper">
		<!-- Preloader -->
		<!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
		<!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
		<div class="preloader themed-background">
			<h1 class="push-top-bottom text-light text-center">
				<strong>Pro</strong>UI
			</h1>
			<div class="inner">
				<h3 class="text-light visible-lt-ie10">
					<strong>Loading..</strong>
				</h3>
				<div class="preloader-spinner hidden-lt-ie10"></div>
			</div>
		</div>
		<div id="page-container"
			class="sidebar-partial sidebar-visible-lg sidebar-no-animations">

			<!-- Main Sidebar -->
			<div id="sidebar">
				<!-- Wrapper for scrolling functionality -->
				<div id="sidebar-scroll">
					<!-- Sidebar Content -->
					<div class="sidebar-content">
						<!-- Brand -->
						<a href="{{ url('/admin/dashboard') }}" class="sidebar-brand"> <i class="gi gi-flash"></i><span
							class="sidebar-nav-mini-hide"><strong>Admin</strong>Laravel</span>
						</a>
						<!-- END Brand -->

						<!-- User Info -->
						<div
							class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
							<div class="sidebar-user-avatar">
							 @if(Auth::user()->image != "")
                                <a href="/admin"> <img src="/assets/img/users/{{ Auth::user()->image }}" alt="avatar">
								</a>
                             @else
                                <a href="/admin"> <img src="{{ url('assets/img/placeholders/avatars/avatar2.jpg') }}" alt="avatar">
								</a>
                            @endif 
								
							</div>
							<div class="sidebar-user-name">{{Auth::user()->name}}</div>
							<div class="sidebar-user-links">
								<a href="{{URL::to('/admin/update-profile')}}" data-toggle="tooltip"
									data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
								<a href="{{URL::to('/admin/inbox')}}" data-toggle="tooltip"
									data-placement="bottom" title="Messages"><i
									class="gi gi-envelope"></i></a>
								<!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
								<a href="javascript:void(0)" class="enable-tooltip"
									data-placement="bottom" title="Settings"><i
									class="gi gi-cogwheel"></i></a> <a href="{{URL::to('/admin/logout')}}"
									data-toggle="tooltip" data-placement="bottom" title="Logout"><i
									class="gi gi-exit"></i></a>
							</div>
						</div>
						<!-- END User Info -->

						<!-- Theme Colors -->
						<!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->
						<!-- Sidebar Navigation -->
						<ul class="sidebar-nav">
							<li><a href="{{ url('/admin/dashboard') }}" class=" active"><i
									class="gi gi-stopwatch sidebar-nav-icon"></i><span
									class="sidebar-nav-mini-hide">Dashboard</span></a></li>
							
							
							<li><a href="#" class="sidebar-nav-menu"><i
									class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
									class="gi gi gi-user sidebar-nav-icon"></i><span
									class="sidebar-nav-mini-hide">Users</span></a>
								<ul>
									<li><a href="{{ url('/admin/add-user') }}">Add User</a></li>
									<li><a href="{{ url('/admin/users') }}">Users</a></li>
								</ul>
							</li>

							<li><a href="#" class="sidebar-nav-menu"><i
									class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
									class="gi gi-shopping_cart sidebar-nav-icon"></i><span
									class="sidebar-nav-mini-hide">eCommerce</span></a>
								<ul>
									<li><a href="{{ url('/admin/product-dashboard') }}">Dashboard</a></li>
									<li><a href="{{ url('/admin/product-orders') }}">Orders</a></li>
									<li><a href="{{ url('/admin/products') }}">Products</a></li>
									<li><a href="{{ url('/admin/add-product') }}">Add Product</a></li>
									<li><a href="{{ url('/admin/product-categories') }}">Product Category</a></li>
								</ul>
							</li>
							

							<li class="sidebar-header"><span
								class="sidebar-header-options clearfix"><a
									href="javascript:void(0)" data-toggle="tooltip"
									title="Quick Settings"><i class="gi gi-settings"></i></a><a
									href="javascript:void(0)" data-toggle="tooltip"
									title="Create the most amazing pages with the widget kit!"><i
										class="gi gi-lightbulb"></i></a></span> <span
								class="sidebar-header-title">Widget Kit</span></li>

							<li><a href="{{ url('/admin/site-configuration') }}"><i
									class="gi gi-charts sidebar-nav-icon"></i><span
									class="sidebar-nav-mini-hide">Site Configuration</span></a></li>
							<li><a href="{{ url('/admin/social-links') }}"><i
									class="gi gi-share_alt sidebar-nav-icon"></i><span
									class="sidebar-nav-mini-hide">Social</span></a></li>
							<li><a href="{{ url('/admin/sliders') }}"><i
									class="gi gi-film sidebar-nav-icon"></i><span
									class="sidebar-nav-mini-hide">Slider</span></a></li>
							
							<li class="sidebar-header"><span
								class="sidebar-header-options clearfix"><a
									href="javascript:void(0)" data-toggle="tooltip"
									title="Quick Settings"><i class="gi gi-settings"></i></a></span>
								<span class="sidebar-header-title">Design Kit</span></li>
								<li><a href="#" class="sidebar-nav-menu"><i
									class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
									class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span
									class="sidebar-nav-mini-hide">Blogs</span></a>
								<ul>
									<li><a href="{{ url('/admin/add-blog') }}">Add Blog</a></li>
									<li><a href="{{ url('/admin/blogs') }}">Blogs</a></li>
								</ul>
							</li>
							<li><a href="#" class="sidebar-nav-menu"><i
									class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
									class="gi gi-list sidebar-nav-icon"></i><span
									class="sidebar-nav-mini-hide">Testimonial</span></a>
								<ul>
									<li><a href="{{ url('/admin/add-testimonial') }}">Add Testimonial</a></li>
									<li><a href="{{ url('/admin/testimonials') }}">Testimonials</a></li>
								</ul>
							</li>
							<li><a href="#" class="sidebar-nav-menu"><i
									class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
									class="gi gi-parents sidebar-nav-icon"></i><span
									class="sidebar-nav-mini-hide">Teams</span></a>
								<ul>
									<li><a href="{{ url('/admin/add-team') }}">Add Team</a></li>
									<li><a href="{{ url('/admin/teams') }}">Teams</a></li>
								</ul>
							</li>
							<li><a href="#" class="sidebar-nav-menu"><i
									class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
									class="hi hi-picture sidebar-nav-icon"></i><span
									class="sidebar-nav-mini-hide">Gallery</span></a>
								<ul>
									<li><a href="{{ url('/admin/add-gallery') }}">Add Gallery</a></li>
									<li><a href="{{ url('/admin/gallries') }}">Galleries</a></li>
								</ul>
							</li>
							<li><a href="#" class="sidebar-nav-menu"><i
									class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
									class="gi gi-warning_sign sidebar-nav-icon"></i><span
									class="sidebar-nav-mini-hide">FAQ</span></a>
								<ul>
									<li><a href="{{ url('/admin/add-faq') }}">Add FAQ</a></li>
									<li><a href="{{ url('/admin/faqs') }}">FAQs</a></li>
								</ul>
							</li>
								
						
							
							<li><a href="#" class="sidebar-nav-menu"><i
									class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
									class="gi gi-text_underline sidebar-nav-icon"></i><span
									class="sidebar-nav-mini-hide">Page Content</span></a>
								<ul>
									<li><a href="#">About Us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Term & Condition</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul></li>


							<li class="sidebar-header"><span
								class="sidebar-header-options clearfix"><a
									href="javascript:void(0)" data-toggle="tooltip"
									title="Quick Settings"><i class="gi gi-settings"></i></a><a
									href="javascript:void(0)" data-toggle="tooltip"
									title="Create the most amazing pages with the widget kit!"><i
										class="gi gi-lightbulb"></i></a></span> <span
								class="sidebar-header-title">Tool Kit</span></li>
							<li><a href="#" class="sidebar-nav-menu"><i
									class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
									class="gi gi-stats sidebar-nav-icon"></i><span
									class="sidebar-nav-mini-hide">Tool Kit (SEO)</span></a>
								<ul>
									<li><a href="{{ url('/admin/seo-pages') }}">SEO Pages</a></li>
								</ul>
							</li>



						</ul>
						<!-- END Sidebar Navigation -->

					</div>
					<!-- END Sidebar Content -->
				</div>
				<!-- END Wrapper for scrolling functionality -->
			</div>
			<!-- END Main Sidebar -->

			<!-- Main Container -->
			<div id="main-container">
				<!-- Header -->
				<!-- In the PHP version you can set the following options from inc/config file -->
				<!--
                        Available header.navbar classes:

                        'navbar-default'            for the default light header
                        'navbar-inverse'            for an alternative dark header

                        'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                        'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                    -->
				<header class="navbar navbar-default">
					<!-- Left Header Navigation -->
					<ul class="nav navbar-nav-custom">
						<!-- Main Sidebar Toggle Button -->
						<li><a href="javascript:void(0)"
							onclick="App.sidebar('toggle-sidebar');this.blur();"> <i
								class="fa fa-bars fa-fw" style="margin: 15px 1px 0 0;"></i>
						</a></li>
						<!-- END Main Sidebar Toggle Button -->

						<!-- Template Options -->
						<!-- Change Options functionality can be found in js/app.js - templateOptions() -->
						<li class="dropdown"><a href="javascript:void(0)"
							class="dropdown-toggle" data-toggle="dropdown"> <i
								class="gi gi-settings" style="margin: 15px 1px 0 0;"></i>
						</a>
							<ul class="dropdown-menu dropdown-custom dropdown-options">
								<li class="dropdown-header text-left"><a href="/admin/update-profile">Edit Profile</a></li>
								<li class="dropdown-header text-left"><a href="/admin/change-password">Change password</a></li>
								
							</ul>
						</li>
						<!-- END Template Options -->
					</ul>
					<!-- END Left Header Navigation -->

					<!-- Search Form -->
					<form action="page_ready_search_results.html" method="post"
						class="navbar-form-custom">
						<div class="form-group">
							<input type="text" id="top-search" name="top-search"
								class="form-control" placeholder="Search..">
						</div>
					</form>
					<!-- END Search Form -->

					<!-- Right Header Navigation -->
					<ul class="nav navbar-nav-custom pull-right">
						<!-- Alternative Sidebar Toggle Button -->
					

						<!-- User Dropdown -->
						<li class="dropdown"><a href="javascript:void(0)"
							class="dropdown-toggle" data-toggle="dropdown">

							 @if(Auth::user()->image != "")
                                <img src="/assets/img/users/{{ Auth::user()->image }}" alt="avatar">
                             @else
                                 <img src="{{ URL::to('assets/img/placeholders/avatars/avatar2.jpg') }}" alt="avatar">
                            @endif 

							
								<i class="fa fa-angle-down"></i>
						</a>
							<ul class="dropdown-menu dropdown-custom dropdown-menu-right overdatarightmenu">
								<li class="dropdown-header text-center">Account</li>
								
								<li>
								<a href="{{ url('/admin/update-profile')}}"> 
									<i class="fa fa-clock-o fa-fw pull-right"></i>
									 <span class="badge pull-right"></span> Updates Profile </a>
								<a href="{{ url('/admin/change-password') }}" data-toggle="modal"> 
									<i class="fa fa-cog fa-fw pull-right"></i> Change password
								</a>
								</li>

								<li class="divider"></li>

								<li>
								 <a href="{{ url('/admin/inbox')}}">
								 	 <i class="fa fa-envelope-o fa-fw pull-right"></i> 
								 	  <span class="badge pull-right"></span> Messages </a>
								 
								<a href="{{ url('/admin/faqs')}}">
									<i class="fa fa-question fa-fw pull-right"></i> 
										<span class="badge pull-right"></span> FAQ </a>
								</li>

								<li class="divider"></li>
								<li>
								
								<a href="{{URL::to('/admin/logout')}}"><i class="fa fa-ban fa-fw pull-right"></i>
										Logout</a></li>
								
							</ul></li>
						<!-- END User Dropdown -->
					</ul>
					<!-- END Right Header Navigation -->
				</header>
				<!-- END Header -->