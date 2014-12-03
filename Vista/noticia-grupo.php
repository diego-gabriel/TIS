<?php
    include '../Modelo/conexion.php';
    //$con=new conexion();
     $conexion = mysql_connect("localhost","root","");
	//Control
	if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
	mysql_select_db("saetis",$conexion);
   session_start();
 $UsuarioActivo = $_SESSION['usuario'];
   $con = new conexion();
  $VerificarUsuario = $con->consulta("SELECT NOMBRE_U FROM usuario WHERE NOMBRE_U = '$UsuarioActivo' ");
  $VerificarUsuario2 = mysql_fetch_row($VerificarUsuario);
    //$x="camaleon";
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
                                        
                                        $SeleccionrAsesor = $conect->consulta("SELECT NOMBRE_UA FROM inscripcion WHERE NOMBRE_UGE='$UsuarioActivo'");
                                        
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
                    
                    <div class="col-lg-6" >
                         <div class="mainbar">
                                            <div class="article"><br><br>
                            <h2><span>Foro</span></h2>   
                            
                        </div>
                        
                    </div>
                      <?php

include('config.php');

$id = $_GET['id'];
// Adiciona +1 de Visualizaciones a cada pessoa que acessar a noticia
$views_db = mysql_query("SELECT * FROM noticias WHERE ID_N = '$id'");
$row = mysql_fetch_array($views_db);
$view = $row['VIEWS'];
$views = $view + 1;
$views_db = mysql_query("UPDATE noticias SET VIEWS = '$views' WHERE ID_N = '$id'");

// Seleciona  noticia 
$selecionar_db = "SELECT * FROM noticias WHERE ID_N = '$id'";
$final = mysql_query($selecionar_db);

// Pega los valores de noticia noticia
while ($new=mysql_fetch_array($final)) { 
$id = $new["ID_N"];
$autor = $new["NOMBRE_U"];
$titulo = $new["TITULO"];
$date = $new["FECHA_N"];
$views = $new["VIEWS"];
$texto = $new["TEXTO"];


$comentarios_db = "SELECT * FROM comentarios WHERE ID_N='$id'";
$comentarios_db = mysql_query($comentarios_db);
$comentarios = mysql_num_rows($comentarios_db);



echo "<title>$titulo</title>";
echo "<h1>$titulo</h1><p>Postado por <b>$autor</b>  <b>$date</b> - <b>$views</b> Visualizaciones | <b>$comentarios</b> Comentarios | ";
//echo "______________________________________________________________________________________________________________________________________________________________________";
//echo "<h3>$comentarios Comentarios:</h3>";
?>
<div class="mainbar">
                                            <div class="article"><br><br>
                            <h2><span>Comentarios</span></h2>   
                            
                        </div>
<?php

}
?>
<?php

$id = $_GET['id'];
$selecionar_db_comentarios = "SELECT * FROM comentarios WHERE ID_N = '$id' ORDER BY ID_N DESC";
$selecionar_db_comentarios_final = mysql_query($selecionar_db_comentarios);

// muestra los valores da tabla 'comentarios'
while ($comentario_db=mysql_fetch_array($selecionar_db_comentarios_final)) { 
$id = $comentario_db["ID_C"];
$autor = $comentario_db["NOMBRE_U"];
$nor = $comentario_db["ID_N"];
$comentario = $comentario_db["COMENTARIO"];
$date = $comentario_db["FECHA_C"];
$autor_c=$comentario_db["AUTOR_C"];

echo "<b>$autor_c</b> el <b>$date</b> comento:$comentario</br>";
echo "</br>";
}
?>

<h3>Comentar:</h3>
<?php
// Mensage  campos vacios
if (!empty($_POST) AND empty($_POST['comentario'])) {
    echo "<font color=\"#ff0000\">Por Favor llene los campos vacios</font>";
} else {
//$id = $_GET['id'];
//$mensagem = $_POST["comentario"];
if (empty($_POST['comentario'])) { $mensagem="";} else { $mensagem=$_POST['comentario'];}
if($mensagem == ""){} else {
// Adiciona comentario
$comentario_add = "INSERT INTO comentarios (NOMBRE_U,ID_N,COMENTARIO,FECHA_C,AUTOR_C) VALUES ('$autor','".addslashes(mysql_real_escape_string($_GET['id']))."', '".addslashes(mysql_real_escape_string(strip_tags($_POST['comentario'])))."', NOW(), '$UsuarioActivo')";

$comentario_add = mysql_query($comentario_add)
or die ("Erro ao Adicionar Comentário.");
//echo "Comentario Adicionado  | <a  class='link-dos' href=\"noticia.php?id=".$_GET['id']."\">Actualizar Página para ver su comentario</a>";
?>
<script>
  location.href="noticia.php?id=<?php echo $_GET['id']; ?>";
</script>
<?php
}
}

?>
<form name="input" action="noticia.php?id=<?php echo $_GET['id']; ?>" method="post">


<label>Comentario:</label>
<br>
<textarea name="comentario" rows="5" cols="50"></textarea>
</br>
</br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;          <input type="submit"  class="btn btn-primary" value="Enviar Comentario">
</form>

                      
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