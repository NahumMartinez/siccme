<?php
session_start();
include_once("../../../scripts/b_Utiles.php");
if (empty($_SESSION['username']) || empty($_SESSION['pass'])) {
    //	Verifica Si Inicio Session
    echo " 
                <script language='JavaScript'> 
                //alert('No has Iniciado Session Debes Logearte');
				location.href='../../../logeo.php'; 
				</script>";
    exit();

} else {
    //echo $_SESSION['username'];
    //echo $_SESSION['pass'];
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mantenimiento | Ingreso de Productos</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../../../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Formas style -->
        <link href="../../../css/b_forms.css" rel="stylesheet" type="text/css" />
        <!-- Validaciones del Formulario -->
        <script src="v_valid_IngresoProductos.js"></script>
		<!-- Jquery UI -->
        <link href="../../../css/jquery-ui.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="../../../js/tinybox.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        <link href="../../../assets/css/Irwin2382.css" rel="stylesheet">
	
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../../../index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                504-Sistemas Abiertos
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../../../img/avatar3.png" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li><!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../../../img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../../../img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../../../img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../../../img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users warning"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-cart success"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Administrador <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="../../../img/avatar04.png" class="img-circle" alt="User Image" />
                                    <p>
                                        Nahum Martinez - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../../../logout.php" class="btn btn-default btn-flat">Cerrar Sesion</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../../../img/avatar04.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hola, <?php echo $_SESSION['username']; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="../../../index.php">
                                <i class="fa fa-dashboard"></i> <span>Inicio</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="#">
                                <i class="fa fa-th"></i> <span>Facturacion</span> <small class="badge pull-right bg-green">new</small>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Mantenimientos</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../categorias/v_mant_categorias.php"><i class="fa fa-angle-double-right"></i> Categorias de Productos</a></li>
                                <li><a href="../tipos_productos/v_mant_tipos_productos.php"><i class="fa fa-angle-double-right"></i> Tipos de Productos</a></li>
                                <li><a href="#"> ------------------------------------------</a></li>
                                <li><a href="../localidades/v_mant_localidades.php"><i class="fa fa-angle-double-right"></i> Localidades</a></li>
                                <li><a href="../sucursales/v_mant_sucursales.php"><i class="fa fa-angle-double-right"></i> Sucursales</a></li>
                                <li><a href="../almacenes/v_mant_almacenes.php"><i class="fa fa-angle-double-right"></i> Almacenes</a></li>
				<li><a href="../estantes/v_mant_estantes.php"><i class="fa fa-angle-double-right"></i> Estantes</a></li>
				<li><a href="#"> ------------------------------------------</a></li>
                                <li><a href="v_mant_fincas.php"><i class="fa fa-angle-double-right"></i> Fincas</a></li>
				<li><a href="#"> ------------------------------------------</a></li>
                                <li><a href="../personas/v_mant_personas.php"><i class="fa fa-angle-double-right"></i>Personas</a></li>
				<li><a href="../clientes/v_mant_clientes.php"><i class="fa fa-angle-double-right"></i> Clientes</a></li>
				<li><a href="#"><i class="fa fa-angle-double-right"></i> Empleados</a></li>
				<li><a href="../proveedores/v_mant_proveedores.php"><i class="fa fa-angle-double-right"></i> Proveedores</a></li>
                                
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Consultas</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Productos</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Clientes</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Compras</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Ventas</a></li>
                            </ul>
                        </li>
                        <li class="treeview active">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Inventarios</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active"><a href="#"><i class="fa fa-angle-double-right"></i> Ingreso de Productos</a></li>
                                <li><a href="../../transaccionales/distribucion_productos/v_mant_distribucion_productos.php"><i class="fa fa-angle-double-right"></i> Descargos de Productos</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Control de Inventario</a></li>
                                </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">

                                <i class="fa fa-edit"></i> <span>Compras</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                            	<li><a href="#"><i class="fa fa-angle-double-right"></i> Ingreso de Compras</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Devoluciones en Compras</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Gastos de Compras</a></li>
                                </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Ventas</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Devoluciones en Ventas</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Historico de Ventas</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-calendar"></i> <span>Pedidos</span>
                                <small class="badge pull-right bg-red">3</small>
                            </a>
                        </li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span>Pedidos</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Pedidos Nuevos</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Pedidos en Tratamiento</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Pedidos en Bodega</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Pedidos Entregados</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Pedidos Anulados</a></li>
                                </ul>
                        </li>
                        
                        <li>
                            <a href="#">
                                <i class="fa fa-envelope"></i> <span>Mensajeria</span>
                                <small class="badge pull-right bg-yellow">12</small>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Mantenimientos  
                        <small>Ingreso de Productos </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li><a href="#">Mantenimientos</a></li>
                        <li class="active">Ingreso de Productos</li>
                    </ol>
                </section>
				
                <!-- Main content -->
                <section class="content" id="content">
					<!-- NMA : INI 15-09-2014 Creacion de Acodion para la Tabla -->
                    <div class='box box-info'>
                                								
					 <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Ingreso de Productos <small>Formulario para Ingreso de Productos</small></h3>
                                    
                                    
                                </div><!-- /.box-header -->
                                
                                    
                <!-- Inicio de Creaion de Formulario de Productos
                NMA : 01-11-2014 -->
                						
                <!-- Creacion del Formulario de Productos -->
                <fieldset style="width:400px; border-color:#000; margin-left:10px">
                <p id='alert_error' class='text-error visible'></p>
				<p id='alert_success' class='text-correcto visible'></p>
                <legend style="color:#000; border-color:#000"></legend>
                		      
                        <form method="post" action="#" name="form_Producto" id="form_Producto" >
                        	<table> <!-- Primera Tabla Datos de Sistemas -->
                            	<tr>
                                	<td><label class="td_1">Codigo :</label></td>
                                	<td><input class="desc" id="cod_prod" name="cod_prod" type="text" placeholder="Codigo"  maxlength="15" onkeyup="Upper(cod_prod);" ></td>
                                </tr>
                            	
                            	<tr>
                                	<td><label class="td_1">Fe. de Creacion :</label></td>
                                	<td><input class="f_creacion" id="f_creacion" name="f_creacion" type="date" placeholder="Introduzca la Fecha" disabled value="<?php echo $fecha; ?>"></td>
                                </tr>
                            	<tr>
                                	<td><label class="td_1">Usuario :</label></td>
                                	<td><input class="usuario" id="usuario" name="usuario" type="text" placeholder="Usuario" disabled value="<?php echo $_SESSION['username']; ?>"></td>
                                    <td><input type="hidden" value="des" name="op" id="op"></td>
                                    <td><input type="hidden" value="t00_IngresoProductos" name="programa" id="programa"></td>
                                </tr>
							</table>
							<hr>
							<table>	<!-- Datos del Productos -->
								<tr><td colspan="4" style="background:#3C8DBC;color:#E4E7F1"><center><strong>Datos Fisicos del Producto</strong></center></td>
								</tr>	
								<tr>
                                	<td><label class="td_1">Descripcion :</label>
									</td>
                                	<td><input class="desc" id="desc_prod" name="desc_prod" type="text" placeholder="Descripcion" disabled></td>
									
								</tr>
								
								<tr>
                                	<td><label class="td_1">Altura :</label>
									</td>
                                	<td><input class="num" id="altura" name="altura" type="text" placeholder="Altura" disabled></td>
									
									<td><label class="td_1">Anchura :</label>
									</td>
                                	<td><input class="num" id="anchura" name="anchura" type="text" placeholder="Anchura" disabled></td>
																		
								</tr>
								
								<tr>
                                	<td ><label class="td_1">Peso :</label></td>
                                	<td><input class="num" id="peso" name="peso" type="text" placeholder="Peso" disabled></td>
									
									<td><label class="td_1">Medida :</label>
									<td ><SELECT class="combo" name="id_medida"  id="id_medida" disabled>
										<option value="0">Seleccione una Opción...</option>
											<?php 
											 include_once("../../../scripts/scr_cargarCombo.php");
												CCombo('t00_medidas','id_medida','desc_medida','cod_medida','%%');
											?>
										</SELECT></td>
										
								</tr>		
                                
								<tr>
                                	<td><label class="td_1">F. Elaboracion :</label>
									</td>
                                	<td><input class="f_creacion" id="f_elaboracion" name="f_elaboracion" type="text" placeholder="Elab." disabled></td>
									
									<td><label class="td_1">F. Vencimiento :</label>
									</td>
                                	<td><input class="f_creacion" id="f_vencimiento" name="f_vencimiento" type="text" placeholder="Venc." disabled></td>
																		
								</tr>
								
								<tr>
                                	
									<td><label class="td_1">Tipo de Producto :</label>
									<td ><SELECT class="combo" name="id_tipo_prod"  id="id_tipo_prod" disabled>
										<option value="0">Seleccione una Opción...</option>
											<?php 
											 include_once("../../../scripts/scr_cargarCombo.php");
												CCombo('t00_tipos','id_tipo','desc_tipo','ind_tipo','%P%');
											?>
										</SELECT></td>
										
									<td><label class="td_1">Color :</label>
									</td>
                                	<td><SELECT class="combo" name="id_color"  id="id_color" disabled>
										<option value="0">Seleccione una Opción...</option>
											<?php 
											 include_once("../../../scripts/scr_cargarCombo.php");
												CCombo('t00_colores','id_color','desc_color','cod_color','%%');
											?>
										</SELECT>
									</td>
									
								</tr>
												
							</table>
							<hr>
							<table>	<!-- Segunda Tabla Datos del Producto -->
							<marquee width="100%" height="30" align="bottom">
								- - - Ingrese los Datos Economicos del Producto - - -
							</marquee>
								<tr>
									<td><label class="td_1">Precio Costo :</label>
									</td>
                                	<td><input class="num" id="p_costo" name="p_costo" type="text" placeholder="Costo" disabled></td>
									
									<td><label class="td_1">Precio Venta 1 :</label>
									</td>
                                	<td><input class="num" id="p_venta_1" name="p_venta_1" type="text" placeholder="Venta 1" disabled></td>
																		
                                </tr>
									
								<tr>
                                	<td><label class="td_1">Precio Venta 2 :</label>
									</td>
                                	<td><input class="num" id="p_venta_2" name="p_venta_2" type="text" placeholder="Venta 2" disabled></td>
									
									<td><label class="td_1">Precio Venta 3 :</label>
									</td>
                                	<td><input class="num" id="p_venta_3" name="p_venta_3" type="text" placeholder="Venta 3" disabled></td>
								</tr>
								
								<tr>
                                	<td><label class="td_1">Descuento :</label>
									</td>
                                	<td><SELECT class="combo" name="id_descuento"  id="id_descuento" disabled>
                                            <option value="0">Seleccione una Opción...</option>
                                                    <?php 
                                                     include_once("../../../scripts/scr_cargarCombo.php");
                                                            CCombo('t00_descuentos','id_descuento','desc_descuento','ind_desc','%IDG%');
                                                    ?>
                                            </SELECT>
					</td>
									
									<td><label class="td_1">Impuesto :</label>
									</td>
                                	<td><SELECT class="combo" name="id_impto"  id="id_impto" disabled>
										<option value="0">Seleccione una Opción...</option>
											<?php 
											 include_once("../../../scripts/scr_cargarCombo.php");
												CCombo('t00_impuestos','id_isv','desc_impuesto','ind_impuesto','%IPR%');
											?>
										</SELECT>
									</td>
								</tr>
								
								<tr>
                                	<td ><label class="td_1">Cant. Inicial :</label></td>
                                	<td><input class="num" id="cant_ini" name="cant_ini" type="text" placeholder="C. Ini." disabled></td>
									
									<td ><label class="td_1">Cant. Maxima :</label></td>
                                	<td><input class="num" id="cant_max" name="cant_max" type="text" placeholder="C. Max." disabled></td>
								</tr>
								
								<tr>
                                	<td ><label class="td_1">Cant. Real :</label></td>
                                	<td><input class="num" id="cant_real" name="cant_real" type="text" placeholder="C. Real" disabled></td>
									
									<td ><label class="td_1">C. Re Orden :</label></td>
                                	<td><input class="num" id="cant_re_orden" name="cant_re_orden" type="text" placeholder="C. ReOrd." disabled></td>
								</tr>
								
								<tr>
                                	<td ><label class="td_1">Facturable :</label></td>
                                	<td><input class="num" id="ind_fact" name="ind_fact" type="checkbox" placeholder="Fact." disabled></td>
									
									<td ><label class="td_1">Proveedor :</label></td>
                                	<td><SELECT class="combo" name="id_proveedor"  id="id_proveedor" disabled>
										<option value="0">Seleccione una Opción...</option>
											<?php 
											 include_once("../../../scripts/scr_cargarCombo.php");
												CCombo('t00_proveedores','id_proveedor','nombre_proveedor','cod_proveedor','%%');
											?>
									</SELECT></td>
								</tr>
								
                            </table>
							<hr >
							
							<table>	<!-- Cuarta Tabla Observaciones -->	
								<tr>
									<td ><label class="td_1">Observaciones :</label></td>
                                	<td><textarea class="textbox" rows="4" cols="80" disabled id="obs_prod" name="obs_prod">
											
									</textarea></td>
																	
                                </tr>
							</table>
							<BR>
                            <table> <!-- Botones Tabla -->   
                                <tr>
                                	<td><input class="btn btn-warning" type="button" value="Nuevo" id="boton" name="btnincluir" onclick='Incluir();' accesskey="h"></td>
                                    <td><input class="btn btn-warning" type="button" value="Buscar" id="botonb" name="btnbuscar" onclick='Buscar();'></td>
                                    <td><input class="btn btn-warning" type="button" value="Modificar" id="botonm" name="btnmodificar" onclick='Modificar();' disabled></td>
                                    <td><input class="btn btn-warning" type="button" value="Eliminar" id="botone" name="btneliminar" onclick='Eliminar();' disabled></td>
                                    <td><input class="btn btn-warning" type="button" value="Cancelar" id="botonc" name="btncancelar" onclick='Cancelar();' disabled></td>
                                    <td><input class="btn btn-warning" type="button" value="Guardar" id="botong" name="btnguardar"  disabled id="EnviarLogin" onclick='Guardar();'></td>
									
                                </tr>
                            </table>
                        </form>
                </fieldset><br>
                <!-- Final de Creaion de Formulario de Categorias
                NMA : 14-09-2014 -->
                                </div><!-- /.box-body -->
                               
                            </div><!-- /.box -->
                         
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
		
		
         <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../../../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../../../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../../../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../../js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
		<!-- Jquery UI script -->
		<script src="../../../js/jquery-ui.js" type="text/javascript"></script>
        <script>
		$(function() {
			$( "#f_creacion" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "1950:2014",
			dateFormat:"yy-mm-dd"		
			});
			$( "#f_vencimiento" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "1950:2014",
			dateFormat:"yy-mm-dd"		
			});
			$( "#f_elaboracion" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "1950:2014",
			dateFormat:"yy-mm-dd"		
			});
		});
		</script>
                
        <script src="v_ajax_IngresoProductos.js"></script>
    </body>
</html>
