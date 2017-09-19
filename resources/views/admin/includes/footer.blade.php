
				<!-- Footer -->
				<footer class="clearfix" style="background-color: #fff; padding: 11px;">
					<div class="pull-left">
                            <span id="">2016 - <?php echo date("Y"); ?></span> © <a href="https://github.com/yadunandankushwaha" target="_blank">Yadu</a>
                     </div>
					<div class="pull-right" style="margin-right: 15px;">
						Crafted with <i class="fa fa-heart text-danger"></i> by <a
							href="https://github.com/yadunandankushwaha" target="_blank">Yadu</a>
					</div>
					
				</footer>
				<!-- END Footer -->
			</div>
			<!-- END Main Container -->
		</div>
		<!-- END Page Container -->
	</div>
	<!-- END Page Wrapper -->

	<!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
	<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

	<!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
	<div id="modal-user-settings" class="modal fade" tabindex="-1"
		role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header text-center">
					<h2 class="modal-title">
						<i class="fa fa-pencil"></i> Settings
					</h2>
				</div>
				<!-- END Modal Header -->

				<!-- Modal Body -->
				<div class="modal-body">
					<form action="index.html" method="post"
						enctype="multipart/form-data"
						class="form-horizontal form-bordered" onsubmit="return false;">
						<fieldset>
							<legend>Vital Info</legend>
							<div class="form-group">
								<label class="col-md-4 control-label">Username</label>
								<div class="col-md-8">
									<p class="form-control-static">Admin</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="user-settings-email">Email</label>
								<div class="col-md-8">
									<input type="email" id="user-settings-email"
										name="user-settings-email" class="form-control"
										value="admin@example.com">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"
									for="user-settings-notifications">Email Notifications</label>
								<div class="col-md-8">
									<label class="switch switch-primary"> <input type="checkbox"
										id="user-settings-notifications"
										name="user-settings-notifications" value="1" checked> <span></span>
									</label>
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Password Update</legend>
							<div class="form-group">
								<label class="col-md-4 control-label"
									for="user-settings-password">New Password</label>
								<div class="col-md-8">
									<input type="password" id="user-settings-password"
										name="user-settings-password" class="form-control"
										placeholder="Please choose a complex one..">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"
									for="user-settings-repassword">Confirm New Password</label>
								<div class="col-md-8">
									<input type="password" id="user-settings-repassword"
										name="user-settings-repassword" class="form-control"
										placeholder="..and confirm it!">
								</div>
							</div>
						</fieldset>
						<div class="form-group form-actions">
							<div class="col-xs-12 text-right">
								<button type="button" class="btn btn-sm btn-default"
									data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-sm btn-primary">Save
									Changes</button>
							</div>
						</div>
					</form>
				</div>
				<!-- END Modal Body -->
			</div>
		</div>
	</div>
	<!-- END User Settings -->

	<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
	<script src="{{ url('assets/js/vendor/jquery.min.js') }}"></script>
	<script src="{{ url('assets/js/vendor/bootstrap.min.js') }}"></script>
	<script src="{{ url('assets/js/plugins.js') }}"></script>
	<script src="{{ url('assets/js/app.js') }}"></script>


	<!-- Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps) -->
	<!-- For more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key -->
	<?php $a = basename($_SERVER['PHP_SELF']); 
	 if($a == 'dashboard'){ ?>
	<script src="{{ url('assets/js/pages/index.js') }}"></script>
	<script>$(function(){ Index.init(); });</script>

	<?php }elseif($a == 'add-user'){ ?>
	
	<script src="{{ URL::to('assets/js/pages/formsValidation.js') }}"></script>
     <script>$(function(){ FormsValidation.init(); });</script>

	<?php }elseif($a == 'add-blog'){ ?>
     
    <?php } ?>
    <script src="{{ URL::to('assets/js/helpers/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ URL::to('assets/js/pages/tablesDatatables.js') }}"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
</body>
</html>