<?php
   include '../Modelo/conexion.php';
   
   session_start();
   $UsuarioActivo = $_SESSION['usuario'];
   
    $conexion = mysql_connect("localhost","root","");
	//Control
    if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
    mysql_select_db("saetis",$conexion);

    $con=new conexion();
    $VerificarUsuario = $con->consulta("SELECT NOMBRE_U FROM usuario WHERE NOMBRE_U = '$UsuarioActivo' ");
    $VerificarUsuario2 = mysql_fetch_row($VerificarUsuario);
    
    $usuario = $UsuarioActivo;
    
    if (!is_array($VerificarUsuario2)) {   
    $consultaGE="SELECT `NOMBRE_U` FROM socio WHERE `NOMBRES_S` = '$UsuarioActivo'";
    $conGE_=$con->consulta($consultaGE);
    $NombreUsuario=mysql_fetch_row($conGE_);

    $usuario=$NombreUsuario[0];

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
    
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   
    <link href="css/estiloTabla.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

   <link href="css/estiloTabla.css" rel="stylesheet" type="text/css" />
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
                                    <ul class="nav nav-second-level">
                                    
                                        <?php
                                        
                                        //include '../Modelo/conexion.php';
                                        $conect = new conexion();
                                        
                                        $SeleccionrAsesor = $conect->consulta("SELECT NOMBRE_UA FROM inscripcion WHERE NOMBRE_UGE='$usuario'");
                                        
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
                  
                    <div class="col-lg-6" >
                       <div class="article"><br>
                             
                            
                            <div class="panel-heading">
                            <i ></i><h2> Nuevo </h2>
                        </div>
                        </div>
                            

<?php


include('config.php');
error_reporting(E_ALL ^ E_NOTICE);
// Mensaje con campos vacios
if (!empty($_POST) AND (empty($_POST['titulo']) OR empty($_POST['texto']))) {
    echo "<font color=\"#ff0000\">Por Favor llene los campos vacios</font>";
} else {
if (isset($_POST['titulo'])) {
          $titulo = $_POST["titulo"];
        }


      
          //$texto = $_POST["texto"];
       if (isset($_POST['texto'])) {
        $texto = $_POST['texto'];
       }
if($titulo == "" && $texto == ""){} else {
// Adiciona a Noticia 
$news_add = "INSERT INTO noticias (NOMBRE_U,TITULO, FECHA_N, VIEWS, TEXTO) VALUES ('$usuario','".addslashes(mysql_real_escape_string($_POST["titulo"]))."', NOW(), '0', '".addslashes(mysql_real_escape_string($_POST['texto']))."')";

$news_add = mysql_query($news_add)
or die ("Error.");
echo "Tema Adicionado";

}

}
?>

<form name="input" action="adicionar-noticia-grupo.php" method="post">
  <div class="form-group">
                      <label class="col-sm-2 control-label">Titulo:</label>
                             <div class="col-xs-12">
                             </br>
                                  <input id= "campoTitulo" type="text" name= "titulo"  class="form-control"  data-toggle="tooltip" data-placement="right" title="T&iacute;tulo con el que se mostrar&aacute; el recurso">

                            </div>
                   </div>
</br></br>

 <div class="form-group">
 </br>
                            <label class="col-sm-2 control-label">Texto:</label>
                        </br>
                                <div class="col-sm-12">
                                     <textarea class="jqte-test"  type="text" name="texto" id="campoDescripcion" rows="8" cols="101" data-toggle="tooltip" data-placement="right" style="overflow: auto;"></textarea>
                                </div>
                      </div>
</br>

</br>

</br>
<div class="col-xs-12">
</br>
<input type="submit" class="btn btn-primary" value="Adicionar Tema">
</div>

</form>          </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

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