<?php  

include '../Modelo/conexion.php';

    session_start();

    $UsuarioActivo = $_SESSION['usuario'];

    $nameForm = $_POST['nombreFormulario'];
                                                  
    $conect = new conexion();

    $EvaEscogidos = $_POST['EvaEscogidos'];
    $CritEscogidos = $_POST['CritEscogidos'];

    $puntaje = $_POST['PuntajeForm'];

    $buscador=0;

    for ($v=0; $v < count($EvaEscogidos) ; $v++) { 

            for ($b=0; $b < count($EvaEscogidos) ; $b++) { 

                if (($EvaEscogidos[$v] == $EvaEscogidos[$b])) {
                     
                    $buscador++;
                }
        
            }
    }

    if ($buscador > count($EvaEscogidos)) {
        
        echo'<script>BootstrapDialog.alert("No puede evaluar el mismo criterio mas de una vez");</script>';
    
    }else{

        $VerificarNombre = $conect->consulta("SELECT NOMBRE_FORM FROM formulario WHERE NOMBRE_FORM = '$nameForm' AND NOMBRE_U = '$UsuarioActivo' ");
        
        $ResultadoVerificacion = mysql_fetch_row($VerificarNombre);
        
        if(!is_array($ResultadoVerificacion))
        {
            
                $resultado=0;
            
                for($z=0;$z<count($puntaje);$z++)
                {
                    $resultado = $resultado + $puntaje[$z]; 
                }
                
                    if($resultado == 100)
                    {

                        $InsertarFormulario = $conect->consulta("INSERT INTO formulario(NOMBRE_U, NOMBRE_FORM, ESTADO_FORM) VALUES('$UsuarioActivo', '$nameForm', 'Deshabilitado')");

                        $SeleccionID =$conect->consulta("SELECT MAX(ID_FORM) FROM formulario WHERE NOMBRE_U = '$UsuarioActivo'");

                        $MaxIdForm = mysql_fetch_row($SeleccionID);

                        for ($cont1=0; $cont1 < count($EvaEscogidos); $cont1++) { 

                            if ($CritEscogidos[$cont1] == 4) {

                                echo "aqui";
                                die();

                                $InsertarCritC = $conect->consulta("INSERT INTO from_crit_c(ID_CRITERIO_C, ID_FORM) VALUES('4','$MaxIdForm[0]') ");
                                $SeleccionIDE = $conect->consulta("SELECT ID_CRITERIO_E FROM criterio_evaluacion WHERE NOMBRE_CRITERIO_E = '$EvaEscogidos[$cont1]' AND NOMBRE_U = '$UsuarioActivo'");
                                $idE = mysql_fetch_row($SeleccionIDE);
                                $InsertarCritE = $conect->consulta("INSERT INTO form_crit_e(ID_FORM, ID_CRITERIO_E) VALUES('$MaxIdForm[0]','$idE[0]') ");
                                $InsertarPuntaje = $conect->consulta("INSERT INTO puntaje(ID_FORM, PUNTAJE) VALUES('$MaxIdForm[0]','$puntaje[$cont1]')");

                            }else{

                                $SeleccionIDE = $conect->consulta("SELECT ID_CRITERIO_E FROM criterio_evaluacion WHERE NOMBRE_CRITERIO_E = '$EvaEscogidos[$cont1]' AND NOMBRE_U = '$UsuarioActivo'");
                            
                                $SeleccionIDC = $conect->consulta("SELECT ID_CRITERIO_C FROM criteriocalificacion WHERE NOMBRE_CRITERIO_C = '$CritEscogidos[$cont1]' AND NOMBRE_U = '$UsuarioActivo'");

                                $idE = mysql_fetch_row($SeleccionIDE);

                                $idC = mysql_fetch_row($SeleccionIDC);

                                //var_dump($idC);

                                $InsertarCritE = $conect->consulta("INSERT INTO form_crit_e(ID_FORM, ID_CRITERIO_E) VALUES('$MaxIdForm[0]','$idE[0]') ");

                                $InsertarCritC = $conect->consulta("INSERT INTO from_crit_c(ID_CRITERIO_C, ID_FORM) VALUES('$idC[0]','$MaxIdForm[0]') ");

                                $InsertarPuntaje = $conect->consulta("INSERT INTO puntaje(ID_FORM, PUNTAJE) VALUES('$MaxIdForm[0]','$puntaje[$cont1]')");
                            }                            
                        }

                    
                        if($InsertarFormulario and $InsertarCritE and $InsertarCritC and $InsertarPuntaje)
                        {
                        
                            echo'<script>BootstrapDialog.alert("Se guardo el formulario correctamente");</script>';
                        }

                    }
                    else{
                        
                        echo'<script>BootstrapDialog.alert("La sumatoria de puntajes en el formulario no puede ser mayor ni menor a 100");</script>';
                    }
           
                
       }
       else
       {
        
            echo'<script>BootstrapDialog.alert("Ya existe un formulario con ese nombre registrado");</script>';
     
       }
    }

    






        
            

?>