<!DOCTYPE html>
<?php

    include '../Modelo/conexion.php';
   
     $conexion = mysql_connect("localhost","root","");
     //Control
     if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
     mysql_select_db("saetis",$conexion);
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
            
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo $UsuarioActivo.' '; ?><i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
  
                        <li><a href="modificar_asesor.php"><i class="fa fa-user fa-fw"></i> Modificar Datos personales</a>
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

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="AdministrarGrupoEmpresa.php"><i class="fa fa-book"></i> Administrar Grupo Empresas</a>
                        </li>
                        
                        
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
                                    <a href="InscripcionProyecto.php">Registrar Proyecto</a>
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
                                                    <a href="#">Criterio de Calificaci&oacute;n<span class="fa arrow"></span></a>
                                                    <ul class="nav nav-third-level">
                                                        <li>
                                                            <a href="CrearModalidadCalificacion.php"> Crear Criterio de Calificaci&oacute;n</a>
                                                        </li>
                                                        <li>
                                                            <a href="EliminarCriterioCalificacion.php"> Eliminar Criterio de Calificaci&oacute;n</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                 
                                                <li>
                                                    <a href="#">Formulario de Evaluacion<span class="fa arrow"></span></a>
                                                    <ul class="nav nav-third-level">
                                                        <li>
                                                            <a href="CrearFormulario.php">Crear Formulario de Evaluacion</a>
                                                        </li>
                                                        <li>
                                                            <a href="SeleccionarFormulario.php"> Habilitar Formulario de Evaluacion </a>   
                                                        </li>
                                                        <li>
                                                            <a href="EliminarFormulario.php">Eliminar Formulario de Evaluacion</a>
                                                        </li>
                                                    </ul>
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
                              <a href="lista_doc_subidos.php"><i class="fa fa-tasks fa-fw"></i>Documentos Subidos </a>  
                                              
                          </li>
                       
                        <li>
                            <a href="lista-de-noticias.php"><i class="fa fa-comment"></i> Foro</a>
                        </li>
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div class="modal fade modalRegistroAsistencia" role="dialog" data-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Asistencia</h4>
                    </div>
                    <div class="modal-body">
                        
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade modalRegistroReportes" role="dialog" data-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Reportes</h4>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                </div>
            </div>
        </div>
<!-------------------------------------------NUEVAS PUBLICACIONES------------------------------------------>
<div id="page-wrapper">
           
   <form id = "publicar" method = "POST" action="tablas-publicar.php" onsubmit = "return validarCampos(this);">
        <div class ="form-horizontal">
            <div class="row">
                    <div class="col-lg-12">
                          <h2> Publicar Recursos</h2>
                 
                   </div>
            </div><!-- /.row -->
               
                <!--Descripcion de la publicacion-->                 
                <fieldset class="campos-border">
                  <legend class="campos-border">Informaci&oacute;n</legend>



                      <div class="form-group">
                        <label class="col-sm-2 control-label">Destinatario</label>
                           <div class="col-lg-8 ">
                    
                                <form method="POST" action="#" enctype="Multipart/form-data" action="forms/actions/configurarFechaRecepcionCO.php">
                                    <select name="grupoempresa" class="form-control" >
                                        <option>Seleccione un destinatario</option>
                                        <?php
                                            
                                            
                                            $c1="SELECT i.`NOMBRE_UGE` FROM `inscripcion` AS i WHERE i.`NOMBRE_UA` = '$UsuarioActivo'";
                                            $a1=$con->consulta($c1);
                                            echo "<option>PUBLICO</option>";
                                            echo "<option>TODOS</option>";
                                            
                                            while($v1 =  mysql_fetch_array($a1)){
                                                //$nom=$v1[0];
                                                //$cnom="SELECT g.`NOMBRE_LARGO_GE` FROM `grupo_empresa` AS g WHERE i.`NOMBRE_UGE` = '$nom'";
                                                //$a1=$con->consulta($c1);
                                                //$nom1=mysql_fetch_row($a1);
                                                echo "<option>".$v1[0]."</option>";
                                            }
                                            echo "<input type='hidden' name='idAsesor' value='$UsuarioActivo'>";
                                        ?>
                                    </select><br>
                                    
                                </form>
                            </div>
                        
                    </div>
               
  

                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Titulo</label>
                             <div class="col-xs-8">
                                  <input id= "campoTitulo" type="text" name= "campoTitulo"  class="form-control"  data-toggle="tooltip" data-placement="right" title="T&iacute;tulo con el que se mostrar&aacute; el recurso">

                            </div>
                   </div>

                 

                   
                  
                      <!--Campo de descripcion-->
                      <div class="form-group">
                            <label class="col-sm-2 control-label">Descripcion</label>
                                <div class="col-sm-8">
                                     <textarea class="jqte-test" name="campoDescripcion" id="campoDescripcion" rows="4" style="overflow: auto;"></textarea>
                                </div>
                      </div>


                      <div class="form-group">
                       <label class="col-sm-2 control-label" >Fecha de publicacion:</label>
                        <div class="col-xs-8">
                              
                                <input class="form-control" type="date" name="fecha1">
                            </div>
                        </div>
                            
 
 <div class="form-group">
                        <label class="col-sm-2 control-label" >Hora de publicacion:</label>
                        <div class="col-sm-8" >
                        <input class="form-control" name="hora1" type="time">
                    </div>
      
                    </div><!--end/fecha-->
                        
                                 

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Adjuntar Recurso</label>
                        <div class="col-sm-8">
                        
                              <input id= "recurso" type="text" name= "recurso"  class="form-control"   data-toggle="tooltip" data-placement="right" title="Adjuntar un recurso" readonly="readonly">
                                 </textarea>
                        <br>
                        <a data-toggle="modal" class="link-dos" href="javascript:void('')" data-target="#myModal"><span class="glyphicon glyphicon-folder-open"></span>
                        Adjuntar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="btn-primary" type="submit" value= "Publicar" id= "publicar"name="enviar" onClick()="update()"  >      </input> 

                       </div>
                        </div>
                           
                              
    </form> 
    <!--Modal para adjuntar recursos/documentos-->
                         
                        <div style="display: none;" aria-hidden="true" class="modal fade" id="myModal">
                        <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Buscador</h4>
                        </div>
                        <div class="modal-body" style="padding:0px; margin:0px; width: 560px;">
                        <iframe src="../Librerias/filemanager/dialogo.php?type=2&amp;field_id=recurso" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; " frameborder="0" height="500" width="896"></iframe>
                        </div>
                        </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
     
                   <div class="form-group">
                        <div class="col-sm-8">
                         <button class="btn-primary" onclick="location='../Controlador/publicaciones.php'">Salir</button>
                    </div>
                                
                               
                
                <!-- /.col-lg-12 -->
             
            <!-- /.row -->
         
</div>
   <script src="../Librerias/js/bootstrap.min.js"></script>
    <script src="../Librerias/js/plugins/metisMenu/jquery.metisMenu.js"></script>


    <!-- SB Admin Scripts - Include with every page -->
    <script src="../Librerias/js/sb-admin.js"></script>
  
    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="../Librerias/js/demo/dashboard-demo.js"></script>
    <!-- Combo Box scripts -->
                                    
    <!-- /#wrapper -->

    <!--Comprobar campos-->
<script type="text/javascript">

   function validarCampos(formulario) {
        var permitidos = /^[0-9a-zA-Z\s/]+$/
        
        //Controlar campos vacios y caracteres invalidos
        if(formulario.campoTitulo.value.length==0) {  
            formulario.campoTitulo.focus();    
            alert('Por favor, ingresa un titulo');  
        return false;  
        }
        if(!formulario.campoTitulo.value.match(permitidos)) {
            
        alert('Caracteres no validos:_a,¿?()*,"" ');
        return false;
        }

        if(formulario.campoDescripcion.value.length >= 200) {
            formulario.campoDescripcion.focus();
            alert('Descripcion demasiado larga(max 200 caracteres)')
        return false;
        }
        if(formulario.campoDescripcion.value.length==0){
            formulario.campoDescripcion.focus();
            alert('Por favor, ingrese una descripcion');
        return false;
        }
        if(formulario.recurso.value.length==0){
            formulario.recurso.focus();
            alert('Por favor, ingrese un documento');
        return false;
        }


        return true; 
    
    }

    </script>


    <!-- Core Scripts - Include with every page -->
  <script type="text/javascript" src="../Librerias/calendario2/jquery.js"></script>
    <script type="text/javascript" src="../Librerias/calendario2/jquery.datetimepicker.js"></script>
    <script src="../Librerias/js/bootstrap.min.js"></script>
    <script src="../Librerias/js/plugins/metisMenu/jquery.metisMenu.js"></script>
 

   <script src="../Librerias/js/jquery-1.10.2.js"></script>
    <script src="../Librerias/js/bootstrap.min.js"></script>
    <script src="../Librerias/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="../Librerias/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="../Librerias/js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="../Librerias/js/sb-admin.js"></script>
    <script src="../Librerias/js/jquery-te-1.4.0.min.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="../Librerias/js/demo/dashboard-demo.js"></script>
    <!-- Combo Box scripts -->
  
 
    <script>
  $('.jqte-test').jqte();
  
  // settings of status
  var jqteStatus = true;
  $(".status").click(function()
  {
    jqteStatus = jqteStatus ? false : true;
    $('.jqte-test').jqte({"status" : jqteStatus})
  });
</script>

</body>

</html>
