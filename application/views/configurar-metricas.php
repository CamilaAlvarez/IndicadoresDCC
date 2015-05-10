<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Configurar métricas</title>
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
		<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
		<link rel="stylesheet" href="assets/vendor/lineicons/css/lineicons.css" />
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />


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
										<a href="<?php echo base_url();?>inicio">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>U-Dashboard</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>careaunidad">
											<span class="pull-right label label-primary"></span>
											<i class="fa fa-th-large" aria-hidden="true"></i>
											<span>Configurar Áreas y Unidades</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>cdashboard">
											<span class="pull-right label label-primary"></span>
											<i class="fa fa-bar-chart" aria-hidden="true"></i>
											<span>Configurar Dashboard</span>
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
						<h2>Añadir y Borrar métricas</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url();?>inicio">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Cofigurar</span></li>
								<li><span>Métricas</span></li>
							</ol>

							<label>&nbsp;&nbsp;&nbsp;&nbsp;</label>
						</div>
					</header>

					<!-- start: page -->
					<section class="panel panel-transparent">
						<div class="panel-body">
							<div class ="row">
								<div class="col-md-6">
									<section class="panel panel-info">
										<header class="panel-heading">
											<h2 class="panel-title text-center"><div class="btn-group-horizontal text-center">
													<a class="btn modal-with-form" href="#modalForm" style="color: green">
														<i class="licon-plus" aria-hidden="true"></i>
													</a>
													<a class="btn modal-with-form" href="#deleteMetrica" style="color: red">
														<i class="licon-close" aria-hidden="true"></i>
													</a>
													<label class="text-center"> Área 1</label>
												</div></h2>
										</header>
										<div class="panel-body">
											<div class="btn-group-vertical col-md-12">
												<div class="btn btn-default btn-group-horizontal text-center">
													<a class="btn modal-with-form" href="#modalForm" style="color: green">
														<i class="licon-plus" aria-hidden="true"></i>
													</a>
													<a class="btn modal-with-form" href="#deleteMetrica" style="color: red">
														<i class="licon-close" aria-hidden="true"></i>
													</a>
													<label class="text-center"> Unidad 1</label>
												</div>
												<div class="btn btn-default btn-group-horizontal text-center">
													<a class="btn modal-with-form" href="#modalForm" style="color: green">
														<i class="licon-plus" aria-hidden="true"></i>
													</a>
													<a class="btn modal-with-form" href="#deleteMetrica" style="color: red">
														<i class="licon-close" aria-hidden="true"></i>
													</a>
													<label class="text-center"> Unidad 2</label>
												</div>
												<div class="btn btn-default btn-group-horizontal text-center">
													<a class="btn modal-with-form" href="#modalForm" style="color: green">
														<i class="licon-plus" aria-hidden="true"></i>
													</a>
													<a class="btn modal-with-form" href="#deleteMetrica" style="color: red">
														<i class="licon-close" aria-hidden="true"></i>
													</a>
													<label class="text-center"> Unidad 3</label>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-6">
									<section class="panel panel-info">
										<header class="panel-heading">
											<h2 class="panel-title text-center"><div class="btn-group-horizontal text-center">
													<a class="btn modal-with-form" href="#modalForm" style="color: green">
														<i class="licon-plus" aria-hidden="true"></i>
													</a>
													<a class="btn modal-with-form" href="#deleteMetrica" style="color: red">
														<i class="licon-close" aria-hidden="true"></i>
													</a>
													<label class="text-center"> Área 2</label>
												</div></h2>
										</header>
										<div class="panel-body">
											<div class="btn-group-vertical col-md-12">
												<div class="btn btn-default btn-group-horizontal text-center">
													<a class="btn modal-with-form" href="#modalForm" style="color: green">
														<i class="licon-plus" aria-hidden="true"></i>
													</a>
													<a class="btn modal-with-form" href="#deleteMetrica" style="color: red">
														<i class="licon-close" aria-hidden="true"></i>
													</a>
													<label class="text-center"> Unidad 1</label>
												</div>
												<div class="btn btn-default btn-group-horizontal text-center">
													<a class="btn modal-with-form" href="#modalForm" style="color: green">
														<i class="licon-plus" aria-hidden="true"></i>
													</a>
													<a class="btn modal-with-form" href="#deleteMetrica" style="color: red">
														<i class="licon-close" aria-hidden="true"></i>
													</a>
													<label class="text-center" aria-hidden="true"> Unidad 2</label>
												</div>
												<div class="btn btn-default btn-group-horizontal text-center">
													<a class="btn modal-with-form" href="#modalForm" style="color: green">
														<i class="licon-plus" aria-hidden="true"></i>
													</a>
													<a class="btn modal-with-form" href="#deleteMetrica" style="color: red">
														<i class="licon-close" aria-hidden="true"></i>
													</a>
													<label class="text-center"> Unidad 3</label>
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
							<div class ="row">
								<div class="col-md-6">
									<section class="panel panel-info">
										<header class="panel-heading">
											<h2 class="panel-title text-center"><div class="btn-group-horizontal text-center">
													<a class="btn modal-with-form" href="#modalForm" style="color: green">
														<i class="licon-plus" aria-hidden="true"></i>
													</a>
													<a class="btn modal-with-form" href="#deleteMetrica" style="color: red">
														<i class="licon-close" aria-hidden="true"></i>
													</a>
													<label class="text-center"> Área 3</label>
												</div></h2>
										</header>
										<div class="panel-body">
											<div class="btn-group-vertical col-md-12">
												<div class="btn btn-default btn-group-horizontal text-center">
													<a class="btn modal-with-form" href="#modalForm" style="color: green">
														<i class="licon-plus" aria-hidden="true"></i>
													</a>
													<a class="btn modal-with-form" href="#deleteMetrica" style="color: red">
														<i class="licon-close" aria-hidden="true"></i>
													</a>
													<label class="text-center"> Unidad 1</label>
												</div>
												<div class="btn btn-default btn-group-horizontal text-center">
													<a class="btn modal-with-form" href="#modalForm" style="color: green">
														<i class="licon-plus" aria-hidden="true"></i>
													</a>
													<a class="btn modal-with-form" href="#deleteMetrica" style="color: red">
														<i class="licon-close" aria-hidden="true"></i>
													</a>
													<label class="text-center"> Unidad 2</label>
												</div>
												<div class="btn btn-default btn-group-horizontal text-center">
													<a class="btn modal-with-form" href="#modalForm" style="color: green">
														<i class="licon-plus" aria-hidden="true"></i>
													</a>
													<a class="btn modal-with-form" href="#deleteMetrica" style="color: red">
														<i class="licon-close" aria-hidden="true"></i>
													</a>
													<label class="text-center"> Unidad 3</label>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-6">
									<section class="panel panel-info">
										<header class="panel-heading">
											<h2 class="panel-title text-center"><div class="btn-group-horizontal text-center">
													<a class="btn modal-with-form" href="#modalForm" style="color: green">
														<i class="licon-plus" aria-hidden="true"></i>
													</a>
													<a class="btn modal-with-form" href="#deleteMetrica" style="color: red">
														<i class="licon-close" aria-hidden="true"></i>
													</a>
													<label class="text-center"> Área 4</label>
												</div></h2>
										</header>
										<div class="panel-body">
											<div class="btn-group-vertical col-md-12">
												<div class="btn btn-default btn-group-horizontal text-center">
													<a class="btn modal-with-form" href="#modalForm" style="color: green">
														<i class="licon-plus" aria-hidden="true"></i>
													</a>
													<a class="btn modal-with-form" href="#deleteMetrica" style="color: red">
														<i class="licon-close" aria-hidden="true"></i>
													</a>
													<label class="text-center"> Unidad 1</label>
												</div>
												<div class="btn btn-default btn-group-horizontal text-center">
													<a class="btn modal-with-form" href="#modalForm" style="color: green">
														<i class="licon-plus" aria-hidden="true"></i>
													</a>
													<a class="btn modal-with-form" href="#deleteMetrica" style="color: red">
														<i class="licon-close" aria-hidden="true"></i>
													</a>
													<label class="text-center"> Unidad 2</label>
												</div>
												<div class="btn btn-default btn-group-horizontal text-center">
													<a class="btn modal-with-form" href="#modalForm" style="color: green">
														<i class="licon-plus" aria-hidden="true"></i>
													</a>
													<a class="btn modal-with-form" href="#deleteMetrica" style="color: red">
														<i class="licon-close" aria-hidden="true"></i>
													</a>
													<label class="text-center"> Unidad 3</label>
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
							<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
									<?php echo form_open('session/agregarMetrica');?>
									<section class="panel">
										
										<header class="panel-heading">
											<h2 class="panel-title">Añadir métrica</h2>
											<p class="panel-subtitle">Área 1: Unidad 1</p>
										</header>
										<div class="panel-body">
										
												<div class="form-group mt-lg">
													<label class="col-sm-3 control-label">Nombre:</label>
														<div class="col-sm-9">
															<input type="text" name="name" id='name' class="form-control" placeholder="nombre de la métrica..." required/>
														</div>
												</div>
												<div class="form-group mt-lg">
													<label class="col-sm-3 control-label">Tipo:</label>
														<div class="btn-group dropdown col-sm-9">
															<select name='tipo' class="mb-xs mt-xs mr-xs btn btn-default dropdown-toggle">
																<option value="--">Tipo</option>
																<option value="INT">Entero</option>
																<option value="DOUBLE">Punto flotante</option>
																<option value="TEXT">Texto</option>
																<option value="DATE">Fecha</option>
															</select>
														</div>
												</div>
										</div>
										<footer class="panel-footer">
											<div class="row">
												<div class="col-md-12 text-right">
													
													<input type="submit" button class="btn btn-primary modal-confirm" value='Añadir' >
													<button class="btn btn-default modal-dismiss">Cancelar</button>
												</div>
											</div>
										</footer>
										
									</section>
									<?php echo form_close();?>
								</div>
								<div id="deleteMetrica" class="modal-block modal-block-primary mfp-hide">
									<section class="panel">
										<header class="panel-heading">
											<h2 class="panel-title">Borrar métricas</h2>
										</header>
									<div class="panel-body">
										<table class="table table-bordered table-striped mb-none text-center" id="borrar-metricas">
											<thead>
												<tr>
													<th>Métrica</th>
													<th>Tipo</th>
													<th>Borrar</th>
												</tr>
											</thead>
											<tbody>
												<tr class="">
													<td>Métrica 1</td>
													<td>INT</td>
													<td>
														<input id="borrar" value="" type="checkbox" name="validar" />
													</td>
												</tr>
											</tbody>
										</table>
										<footer class="panel-footer">
											<div class="row">
												<div class="col-md-12 text-right">
													<button class="btn btn-danger modal-confirm ">Borrar</button>
													<button class="btn btn-default modal-dismiss">Cancelar</button>
												</div>
											</div>
										</footer>
									</section>
								</div>
						</div>
					</section>

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

		<!-- Specific Page Vendor -->
		<script src="assets/vendor/pnotify/pnotify.custom.js"></script>
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/ui-elements/examples.modals.js"></script>
	</body>
</html>