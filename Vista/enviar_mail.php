<?php 
    session_start();
    $UsuarioActivo = $_SESSION['usuario'];
      include '../Modelo/conexion.php';
    $conectar = new conexion();

?>
	<html>

<head>

    		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link href="css/tabla-div.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
		
		<script type="text/javascript" src="js/cufon-yui.js"></script>
		<script type="text/javascript" src="js/cufon-aller.js"></script>
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/coin-slider.min.js"></script>
		<script type="text/javascript" src="js/iconos.js"></script>
    
    
    
    
    
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
                                            
                                                         <br>
					<div class="mainbar">
						<div class="article">
                                                           <div class="row">
                                                               <div class="col-lg-12"></div>
							<h2><span>Enviar Email</span></h2>	
							
                                                        
                                        
							<h3><p>Debe de rellenar todos los campos correctamente</p></h3>
							<div id="contenido">
			
								<form action="crear_mail.php" method="post">
									<center>
										<table border=0 width=100%>
											<tr>
												<td >
                                                                                                    <p style="text-align:left;"  >Destinatario:</p><br>
												</td>
												<td>
													<select required name='dest' class="form-control"  ><option value="" >-     Seleccione Destinatario     -</option>
													<?php 
													
														$sql=$conectar->consulta("SELECT NOMBRE_U from usuario"); 
														
															while($row=mysql_fetch_array($sql)) 
																echo "<option  value='".$row["NOMBRE_U"]."'>" 
																 .$row["NOMBRE_U"]."</option>"; 
													?>	
												</td>

											</tr>
                                                                                                                                                       <td >
													<p style="text-align:left;" >Fecha :</p>
												</td>
												<td>
		
                                                                                                        
                                            <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <span class="glyphicon glyphicon-envelope"></span>
                                                </span>
                                                <input class="form-control" type="date" name="fec" size=48% id="UserEmail" placeholder="AAAA-MM-DD"  required>
                                            </div>
                                        </div>                                                                                                         
                                                                                                        
                                                                                                        
												</td>
											<tr>
												<td >
													<p style="text-align:left;">Asunto :</p>
												</td>
												<td>
                                                                                                    
                                            <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                  <span class="glyphicon glyphicon-envelope"></span>
                                                </span>
                                                <input class="form-control" type="text" name="asunto" size=48% id="UserEmail" placeholder="Asunto"  required>
                                            </div>
                                        </div>                                              
                                                                                                    
												</td>
						
											</tr>
											<tr>
												<td >
                                                                                                    <p style="text-align:left;">Contenido :</p><br><br><br><br><br><br><br>
												</td>
												<td>
                                                                                                    <textarea name='area_info' class="form-control" cols='50' rows='8' >Usted solicito un registro en saetis,   Ha sido validado satisfactoriamente, verifique haciendo click en el siguiente enlace: http://bittle.cs.umss.edu.bo/index.php</textarea>
												</td>
											</tr>
							
											<tr>
												<td>
												</td>
                                                                                                <td>  <br>
                                                                                                    
                                             <div class="form-group">
                                            <button type="submit" name="submit" class="btn btn-primary" id="btn-registrarUser"> <span class="glyphicon glyphicon-ok"></span> Enviar Email</button>
                                        </div>
													
												</td>
											</tr>
										</table>
									</center>	

								</form>
							</div>
							                                                   
                                                           </div>     
                                                        
						</div>
						
                                        </div>
					
<div class="sidebar">
                            
				<h2 class="star">Usuario :  <?php echo $_SESSION['usuario'] ?></h2>
			
               
            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        
                                <li>
                                    <a href="../Vista/registro_administrador.php"><i class="fa fa-bar-chart-o fa-files-o "></i> Nueva Cuenta<span class="fa arrow"></span></a>
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
            <div class="clr"></div>	<br><br><br><br><br><br><br><br>
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

  

    <script src="../Librerias/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../Librerias/js/sb-admin.js"></script>
</body>

</html>
