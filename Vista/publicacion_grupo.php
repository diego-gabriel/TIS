<?php
    include '../Modelo/conexion.php';
    $con=new conexion();
     $conexion = mysql_connect("localhost","root","");
	                         if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
	                         mysql_select_db("saetis",$conexion);
                                 session_start();
                                 $UsuarioActivo = $_SESSION['usuario'];
 $VerificarUsuario = $con->consulta("SELECT NOMBRE_U FROM usuario WHERE NOMBRE_U = '$UsuarioActivo' ");
 $VerificarUsuario2 = mysql_fetch_row($VerificarUsuario);

    
    
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
    <script type="text/javascript" src="../Librerias/lib/validator/callback.js"></script
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
                                    
                                   
                                      $conect = new conexion();

                                      $SeleccionarVerficarSocio = $conect->consulta("SELECT NOMBRES_S FROM socio WHERE NOMBRES_S = '$UsuarioActivo'");

                                      $VerificarSocio = mysql_fetch_row($SeleccionarVerficarSocio);



                                    if(is_array($VerificarSocio))
                                    {
                                        $SeleccionarUsuarioGE = $conect->consulta("SELECT NOMBRE_U FROM socio WHERE NOMBRES_S = '$VerificarSocio[0]'");

                                        $UsuarioGE = mysql_fetch_row($SeleccionarUsuarioGE);

                                        $SeleccionrAsesor = $conect->consulta("SELECT NOMBRE_UA FROM inscripcion WHERE NOMBRE_UGE='$UsuarioGE[0]'");
                                        $Asesor = mysql_fetch_row($SeleccionrAsesor);
                                        $SeleccionarDocReq = $conect->consulta("SELECT NOMBRE_R FROM registro WHERE NOMBRE_U = '$Asesor[0]' AND TIPO_T='documento requerido' ");
                                        
                                        while ($rowDocs = mysql_fetch_row($SeleccionarDocReq))
                                        {
                                          echo '<li>
                                                   <a href="SubirDocumento.php?doc='.$rowDocs[0].'">'.$rowDocs[0].'</a>
                                                </li>';    
                                        }

                                    }
                                    else
                                    {
                                        $SeleccionrAsesor = $conect->consulta("SELECT NOMBRE_UA FROM inscripcion WHERE NOMBRE_UGE='$UsuarioActivo'");
                                      
                                        $Asesor = mysql_fetch_row($SeleccionrAsesor);
                                          
                                        $SeleccionarDocReq = $conect->consulta("SELECT NOMBRE_R FROM registro WHERE NOMBRE_U = '$Asesor[0]' AND TIPO_T='documento requerido' ");
                                          
                                        while ($rowDocs = mysql_fetch_row($SeleccionarDocReq))
                                        {
                                            echo '<li>
                                                      <a href="SubirDocumento.php?doc='.$rowDocs[0].'">'.$rowDocs[0].'</a>
                                                   </li>';    
                                        }

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
                        <?php
                            if (is_array($VerificarUsuario2)) {   
                        ?>
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
                        <?php
                        }
                        ?>
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
                    <h1>Documentos recibidos</h1>
                    <div class="panel panel-default" >

              
                        
                         

                             
                            <table class="table form-group" >
                                 
                                                     <tr bgcolor="#888888">
                                                          <th> Nº</th>
                                                          <th >Nombre<th>
                                                          <th >Descripcion</th>  
                                                          <th></th>
                                                          
                                                     </tr> 

 
                                <?php
                                
                                     $c_3="SELECT DISTINCT `NOMBRE_R`,`RUTA_D`,`DESCRIPCION_D`,`fecha_p` ,`hora_p`,`RECEPTOR_R` FROM `registro` AS r,`documento` AS d,`descripcion` AS e,`periodo` AS p,`receptor` AS w WHERE r.`ID_R` = d.`ID_R` AND r.`ID_R` = e.`ID_R` AND r.`ID_R` = p.`ID_R` AND r.`ID_R` = w.`ID_R` AND r.`TIPO_T` LIKE 'publicaciones' ";
                                     
                                     $r3=$con->consulta($c_3);
                                    
                                       
                                                
                                  
                                    if(mysql_num_rows($r3) != 0)
                                    {    $i=1;
                                           while($var3 = mysql_fetch_array($r3))
                                          {
                                            $aux=$var3['2'];
                                            $numero=$var3[5];
                                           
                                            
                                            
                                            
                                            if($numero=="TODOS" || $numero==$UsuarioActivo || $numero=="PUBLICO")
                                            {
                                                $ubi= $var3[1];
                                                
                                                $fep=$var3[3];
                                                $hop=$var3[4];
                                                $fecha       = date('Y-m-d');
                                                $hora        =  date("G:H:i");
                                           
                                                if($fecha >= $fep )
                                                {     
                                                    if($hora >= $hop || $hora <= $hop){
                                                
                                                ?>
                                                      <tr> 
                                                          <td><?php echo $i?></td> 
                                                          <td><a class="link-dos" href="<?php echo $var3[1] ?>"><?php echo $var3[0]?></a><td>

                                                          <td><?php echo $var3[2]?></td> 
                                                          <td> </td>
                                                         
                                                     </tr>
                                               <?php 
                                            }

                   ?>
                                        
                                          
                                                     
                                                     

                                            <?php
                                       }
                                      else{}
                                               $i++;    
                                          }
                                          
                                    
                                     }
                                       ?>
                                       </table>
                                      
                                       <?php
                                            //echo "</form>";
                                    //$tabla.="</table>";
                                     //echo $tabla;
                                    }
                                    else
                                    {
                                        echo  "<b>--- ERROR! NO SE ENCONTRO DOCUMENTOS</b><br><br><a class='btn btn-primary' href='documentos_recibidos.php'>VOLVER ATRAS</a> ";
                                    }
                                     
                                   
                                    
                                
                                
                                $con->cerrarConexion();
                                
                                
                                /*$ax='';
                                if(isset($_POST['grupoempresa'])){
                                    
                                    
                                }else{
                                    $ax="";
                                }
                                
                                if($ax=="TODOS")
                                {
                                    
                                    $c_3="SELECT DISTINCT r.`NOMBRE_R`,d.`RUTA_D` FROM `registro` AS r,`documento` AS d WHERE d.`ID_R` = r.`ID_R` AND r.`TIPO_T` LIKE 'documento subido' AND r.`NOMBRE_U` IN (SELECT ge.`NOMBRE_U` FROM `inscripcion` AS i,`asesor` AS a,`grupo_empresa` AS `ge`,`gestion` AS g,`proyecto` AS p WHERE i.`NOMBRE_UA` = a.`NOMBRE_U` AND i.`NOMBRE_UGE` = ge.`NOMBRE_U` AND i.`ID_G` = g.`ID_G` AND i.`CODIGO_P` = p.`CODIGO_P` AND a.`NOMBRE_U` LIKE '".$_POST['idAsesor']."')";
                                    $r3=$con->consulta($c_3);
                                    echo "<h2><center>Listado de propuestas</center></h2>";
                                    echo "<form methodo='post' action='descargar_zip.php'>";
                                    while($var3 =  mysql_fetch_array($r3)){
                                            echo "<a class='btn btn-default btn-lg btn-block' href='..".$var3['1']."'>".$var3[0]."</a><br>";
                                            
                                        }
                                    
                                    echo "<button type='submit' class='btn btn-primary'>Haga Clic aqui para comprimir todos los documentos</button>";
                                    echo "</form>";    
                                }

                                if(isset($_POST['Enviar'])){
                                    $c_1="SELECT count(*) "
                                            . "FROM usuario u, registro r "
                                            . "WHERE u.nombre_u=r.nombre_u and u.nombre_u like '$ax'" ;
                                    $r1=$con->consulta($c_1);
                                    $res1= mysql_fetch_row($r1);
                                    if($res1[0]==0 && $ax!="TODOS"){
                                        echo  "<b>--- ERROR! NO SE ENCONTRO DOCUMENTOS</b><br><br><a class='btn btn-primary' href='documentos_recibidos.php'>VOLVER ATRAS</a> ";
                                    }else{
                                        //echo $ax . " SI HAY CANTIDAD ".$res1[0];
                                        $c_2="SELECT r.nombre_r "
                                                . "FROM registro r, usuario u "
                                                . "WHERE r.nombre_u=u.nombre_u and u.nombre_u='".$ax."'";
                                        $r2=$con->consulta($c_2);
                                        
                                        while($var=  mysql_fetch_array($r2)){
                                            echo "<a class='btn btn-default btn-lg btn-block' href='archivos/".$var[0]."'>".$var[0]."</a><br>";
                                            
                                        }
                                    }
                                }*/
                                ?>
                           
                        
                          <script type="text/javascript" src="../Librerias/calendario2/jquery.js"></script>
                        <script type="text/javascript" src="../Librerias/calendario2/jquery.datetimepicker.js"></script>
                        
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



















