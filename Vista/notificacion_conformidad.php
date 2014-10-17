<!DOCTYPE html>

<?php
include "../Modelo/conexion.php";

date_default_timezone_set('America/Argentina/Tucuman');
$fecha=  date('Y-m-d');
$hora= date('G:H:i');
$clas = new conexion();
$idAsesor='leticia';
$resultado = $clas->consulta("SELECT ge.`NOMBRE_LARGO_GE` FROM `asesor` AS a,`grupo_empresa` AS ge,`gestion` AS g,`inscripcion` AS i WHERE a.`NOMBRE_U` = i.`NOMBRE_UA` AND ge.`NOMBRE_U` = i.`NOMBRE_UGE` AND g.`ID_G` = i.`ID_G` AND g.`FECHA_FIN_G` >= '$fecha' AND g.`FECHA_INICIO_G` <= '$fecha' AND a.`NOMBRE_U` LIKE '$idAsesor'");

?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Apoyo a la Empresa TIS</title>

    
    
    
    <link href="../Librerias/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Librerias/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="../Librerias/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="../Librerias/css/plugins/timeline/timeline.css" rel="stylesheet">
   
    
    <link rel="stylesheet" type="text/css" media="all" href="../Librerias/calendario/daterangepicker-bs3.css" />
    <script type="text/javascript" src="../Librerias/js/jquery.min.js"></script> 
    <script type="text/javascript" src="../Librerias/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Librerias/calendario/moment.js"></script>
      
    <script type="text/javascript" src="../Librerias/calendario/daterangepicker.js"></script>

    <!-- SB Admin CSS - Include with every page -->
    <link href="../Librerias/css/sb-admin.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="../Librerias/calendario2/jquery.datetimepicker.css"/>
    <script type="text/javascript" src="../Librerias/js/validacionCamposFecha.js"></script>
    
    
    
    
    <script type="text/javascript" src="../Librerias/js/calendario_notacion_conformidad.js"></script>
    <script type="text/javascript" src="../Librerias/js/validar_notificacion.js"></script>
   
    
    

</head>

<body>

   
    <div id="wrapper">
       
        
		<!--<h2>design by <a href="#" title="flash templates">flash-templates-today.com</a></h2>-->
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Inicio </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-files-o "></i> Documentos <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                            <a href="../Vista/subirarchivoasesor.php">Subir Documentos</a>
                                </li>
                                
                                <li>
                                    <a href="#">Publicaci&oacute;n Documentos <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        
                                        
                                        <li>
                                            <a href="../Vista/publicar_asesor.php">Nueva Publicaci&oacute;n </a>
                                        </li>
                                        <li>
                                            <a href="../Controlador/publicaciones.php">Publicaciones </a>
                                        </li>
                                       
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">Recepci&oacute;n Documentos <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="documentos_recibidos.php">Documentos Recibidos</a>
                                        </li>
                                        <li>
                                            <a href="ConfiguracionFechasRecepcion.php" ><span class="fa fa-calendar-o"></span> Configuraci&oacute;n de Fechas para la Recepci&oacute;n de Documentos</a>
                                            
                                        </li>
         
                                    </ul>
                                </li>
                               
                            </ul>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        
                         <li>
                            <a href="#"><i class="fa fa-tasks fa-fw"></i> Tareas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="ordendecambioempresas.php">Emitir Orden de Cambio</a>
                                </li>
                                <li>
                                    <a href="notificacion_conformidad.php">Emitir Notificaci&oacute;n de Conformidad</a>
                                </li>
                                <li>
                                    <a href="#">Seguimiento Grupo Empresa <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="CrearModalidadEvaluacion.php"> Modalidad de Evaluaci&oacute;n </a>
                                            
                                        </li>
                                        <li>
                                            <a href="#">Modalidades de Calificaci&oacute;n</a>
                                        </li>
                                        <li>
                                            <a id="Seguimiento" href="../Vista/inicio_asesor.php">Seguimiento</a>
                                        </li>
  
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-warning fa-fw"></i> Notificaciones</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-building-o fa-fw"></i> Actividades<span class="fa arrow"></span></a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-question-circle fa-fw"></i> Ayuda <span class="fa arrow"></span></a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        
	
        
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Emitir Notificaci&oacute;n de Conformidad</h2>
                    <div class="col-lg-6" >
                        <form name="formulario1" role=form" method="post" enctype="multipart/data-form" onsubmit="return validarCampos(this)">
                            <div class="form-group">
                                <label>Escoja el Nombre de La Grupo Empresa:</label>
                                <select name="lista" class="form-control">
                                                <?php
                                                
                                                
                                                
                                                 while ($i = mysql_fetch_array($resultado))
                                                    {
                                                        echo "<option value = '".$i['0']."'>".$i[0]."</option>";
                                                    }
                                                    echo "<input type='hidden' name='idUsuarioAsesor' value='$idAsesor'>";
                                                ?>
                                </select><br>
                                
                                
                                <!--llenamos los puntos-->
                                <label>Califique la puntuaci&oacute;n:<br><br></label><br>
                                <label>Cumplimiento de especificaciones del proponente (sobre 15 puntos):</label>
                                <input class="form-control" name="cali1" onkeypress="return validarNumeros(event)">
                                <label>Claridad en la organizaci&oacute;n de la empresa proponente (sobre 10 puntos):</label>
                                <input class="form-control" name="cali2" onkeypress="return validarNumeros(event)">
                                <label>Cumplimiento de especificaciones t&eacute;cnicas (sobre 30 puntos):</label>
                                <input class="form-control" name="cali3" onkeypress="return validarNumeros(event)">
                                <label>Claridad en el proceso de desarrollo (sobre 10 puntos):</label>
                                <input class="form-control" name="cali4" onkeypress="return validarNumeros(event)">
                                <label>Plazo de ejecuci&oacute;n (sobre 10 puntos):</label>
                                <input class="form-control" name="cali5" onkeypress="return validarNumeros(event)">
                                <label>Precio total (sobre 15 puntos):</label>
                                <input class="form-control" name="cali6" onkeypress="return validarNumeros(event)">
                                <label>Uso de herramientas en el proceso de desarrollo (sobre 10 puntos):</label>
                                <input class="form-control" name="cali7" onkeypress="return validarNumeros(event)">
                                
                                <label>Fecha de la reuni&oacute;n:</label>
                                <input class="form-control" name="fecha" id="fecha"  placeholder="AAAA-MM-DD" readonly="readonly">
                                <label>Hora de la reuni&oacute;n:</label>
                                <input class="form-control" name="hora" id="hora"  placeholder="HH:MM" readonly="readonly">
                                <label>Lugar de la reuni&oacute;n:</label>
                                <input class="form-control" name="lugar">
                                <br>
                                <button type="submit" onclick="this.form.action='enviar_notificacion_conformidad_pdf.php'" class="btn btn-primary">Emitir</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="submit" onclick="this.form.action='ver_notificacion_conformidad_pdf.php'" class="btn btn-primary" >Ver Modelo del Documento</button>
                                
                            </div>
                        </form>
                        <script type="text/javascript" src="../Librerias/calendario2/jquery.js"></script>
                        <script type="text/javascript" src="../Librerias/calendario2/jquery.datetimepicker.js"></script>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
   <!--<script src="js/jquery-1.10.2.js"></script>-->
    
    
    
    
    
    
    
    <script src="../Librerias/js/bootstrap.min.js"></script>
   
    
    
    
    
    <script src="../Librerias/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="../Librerias/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="../Librerias/js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="../Librerias/js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="../Librerias/js/demo/dashboard-demo.js"></script>
     
    
</body>

</html>
