<!DOCTYPE html>

<?php

    require '../Modelo/conexion.php';
    //include("controlSesion.php");
    session_start();
    $con=new conexion();
      $UsuarioActivo = $_SESSION['usuario'];
    
?>

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
    <link href="../Librerias/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="../Librerias/css/plugins/timeline/timeline.css" rel="stylesheet">
   

    <!-- SB Admin CSS - Include with every page -->
    <link href="../Librerias/css/sb-admin.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../Librerias/css/jquery-te-1.4.0.css">
    <script type="../Librerias/js/jquery.min.js"></script>
    
    <script src="../Librerias/js/jquery-1.10.2.js"></script>
    
      <link rel="stylesheet" type="text/css" media="all" href="../Librerias/calendario/daterangepicker-bs3.css" />
      <script type="text/javascript" src="../Librerias/calendario/moment.js"></script>
      <script type="text/javascript" src="../Librerias/calendario/daterangepicker.js"></script>
      <link rel="stylesheet" type="text/css" href="../Librerias/calendario2/jquery.datetimepicker.css"/>
      <script type="text/javascript" src="../Librerias/js/calendario_notacion_conformidad.js"></script>
      
    <script type="text/javascript" src="../Librerias/calendario2/jquery.js"></script>
    <script type="text/javascript" src="../Librerias/calendario2/jquery.datetimepicker.js"></script>
    <script type="text/javascript" src="../Librerias/js/validar_orden.js"></script>
    <script type="text/javascript" src="../Librerias/js/masked_input.js"></script>
      
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
                        <?php echo $UsuarioActivo.' '; ?><i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
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
                                    <a href="contrato.php">Emitir Contrato </a>
                                </li>
                                <li>
                                    <a href="ordenDeCambio.php">Emitir Orden de Cambio</a>
                                </li>
                                <li>
                                    <a href="notificacion_conformidad.php">Emitir Notificaci&oacute;n de Conformidad</a>
                                </li>
                                <li>
                                    <a href="#">Seguimiento Grupo Empresa <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        
                                        <li>
                                            <a id="Seguimiento" href="#">Seguimiento</a>
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
                            <a href="#"><i class="fa fa-building-o fa-fw"></i> Actividades<span class="fa arrow"></span></a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        
                          <li>
                              <a href="#"><i class="fa fa-tasks fa-fw"></i>Informacion Personal<span class="fa arrow"></span> </a>  
                                              <ul class="nav nav-third-level">
                                                <li>
                                                    <a href="modificar_asesor.php">Modificar Datos Personales </a>                             
                                                </li>       
                                            </ul>
                          </li>
                          <li>
                            <a href="lista-de-noticias.php"><i class="fa fa-comment"></i> Foro</a>
                         </li>
                          <li>
                            <a href="#"><i class="fa fa-question-circle fa-fw"></i> Ayuda <span class="fa arrow"></span></a>
   
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
                <div class="row">
              <div class="col-lg-12">
                <h1> Emitir Orden de Cambio <small></small></h1>
                 
                </div>
            </div><!-- /.row -->
               
                <!--Descripcion de la publicacion-->                 
               
                    
                      <div class="form-group" >
                      <label class="col-sm-2 control-label">Grupo Empresa</label>
                        <div class="col-xs-4"> 
                          <select name="lista" class="form-control">
                            <option selected value="0">Seleccione una grupo empresa </option>
                            <?php
                                $idAsesor= $_SESSION['usuario']  ;
                                $c1="SELECT ge.`NOMBRE_LARGO_GE` FROM `inscripcion` AS i,`asesor` AS a,`grupo_empresa` AS `ge`,`gestion` AS g,`proyecto` AS p WHERE i.`NOMBRE_UA` = a.`NOMBRE_U` AND i.`NOMBRE_UGE` = ge.`NOMBRE_U` AND i.`ID_G` = g.`ID_G` AND i.`CODIGO_P` = p.`CODIGO_P` AND a.`NOMBRE_U` LIKE '$idAsesor'";
                                $a1=$con->consulta($c1);
                                
                                while($grupoE =  mysql_fetch_array($a1)){
                                    echo "<option>".$grupoE[0]."</option>";
                                }
                                echo "<input type='hidden' name='idAsesor' value='$idAsesor'>";           
                            ?>
                            
                            </select>
                        </div>
                      </div><!--end/grupoempresas-->
                  </br>
                      <!--Campo de descripcion-->
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Puntuacion</label>
                        <div class="col-sm-8">
                         <table class="table form-group ">                                                          
                          <thead>
                        <tr>
                          <th>#</th>
                          <th>Descripción</th>
                          <th>Puntaje Referencial</th>
                          <th>Puntaje Obtenido</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Cumplimiento de especificaciones del proponente</td>
                          <td>15 puntos</td>
                          <td> 
                           <input type="text" class="form-control" style ="width:45px;height:45px;" name="text[1]" id="textfield1" onkeypress="return validarNumeros(event)">
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Claridad en la organizaci&oacute;n de la empresa proponente</td>
                          <td>10 puntos</td>
                          <td>
                              <input type="text" class="form-control" style ="width:45px;height:45px;" name="text[2]" id="textfield2" onkeypress="return validarNumeros(event)">
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Cumplimiento de especificaciones t&eacute;cnicas</td>
                          <td>30 puntos</td>
                          <td>
                              <input type="text" class="form-control" style ="width:45px;height:45px;" name="text[3]" id="textfield3" onkeypress="return validarNumeros(event)">
                          </td>
                        </tr>

                        <tr>
                          <td>4</td>
                          <td>Claridad en el proceso de desarrollo</td>
                          <td>10 puntos</td>
                          <td>
                              <input type="text" class="form-control" style ="width:45px;height:45px;" name="text[4]" id="textfield4" onkeypress="return validarNumeros(event)">
                          </td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>Plazo de Ejecuci&oacute;n</td>
                          <td>10 puntos</td>
                          <td>
                              <input type="text" class="form-control" style ="width:45px;height:45px;" name="text[5]" id="textfield5" onkeypress="return validarNumeros(event)">
                          </td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>Precio total</td>
                          <td>15 puntos</td>
                          <td>
                              <input type="text" class="form-control" style ="width:45px;height:45px;" name="text[6]" id="textfield6" onkeypress="return validarNumeros(event)">
                          </td>
                        </tr>
                        <tr>
                          <td>7</td>
                          <td>Uso de herramientas en el proceso de desarrollo</td>
                          <td>10 puntos</td>
                          <td>
                              <input type="text" class="form-control" style ="width:45px;height:45px;" name="text[7]" id="textfield7" onkeypress="return validarNumeros(event)">
                          </td>
                        </tr>

                </tbody>
                         </table> 
                        
                        </div>
                      </div><!--end/campoDescripcion-->

                 
                      
                      <div class="form-group">
                        <label class="col-xs-2 control-label">Fecha de la reuni&oacute;n:</label>
                        <div class="col-sm-1">
                        <input class="form-control" style="width:500px;heigth:30px;" name="fecha" id="fecha"  >
                        </div>
      
                    </div><!--end/fecha-->

                     <div class="form-group">
                        <label class="col-xs-2 control-label">Hora de la reuni&oacute;n:</label>
                        <div class="col-sm-1" >
                        <input class="form-control" style="width:500px;heigth:30px;"  name="hora" id="hora"  placeholder="HH:MM" readonly="readonly">
                    </div>
      
                    </div><!--end/fecha-->
                    
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Lugar de la reuni&oacute;n:</label>
                        <div class="col-sm-2" >
                        <input class="form-control" style="width:500px;heigth:30px;"  name="lugar">
                      </div>
                        
                    </div><!--end/lugar-->


                      <div class="form-group" >
                        <label class="col-sm-2 control-label">Observaciones</label>
                         <a onclick="agregarHijo()" class="link-dos" > Agregar Observacion&nbsp;&nbsp;</a><span class="glyphicon glyphicon-plus"></span>
                         <a onclick="quitarHijo()" class="link-dos" > Quitar Observacion&nbsp;&nbsp;</a> <span class="glyphicon glyphicon-minus"></span>
                         
                         <div id = "observaciones" style="height: 200px;width:600px;overflow: scroll">
                         </div>
                      </div><!--end/observaciones-->
                     
                    
                    <div class   ="form-group">
                      <div class   ="col-sm-8">
                         <input class ="btn btn-primary" type="submit" value= "Generar" id= "enviar" name="enviar" onclick ="this.form.action='../Controlador/ordendecambio.php?id=0'"></input> &nbsp;&nbsp;                      
                      </div>
                    </div><!--end/submit-->

                   
                 </div> 

    </form>
    

             
    <!--Modal para adjuntar recursos/documentos-->
         
      
    </div>
    <!-- /#wrapper -->
    

    <!-- Core Scripts - Include with every page -->
 
 
    <script type="text/javascript" src="../Librerias/calendario2/jquery.js"></script>
    <script type="text/javascript" src="../Librerias/calendario2/jquery.datetimepicker.js"></script>
    <script src="../Librerias/js/bootstrap.min.js"></script>
    <script src="../Librerias/js/plugins/metisMenu/jquery.metisMenu.js"></script>


    <!-- SB Admin Scripts - Include with every page -->
    <script src="../Librerias/js/sb-admin.js"></script>
  
    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="../Librerias/js/demo/dashboard-demo.js"></script>
    <!-- Combo Box scripts -->
 
  
<script type="text/javascript">
     
});
</script>
</body>

</html>
