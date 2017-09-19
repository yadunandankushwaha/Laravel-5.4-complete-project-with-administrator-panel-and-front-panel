
<head>
<meta charset="utf-8">

<title>Login</title>

<meta name="description" content="Laravel">
<meta name="author" content="pixelcave">
<meta name="robots" content="noindex, nofollow">
<meta name="viewport"
	content="width=device-width,initial-scale=1.0,user-scalable=0">

<!-- Icons -->
<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
<link rel="shortcut icon" href="{{ URL::to('assets/img/favicon.png') }}">

<link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('assets/css/plugins.css') }}">
<link rel="stylesheet" href="{{ URL::to('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ URL::to('assets/css/themes.css') }}">
<script src="{{ URL::to('assets/js/vendor/modernizr.min.js') }}"></script>
<style type="text/css">
.alert-success.dashboard-success {
    color: #000;
    padding: 8px;
    width: 100%;
    font-weight: 400;
    border-radius: 7px;
    font-family: initial;
}
</style>

<style type="text/css"></style>
</head>
<body>
	<!-- Login Alternative Row -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<div id="login-alt-container">
					<!-- Title -->
					<h1 class="push-top-bottom">
						<i class="gi gi-flash"></i> <strong>Laravel Admin</strong>
						 <h4><small><b>Welcome to ProUI Admin Template!</b></small></h4>
					</h1>
					<!-- END Title -->

					<!-- Key Features -->
					<ul class="fa-ul text-muted">
						<li><i class="fa fa-check fa-li text-success"></i> Clean &amp;
							Modern Design</li>
						<li><i class="fa fa-check fa-li text-success"></i> Fully
							Responsive &amp; Retina Ready</li>
						<li><i class="fa fa-check fa-li text-success"></i> 10 Color Themes</li>
						<li><i class="fa fa-check fa-li text-success"></i> PSD Files
							Included</li>
						<li><i class="fa fa-check fa-li text-success"></i> Widgets
							Collection</li>
						<li><i class="fa fa-check fa-li text-success"></i> Designed Pages
							Collection</li>
						<li><i class="fa fa-check fa-li text-success"></i> .. and many
							more awesome features!</li>
					</ul>
					<!-- END Key Features -->

					<!-- Footer -->
					<footer class="text-muted push-top-bottom">
						<small><span id="year-copy"></span> &copy; <a
							href="mailto:sdsd@gmail.com">Astha Sharma</a></small>
					</footer>
					<!-- END Footer -->
				</div>
			</div>
			<div class="col-md-5">
				<!-- Login Container -->
				<div id="login-container">
					<!-- Login Title -->
					<div class="login-title text-center">
						<h1>
							<strong>Login</strong>
						</h1>

					 @if (session('confirm'))
                  	 <div class="alert alert-success text-center">
                   		{{ session('confirm') }}
                     </div>
					@endif
			
					</div>

					
					
					
					<!-- END Login Title -->

					<!-- Login Block -->
					<div class="block push-bit" <?php if(count($errors) > 0){echo "visible";} ?>>
						<!-- Login Form -->
						<!-- <form action="{{ url('/admin/login') }}" method="post" id="form-login" class="form-horizontal"> -->
						  {{ Form::open(array('url' => '/admin/login', 'method' => 'post', 'id' => 'form-login', 'class' => 'form-horizontal')) }}
						   {{ csrf_field() }}

						 	 @if (session('message'))
                        		<h4 class="alert-success dashboard-success"> {{ session('message') }} </h4>
               				 @endif
								

							<div class="form-group">
								<div class="col-xs-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="gi gi-envelope"></i></span>

										 {{ Form::email('login-email', '',$attributes = array('placeholder'=>'Email','class'=>"form-control input-lg",'id'=>"login-email") ) }}
										<!-- <input type="text" id="login-email" name="login-email"
											class="form-control input-lg" placeholder="Email"> -->
									</div>
								</div>
								<!-- @if ($errors->has('login-email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login-email') }}</strong>
                                    </span>
                                @endif -->
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
										 {{ Form::password('login-password', $attributes = array('placeholder'=>'Password','class'=>"form-control input-lg",'id'=>"login-password") ) }}
										<!-- <input type="password" id="login-password"
											name="login-password" class="form-control input-lg"
											placeholder="Password"> -->
									</div>
								</div>
							</div>
							<div class="form-group form-actions">
								<div class="col-xs-4">
									<label class="switch switch-primary" data-toggle="tooltip"
										title="Remember Me?"> <input type="checkbox"
										id="login-remember-me" name="login-remember-me" checked> <span></span>
									</label>
								</div>
								<div class="col-xs-8 text-right">
									 <button type="submit" class="btn btn-sm btn-primary">
										<i class="fa fa-angle-right"></i> Login to Dashboard
									</button> 
									<!-- {{ Form::submit('Login',$attributes = array('class'=>"btn btn-sm btn-primary" ,''=>"") ) }} -->
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12 text-center">
									<a href="javascript:void(0)" id="link-reminder-login"><small>Forgot
											password?</small></a>
								</div>
							</div>
						{{Form::close()}}
						<!-- END Login Form -->

						<!-- Reminder Form -->
						<form action="login_alt.html#reminder" method="post"
							id="form-reminder" class="form-horizontal display-none">
							<div class="form-group">
								<div class="col-xs-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
										<input type="text" id="reminder-email" name="reminder-email"
											class="form-control input-lg" placeholder="Email">
									</div>
								</div>
							</div>
							<div class="form-group form-actions">
								<div class="col-xs-12 text-right">
									<button type="submit" class="btn btn-sm btn-primary">
										<i class="fa fa-angle-right"></i> Reset Password
									</button>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12 text-center">
									<small>Did you remember your password?</small> <a
										href="javascript:void(0)" id="link-reminder"><small>Login</small></a>
								</div>
							</div>
						</form>
						<!-- END Reminder Form -->

					
					</div>
					<!-- END Login Block -->
				</div>
				<!-- END Login Container -->
			</div>
		</div>
	</div>
	<!-- END Login Alternative Row -->


	<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
	<script src="{{ URL::to('assets/js/vendor/jquery.min.js') }}"></script>
	<script src="{{ URL::to('assets/js/vendor/bootstrap.min.js') }}"></script>
	<script src="{{ URL::to('assets/js/plugins.js') }}"></script>
	<script src="{{ URL::to('assets/js/app.js') }}"></script>

	<!-- Load and execute javascript code used only in this page -->
	<script src="{{ URL::to('assets/js/pages/login.js') }}"></script>
	<script>$(function(){ Login.init(); });</script>
</body>
</html>