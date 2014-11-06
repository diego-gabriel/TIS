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
                                            <a id="Seguimiento" href="../Vista/inicio_asesor.php">Seguimiento</a>
                                        </li>
                                        
  
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                        <a href="#">Evaluacion Grupo Empresa<span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">
                                                <li>
                                                    <a href="CrearModalidadEvaluacion.php"> Criterio de Evaluaci&oacute;n </a>                             
                                                </li>
                                                <li>
                                                    <a href="CrearModalidadCalificacion.php">Criterio de Calificaci&oacute;n</a>
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

<!-------------------------------------------NUEVAS PUBLICACIONES------------------------------------------>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Evaluar Grupo Empresa</h2>
            <div class="col-lg-6">   
                <form method = "post" id="FormEvaluar">
                    <div class="panel panel-default">
                        <div class="panel-body">     
                                            
                            <?php 
                            include '../Modelo/conexion.php';

                            $asesor="Leticia";

                            $conect = new conexion();
                            
                            $VerificarFormulario = $conect->consulta("SELECT DISTINCT Name_Form FROM formulario WHERE Form_Estado = 'Habilitado'");
                            
                            $resultadoverificacion = mysql_fetch_row($VerificarFormulario);
                            
                            //echo $resultadoverificacion;
                            
                            
                            if(is_array($resultadoverificacion)) 
                            {
                            
                                $consultaGrupos = "SELECT NOMBRE_CORTO_GE FROM grupo_empresa";
                                $resultadoConsulta = $conect->consulta($consultaGrupos);
                                    
                                echo '<div class="form-group">';
                                echo '<label><h4>Seleccione la Grupo Empresa a evaluar:</h4></label>';
                                echo '<select name="GrupoEscogido" class="form-control" id="">';
                        
                                                
                                while($v1 = mysql_fetch_array($resultadoConsulta)){
                                    echo "<option>".$v1[0]."</option>";
                                }

                                echo "</select>";
                                echo '</div></div></div>';//Panel default---Panel-body

                                /****************************************************************/
                                $Puntajes = $conect->consulta("SELECT Puntaje_Form FROM formulario WHERE Form_Estado = 'Habilitado'");

                                while($PuntajesRes = mysql_fetch_row($Puntajes)){
                                    $PuntajesRes2[] = $PuntajesRes;
                                }

                                /***************************************************************/
                           
                                $CriteriosCalificacion = $conect->consulta("SELECT FORM_TC FROM formulario WHERE Form_Estado = 'Habilitado'");

                                while($crits = mysql_fetch_row($CriteriosCalificacion)){
                                    $criterios[] = $crits;
                                }

                                /**************************************************************/

                                $CriteriosEvaluacion = $conect->consulta("SELECT FORM_CE FROM formulario WHERE Form_Estado = 'Habilitado'");

                                while($eval = mysql_fetch_row($CriteriosEvaluacion)){
                                    $critEva[] = $eval;
                                }

                                if(isset($critEva))
                                {

                                    for ($i=0; $i < count($critEva) ; $i++) { 

                                        echo "<div>";
                                            echo '<div class="panel panel-default">';
                                                echo '<div class="panel-body">';
                                                    echo '<div class="form-group">';
                                                        echo '<strong>'.$i.'. '.$critEva[$i][0].'</strong>'.' ('.$PuntajesRes2[$i][0].' puntos)';
                                                        echo '<input type="hidden" name="valoresFormulario[]" value="'.$PuntajesRes2[$i][0].'">';
                                                    echo '</div>';

                                        /*if($criterios[$i][0] == 1)
                                        {
                                                    echo'<div class="form-group">';
                                                        echo'<div class="checkbox">';
                                                            echo'<label for="">';
                                                            echo'<input type="checkbox" name="valorInput[]" value="100">Si';
                                                            echo'</label>';
                                                        echo'</div>';

                                                        echo'<div class="checkbox">';
                                                            echo'<label for="">';
                                                            echo'<input type="checkbox" name="valorInput[]" value="0">No';
                                                            echo'</label>';
                                                        echo'</div>';
                                                    echo'</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        }
                                        else
                                        {*/
                                            /*if($criterios[$i][0] == 2)
                                            {
                                                    echo'<div class="form-group" id="1">';
                                                        echo'<div class="checkbox">';
                                                           // echo'<label for="">';
                                                                echo'<input type="checkbox" name="valorInput[]" value="100">Verdadero';
                                                            //echo'</label>';
                                                        echo'</div>';

                                                        echo'<div class="checkbox">';
                                                            //echo'<label for="">';
                                                            echo'<input type="checkbox" name="valorInput[]" value="0">Falso';
                                                            //echo'</label>';
                                                        echo'</div>';
                                                    echo'</div>';
                                                echo'</div>';
                                            echo'</div>';
                                            }
                                            else
                                            {*/
                                                if ($criterios[$i][0] == 4) {

                                                        echo'<div class="form-group">';
                                                            echo'<input type="text" name="valorInput[]" pattern="^[0-9]{1,3}" required>';
                                                        echo'</div>';
                                                    echo'</div>';
                                                echo'</div>';
                                                }
                                                else
                                                {
                                                    $criterioUsar = $criterios[$i][0];
                                                    
                                                    //echo $criterioUsar;
                                                    
                                                    //ahora busco los indicadores
                                                    $indicadores = $conect->consulta("SELECT Indicador FROM criterio_calificacion WHERE nombre_criterio_calif = '$criterioUsar'");
                                                    $valores = $conect->consulta("SELECT Puntaje_Criterio FROM criterio_calificacion WHERE nombre_criterio_calif = '$criterioUsar'");

                                                    while($ResIndicadores = mysql_fetch_row($indicadores)){

                                                        $ResIndicadores2[] = $ResIndicadores;
                                                    }
                                                    
                                                    //var_dump($ResIndicadores2);

                                                    while($ResValores = mysql_fetch_row($valores)){

                                                        $ResValores2[] = $ResValores;
                                                    }
                                                    //var_dump($ResValores2);
                                                    
                                                    //echo (count($ResIndicadores2));
                                                    
                                                    echo '<div id='.$i.'>';

                                                    for ($z=0; $z < count($ResIndicadores2) ; $z++) { 

                                                        echo'<div class="checkbox">';
                                                            
                                                            echo'<input type="checkbox" id="'.$z.'" name="valorInput[]" value="'.$ResValores2[$z][0].'">'.$ResIndicadores2[$z][0].' ('.$ResValores2[$z][0].')';
                                                           
                                                        echo'</div>';
                                                    }
                                                    echo '</div>';
                                                echo '</div>';
                                                echo '</div>';
                                                
                                                unset($ResIndicadores2);
                                                unset($ResValores2);
                                                
                                                }

                                            //}

                                        //}

                                        echo "</div>";
                                        
                                        
                                    }
                                    echo '<div class="form-group">
                                                <button type="submit" name="submit" class="btn btn-primary btn-sm" id="btn-evaluar">Evaluar</button>
                                          </div>';  
                                }
                            }
                            else
                            {
                                echo 'No tiene ningun formulario habilitado<br>';
                                echo 'Vaya al siguiente link para habilitar uno<br> ';
                                echo '<a href="http://localhost/saetis/Vista/SeleccionarFormulario.php" class="btn btn-default btn-xs">Habilitar Formulario</a>';
                                
                            }
                            ?>

                </form>
                  
                    <div id="ResultadoNota">
                        <div class="form-group">
                                        
                        </div>
                    </div>                                      
            </div><!--Col-lg6-->
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

