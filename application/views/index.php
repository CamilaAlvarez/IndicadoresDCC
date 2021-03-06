<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>
        <?php
        $title = "U-Dashboard";
        include 'partials/head.php';
        ?>
		<style type="text/css">
            <?php
            foreach ($types as $type){
                $color = dechex(hexdec($type['color']) + 60);
                echo('body .btn-info:hover.'.$type['name'].'{');
                echo('background-color: #'.$color.';');
                echo('border-color: #'.$color.' !important;}');

                echo('body .btn-info.'.$type['name'].'{');
                echo('background-color: '.$type['color'].';');
                echo('border-color: '.$type['color'].' !important;}');
            }
            ?>

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
									<?php
									$first = true;
									foreach ($types as $type){
									    echo ('<li> <a href="'.base_url().'inicio?sector='.$type['name'].'">');
									    echo ('<span class="pull-right label label-primary"></span>');
									    if ($first){
									       echo ('<i class="fa fa-university" aria-hidden="true"></i>');
									       $first = false;
									    }
									    else{
									        echo ('<i class="el-icon-group" aria-hidden="true"></i>');
													
												}
									    echo ('<span>'.ucwords($type['name']).'</span></a></li>');
									}
									?>
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
									<a href="<?php echo base_url();?>inicio">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><?php echo($name);?></span></li>
							</ol>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;</label>
						</div>
					</header>
					<?php
						$dept_id=1;

						if($name == "Soporte"){
							$dept_id=0;
						}
					?>
					<?php echo form_open('dashboard');
					   echo ('<div class="pane panel-transparent">');
					   echo ('<header class="panel-heading">');
						echo ('<h2 class="panel-title"><button type="submit" name="direccion" value='.$dept_id.' class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block"> DCC </button></h2>');
						echo('</header>');
						echo('<div class="panel-body">');
						echo('<input type="hidden" name="user" id="user" value="'.$user.'">');
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
						        echo ('<h2 class="panel-title"><button type="submit" name="direccion" value='.$au['area']->getId().' class="mb-xs mt-xs mr-xs btn btn-info btn-lg btn-block '.$kind.'">'.ucwords($au['area']->getName()).'</button></h2>');
										echo ('</header>');
						        echo ('<div class="panel-body">');

						        echo ('<div class="btn-group-vertical col-md-12">');
						        foreach ($au['unidades'] as $unidad){
						            echo('<button type="submit" name="direccion" class="btn btn-default" value='.$unidad->getId().'>'.ucwords($unidad->getName()).'</button>');
						        }
						        echo form_close();
						        echo ('</div></div></section></div>');
						        $counter++;
						    }
						    ?>
						</div>
					</div>
					<!-- end: page -->
				</section>
			</div>

		</section>

		<?php include 'partials/footer.php'; ?>

		<script type="text/javascript">
			function changePage(){
      			window.location.href = "<?php echo base_url();?>dashboard";
    		}
		</script>

	</body>
</html>
