<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>U-Dashboard</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />

		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/elusive-icons/css/elusive-webfont.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="<?php echo base_url();?>inicio" class="logo">
						<img src="assets/images/u-dashboard-logo.png" height="45" alt="U-Dashboard" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<!-- start: search & user box -->
				<div class="header-right">

					<ul class="notifications">
						<li>
							<label>Configurar</label>
							<a href="<?php echo base_url();?>configurar" class="notification-icon">
								<i class="fa fa-gear"></i>
							</a>
							<span class="separator"></span>
						</li>
						<li>
							<label>Validar</label>
							<a href="<?php echo base_url();?>validar" class="notification-icon">
								<i class="fa fa-check-circle" style="color:green"></i>
								<span class="badge">1</span>
							</a>

						</li>
					</ul>

					<span class="separator"></span>

					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name">John Doe Junior</span>
								<span class="role">administrator</span>
							</div>

							<i class="fa custom-caret"></i>
						</a>

						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="pages-signin.html"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">

					<div class="sidebar-header">
						<div class="sidebar-title">
							Navegación
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>

					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li>
										<a href="<?php echo base_url();?>">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>U-Dashboard</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>">
											<span class="pull-right label label-primary"></span>
											<i class="fa fa-university" aria-hidden="true"></i>
											<span>Negocio</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>">
											<span class="pull-right label label-primary"></span>
											<i class="el-icon-group" aria-hidden="true"></i>
											<span>Soporte</span>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>U-Dashboard</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url();?>">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Negocio</span></li>
							</ol>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;</label>
						</div>
					</header>
					<div class="pane panel-transparent">
						<header class="panel-heading">
							<h2 class="panel-title"><button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block">DCC</button></h2>
						</header>
						<div class="panel-body">
							<div class ="row">
								<div class="col-md-6">
									<section class="panel panel-info">
										<header class="panel-heading">
											<h2 class="panel-title"><button type="button" class="mb-xs mt-xs mr-xs btn btn-info btn-lg btn-block">Área 1</button></h2>
										</header>
										<div class="panel-body">
											<div class="btn-group-vertical col-md-12">
												<button type="button" class="btn btn-default">Unidad 1</button>
												<button type="button" class="btn btn-default" onclick="changePage()">Unidad 2</button>
												<button type="button" class="btn btn-default">Unidad 3</button>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-6">
									<section class="panel panel-info">
										<header class="panel-heading">
											<h2 class="panel-title"><button type="button" class="mb-xs mt-xs mr-xs btn btn-info btn-lg btn-block">Área 2</button></h2>
										</header>
										<div class="panel-body">
											<div class="btn-group-vertical col-md-12">
												<button type="button" class="btn btn-default">Unidad 1</button>
												<button type="button" class="btn btn-default">Unidad 2</button>
												<button type="button" class="btn btn-default">Unidad 3</button>
											</div>
										</div>
									</section>
								</div>
							</div>
							<div class ="row">
								<div class="col-md-6">
									<section class="panel panel-info">
										<header class="panel-heading">
											<h2 class="panel-title"><button type="button" class="mb-xs mt-xs mr-xs btn btn-info btn-lg btn-block">Área 3</button></h2>
										</header>
										<div class="panel-body">
											<div class="btn-group-vertical col-md-12">
												<button type="button" class="btn btn-default">Unidad 1</button>
												<button type="button" class="btn btn-default">Unidad 2</button>
												<button type="button" class="btn btn-default">Unidad 3</button>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-6">
									<section class="panel panel-info">
										<header class="panel-heading">
											<h2 class="panel-title"><button type="button" class="mb-xs mt-xs mr-xs btn btn-info btn-lg btn-block">Área 4</button></h2>
										</header>
										<div class="panel-body">
											<div class="btn-group-vertical col-md-12">
												<button type="button" class="btn btn-default">Unidad 1</button>
												<button type="button" class="btn btn-default">Unidad 2</button>
												<button type="button" class="btn btn-default">Unidad 3</button>
											</div>
										</div>
									</section>
								</div>
							</div>
						</div>
					</div>
					<!-- end: page -->
				</section>
			</div>

		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		<script type="text/javascript">
			function changePage(){
      			window.location.href = "<?php echo base_url();?>dashboard";
    		}
		</script>

		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

	</body>
</html>