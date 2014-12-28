<?php  

    include '../Modelo/conexion.php';

     session_start();

    $UsuarioActivo = $_SESSION['usuario'];
	$grupo = $_POST['GrupoEscogido'];
    $FormularioUtilizado = $_POST['IdFormularioUtilizado'];

        $nota = 0;

        $conect = new conexion();

        $SeleccionarIdPlanificacion = $conect->consulta("SELECT ID_R FROM registro WHERE NOMBRE_U='$grupo' AND TIPO_T='actividad planificacion'");
    
        while ($rowP = mysql_fetch_row($SeleccionarIdPlanificacion)) {

            $IdPlanificacion[] = $rowP[0];
    
        }

        for ($i=0; $i <count($IdPlanificacion) ; $i++) { 
        
            $SeleccionarEvaluacion2 = $conect->consulta("SELECT NOTA_E FROM evaluacion WHERE ID_R = '$IdPlanificacion[$i]'");
           
            while ($rowE = mysql_fetch_row($SeleccionarEvaluacion2)) {

                $Evaluacion2[] = $rowE[0];
        
            }
        }

        if(isset($IdPlanificacion) and isset($Evaluacion2))
        {

            if(count($Evaluacion2) == count($IdPlanificacion))
            {
                $VerificarHabilitado = $conect->consulta("SELECT ID_FORM FROM formulario WHERE ESTADO_FORM = 'Habilitado' AND NOMBRE_U = '$UsuarioActivo'");
                                
                $IdForm = mysql_fetch_row($VerificarHabilitado);

                $IdForm2 = $IdForm[0];
                $cont2=0;

                /*********************************************************/
                
                $RecuperarPuntajes = $conect->consulta("SELECT PUNTAJE FROM puntaje WHERE ID_FORM = '$FormularioUtilizado'");
                                 
                while($row = mysql_fetch_row($RecuperarPuntajes))
                {
                    $puntajes[] = $row;
                    
                }
                   
                $prueba = $_POST['valorInput'];
                
                $cont = 0;
                
                for($p=0;$p<count($prueba);$p++)
                {
                    if((isset($prueba[$p])))
                    {
                        $cont++;
                    }
                } 

                
                if(count($puntajes) == count($prueba))
                {


                    for ($y=0; $y < count($prueba) ; $y++) { 

                        if ($prueba[$y] <= 100) {

                            $cont2++;
                            
                        }
                    }

                    if ($cont2 == count($puntajes)) {

                        for ($i=0; $i <count($puntajes) ; $i++) { 

                            $nota = $nota + ($puntajes[$i][0] * ($prueba[$i]*0.01));

                        }

                        $VerificarNota = $conect->consulta("SELECT * FROM nota WHERE NOMBRE_U = '$grupo'");

                        $Verificar = mysql_fetch_row($VerificarNota);

                        $op = $_POST['Operacion'];

                        if($op == 'ReEvaluar')
                        {

                            $conect->consulta("UPDATE nota SET CALIF_N = '$nota' WHERE NOMBRE_U='$grupo'");

                            $SeleccionarIdNota = $conect->consulta("SELECT MAX(ID_N) FROM nota WHERE NOMBRE_U='$grupo'");

                            $IdNota = mysql_fetch_row($SeleccionarIdNota);

                                for ($i=0; $i < count($prueba) ; $i++) { 
                                    
                                    $conect->consulta("UPDATE puntaje_ge SET CALIFICACION = '$prueba[$i]' WHERE ID_N ='$IdNota[0]' AND  NUM_CE ='$i'");
                            
                                }

                            echo '<script>alert("Su nota obtenida es de '.$nota.' puntos");</script>';
                            echo '<script>location.reload();</script>';



                        }
                        
                        if($op == 'Evaluar')
                        {
                            if (is_array($Verificar)) {

                                echo '<script>alert("Ya registro una nota anteriormente");</script>';
                            }
                            else
                            {

                                $conect->consulta('INSERT INTO nota(ID_FORM, NOMBRE_U, CALIF_N) VALUES("'.$FormularioUtilizado.'","'.$grupo.'","'.$nota.'")');

                                $SeleccionarIdNota = $conect->consulta("SELECT MAX(ID_N) FROM nota WHERE NOMBRE_U='$grupo'");

                                $IdNota = mysql_fetch_row($SeleccionarIdNota);

                                for ($i=0; $i < count($prueba) ; $i++) { 
                                    $conect->consulta('INSERT INTO puntaje_ge(ID_N, NUM_CE, CALIFICACION) VALUES("'.$IdNota[0].'","'.$i.'","'.$prueba[$i].'")');

                                }

                                echo '<script>alert("Su nota obtenida es de '.$nota.' puntos");</script>';
                                echo '<script>location.reload();</script>';

                            }

                        }
                    }
                    else
                    {

                        echo '<script>alert("El valor del puntaje no puede ser mayor a 100");</script>';
                    }
                }
                else{


                    echo '<script>alert("Debe escoger una opcion en la seleccion multiple");</script>';
                    
                }

            }
            else
            {
                echo '<script>alert("Primero debe realizar la evaluacion correspondiente a la 2da etapa");</script>';

            }

        }
        else
        {
            echo '<script>alert("Primero debe realizar la evaluacion correspondiente a la 2da etapa");</script>';
        }
    

?>