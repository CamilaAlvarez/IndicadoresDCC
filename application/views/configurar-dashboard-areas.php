<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>
        <?php
        $title = "Configurar Dashboard Áreas";
        include 'partials/head.php';
        ?>

        <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />

		<style type="text/css">
    		.container {
        		width: 214px;
        		clear: both;
    		}
    		.container input {
        		width: 100px;
        	   clear: both;
    		}
    		input.rounded {

        	    border: 1px solid #ccc;

        	    -moz-border-radius: 10px;

        	    -webkit-border-radius: 10px;

        	    border-radius: 10px;

        	    -moz-box-shadow: 2px 2px 3px #666;

        	    -webkit-box-shadow: 2px 2px 3px #666;

        	    box-shadow: 2px 2px 3px #666;

        	    font-size: 20px;

        	    padding: 4px 7px;

        	    outline: 0;

        	    -webkit-appearance: none;

        	}

        	input.rounded:focus {
        	    border-color: #339933;
        	    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(51, 153, 51, 0.6);
                outline: 0 none;
        	}
    	</style>
	</head>
	<body>
		<section class="body">

			<?php include 'partials/header_tmpl.php'; ?>

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
											<span>Configurar áreas y unidades</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url();?>cmetrica">
											<span class="pull-right label label-primary"></span>
											<i class="fa fa-server" aria-hidden="true"></i>
											<span>Configurar métricas</span>
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
						<h2>Configurar Dashboard áreas</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url();?>inicio">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Configurar</span></li>
								<li><span>Dashboard</span></li>
							</ol>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;</label>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
					<div class="text-center col-sm-12 btn-group-horizontal">
						<button class= "mb-xs mt-xs mr-xs btn btn-danger btn-lg" onclick="changePage('cdashboardDCC')">Configurar Dashboard DCC</button>
						<button class= "mb-xs mt-xs mr-xs btn btn-info btn-lg" onclick="changePage('cdashboardArea')">Configurar Dashboard áreas</button>
						<button class= "mb-xs mt-xs mr-xs btn btn-primary btn-lg" onclick="changePage('cdashboardUnidad')">Configurar Dashboard unidades</button>

					</div>
					</div>
					<?php
						if($id_first=="-1")
							$first_area_key = array_keys($areas)[0];
						else{
							$first_area_key=$id_first;
						}
						if($areas[$first_area_key]['type']=="Operación"){ //Operación
							$color_panel="panel-warning";
							$color_button = "btn-warning";
						}
						else{
							$color_panel="panel-success";
							$color_button = "btn-success";
						}
					?>
					<div class="row">
						<div class="col-md-6">
							<section name="section" id="section" class="<?php echo $color_panel; ?>">
								<header class="panel-heading">
									<h2 class="panel-title">
										<form id="conf-dash">
											<div class="form-group mt-lg">
												<div class="btn-group-horizontal text-center">
													<form>
													<select name="area" id= "area" class="<?php echo("form-control btn ".$color_button);?>" onchange="changeColor();">
													<?php
														foreach ($areas as $area) {
															echo "<option class='select' value='".$area['id']."'>".$area['name']."</option>";
														}
													?>
													</select>
													</form>
												</div>
											</div>
										</form>
									</h2>

								</header>
								<div class="panel-body">
									<div class="btn-group-vertical col-md-12" name="popover" id="popover">
									<div class="btn-group-vertical col-md-12" name="metricas" id="metricas"></div>

										<div id="popover-head" class="hide">Configurar gráfico para métrica</div>
										<div id="popover-content" data-placement="right" class="hide">
										<?php echo form_open('DashboardConfig/addGraphArea', array('onSubmit' => "return checkInput();")); ?>
												<label>Tipo de gráfico:</label>
												<input type="hidden" id="id_org" name="id_org" value=""/>
												<input type="hidden" id="id_met" name="id_met" value=""/>
												<input type="hidden" id="id_graph" name="id_graph" value=""/>
												<select class="form-control btn btn-default" id="type" name="type">
														<option value=2>Líneas</option>
														<option value=1>Barra</option>
												</select>
												<div class="container btn-group-vertical col-md-12">
													<div class="form-group">
    													<label for="from">Desde:</label>
    													<input type="number" class="form-control rounded"id="from" name="from" onchange ="saveValFrom(this)" onkeyup="validate_year('from',from)" >
													</div>
													<div class="form-group">
    													<label for="to">Hasta:</label>
    													<input type="number" class="form-control rounded" id="to" name="to" onchange="saveValTo(this)" onkeyup="validate_year('to',to)"  >
													</div>
													<hr style="width:250px;">
												</div>
												<br>
												<br>
												<label></label>
												<label>Mostrar en dashboard:</label>
												<input id="mostrar" type="checkbox" name="mostrar" value="1" />
												</br>
												</br>
												<button type="submit" onclick="$('#popover').popover('hide');" class="btn btn-primary"> Guardar</button>
											<?php echo form_close(); ?>
										</div>


									</div>
								</div>
							</section>
						</div>
					</div>
					<!-- end: page -->
				</section>

        <?php include 'partials/footer.php'; ?>

		<!-- Specific Page Vendor -->
		<script src="<?php echo base_url();?>assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>

		<!-- Examples -->
		<script src="<?php echo base_url();?>assets/javascripts/ui-elements/popover.js"></script>

		<!-- Demo Purpose Only -->
		<script>
			var id_first = <?php echo $id_first; ?>;
			var years = <?php echo json_encode($years); ?>;

			function changePage(page){
      			window.location.href = "<?php echo base_url();?>".concat(page);
    		}
			var metricas = <?php echo json_encode($metricas); ?>;
			var areas = <?php echo json_encode($areas); ?>;

			$(document).ready(function(){
				if(id_first!="-1"){
					$('#area option[value="'.concat(id_first,'"]')).attr("selected", "selected");
					$('#area').trigger('change');
				}
				else{
					var area_value = $( "#area" ).val();
					$('#id_org').attr('value',area_value);
					$('#metricas').empty();
					var metricas_area = metricas[area_value];
  					for (i in metricas_area) {
  						var popover = "<a href='#popover' id='id".concat(metricas_area[i]['metorg'], "' class='btn btn-default' onclick='updateYears(" ,
  							metricas_area[i]['metorg'], ")'>", metricas_area[i]['name'], "</a>");
    					$(popover).appendTo($('#metricas'));
  					}
  					var unidades = areas[area_value]['unidades'];
  					for(i in unidades){
  						var unidad_id = unidades[i]['id'];
  						var unidad_name = unidades[i]['name'];
  						var metricas_unidad = metricas[unidad_id];
  						for(j in metricas_unidad){
  							var popover = "<a href='#popover' id='id".concat(metricas_unidad[j]['metorg'], "'class='btn btn-default' onclick='updateYears(",
  								metricas_unidad[j]['metorg'], ")'>", "<b>",
  								unidad_name, "</b>  &#8658; ",metricas_unidad[j]['name'], "</a>");
    						$(popover).appendTo($('#metricas'));
  						}
  					}
  				}
  			});

			$('#area').change(function() {
				var area_value = $( "#area" ).val();
				$('#id_org').attr('value',area_value);
				$('#metricas').empty();
				var metricas_area = metricas[area_value];
  				for (i in metricas_area) {
  					var popover = "<a href='#popover' id='".concat(metricas_area[i]['metorg'], "'class='btn btn-default' onclick='updateYears("
  						,metricas_area[i]['metorg'], ")'>", metricas_area[i]['name'], "</a>");
    				$(popover).appendTo($('#metricas'));
  				}
  				var unidades = areas[area_value]['unidades'];
  				for(i in unidades){
  					var unidad_id = unidades[i]['id'];
  					var unidad_name = unidades[i]['name'];
  					var metricas_unidad = metricas[unidad_id];

  					for(j in metricas_unidad){
  						var popover = "<a href='#popover' id='".concat(metricas_unidad[j]['metorg'], "'class='btn btn-default' onclick='updateYears(",
  							metricas_unidad[j]['metorg'], ")''>", "<b>",
  						unidad_name, "</b>  &#8658; ",metricas_unidad[j]['name'], "</a>");
    					$(popover).appendTo($('#metricas'));
  					}
  				}
			});


			function changeColor(){
				var id_area = document.getElementById("area").value;
				var areas = <?php echo json_encode($areas); ?>;

				var color = areas[id_area]['type']=="Operación" ? "warning" : "success";

				$('#section').attr('class',"panel-".concat(color));
				$('#area').attr('class', "form-control btn btn-".concat(color));
				$('#unidad').attr('class', "form-control btn btn-".concat(color));

			}

		</script>
		<script src="<?php echo base_url();?>js/functions.js"></script>
	</body>
</html>
