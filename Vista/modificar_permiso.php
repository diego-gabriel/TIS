<?php 
    session_start();
    $UsuarioActivo = $_SESSION['usuario'];
    include("controlSesion.php");

?>
	<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- JQuery -->
    <script type="text/javascript" src="../Librerias/lib/jquery-2.1.0.min.js"></script>
    <!-- icheck -->
    <link href="../Librerias/icheck/skins/square/green.css" rel="stylesheet">
    <script src="../Librerias/lib/icheck.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../Librerias/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../Librerias/lib/bootstrap.js"></script>
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
    <script type="text/javascript" src="../Librerias/lib/validator/callback.js"></script
    <script type="text/javascript" src="../Librerias/lib/validator/date.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/numeric.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/porcentajeMax.js"></script>
    <script type="text/javascript" src="../Librerias/lib/validator/porcentajeMin.js"></script>
    <!-- JS -->
    <script type="text/javascript" src="../Librerias/lib/funcion.js"></script>





    <link href="../Librerias/css/plugins/timeline/timeline.css" rel="stylesheet">
    <!-- SB Admin CSS - Include with every page -->
    <link href="../Librerias/css/sb-admin.css" rel="stylesheet">
    
    
    
    
    
    
    
    
    
    
    
       		<title>Bienvenidos a SATIS</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />

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
                <a class="navbar-brand" href="principal.php">Inicio </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
            
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo $UsuarioActivo.' '; ?><i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
  
                        <li><a href="modificar_administrador.php"><i class="fa fa-user fa-fw"></i> Modificar Datos personales</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="unlog.php"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

    </nav>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
      


      

        <div id="page-wrapper">
     			<div class="content">
				<div class="content_resize">
					<div class="mainbar">
                                            <div class="article"><br><br>
							

                                                
                                                
							<h2><span> Informacion Personal</span></h2>
			<div id="contenido">
							<?php
							
							
					                                $usuario= $_SESSION['usuario'];
								

                                                                        $usuario= $_SESSION['usuario'];
									$contrasena= $_SESSION['contrasena'];
                                                                         $idgp = $_GET['id_us'];
									

									//conexion-------------
									$conexion = mysql_connect("localhost","root","");
									//Control
									if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
									//Seleccion
									mysql_select_db("saetis",$conexion);

									//Peticion
										$peticion = mysql_query("SELECT u.NOMBRE_U,u.ESTADO_E, r.ROL_R FROM  usuario as u,usuario_rol as r  WHERE u.NOMBRE_U=r.NOMBRE_U and u.NOMBRE_U='$idgp'");
									//cerrar conexion--------------------------
									 mysql_close($conexion);
								while($fila = mysql_fetch_array($peticion))
								{
	
								echo"
								<form action='actualizar_integrante.php' method='post'>
									<center>
										<table border=0 width=80%>
											<tr>
												<td >
													<p style='text-align:left;'>Nombre:</p>
												</td>
												<td>
                                         <div class='form-group'>
                                            <div class='input-group'>
                                                <span class='input-group-addon'>
                                                  <span class='glyphicon glyphicon-user'></span>
                                                </span>
                                                <input class='form-control' type='text' name='Nombre' id='UserName'  value='".$fila['NOMBRE_U']."' readonly='readonly'  required/>
                                            </div>
                                        </div>                                                                                               

												</td>
											</tr>
											<tr>
												<td >
													<p style='text-align:left;'>Estado :</p>
												</td>
                                                                                                

												<td>
                                                                                                
                                          <div class='form-group'>
                                            <div class='input-group'>
                                                <span class='input-group-addon'>
                                                  <span class='glyphicon glyphicon-lock'></span>
                                                </span>
                                                <input class='form-control' type='text' name='Estado' id='UserPassword' readonly='readonly' value='".$fila['ESTADO_E']."'   required/>
                                            </div>
                                        </div>  
											
												</td>
                                                                                                



											</tr
											<tr>
												<td >
													<p style='text-align:left;'>Rol :</p>
												</td>
												<td>
                                                                                                
                                          <div class='form-group'>
                                            <div class='input-group'>
                                                <span class='input-group-addon'>
                                                  <span class='glyphicon glyphicon-lock'></span>
                                                </span>
                                                <input class='form-control' type='text' name='rol' id='UserPassword' readonly='readonly' value='".$fila['ROL_R']."'   required/>
                                            </div>
                                        </div>  
												</td> 
											</tr>
											
										
										</table>
									</center>
								</form> 
								";$rolAnt=$fila['ROL_R'];
								}
								?>
                            
								<?php 
                                                                
                                                                    $_SESSION["Variable1"] =$rolAnt ;
                                                                    $_SESSION["Variable2"] = $idgp;
                                                                    
                                                                ?>
							</div>

<h2><span>Modificar Informacion Personal</span></h2>
							<div id="contenido">
                                                            <center>
                                                                    <form action="modificar_permiso_tabla.php" method="post"  >
									
										<table border=0 width=80%> 
                                                                                    <tr>
												<td >
													<p style="text-align:right;"> Estado :&nbsp;&nbsp;&nbsp;</p>
												</td>
												<td>
                                                                                                    <select required="seleccione un estado" name="estado" class="form-control" ><option  value=" ">Seleccione Un Estado</option>
													<?php 
														$link=mysql_connect("localhost","root",""); 
														mysql_select_db("saetis",$link); 
														$sql="SELECT ESTADO_E FROM  estado where ESTADO_E='Habilitado' or ESTADO_E='Deshabilitado' "; 
														$result=mysql_query($sql); 
															while($row=mysql_fetch_array($result)) 
													echo "<option  value='".$row["ESTADO_E"]."'>".$row["ESTADO_E"]."</option>";  
                                                                                                                      
                                                                                                       
                                                                                                        ?>    
                                                                                                     
                                                                                                       </select> 
                                                                                                </td> 
                                                                                    </tr>             
                                                                                     <tr>            
                                                                                                 <td >
												    <p style="text-align:right;"> Rol :&nbsp;&nbsp;&nbsp;</p>
                                                                                                 </td>
                                                                                                 <td>
                                                                                                     <select required="seleccione un rol" name="roll" class="form-control"><option  value=" ">Seleccione Un Rol</option>
													<?php 
														$link=mysql_connect("localhost","root",""); 
														mysql_select_db("saetis",$link); 
														$sql="SELECT * FROM  rol "; 
														$result=mysql_query($sql); 
															while($row=mysql_fetch_array($result)) 
													echo "<option  value='".$row["ROL_R"]."'>".$row["ROL_R"]."</option>";  
                                                                                                                      
                                                                                                       
                                                                                                        ?>    
                                                                                                     
                                                                                                       </select> 
                                                                                                 </td>
                                                                                                   
						
                                                                                     </tr> 
                                                                                      <tr>
                                                                                             <td >
												    <p style="text-align:right;">&nbsp;&nbsp;&nbsp; </p>
                                                                                                 </td>
                                                                                     						<td>
                                                                                                                                    
                                                                                                <button type="submit"  align="middle" class="btn btn-primary" id="btn-registrarUser"> <span class="glyphicon glyphicon-ok"></span> Actualizar</button>
                                                                                                  
												</td>    
                                                                                     </tr>  
                                                                                     
										</table>
									
                                                            </center>
								</form>
							</div>
						
						
				
			
	      
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
						</div>
						
					</div>
			
					
			<div class="sidebar">
                            <br><br>
				<h2 class="star">Usuario :  <?php echo $_SESSION['usuario'] ?></h2>
			
               
            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        
                                <li>
                                    <a href="../Vista/registro_administrador.php"><i class="fa fa-bar-chart-o fa-files-o "></i> Nueva Cuenta<span class="fa arrow"></span></a>
                                </li>                        
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-files-o "></i> Informacion Personal <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../Vista/modificar_administrador.php">Privacidad</a>
                                </li>
                            </ul>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        
                         <li>
                            <a href="#"><i class="fa fa-tasks fa-fw"></i> Gestion de usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="lista_usuarios.php">Usuarios Registrados</a>
                                </li>
                                <li>
                                    <a href="asignar_permisos.php">Modificar Permisos Usuarios</a>
                                </li>
                                 <li>
                                     <a href="add_roles.php">Añadir  Roles</a>
                                </li>
                                <li>
                                     <a href="add_gestion.php">Añadir  Gestion</a>
                                </li>
                                 <li>
                                    <a href="lista_roles.php">Asignar Permisos Roles</a>
                                </li>
                                <li>
                                    <a href="#">Grupo Empresa <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="lista_grupoEmpresa.php"> Integrantes </a>
                                            
                                        </li>
                                        <li>
                                            <a href="ListaGrupoEmpresas.php"> Lista de Grupo Empresas </a>
                                            
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                 <li>
                                    <a href="#">Administrador <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="lista_administradores.php"> Lista de Administadores </a>
                                            
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                 <li>
                                    <a href="#">Asesor <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="lista_asesores.php"> Lista de Asesores </a>
                                            
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-building-o fa-fw"></i>Bitacora de ingresos <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                        <li>
                                            <a href="bitacora_ingreso.php">Registro</a>
                                            
                                        </li>

  
                                    </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-building-o fa-fw"></i>Enviar mensaje <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                        <li>
                                            <a href="enviar_mail.php">Nuevo Mensaje</a>
                                            
                                        </li>

  
                                    </ul>
                            <!-- /.nav-second-level -->
                        </li>                       
                        

                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
                                
                            
                           		
                        </div></div>
                        </div>
            <div class="clr"></div>	<br><br>
			<div class="footer">
			<div class="footer_resize">
				<p class="lf"></p>
				<div style="clear:both;"></div>
				</div>
			</div>
		<div align=center>
			Esta pagina desarrollada por  <a class="registrar" href=''>Bittle.S.R.L.</a>
                </div>
                        
            
        </div>
        <!-- /#page-wrapper -->

    </div>

    <script src="../Librerias/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../Librerias/js/sb-admin.js"></script>
</body>

</html>
