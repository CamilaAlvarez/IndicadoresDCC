<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Configurar áreas y unidades</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.css" />

		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/pnotify/pnotify.custom.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/lineicons/css/lineicons.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url();?>assets/vendor/modernizr/modernizr.js"></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script type="text/javascript">
		
		   function addUnidad(area){
			   $("#addUni").html(area);
		   }

		   function delUnidad(unidad){
			   $("#delUni").html(unidad);
		   }

		   function delArea(area){
			   $("#delArea").html(area);
		   }

		   function redirectPost(location, args){
			   var form = '';
		        $.each( args, function( key, value ) {
		            form += '<input type="hidden" name="'+key+'" value="'+value+'">';
		        });
		        $('<form action="'+location+'" method="POST">'+form+'</form>').appendTo('body').submit();
		   }

		   function postAddArea(){
			    var n = $("#AreaName").val();
			    var segment = $("#segment").val();

			    if(document.getElementById('AreaName').value==""){
			   		alert("Debe ingresar un nombre para el área");	
			   	}
			   	else{
			    	redirectPost('<?php echo base_url();?>ModifyOrg/addArea', {'name': n, 'type': segment});
			    }
		   }
		   
		   function postDelArea(){
			   var n = $("#delArea").html();
			   redirectPost('<?php echo base_url();?>ModifyOrg/delAreaUni', {'name': n});
		   }

		   function postAddUni(){
			   var area = $("#addUni").html();
			   var name = $("#UniName").val();
			   if(document.getElementById('UniName').value==""){
			   		alert("Debe ingresar un nombre para la unidad");	
			   }
			   else{
			   		redirectPost('<?php echo base_url();?>ModifyOrg/addUni', {'area': area, 'name': name});
			   	}
		   }

		   function postDelUni(){
			   var n = $("#delUni").html();
			   redirectPost('<?php echo base_url();?>ModifyOrg/delAreaUni', {'name': n});
		   }			   
		</script>
	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="<?php echo base_url();?>inicio" class="logo">
						<img src="<?php echo base_url();?>assets/images/u-dashboard-logo.png" height="45" alt="U-Dashboard" />
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
								<img src="<?php echo base_url();?>assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
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
										<a href="<?php echo base_url();?>cmetrica">
											<span class="pull-right label label-primary"></span>
											<i class="fa fa-server" aria-hidden="true"></i>
											<span>Configurar métricas</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>DashboardConfig/configUnidad">
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
						<h2>Configurar áreas y unidades</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url();?>inicio">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Configurar</span></li>
								<li><span>Áreas y Unidades</span></li>
							</ol>

							<label>&nbsp;&nbsp;&nbsp;&nbsp;</label>

						</div>
					</header>

					<!-- start: page -->
					<section class="panel panel-transparent">
						<div class="panel-body">
							    <?php							    
							        $counter = 0;
							        foreach ($areaunit as $au){
							            $kind = false;
							            $color = false;
							            foreach ($types as $type){
							                if ($type['id']==$au['area']->getType()){
							                    $kind = $type['name'];
							                    $color = $type['color'];
							                }							                 
							            }
							            if ($counter % 2 == 0 && $counter!=0)
							                echo ('</div>');
							            if ($counter % 2 == 0)
							                echo ('<div class ="row">');
							            echo ('<div class="col-md-6">');
							            echo ('<section class="panel panel-info">');
							            echo ('<header class="panel-heading" style="background-color: '.$color.'">');
							            echo ('<h2 class="panel-title text-center">');
							            echo ('<div class="btn-group-horizontal text-center">');
							            echo ('<label class="text-center">'.ucwords($au['area']->getName()).'</label>');
							            echo ('<a class="btn modal-with-form" href="#deleteArea" onclick = "delArea(\''.ucwords($au['area']->getName()).'\')" style="color: red"><i class="licon-close"></i></a>');
							            echo ('</div></h2>');
							            echo ('<p class="panel-subtitle text-center">'.ucwords($kind).'</p></header>');
							            echo ('<div class="panel-body">');
							            echo ('<div class="btn-group-vertical col-md-12">');
							            foreach ($au['unidades'] as $unidad){
							                echo('<div class="btn btn-default btn-group-horizontal text-center">');
							                echo ('<a class="btn modal-with-form" href="#deleteUnidad" onclick = "delUnidad(\''.ucwords($unidad->getName()).'\')" style="color: red"><i class="licon-close"></i></a>');
							                echo ('<label class="text-center">'.ucwords($unidad->getName()).'</label></div>');
							            }
							            echo ('<a class="btn modal-with-form" href="#agregarUnidad" onclick = "addUnidad(\''.ucwords($au['area']->getName()).'\')" style="color: green"><i class="licon-plus"></i></a>');
							            echo ('</div></div></section></div>');
							            $counter++;
							        }
							     
							    ?>
							<div class="row col-md-12 text-center">
								<a class="btn modal-with-form" href="#agregarArea" style="color: green">
								<h1><i class="licon-plus"></i></h1>
								</a>
							</div>
							<div id="agregarArea" class="modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Agregar área</h2>
											</header>
											<div class="panel-body">
												<form id="demo-form" class="form-horizontal mb-lg">
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Nombre:</label>
														<div class="col-sm-9">
															
															<input id = "AreaName" type="text" name="name" class="form-control" placeholder="nombre de la nueva área..." required/>
															
														</div>
													</div>
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Segmento:</label>
														<div class="col-sm-9">
                                                            <select class="form-control" id="segment">
                                                              <?php 
                                                                foreach ($types as $type){
                                                                    echo('<option value="'.$type['id'].'">'.ucwords($type['name']).'</option>');
                                                                }
                                                              ?>
                                                            </select>														</div>
													</div>
												</form>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary" onclick="postAddArea()">Añadir</button>
														<button class="btn btn-default modal-dismiss">Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
							</div>
								<div id="agregarUnidad" class="modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Agregar unidad</h2>
												<p class="panel-subtitle" id = "addUni">Área 1</p>
											</header>
											<div class="panel-body">
												<form id="demo-form" class="form-horizontal mb-lg">
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Nombre:</label>
														<div class="col-sm-9">
															<input id = "UniName" type="text" name="name" class="form-control" placeholder="nombre de la nueva unidad..." required/>
														</div>
													</div>
												</form>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary" onclick="postAddUni()">Añadir</button>
														<button class="btn btn-default modal-dismiss">Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
									<div id="deleteArea" class="modal-block mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">¿Está seguro?</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													<div class="modal-text">
														<p>¿Está seguro de que quiere eliminar esta área?</p>
														<p id="delArea">area 1</p>
													</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary" onclick="postDelArea()">Confirmar</button>
														<button class="btn btn-default modal-dismiss">Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
									<div id="deleteUnidad" class="modal-block mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">¿Está seguro?</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													<div class="modal-text">
														<p>¿Está seguro de que quiere eliminar esta unidad?</p>
														<p id="delUni">unidad 1</p>
													</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary" onclick="postDelUni()">Confirmar</button>
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
		<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Specific Page Vendor -->
		<script src="<?php echo base_url();?>assets/vendor/pnotify/pnotify.custom.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url();?>assets/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="<?php echo base_url();?>assets/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url();?>assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="<?php echo base_url();?>assets/javascripts/ui-elements/examples.modals.js"></script>
		<script type="text/javascript">
		   var success = <?php echo($success);?>;

		   if (success==1){
			   new PNotify({
					title: 'Éxito!',
					text: 'Su solicitud ha sido realizada con éxito.',
					type: 'success'
				});
			   }
		   if (success==0){
			   new PNotify({
					title: 'error!',
					text: 'Ha ocurrido un error con su solicitud, porfavor intentelo de nuevo más tarde.',
					type: 'error'
				});
			}
		</script>
    </body>
</html>