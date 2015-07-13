<?php
session_start();
include_once("../../../scripts/b_Utiles.php");
include_once("../../../scripts/src_CargarSecuencial.php");
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
        <title>Transaccion | Registro de Compras</title>
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
		<!-- Tabla Transaccional style -->
        <link href="../../../css/datatables/TablaTransaccional.css" rel="stylesheet" type="text/css" />
        <!-- Validaciones del Formulario -->
        <script src="v_valid_RegistroCompras.js"></script>
		<!-- Jquery UI -->
        <link href="../../../css/jquery-ui.css" rel="stylesheet" type="text/css" />
		
		<!-- Mdales Theme -->
        <link href="../../../css/modales/modales.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="../../../js/tinybox.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        <link href="../../../assets/css/Irwin2382.css" rel="stylesheet">
        
        <style type="text/css"> 
            #div_carga{
                position:absolute;
                top:0;
                left:0;
                width:100%;
                height:200%;
                    /*background: url(../../../img/fondo.png) repeat;*/
                    background: #007bb6 ;
                    opacity: 0.5; 
                    display: none;
                    z-index: 1;
            }

            #cargador{
                position:absolute;
                top:50%;
                left: 50%;
                margin-top: -25px;
                margin-left: -25px;
            }
        
        </style>
		
    </head>
    <body class="skin-blue">
        <div id="div_carga">
            <img id="cargador" src="../../../img/ajax-loader1.gif"/>
        </div>
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
                            </ul>
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
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
                                <span>Jane Doe <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="../../../img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        Jane Doe - Web Developer
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
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
                                <li><a href="../../mantenimientos/categorias/v_mant_categorias.php"><i class="fa fa-angle-double-right"></i> Categorias de Productos</a></li>
                                <li><a href="../../mantenimientos/mantenimientos/tipos_productos/v_mant_tipos_productos.php"><i class="fa fa-angle-double-right"></i> Tipos de Productos</a></li>
                                <li><a href="#"> ------------------------------------------</a></li>
                                <li><a href="../../mantenimientos/localidades/v_mant_localidades.php"><i class="fa fa-angle-double-right"></i> Localidades</a></li>
                                <li><a href="../../mantenimientos/sucursales/v_mant_sucursales.php"><i class="fa fa-angle-double-right"></i> Sucursales</a></li>
                                <li><a href="../../mantenimientos/almacenes/v_mant_almacenes.php"><i class="fa fa-angle-double-right"></i> Almacenes</a></li>
								<li><a href="../../mantenimientos/estantes/v_mant_estantes.php"><i class="fa fa-angle-double-right"></i> Estantes</a></li>
								<li><a href="#"> ------------------------------------------</a></li>
                                <li><a href="../../mantenimientos/v_mant_fincas.php"><i class="fa fa-angle-double-right"></i> Fincas</a></li>
								<li><a href="#"> ------------------------------------------</a></li>
                                <li><a href="../../mantenimientos/personas/v_mant_personas.php"><i class="fa fa-angle-double-right"></i>Personas</a></li>
								<li><a href="../../mantenimientos/clientes/v_mant_clientes.php"><i class="fa fa-angle-double-right"></i> Clientes</a></li>
								<li><a href="../../mantenimientos/empleados/v_mant_empleados.php"><i class="fa fa-angle-double-right"></i> Empleados</a></li>
								<li><a href="../../mantenimientos/proveedores/v_mant_proveedores.php"><i class="fa fa-angle-double-right"></i> Proveedores</a></li>
                                
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Consultas</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/charts/morris.html"><i class="fa fa-angle-double-right"></i> Productos</a></li>
                                <li><a href="pages/charts/flot.html"><i class="fa fa-angle-double-right"></i> Clientes</a></li>
                                <li><a href="pages/charts/inline.html"><i class="fa fa-angle-double-right"></i> Compras</a></li>
                                <li><a href="pages/charts/inline.html"><i class="fa fa-angle-double-right"></i> Ventas</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Inventarios</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../../transaccionales/ingreso_productos/v_mant_ingresoproductos.php"><i class="fa fa-angle-double-right"></i> Resgistro de Productos</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Distribucion de Productos</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Control de Inventario</a></li>
                                </ul>
                        </li>
                        <li class="treeview active">
                            <a href="#">

                                <i class="fa fa-edit"></i> <span>Compras</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                            	<li class="active"><a href="#"><i class="fa fa-angle-double-right"></i> Ingreso de Compras</a></li>
                                <li><a href="pages/forms/general.html"><i class="fa fa-angle-double-right"></i> Devoluciones en Compras</a></li>
                                <li><a href="pages/forms/advanced.html"><i class="fa fa-angle-double-right"></i> Gastos de Compras</a></li>
                                </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Ventas</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/tables/simple.html"><i class="fa fa-angle-double-right"></i> Devoluciones en Ventas</a></li>
                                <li><a href="pages/tables/data.html"><i class="fa fa-angle-double-right"></i> Historico de Ventas</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="pages/calendar.html">
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
                                <li><a href="pages/examples/invoice.html"><i class="fa fa-angle-double-right"></i> Pedidos Nuevos</a></li>
                                <li><a href="pages/examples/login.html"><i class="fa fa-angle-double-right"></i> Pedidos en Tratamiento</a></li>
                                <li><a href="pages/examples/register.html"><i class="fa fa-angle-double-right"></i> Pedidos en Bodega</a></li>
                                <li><a href="pages/examples/lockscreen.html"><i class="fa fa-angle-double-right"></i> Pedidos Entregados</a></li>
                                <li><a href="pages/examples/404.html"><i class="fa fa-angle-double-right"></i> Pedidos Anulados</a></li>
                                </ul>
                        </li>
                        
                        <li>
                            <a href="pages/mailbox.html">
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
                        Transaccion  
                        <small>Registro de Compras </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li><a href="#">Transaccion</a></li>
                        <li class="active">Registro de Compras</li>
                    </ol>
                </section>
				
                <!-- Main content -->
                <section class="content" id="content">
					<!-- NMA : INI 15-09-2014 Creacion de Acodion para la Tabla -->
                    <div class='box box-info'>
                                								
					 <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Registro de Compras <small>Formulario para Registro de Compras</small></h3>
                                    
                                    
                                </div><!-- /.box-header -->
                                
                                    
                <!-- Inicio de Creaion de Formulario de Registro de Compras
                NMA : 01-11-2014 -->
                						
                <!-- Creacion del Formulario de Registro de Compras -->
                <fieldset style="width:800px; border-color:#000; margin-left:10px">
                <p id='alert_error' class='text-error visible'></p>
				<p id='alert_success' class='text-correcto visible'></p>
                <legend style="color:#000; border-color:#000"></legend>
                		      
                        <form method="post" action="#" name="form_Compras" id="form_Compras" >
                            <a class="btn btn-block btn-social btn-instagram">
                                        <i class="fa fa-truck"></i> Datos de Proveedores
                                </a><p></p>
                        	<div ><table>
								<tr>
                                	<td><label class="td_1" style="font-size:16px">Numero : </label></td>
									<td><input class="num"  type="text" value="<?php CSecuencial('t00_compras_enc'); ?>" id="secuencial"  disabled></td>
									
									<td><label class="td_1" style="font-size:14px">Fecha : <?php echo $fecha; ?></label></td></tr>
									<td><input type="hidden" value="<?php CSecuencial('t00_compras_enc'); ?>" id="sec_compra"></td>
									<td><input type="hidden" value="<?php echo $fecha; ?>" id="f_creacion"></td>
									<td><input type="hidden" value="t00_Compras_Enc" id="programa"></td>
									<td><input type="hidden" value="<?php echo $_SESSION['username']; ?>" id="usuario"></td>
								<tr>
									<td><label class="td_1">Moneda :</label>
									<td ><SELECT class="combo_1" id="id_moneda" >
										
											<?php 
											 include_once("../../../scripts/scr_cargarCombo.php");
												CCombo('t00_monedas','id_moneda','desc_moneda','cod_moneda','%%');
											?>
										</SELECT></td>
                                                                                <td><label class="td_1">Forma Pago :</label>
                                                                                <td ><SELECT class="combo_1" id="id_forma_pago" >
										
											<?php 
											 include_once("../../../scripts/scr_cargarCombo.php");
												CCombo('t00_formas_pago','id_forma_pago','desc_forma_pago','cod_forma_pago','%%');
											?>
										</SELECT></td>	
								</tr>		
								<tr>	
									<td><label class="td_1">Proveedor :</label></td>
                                                                        <td><input class="num" id="cod_proveedor2" type="text" maxlength="6" onkeyup="Upper(cod_proveedor2);" ><a href="#"  id="btnopen">Buscar</a></td>
                                                                                                                                                
									<td><label class="td_1">No. Doc. :</label></td>
									<td><input class="desc" id="documento_id" onkeyup="Upper(documento_id);" type="text" placeholder="Documento" maxlength="20"></td>
									
									<td><input type="hidden" value="" id="id_proveedor2"></td>
									
								</tr>
								
								<tr>
									<td><label class="td_1">Nombre Prov. :</label></td>
									<td><input class="desc" id="nombre_proveedor2"  type="text" placeholder="Proveedor" disabled ></td>
									<td><label class="td_1">Tipo Prov. :</label></td>
									<td><input class="desc" id="tipo_proveedor2"  type="text" placeholder="Tipo Proveedor" disabled ></td>
								</tr>
                                                                
                                        </table>
                                    <hr>   
                                    <a class="btn btn-block btn-social btn-instagram">
                                        <i class="fa fa-shopping-cart"></i>Detalle de la Compra
                                    </a><p></p>
                                                        <table>  
								<tr>
                                                                        <td><label class="td_1">Cod. Producto :</label></td>
                                                                        <td><input class="desc" id="cod_prod" name="cod_prod" type="text" placeholder="Codigo Producto"  maxlength="15" onkeyup="Upper(cod_prod);" ></td>
									
									<td><label class="td_1">Cantidad :</label></td>
                                                                        <td><input class="num" id="cant_prod" name="cant_prod" type="number" placeholder="Cant"  maxlength="3" value="1"></td>
									
									<td><input class="btn btn-primary" type="button" value="Ingresar" id="buscarp" name="buscarp"  onclick='BuscarProd();' ></td>
                                                                        <td><input type="hidden" value="buscaProd" name="op" id="op"></td>
                                                                </tr>
							</table></div>
							
							<hr>
							
							<!-- <div class="box-body table-responsive"> -->
                            <table id="table_tran" class="table table-bordered table-striped">
									
								<thead>
									<tr>
										<th>Codigo</th>
										<th>Descripcion</th>
										<th>Cant.</th>
										<th>Precio</th>
										<th>ISV.</th>
										<th>Importe.</th>
										<th><center>Accion</center></th>
										
									</tr>
								</thead>
								
							</table>
								
							<div style="margin-left:630px">	
								<label class="td_2" style="font-size:16px">Sub Total :</label>
								<input class="sub_total_c" id="sub_total" type="text" value="0.00" disabled>

								<label class="td_2" style="font-size:16px">Descuento :</label>
								<input align="right" class="sub_total_c" id="imp_descuento" type="text" maxlength="10" value="0.00" onkeyup="Tecla(event);">

								<label class="td_2" style="font-size:20px">Total :</label>
								<input class="total_c" id="imp_total" type="text" disabled value="0.00">	
							</div>
							
							<!-- </div> -->
							
							<hr>
                            <table> <!-- Botones Tabla -->   
                                <tr>
                                    <td><a class="btn btn-info" id="buscarpk" name="buscarpk" onclick="SumaTotal();" style=" width:100px" >Actualizar
                                    <span class="fa fa-refresh"> </span> </a></td>
                                    <td><a class="btn btn-info" id="btnopen_obs" name="btnopen_obs" style=" width:110px" >Adicional
                                    <span class="fa fa-refresh"> </span> </a></td>
                                    <td><a class="btn btn-success" id="botong" name="botong"  style=" width:85px"  >Guardar
                                    <span class="fa fa-check-square-o"> </span> </a></td>
                                    
                                </tr>
                            </table>
                        </form>
                </fieldset><br>
	

                <!-- Final de Creaion de Formulario de Registro de Compras
                NMA : 14-09-2014 -->
                                </div><!-- /.box-body -->
                               
                            </div><!-- /.box -->
                         
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
		
								<!-- Definicion de la Ventana Modal de Proveedores -->
									<div id="dialog" title="Seleccion de Proveedor">
                                                   
										<table>
											<tr>
												<td>
													<label class="td_2" style="font-size:12px">Codigo :</label>
												</td>
												<td>
													<input class="num" id="cod_proveedor" type="text" maxlength="6" onkeyup="Upper(cod_proveedor);" >
												</td>
												<td><input type="hidden" value="0" id="id_proveedor"></td>
											</tr>
											<tr>
												<td>
													<label class="td_2" style="font-size:12px">Nombre :</label>
												</td>
												<td>
													<input class="desc" type="text" id="nom_proveedor" value="" disabled />
												</td>
												<td>
													<label class="td_2" style="font-size:12px" >Tipo :</label>
												</td>
												<td>
													<input  class="desc" type="text" id="tipo_proveedor" value="" disabled />
												</td>
											</tr>
											<tr>
												<td>
													<label class="td_2" style="font-size:12px" >Estado :</label>
												</td>
												<td>
													<input class="desc" type="text" id="est_proveedor" value="" disabled />
												</td>
												<td>
													<label class="td_2" style="font-size:12px" >Rubro :</label>
												</td>
												<td>
													<input  class="desc" type="text" id="rubro_proveedor" value="" disabled />
												</td>
											</tr>
                                                                                </table>
                                                                                <table>
											<tr>
												<td><label class="td_1" style="font-size:12px">Dir. Prov. :</label></td>
												<td><textarea class="textbox" style="margin-left:-24px" disabled id="ref_dir" disabled>
												</textarea></td>
											</tr>

										</table>
										
										<!-- Boton Modal de Almacenes -->
                                                                                <input class="btn btn-primary" type="button" value="Ingresar" id="btnbuscarp" name="btnbuscarp"  onclick='BuscarProv();' >
									</div>
								
									<!-- Definicion de la Ventana Modal de Observacioness -->
									<div id="dialog_obs" title="Informacion Adicional">
                                                                               
										<table>
											<tr>
												<td>
													<label class="td_2" style="font-size:12px">Gastos :</label>
												</td>
												<td>
													<input class="num" type="text" id="gtos_compas" value="0.00"  />
												</td>

											</tr>
											<tr>
												<td ><label class="td_1" style="font-size:12px">Observaciones :</label></td>
												<td><textarea class="textbox" rows="4" cols="80" id="obs_compras" >
											
												</textarea></td>
											</tr>
											<tr>
												<td ><label class="td_1" style="font-size:12px">Fe. Entrega :</label></td>
												<td><input class="desc" id="f_entrega" type="text" placeholder="Fecha Entrega" ></td>
											</tr>	
										</table>
										
										
									</div>
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
                <!-- Jquery Number Mask script -->
		<script src="../../../js/jquery-number-master/jquery.number.min.js" type="text/javascript"></script>
                <!-- Formato de los Numeros de las Monedas del Apli -->
                <script type="text/javascript">
                    $(function() {
                        $('#gtos_compas').number( true, 2 );
                        $('#sub_total').number( true, 2 );
                        $('#imp_descuento').number( true, 2 );
                        $('#imp_total').number( true, 2 );
                    });
                </script>
                
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
			$( "#f_entrega" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "1950:2014",
			dateFormat:"yy-mm-dd"		
			});
		});
		</script>
		
		<script> function xd() {var textos = '';
					for (var i=1;i<document.getElementById('table_tran').rows.length;i++) {for (var j=0;j < document.getElementById('table_tran').rows[i].cells.length;j++)
						{textos = textos + document.getElementById('table_tran').rows[i].cells[j].innerHTML + ' | ';}
						textos = textos + '\n';}
						alert(textos);}
		</script>

		
		<!-- page script -->
        
                
        <script src="v_ajax_RegistroCompras.js"></script>
		<script src="v_ajax_BuscaProveedor.js"></script>
		<script src="v_ajax_BuscaProducto.js"></script>
		<script src="v_funciones.js"></script>
		<script src="v_modals.js"></script>
		<script src="json.js"></script>
    </body>
</html>
