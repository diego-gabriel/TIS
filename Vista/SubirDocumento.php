
<!DOCTYPE html>
<?php
    include '../Modelo/conexion.php';
    session_start();
    $con=new conexion();
    $UsuarioActivo = $_SESSION['usuario'];
    $VerificarUsuario = $con->consulta("SELECT NOMBRE_U FROM usuario WHERE NOMBRE_U = '$UsuarioActivo' ");
    $VerificarUsuario2 = mysql_fetch_row($VerificarUsuario);
    
    $UsuarioGE = $UsuarioActivo;
    
    if (!is_array($VerificarUsuario2)) {   
    $consultaGE="SELECT `NOMBRE_U` FROM socio WHERE `NOMBRES_S` = '$UsuarioActivo'";
    $conGE_=$con->consulta($consultaGE);
    $NombreUsuario=mysql_fetch_row($conGE_);

    $UsuarioGE=$NombreUsuario[0];

}

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
    <script type="text/javascript" src="../Librerias/js/subir_documento.js"></script>

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
                <a class="navbar-brand" href="inicio_grupo_empresa.php">Inicio </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo $UsuarioActivo.' '; ?><i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <?php
                            if (is_array($VerificarUsuario2)) {   
                        ?>
                        <li><a href="ModificarGrupoEmpresa.php"><i class="fa fa-user fa-fw"></i> Modificar Datos personales</a>
                        </li>
                        <?php
                            }else{
                        ?>
                        <li><a href="ModificarSocio.php"><i class="fa fa-user fa-fw"></i> Modificar Datos personales</a>
                        </li>
                         <?php
                              }        
                         ?>
                        <li class="divider"></li>
                        <li><a href="unlog.php"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
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
                                    <a href="#" >Subir Documentos <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                    <?php
                                    
                                      //include '../Modelo/conexion.php';
                                      $conect = new conexion();
                                      
                                      $SeleccionrAsesor = $conect->consulta("SELECT NOMBRE_UA FROM inscripcion WHERE NOMBRE_UGE='$UsuarioGE'");
                                      
                                      $Asesor = mysql_fetch_row($SeleccionrAsesor);
                                      
                                      $SeleccionarDocReq = $conect->consulta("SELECT NOMBRE_R FROM registro WHERE NOMBRE_U = '$Asesor[0]' AND TIPO_T='documento requerido' ");
                                      
                                      while ($rowDocs = mysql_fetch_row($SeleccionarDocReq))
                                      {
                                          echo '<li>
                                                  <a href="SubirDocumento.php?doc='.$rowDocs[0].'">'.$rowDocs[0].'</a>
                                                </li>';    
                                      }
                                    ?>
                                    </ul>
                                </li>
                                <li>
                                    <a href="publicacion_grupo.php">Recepci&oacute;n Documentos </a>
                                    
                                </li>
                               
                            </ul>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        <?php
                            if (is_array($VerificarUsuario2)) {   
                        ?>
                         <li>
                             
                            <a href="#"><i class="fa fa-tasks fa-fw"></i> Tareas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
                                
                                <li>
                                    <a href="seleccionar_asesor.php">Seleccionar Asesor</a>
                                </li>
                                
                                 <li>
                                     <a href="InscripcionGEProyecto.php">Inscribirse a proyecto</a>
                                </li>
                                
                                <li>
                                     <a href="AnadirSocio.php">Añadir socios</a>
                                </li>
                                
                                <li>
                                    <a href="AnadirRL.php">Seleccionar Representante legal</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php
                                }
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-warning fa-fw"></i> Notificaciones<span class="fa arrow"></span></a>
                                                    
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="historia_actividades.php">Historia de actividades</a>
                                </li>
                                
                            </ul>  
                            </li>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-building-o fa-fw"></i> Actividades<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a id="registrarPlanificacion" href="#">
                                        <i class="fa fa-pencil-square-o fa-fw"></i>Registrar Planificaci&oacute;n
                                    </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-question-circle fa-fw"></i> Ayuda <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="lista-de-noticias-grupo.php"><i class="fa fa-comment"></i> Foro</a>
                                
                            </ul>
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
                    <h2 class="page-header">Subir Documento</h2>
                    <div class="col-lg-6" >
                        
                        <?php
                        date_default_timezone_set('America/Puerto_Rico');
                        $HoraActual = date("H:i:s");
                        $FechaActual = date('Y:m:j');

                       
                        $VerificarIns= $con->consulta("SELECT NOMBRE_U FROM inscripcion_proyecto WHERE NOMBRE_U = '$UsuarioGE' ");
                            $VerificarIns2 = mysql_fetch_row($VerificarIns);
                            if (!is_array($VerificarIns2))
                            {
                                echo "<h4>Para subir su propuesta primero debe inscribirse a un proyecto</h4>";
                            }
                            else{  

                                $Doc = $_GET['doc'];

                                $SeleccionarIdDoc = $conect->consulta("SELECT ID_R from registro where NOMBRE_R = '$Doc'");

                                $IdDoc = mysql_fetch_row($SeleccionarIdDoc);

                                $SeleccionarFechas = $conect->consulta("SELECT FECHA_INICIO_PL, FECHA_FIN_PL, HORA_INICIO_PL, HORA_FIN_PL from registro r, plazo p WHERE r.ID_R = p.ID_R AND r.ID_R = '$IdDoc[0]' ");

                                $fechas = mysql_fetch_row($SeleccionarFechas);

                                //var_dump($fechas);


                                $VerificarDisponibilidad = $conect->consulta("SELECT * from plazo p WHERE ID_R = '$IdDoc[0]' AND FECHA_FIN_PL >='$FechaActual' AND HORA_FIN_PL >= '$HoraActual'");

                                $DocDisponible = mysql_fetch_row($VerificarDisponibilidad);

                                if(is_array($DocDisponible))
                                {
                                    echo '<div class="form-group">';


                                    echo 'La entrega esta disponible desde la fecha '.$fechas[0].' a horas '.$fechas[2].' hasta la fecha '.$fechas[1].' a horas '.$fechas[3].'';
                                    echo '</div>';

                                    echo '
                                        <form action="GuardarSubirDocumento.php" method="POST" enctype="multipart/form-data">
                                            <fieldset>
                                                <div class="form-group">
                                                    <input name="archivoA" id="archivoA" type="file" class = "btn btn-primary" required>
                                                </div>
                                            
                                                <div class="form-group">
                                                    <input type="submit" value="Subir Documento" class= "btn btn-primary">
                                                </div>
                                            </fieldset>
                                        </form>';

                                }else{

                                    echo "No esta disponible la subida del documento";
                                }




                                
                            }
                        
                        ?>
                        
                        
                       
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
