<?php  
   
    session_start();
    $UsuarioActivo = $_SESSION['usuario'];
    include("controlSesion.php");

    
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Apoyo a la Empresa TIS</title>

    <!-- Core CSS - Include with every page -->
    <link href="../Librerias/css/bootstrap.min.css" rel="stylesheet">
   
    <link href="../Librerias/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- ComboBox estilizado ;) -->
    
    <!-- Page-Level Plugin CSS - Dashboard -->
    
    <link href="../Librerias/css/plugins/timeline/timeline.css" rel="stylesheet">
   

    <!-- SB Admin CSS - Include with every page -->
    <link href="../Librerias/css/sb-admin.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../Librerias/css/jquery-te-1.4.0.css">

    <!--link rel="stylesheet" href="../Librerias/css/awesome-bootstrap-checkbox.css"-->
    
    <script src="../Librerias/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../Librerias/js/masked_input.js"></script>
    <script src="../Librerias/js/jquery-2.1.0.min.js"></script>
     
    <script src="../Librerias/js/evaluar.js"></script>
    <link href="../Librerias/css/bootstrap-dialog.css" rel="stylesheet">
    <script src="../Librerias/js/bootstrap-dialog.js"></script>
   
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
               <a class="navbar-brand" href="inicio_asesor.php">Inicio </a>
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
                        <li><a href="unlog.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                                    <a href="../Vista/RegistrarDocumentosRequeridos.php">Registrar Documentos</a>
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
                                            <a id="Seguimiento" href="../Vista/inicio_asesor.php">Seguimiento</a>
                                        </li>
                                        
  
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

<!----------------------------------------NUEVAS PUBLICACIONES------------------------------------------>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Administrar Grupo Empresas</h2>
            <!--div class="col-lg-6"-->   
                <form method = "post" id="FormEvaluar">   
                    <?php 
                        include '../Modelo/conexion.php';
                        $conect = new conexion();
                        $SeleccionarGruposInscritos = $conect->consulta("SELECT NOMBRE_UGE FROM INSCRIPCION 
                        WHERE NOMBRE_UA='$UsuarioActivo'");

                        while ($rowGrupos = mysql_fetch_row($SeleccionarGruposInscritos)) {

                            $GruposInscritos[] = $rowGrupos[0];
                    
                        }

                        if(isset($GruposInscritos))
                        {
            
                            echo '<table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Grupo Empresa</th>
                                            <th>Rep. Legal</th>
                                            <th>Estado</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

                            $SeleccionarEstado  = $conect->consulta("SELECT ESTADO_INSCRIPCION FROM inscripcion WHERE NOMBRE_UA ='$UsuarioActivo'");

                            while ($rowEstados = mysql_fetch_row($SeleccionarEstado) ) {

                            $Estado[] = $rowEstados[0];
                        
                            }

                            for ($i=0; $i <count($GruposInscritos) ; $i++) { 
                                $SeleccionarRepresentante = $conect->consulta("SELECT REPRESENTANTE_LEGAL_GE FROM GRUPO_EMPRESA WHERE NOMBRE_U = '$GruposInscritos[$i]'");
                                $SeleccionarNota = $conect->consulta("SELECT CALIF_N FROM NOTA WHERE NOMBRE_U = '$GruposInscritos[$i]'");
                                
                                while($rowRepresentante = mysql_fetch_row($SeleccionarRepresentante))
                                {
                                    $Representante[] = $rowRepresentante[0];
                                }
                                while($rowNota = mysql_fetch_row($SeleccionarNota))
                                {
                                    $Nota[] = $rowNota[0];
                                }
                            }

                            for ($i=0; $i < count($GruposInscritos) ; $i++) { 

                                echo '<tr>
                                        <td>'.$i.'</td>
                                        <td>'.$GruposInscritos[$i].'</td>
                                        <td>'.$Representante[$i].'</td>
                                        <td>'.$Estado[$i].'</td>

                                    
                                        <td>
                                            <a href="HabilitarGrupoEmpresa.php?GE='.$GruposInscritos[$i].'&Operacion=Habilitar" 
                                            class="btn btn-default btn-xs">Habilitar</a>

                                            <a href="HabilitarGrupoEmpresa.php?GE='.$GruposInscritos[$i].'&Operacion=Deshabilitar" 
                                            class="btn btn-default btn-xs">Deshabilitar</a>

                                            <a href="ModificarEvaluacionGrupoEmpresa.php?GE='.$GruposInscritos[$i].'" 
                                            class="btn btn-default btn-xs">Modificar Evaluacion</a>
                                        </td>   
                                     </tr>'; 
                            }
                        }else{

                            echo "No tiene ninguna empresa inscrita";
                        }


                        

                    


                   

                        
                    ?> 
                        </tbody>
                    </table>
                </form>
                  
                <div id="ResultadoNota">
                    <div class="form-group">
                                        
                    </div>
                </div>                                      
            <!--/div--><!--Col-lg6-->
        </div><!--Col lg 12-->
    </div><!-- /.row -->  

</div><!--Page-Wrapper-->               
    <script src="../Librerias/js/bootstrap.min.js"></script>
    <script src="../Librerias/js/plugins/metisMenu/jquery.metisMenu.js"></script>


    <!-- SB Admin Scripts - Include with every page -->
    <script src="../Librerias/js/sb-admin.js"></script>
  
    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="../Librerias/js/demo/dashboard-demo.js"></script>
    <!-- Combo Box scripts -->
    
</body>

</html>