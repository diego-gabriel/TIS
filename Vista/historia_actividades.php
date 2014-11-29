<!DOCTYPE html>
<?php 
session_start();
 $usuario= $_SESSION['usuario'];

 
 
  							$conexion = mysql_connect("localhost","root","","saetis");
								//Control
								if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
								//Seleccion
								mysql_select_db("saetis",$conexion);
								//Peticion
								$peticion22 = mysql_query("SELECT `NOMBRE_UA` FROM `inscripcion` WHERE `NOMBRE_UGE`='$usuario'");
                                                                     while ($correo = mysql_fetch_array($peticion22))
                                                                       {        
                                                                              $asesor=$correo["NOMBRE_UA"];} 
?>

<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Apoyo a la Empresa TIS</title>

    <!-- JQuery -->
    <script type="text/javascript" src="../Librerias/lib/jquery-2.1.0.min.js"></script>
    <!-- icheck -->
    <link href="../Librerias/icheck/skins/square/green.css" rel="stylesheet">
    <script src="../Librerias/lib/icheck.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../Librerias/css/bootstrap.min.css" rel="stylesheet">
   
    <!-- Docs -->
    <link rel="stylesheet" type="text/css" href="../Librerias/lib/css/docs.css">
    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="../Librerias/font-awesome/css/font-awesome.css">
    <!-- Bootstrap-datetimepicker -->
    <link rel="stylesheet" type="text/css" href="../Librerias/lib/css/bootstrap-datetimepicker.css">
    <script type="text/javascript" src="../Librerias/lib/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../Librerias/lib/bootstrap-datetimepicker.es.js"></script>
    <!-- Bootstrap-multiselect -->
    <link rel="stylesheet" type="text/css" href="../Librerias/lib/css/bootstrap-multiselect.css">
    <script type="text/javascript" src="../Librerias/lib/bootstrap-multiselect.js"></script>
    <!-- Bootstrap-validator -->
    <link rel="stylesheet" type="text/css" href="../Librerias/lib/css/bootstrapValidator.css">
    <script type="text/javascript" src="../Librerias/lib/bootstrapValidator.js"></script>
    <!-- Validators -->
    
    
    <script type="text/javascript" src="../Librerias/lib/validator/diferenteActividadPlanificacion.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/diferenteEntregable.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/stringLength.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/notEmpty.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/callback.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/date.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/numeric.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/porcentajeMax.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/porcentajeMin.js"></script>
    <!-- JS -->
    <script type="text/javascript" src="../Librerias/lib/funcion.js"></script>
    



    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="../Librerias/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="../Librerias/css/plugins/timeline/timeline.css" rel="stylesheet">
    <!-- SB Admin CSS - Include with every page -->
    <link href="../Librerias/css/sb-admin.css" rel="stylesheet">
    
    
    	<link href="css/tabla-div1.css" rel="stylesheet" type="text/css" />
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
                                    <a href="#" >Subir Documentos <span class="fa arrow"></span></a>
                                 
                                </li>
                                <li>
                                    <a href="publicacion_grupo.php">Recepci&oacute;n Documentos </a>
                                    
                                </li>
                               
                            </ul>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        
                         <li>
                            <a href="#"><i class="fa fa-tasks fa-fw"></i> Tareas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php
                                                 $idUsuarioAsesor='leticia';
                                                 $idUsuarioG='freevalue';
                                echo   ""
                                     . "<form name='formularioNombre' action='verificar_nombre.php' enctype='multipart/form-data' method='POST'>"
                                     . "<input type='hidden' name='nombreGrupo' value='$idUsuarioG'>"
                                     . "<input type='hidden' name='nombreAsesor' value='$idUsuarioAsesor'>"
                                     . "</form>"
                                     . "<li>"
                                     . "<a href='javascript:document.formularioNombre.submit();'>Verificar Nombre de Empresa</a>"
                                     . "</li>";
                                ?>
                                <li>
                                    <a href="seleccionar_asesor.php">Seleccionar Asesor</a>
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

<!-------------------------------------------NUEVAS PUBLICACIONES------------------------------------------>
<div id="page-wrapper">
           
<form id = "ordenc" method = "post" action="" role="form" enctype="multipart/data-form" onsubmit="return validarCampos(ordenc)">
        <div class ="form-horizontal">
                        <div class="col-lg-12">
                            <h1> HISTORIA DE ACTIVIDADES</h1><br><br>
                </div>

                    <div class="historia">
                        
                               <h2><span>ACTIVIDADES EN LINEA</span></h2>
			</div>
                   <hr>
                                <div class="historia1">
							<div class="contenedor-fila2">
									
								<div class="contenedor-columna">
									<?php
										echo "Nombre";
									?>
								</div>	
								<div class="contenedor-columna">
									<?php
										echo "Fecha Inicio";
									?>
								</div>
		
								<div class="contenedor-columna">
									<?php
										echo "Hora Inicio";
									?>
								</div>
								<div class="contenedor-columna">
									<?php
										echo "Fecha Fin ";
									?>
								</div>
								<div class="contenedor-columna">
									<?php
										echo "Hora Fin";
									?>
								</div>
							</div>  
							<?php
								//crear conexion---------------------------
								$conexion = mysql_connect("localhost","root","","saetis");
								//Control
								if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
								//Seleccion
								mysql_select_db("saetis",$conexion);
								//Peticion
								$peticion = mysql_query("SELECT  r.nombre_r, p.fecha_inicio_pl, p.hora_inicio_pl, p.fecha_fin_pl, p.hora_fin_pl
                FROM plazo p, registro r, tipo t
                WHERE t.TIPO_T = r.TIPO_T
                AND p.ID_R = r.ID_R
                AND r.TIPO_T =  'documento requerido' 
                AND r.NOMBRE_U = '$asesor'
               ");
							

								while($fila = mysql_fetch_array($peticion))
								{
							?>
								<div class="contenedor-fila">
									   <div class="contenedor-columna">
										<?php
											echo $fila['nombre_r'];
										?>
									</div>
									
									<div class="contenedor-columna">
										<?php
											echo $fila['fecha_inicio_pl'];
										?>
									</div>
			
									<div class="contenedor-columna">
										<?php
											echo $fila['hora_inicio_pl'];
										?>
									</div>
									
									<div class="contenedor-columna">
										<?php
											echo $fila['fecha_fin_pl'];
										?>
									</div>
									
									<div class="contenedor-columna">
										<?php
											echo $fila['hora_fin_pl'];
										?>
									</div>
                                                                      
									
								</div>
								<?php
								}

								//Cerrar
								mysql_close($conexion);
							
				
						?>	
                                                      </div>	
					
						
					
           
    <hr>
                    

                    
                    
                    
                    
                    
                    
                    
                    
                    
        <div class ="form-horizontal">

                    <div class="historia">
                        
                               <h2><span>HISTORIAL DE DOCUMENTOS</span></h2>
			</div>
                   <hr>
                                <div class="historia1">
							<div class="contenedor-fila2">
									
								<div class="contenedor-columna">
									<?php
										echo "ID ";
									?>
								</div>	
								<div class="contenedor-columna">
									<?php
										echo "Asesor";
									?>
								</div>
		
								<div class="contenedor-columna">
									<?php
										echo "Descripcion";
									?>
								</div>
								<div class="contenedor-columna">
									<?php
										echo "Fecha ";
									?>
								</div>
								<div class="contenedor-columna">
									<?php
										echo "Hora";
									?>
								</div>
							</div>  
							<?php
								//crear conexion---------------------------
								$conexion = mysql_connect("localhost","root","","saetis");
								//Control
								if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
								//Seleccion
								mysql_select_db("saetis",$conexion);
								//Peticion
								$peticion = mysql_query("SELECT `ID_R`,`NOMBRE_U`,`NOMBRE_R`,`FECHA_R`,`HORA_R` FROM `registro` WHERE `TIPO_T`='publicaciones' and `NOMBRE_U`='$asesor'
               ");
							

								while($fila = mysql_fetch_array($peticion))
								{
							?>
								<div class="contenedor-fila">
									   <div class="contenedor-columna">
										<?php
											echo $fila['ID_R'];
										?>
									</div>
									
									<div class="contenedor-columna">
										<?php
											echo $fila['NOMBRE_U'];
										?>
									</div>
			
									<div class="contenedor-columna">
										<?php
											echo $fila['NOMBRE_R'];
										?>
									</div>
									
									<div class="contenedor-columna">
										<?php
											echo $fila['FECHA_R'];
										?>
									</div>
									
									<div class="contenedor-columna">
										<?php
											echo $fila['HORA_R'];
										?>
									</div>
                                                                      
									
								</div>
								<?php
								}

								//Cerrar
								mysql_close($conexion);
							
				
						?>	
                                                      </div>	
					
						
					</div>
           
    <hr>
                    

                    
                    
                    
                    
                    
                    
                    
                    
                    
                 
  </form>
             
    <!--Modal para adjuntar recursos/documentos-->
         
      
    </div>
    <!-- /#wrapper -->
    

    <!-- Core Scripts - Include with every page -->
 
 

    <script src="../Librerias/js/bootstrap.min.js"></script>
    <script src="../Librerias/js/plugins/metisMenu/jquery.metisMenu.js"></script>


    <!-- SB Admin Scripts - Include with every page -->
    <script src="../Librerias/js/sb-admin.js"></script>
  
    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="../Librerias/js/demo/dashboard-demo.js"></script>
    <!-- Combo Box scripts -->
 
  
<script type="text/javascript">
     

</script>
</body>

</html>





