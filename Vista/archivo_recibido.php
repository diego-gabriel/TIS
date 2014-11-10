<?php

    include '../Modelo/conexion.php';
    header("Locate: documentos_recibidos.php");
    $con=new conexion();
    
?>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Sistema de Apoyo a la Empresa TIS</title>

    <!-- Core CSS - Include with every page -->
    <link href="../Librerias/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Librerias/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="../Librerias/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="../Librerias/css/plugins/timeline/timeline.css" rel="stylesheet">
   

    <!-- SB Admin CSS - Include with every page -->
    <link href="../Librerias/css/sb-admin.css" rel="stylesheet">
    
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
                                    <a href="#">Publicaci&oacute;n Documentos <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        
                                        <li>
                                            <a href="publicar_asesor.php">Nueva Publicaci&oacute;n </a>
                                        </li>
                                        <li>
                                            <a href="publicacion_form.php">Publicaciones </a>
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
                                    <a href="orden_cambio.php">Emitir Orden de Cambio</a>
                                </li>
                                <li>
                                    <a href="notificacion_conformidad.php">Emitir Notificaci&oacute;n de Conformidad</a>
                                </li>
                                <li>
                                    <a href="#">Seguimiento Grupo Empresa <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        
  
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                        <a href="#">Evaluacion Grupo Empresa<span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">
                                                <li>
                                                    <a href="CrearModalidadEvaluacion.php">Criterio de Evaluaci&oacute;n </a>                             
                                                </li>
                                                <li>
                                                    <a href="CrearModalidadCalificacion.php"> Criterio de Calificaci&oacute;n</a>
                                                </li>
                                                 <li>
                                                    <a href="EliminarCriterioCalificacion.php"> Eliminar Criterio de Calificaci&oacute;n</a>
                                                </li>
                                                <li>
                                                    <a href="CrearFormulario.php">Crear Formulario de Evaluacion</a>
                                                </li>
                                                <li>
                                                    <a href="EliminarFormulario.php">Eliminar Formulario de Evaluacion</a>
                                                </li>
                                                <li>
                                                    <a href="SeleccionarFormulario.php"> Seleccionar Formulario de Evaluacion </a>   
                                                </li>
                                                <li>
                                                    <a href="EvaluarGrupoEmpresa.php">Evaluar Grupo Empresa </a>   
                                                </li>
                                            </ul>
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
                    <h2 class="page-header">Propuestas Recibidas </h2>
                    <div class="col-lg-6" >
                        
                            <div class="form-group">
                                <?php
                                
                                if (isset($_POST['grupoempresa'])) {
                                    $seleccion=$_POST['grupoempresa'];
                                    if ($seleccion == 'Seleccione una grupo empresa') {
                                        echo"<script type=\"text/javascript\">alert('No seleccion\u00f3 correctamente'); window.history.back();</script>";
                                    }
                                    
                                    if ($seleccion == 'TODOS') {
                                        $c_3="SELECT DISTINCT r.`NOMBRE_R`,d.`RUTA_D` FROM `registro` AS r,`documento` AS d WHERE d.`ID_R` = r.`ID_R` AND r.`TIPO_T` LIKE 'documento subido' AND r.`NOMBRE_U` IN (SELECT ge.`NOMBRE_U` FROM `inscripcion` AS i,`asesor` AS a,`grupo_empresa` AS `ge`,`gestion` AS g,`proyecto` AS p WHERE i.`NOMBRE_UA` = a.`NOMBRE_U` AND i.`NOMBRE_UGE` = ge.`NOMBRE_U` AND i.`ID_G` = g.`ID_G` AND i.`CODIGO_P` = p.`CODIGO_P` AND a.`NOMBRE_U` LIKE '".$_POST['idAsesor']."')";
                                    $r3=$con->consulta($c_3);
                                    
                                    if(mysql_num_rows($r3) != 0)
                                    {
                                            echo "<h3><center>Listado de propuestas</center></h3><br>";
                                            echo "<form name='formularioComprimir' method='POST' action='descargar_zip.php' enctype='Multipart/form-data'>";
                                    while($var3 =  mysql_fetch_array($r3)){
                                            
                                            echo "<a class='btn btn-default btn-lg btn-block' href='..".$var3['1']."'>".$var3[0]."</a><br>";
                                            
                                        }
                                            echo "<input type='hidden' name='idAsesor' value='".$_POST['idAsesor']."'>";
                                            echo "<button type='submit' class='btn btn-primary'>Haga clic aqu&iacute; para comprimir todos los documentos</button>";
                                            echo "</form>";
                                    }
                                    else
                                    {
                                        echo  "<b>--- ERROR! NO SE ENCONTRO DOCUMENTOS</b><br><br><a class='btn btn-primary' href='documentos_recibidos.php'>VOLVER ATRAS</a> ";
                                    }
                                     
                                    }
                                    else
                                    {
                                        $ax='';
                                        $consultaAuxiliar=$con->consulta("SELECT ge.`NOMBRE_U` FROM `grupo_empresa` AS ge WHERE ge.`NOMBRE_LARGO_GE` LIKE '".$_POST['grupoempresa']."'");
                                        while ($conAux = mysql_fetch_array($consultaAuxiliar)) {
                                            $ax=$conAux['0'];
                                        }
                                        
                                        $consultaUno=$con->consulta("SELECT DISTINCT r.`NOMBRE_R`,d.`RUTA_D` FROM `registro` AS r,`documento` AS d WHERE d.`ID_R` = r.`ID_R` AND r.`TIPO_T` LIKE 'documento subido' AND r.`NOMBRE_U` LIKE '$ax'");
                                        if(mysql_num_rows($consultaUno) != 0)
                                        {
                                            while ($conAuxDos = mysql_fetch_array($consultaUno)) {
                                                echo "<a class='btn btn-default btn-lg btn-block' href='..".$conAuxDos['1']."'>".$conAuxDos[0]."</a><br>";
                                            }
                                        }
                                        else
                                        {
                                            echo  "<b> La grupo empresa no subi&oacute; propuestas</b><br><br><a class='btn btn-primary' href='documentos_recibidos.php'>Volver Atras</a> ";
                                        }
                                    }
                                    
                                }
                                
                                $con->cerrarConexion();
                                
                                
                                /*$ax='';
                                if(isset($_POST['grupoempresa'])){
                                    
                                    
                                }else{
                                    $ax="";
                                }
                                
                                if($ax=="TODOS")
                                {
                                    
                                    $c_3="SELECT DISTINCT r.`NOMBRE_R`,d.`RUTA_D` FROM `registro` AS r,`documento` AS d WHERE d.`ID_R` = r.`ID_R` AND r.`TIPO_T` LIKE 'documento subido' AND r.`NOMBRE_U` IN (SELECT ge.`NOMBRE_U` FROM `inscripcion` AS i,`asesor` AS a,`grupo_empresa` AS `ge`,`gestion` AS g,`proyecto` AS p WHERE i.`NOMBRE_UA` = a.`NOMBRE_U` AND i.`NOMBRE_UGE` = ge.`NOMBRE_U` AND i.`ID_G` = g.`ID_G` AND i.`CODIGO_P` = p.`CODIGO_P` AND a.`NOMBRE_U` LIKE '".$_POST['idAsesor']."')";
                                    $r3=$con->consulta($c_3);
                                    echo "<h2><center>Listado de propuestas</center></h2>";
                                    echo "<form methodo='post' action='descargar_zip.php'>";
                                    while($var3 =  mysql_fetch_array($r3)){
                                            echo "<a class='btn btn-default btn-lg btn-block' href='..".$var3['1']."'>".$var3[0]."</a><br>";
                                            
                                        }
                                    
                                    echo "<button type='submit' class='btn btn-primary'>Haga Clic aqui para comprimir todos los documentos</button>";
                                    echo "</form>";    
                                }

                                if(isset($_POST['Enviar'])){
                                    $c_1="SELECT count(*) "
                                            . "FROM usuario u, registro r "
                                            . "WHERE u.nombre_u=r.nombre_u and u.nombre_u like '$ax'" ;
                                    $r1=$con->consulta($c_1);
                                    $res1= mysql_fetch_row($r1);
                                    if($res1[0]==0 && $ax!="TODOS"){
                                        echo  "<b>--- ERROR! NO SE ENCONTRO DOCUMENTOS</b><br><br><a class='btn btn-primary' href='documentos_recibidos.php'>VOLVER ATRAS</a> ";
                                    }else{
                                        //echo $ax . " SI HAY CANTIDAD ".$res1[0];
                                        $c_2="SELECT r.nombre_r "
                                                . "FROM registro r, usuario u "
                                                . "WHERE r.nombre_u=u.nombre_u and u.nombre_u='".$ax."'";
                                        $r2=$con->consulta($c_2);
                                        
                                        while($var=  mysql_fetch_array($r2)){
                                            echo "<a class='btn btn-default btn-lg btn-block' href='archivos/".$var[0]."'>".$var[0]."</a><br>";
                                            
                                        }
                                    }
                                }*/
                                ?>
                            </div>
                        
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="../Librerias/js/jquery-1.10.2.js"></script>
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
