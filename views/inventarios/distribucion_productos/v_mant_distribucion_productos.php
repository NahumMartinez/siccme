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
        <title>Inventarios | Distribucion de Productos</title>
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
        <script src="v_valid_DistribuciontProductos.js"></script>
        

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
    <body class="skin-blue" >
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
                                <li><a href="../categorias/v_mant_categorias.php"><i class="fa fa-angle-double-right"></i> Categorias de Productos</a></li>
                                <li><a href="../tipos_productos/v_mant_tipos_productos.php"><i class="fa fa-angle-double-right"></i> Tipos de Productos</a></li>
                                <li><a href="#"> ------------------------------------------</a></li>
                                <li><a href="../localidades/v_mant_localidades.php"><i class="fa fa-angle-double-right"></i> Localidades</a></li>
                                <li><a href="../sucursales/v_mant_sucursales.php"><i class="fa fa-angle-double-right"></i> Sucursales</a></li>
                                <li><a href="../almacenes/v_mant_almacenes.php"><i class="fa fa-angle-double-right"></i> Almacenes</a></li>
				<li><a href="../estantes/v_mant_estantes.php"><i class="fa fa-angle-double-right"></i> Estantes</a></li>
				<li><a href="#"> ------------------------------------------</a></li>
                                <li><a href="../fincas/v_mant_fincas.php"><i class="fa fa-angle-double-right"></i> Fincas</a></li>
				<li><a href="#"> ------------------------------------------</a></li>
				<li><a href="../personas/v_mant_personas.php"><i class="fa fa-angle-double-right"></i> Personas</a></li>
				<li><a href="../clientes/v_mant_clientes.php"><i class="fa fa-angle-double-right"></i> Clientes</a></li>
				<li><a href="../empleados/v_mant_empleados.php"><i class="fa fa-angle-double-right"></i> Empleados</a></li>
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
                                <li><a href="pages/charts/morris.html"><i class="fa fa-angle-double-right"></i> Productos</a></li>
                                <li><a href="pages/charts/flot.html"><i class="fa fa-angle-double-right"></i> Clientes</a></li>
                                <li><a href="pages/charts/inline.html"><i class="fa fa-angle-double-right"></i> Compras</a></li>
                                <li><a href="pages/charts/inline.html"><i class="fa fa-angle-double-right"></i> Ventas</a></li>
                            </ul>
                        </li>
                        <li class="treeview active">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Inventarios</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/UI/general.html"><i class="fa fa-angle-double-right"></i> Ingreso de Productos</a></li>
                                <li class="active"><a href="#"><i class="fa fa-angle-double-right"></i> Distribucion de Productos</a></li>
                                <li><a href="pages/UI/buttons.html"><i class="fa fa-angle-double-right"></i> Control de Inventario</a></li>
                                </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">

                                <i class="fa fa-edit"></i> <span>Compras</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                            	<li><a href="pages/forms/editors.html"><i class="fa fa-angle-double-right"></i> Ingreso de Compras</a></li>
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
                        Invetarios  
                        <small>Distribucion de Productos</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li><a href="#">Invenarios</a></li>
                        <li class="active">Distribucion de Productos</li>
                    </ol>
                </section>
				
                <!-- Main content -->
                <section class="content" id="content">
					<!-- NMA : INI 22-02-2015 Creacion de Acodion para la Tabla -->
                    <div class='box box-info'>
                                
                    <!-- NMA : FIN -->            
                                                
					 <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Distribucion de Productos <small>Generar la Distribucion, y asignarla a un Almacen</small></h3>
                                    
                                    
                                </div><!-- /.box-header -->
                                
                                    
                <!-- Inicio de Creaion de Formulario de Tipos de Productos
                NMA : 22-02-2015 -->
                						
                <!-- Creacion del Formulario de Productos -->
                <fieldset style="width:400px; border-color:#000; margin-left:10px">
                <p id='alert_error' class='text-error visible'></p>
				<p id='alert_success' class='text-correcto visible'></p>
                <legend style="color:#000; border-color:#000"></legend>
                		      
                        <form method="post" action="#" name="form_Tipos" id="form_Categorias">
                            <a class="btn btn-block btn-social btn-instagram">
                                        <i class="fa fa-edit"></i> Busqueda de Productos
                            </a><p></p>
                        	<table>
                            	<tr>
                                	<td><label class="td_1">Codigo :</label></td>
                                	<td><input class="desc" id="cod_prod" name="cod_prod" type="text" placeholder="Codigo"  maxlength="15" onkeyup="Upper(cod_prod);" ></td>
                                </tr>
                            	<tr>
                                	<td><label class="td_1">Descripcion :</label></td>
                                	<td><input class="desc" id="desc_prod" name="desc_prod" type="text" placeholder="Introduzca la Descripcion" disabled></td>
                                
                                	<td><label class="td_1">Tipo Producto :</label></td>
                                	<td><input class="desc" id="desc_tipo" name="desc_tipo" type="text" placeholder="Introduzca la Descripcion" disabled></td>
                                </tr>
                                <tr>
                                    <td><label class="td_1">Precio Costo :</label></td>
                                    <td><input class="num" id="txt_preci_costo" name="txt_preci_costo" type="text" placeholder="0.00" disabled></td>
                                    <td><label class="td_1">Precio venta :</label></td>
                                    <td><input class="num" id="txt_preci_venta" name="txt_preci_venta" type="text" placeholder="0.00" disabled></td>
                                </tr>
                                <tr>
                                    <td><a class="btn btn-block btn-primary" id="botonbProd" name="botonbProd" style=" width:80px"  >Buscar
                                    <span class="glyphicon glyphicon-zoom-in"> </span> </a></td>
                                    <td><input type="hidden" value="buscaProds" name="op" id="op"></td>
                                </tr>
                                </table>
                                <br>
                                
                            <!-- Tabs de Distribucion -->
                            <!-- Custom Tabs // Tabs para los Datos Generales y el Detalle de la Compra -->
                            <a class="btn btn-block btn-social btn-instagram">
                                    <i class="fa fa-shopping-cart"></i> Almacen de Destino / Detalle de la Distribucion
                            </a><p></p>
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-home"></i> Almacen de Destino</a></li>
                                    <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-folder"></i> Datos de Distribucion</a></li>
                                    
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1"> <!-- tab-pane 1 -->
                                              
                                        <table>
                                            <tr>
                                                <td>
                                                    <label class="td_2" style="font-size:14px">Codigo :</label>
                                                </td>
                                                <td>
                                                    <input class="num" id="cod_almacen_p" type="text" maxlength="6" onkeyup="Upper(cod_almacen_p);" >
                                                </td>
                                                <td><input type="hidden" value="0" id="id_almacen_p"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="td_2" style="font-size:14px">Nombre :</label>
                                                </td>
                                                <td>
                                                    <input class="desc" type="text" id="nom_almacen_p" value="" disabled />
                                                </td>
                                                <td>
                                                    <label class="td_2" style="font-size:14px" >No.Estantes :</label>
                                                </td>
                                                <td>
                                                    <input  class="num" type="text" id="num_estantes_p" value="" disabled />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="td_2" style="font-size:14px" >Sucursal :</label>
                                                </td>
                                                <td>
                                                    <input class="desc" type="text" id="sucursal_p" value="" disabled />
                                                </td>
                                            
                                                <td>
                                                    <label class="td_2" style="font-size:14px" >Encargado :</label>
                                                </td>
                                                <td>
                                                    <input class="desc" type="text" id="encargado_p" value="" disabled />
                                                </td>
                                            </tr>
                                        </table><hr>
                                        <table>  
                                            <tr>    
                                                <td>
                                                    <label class="td_2" style="font-size:14px" >Disponible :</label>
                                                </td>
                                                <td>
                                                    <input class="num" type="text" id="cant_real_p" value="" disabled />
                                                </td>
                                                
                                                <td>
                                                    <label class="td_2" style="font-size:14px" >Ult. Compra :</label>
                                                </td>
                                                <td>
                                                    <input class="num" type="text" id="ult_compra_p" value="" disabled />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="td_2" style="font-size:14px" >Cant. Max. :</label>
                                                </td>
                                                <td>
                                                    <input class="num" type="text" id="cant_max_p" value="" disabled />
                                                </td>
                                                
                                                <td>
                                                    <label class="td_2" style="font-size:14px" >Cant. Min. :</label>
                                                </td>
                                                <td>
                                                    <input class="num" type="text" id="cant_min_p" value="" disabled />
                                                </td>
                                                
                                                <td>
                                                    <label class="td_2" style="font-size:14px" >Cant. Reord. :</label>
                                                </td>
                                                <td>
                                                    <input class="num" type="text" id="cant_reord_p" value="" disabled />
                                                </td>
                                                
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                <!-- Boton Modal de Almacenes -->
                                                <a class="btn btn-block btn-primary" style=" width:80px" id="btnShowAlmacen"  data-toggle="modal" data-target="#compose-modal">Buscar
                                                <span class="glyphicon glyphicon-zoom-in"> </span> </a>
                                                <input type="hidden" value="0" id="id_almacen"></td>
                                            </tr>        
                                        </table>
                                    </div><!-- /.tab-pane 1 Datos de Distribucion -->    
                                    <div class="tab-pane" id="tab_2"> <!-- tab-pane 2 -->
                                        <div id="load" style=" display: none" ><img src="../../../img/ajax-loader1.gif" /> </div>
                                        <!-- <center><b> Inventario del Producto </b></center><br> -->
                                        <h3 class="box-title">Inventario del Producto </h3>
                                        <table>
                                            
                                            <!-- Small boxes (Stat box) -->
                                            <div class="row">
                                                <div class="col-lg-3 col-xs-6" style="width: 220px">
                                                    <!-- small box Disponibilidad del Producto-->
                                                    <div class="small-box bg-green">
                                                        <div class="inner">
                                                            <h3 id="c_real" >0</h3>
                                                            <p>Cant. Disponible</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion ion-ios7-cart-outline"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer">
                                                            Cant. Real en Almacen 
                                                        </a>
                                                    </div>
                                                </div><!-- ./col FIN. Disponibilidad del Producto -->
                                                <div class="col-lg-3 col-xs-6" style="width: 220px">
                                                    <!-- small box Cantidad de Punto de Reorden -->
                                                    <div class="small-box bg-yellow">
                                                        <div class="inner">
                                                            <h3 id="c_reord" >0</h3>
                                                            <p>Punto de Reorden</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion ion-ios7-briefcase-outline"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer">
                                                            Pto. de Reorden
                                                        </a>
                                                    </div>
                                                </div><!-- ./col FIN Cantidad de Punto de Reorden -->
                                                
                                                <div class="col-lg-3 col-xs-6" style="width: 220px">
                                                    <!-- small box -->
                                                    <div class="small-box bg-blue">
                                                        <div class="inner">
                                                            <h3 id="c_max" >0</h3>
                                                            <p>Maximo en </p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion ion-ios7-pricetag-outline"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer">
                                                            Cant. Maxima
                                                        </a>
                                                    </div>
                                                </div><!-- ./col -->

                                            </div><!-- /.row -->
                                        </table>
                                    
                                        <hr>
                                        <h3 class="box-title">Datos del Estante </h3>
                                        <table>
                                            <tr>
                                                <td><label class="td_1">Estante :</label></td>
                                                <td><SELECT class="combo" name="combo_almacen"  id="combo_almacen" >
                                                    <option value="0">Seleccione un Estante ...</option>
                                                            
                                                    </SELECT>
						</td>
                                            </tr>
                                            <tr>
                                                <td><label class="td_1">No. Filas :</label></td>
                                                <td><input class="num" id="no_filas" name="no_filas" type="text" disabled></td>
                                                <td><label class="td_1">No. Columnas :</label></td>
                                                <td><input class="num" id="no_columnas" name="no_columnas" type="text" disabled></td>
                                            </tr>
                                            
                                            <tr>
                                                <td><label class="td_1">Pos. Fila :</label></td>
                                                <td><input class="num" id="pos_filas" name="pos_filas" type="text" value="0"></td>
                                                <td><label class="td_1">Pos. Columna :</label></td>
                                                <td><input class="num" id="pos_columnas" name="pos_columnas" type="text" value="0" ></td>  
                                            </tr>
                                            
                                            <tr>
                                                <td><label class="td_1">Cantidad :</label></td>
                                                <td><input class="num" id="cant_articulos" name="cant_articulos" type="text" value="0"></td>
                                                
                                            </tr>
                                            
                                        </table>
                                        
                                    </div><!-- /.tab-pane 2 Datos Generales de la Distribucion -->
                                    
                            </div><!-- nav-tabs-custom -->
                            
                            <table><!-- Botones del Formulario -->     
                                <tr>
                                    <td><input class="btn btn-warning" type="button" value="Nuevo" id="demo12" name="demo12" ></td>
                                                                    
                                    <!-- Boton Distribuir Productos -->
                                    <td><a class="btn btn-success" id="btnDistribucion" name="btnDistribucion" style=" width:105px"  >Distribuir
                                    <span class="fa fa-check-square-o"> </span> </a></td>
                                    
                                </tr>
                            </table>
                        </form>
                </fieldset><br>
                <!-- Final de Creaion de Formulario de Categorias
                NMA : 22-02-2105 -->
                
                        <!-- COMPOSE MESSAGE MODAL / Almacenes -->
                        <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" style=" width:700px">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-fw fa-truck"></i> Datos de Almacen</h4>
                                    </div>
                                    <form action="#" method="post" id="form_BuscaAlmacen">
                                        <div class="modal-body">
                                            <table>
                                                    <tr>
                                                        <td>
                                                            <label class="td_2" style="font-size:14px">Codigo :</label>
                                                        </td>
                                                        <td>
                                                            <input class="num" id="cod_almacen_1" type="text" maxlength="6" onkeyup="Upper(cod_almacen_1);" >
                                                        </td>
                                                        <td><input type="hidden" value="0" id="id_almacen"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="td_2" style="font-size:14px">Nombre :</label>
                                                        </td>
                                                        <td>
                                                            <input class="desc" type="text" id="nom_almacen" value="" disabled />
                                                        </td>
                                                        <td>
                                                            <label class="td_2" style="font-size:14px" >No.Estantes :</label>
                                                        </td>
                                                        <td>
                                                            <input  class="num" type="text" id="num_estantes" value="" disabled />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="td_2" style="font-size:14px" >Sucursal :</label>
                                                        </td>
                                                        <td>
                                                            <input class="desc" type="text" id="sucursal" value="" disabled />
                                                        </td>
                                                        <td>
                                                            <label class="td_2" style="font-size:14px" >Empleado :</label>
                                                        </td>
                                                        <td>
                                                            <input  class="desc" type="text" id="emple_almacen" value="" disabled />
                                                        </td>
                                                        <td><input type="hidden" value="buscaAlmacen" id="op1" name="op1"></td>
                                                    </tr>

                                                </table>

                                        </div>
                                        <div class="modal-footer clearfix">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                                            <button type="button" id="btnBAlm" class="btn btn-primary pull-left" ><i class="fa fa-refresh"></i> Buscar</button>
                                            <button type="reset" class="btn btn-primary pull-left" ><i class="fa fa-eraser"></i> Limpiar</button>
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        
                                </div><!-- /.box-body -->
                               
                            </div><!-- /.box -->
                            	
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
        <div id="div.growlUI">
            
            
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
        
		<script>
			function cargarDiv(div,url)
			{
                            $(div).load(url);
			}
		</script>
                
                <!-- Script de Notificaciones Web -->
                <script>
                 $(document).ready(function() {
                     
                    $('#demo12').click(function() {
                    var me = '<h3>Los Datos seran Cargados ...</h3>' ;    
                    $.blockUI({ css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .6,
                        color: '#fff'
                    },
                    
                    message: me
                    });
                    
                    setTimeout($.unblockUI, 2000);
                    });
                });
                </script>  
                
                <!-- Script de Solo Numeros -->
                <script>
                $(document).ready(function (){
                    $('#pos_filas').keyup(function (){
                    this.value = (this.value + '').replace(/[^0-9]/g, '');
                    });
                });
                </script>
                               
        <!-- <script src="v_ajax_DistribucionEstProductos.js"></script> -->
        <script src="v_ajax_BuscarAlmacen.js"></script>
        <script src="v_ajax_BuscarProductos.js"></script>
        <script src="v_ajax_DistribucionEstProductos.js"></script>
        <script src="../../../js/plugins/blockUI.js" type="text/javascript"></script>
	<!-- <script src="v_ajax_TablaProductos.js"></script -->
    </body>
</html>
