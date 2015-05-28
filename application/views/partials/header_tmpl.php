
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
    
        <?php 
        $titles = explode('<br>', $role); //Separa los Titulos "Encargado de ...", "Director", "Asistente de ..."
        foreach ($titles as $titl){
            $words = explode(' ',rtrim($titl, ',')); //Separa las palabras del titulo y elimina comas al final. "Encargado, de, ..."
            if($words[0]=="Director"){ //Revisa si el titulo parte con la palabra director?>
                <ul class="notifications">
                    <li>
                        <label>Configurar</label>
                        <a href="<?php echo base_url();?>configurar" class="notification-icon">
                            <i class="fa fa-gear"></i>
                        </a>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </li>
                    <li>
                        <label>Validar</label>
                        <a href="<?php echo base_url();?>validar" class="notification-icon">
                            <i class="fa fa-check-circle" style="color:green"></i>
                            <span class="badge"><?php echo $validate;?></span>
                		</a>
                	</li>
                </ul>
        <?php 
            break; //Como el director tiene más accesos q los otros, no es necesario agregar más cosas.
            }
            else if($words[0]=="Encargado"){ ?>
                <ul class="notifications">
                    <li>
                        <label>Validar</label>
                        <a href="<?php echo base_url();?>validar" class="notification-icon">
                            <i class="fa fa-check-circle" style="color:green"></i>
                            <span class="badge"><?php echo $validate;?></span>
						</a>
                	</li>
                </ul>
        <?php 
            }
        }
        ?>
    
        <span class="separator"></span>
        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="<?php echo base_url();?>assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                </figure>
                <div class="profile-info" data-lock-name="<?php echo $name;?>">
                    <span class="name"><?php echo $name;?></span>
                    <span class="role"><?php echo $role;?></span>
                </div>        
                <i class="fa custom-caret"></i>
            </a>
    
            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo base_url();?>"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
        <!-- end: search & user box -->
</header>
			<!-- end: header -->