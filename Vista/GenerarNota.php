<?php  

    include '../Modelo/conexion.php';

     session_start();

    $UsuarioActivo = $_SESSION['usuario'];
	$grupo = $_POST['GrupoEscogido'];
    $FormularioUtilizado = $_POST['IdFormularioUtilizado'];

        $nota = 0;

        $conect = new conexion();

        $VerificarHabilitado = $conect->consulta("SELECT ID_FORM FROM formulario WHERE ESTADO_FORM = 'Habilitado' AND NOMBRE_U = '$UsuarioActivo'");
                            
        $IdForm = mysql_fetch_row($VerificarHabilitado);

        $IdForm2 = $IdForm[0];
        $cont2=0;

        /*********************************************************/
        
        $RecuperarPuntajes = $conect->consulta("SELECT PUNTAJE FROM puntaje WHERE ID_FORM = '$IdForm2'");
                         
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

                    $SeleccionarIdNota = $conect->consulta("SELECT MAX(ID_N) FROM NOTA WHERE NOMBRE_U='$grupo'");

                    $IdNota = mysql_fetch_row($SeleccionarIdNota);

                        for ($i=0; $i < count($prueba) ; $i++) { 
                            
                            $conect->consulta("UPDATE PUNTAJE_GE SET CALIFICACION = '$prueba[$i]' WHERE ID_N ='$IdNota[0]' AND  NUM_CE ='$i'");
                    
                        }

                    echo    '<script>
                                    BootstrapDialog.show({
                                         title: "Modificar Nota",
                                         message: "Se proceso el formulario...su nota obtenida es de '.$nota.' puntos",
                                         onhide: function(dialogRef){
                                            location.reload();
                                        }
                                    });
                                </script>';  


                }
                
                if($op == 'Evaluar')
                {
                    if (is_array($Verificar)) {

                        echo    '<script>
                                    BootstrapDialog.show({
                                        type: BootstrapDialog.TYPE_DANGER,
                                        title: "Error en el Registro",
                                        message: "Ya registro una nota anteriormente",
                                    });
                                </script>';
                    }
                    else
                    {

                        $conect->consulta('INSERT INTO nota(ID_FORM, NOMBRE_U, CALIF_N) VALUES("'.$FormularioUtilizado.'","'.$grupo.'","'.$nota.'")');

                        $SeleccionarIdNota = $conect->consulta("SELECT MAX(ID_N) FROM NOTA WHERE NOMBRE_U='$grupo'");

                        $IdNota = mysql_fetch_row($SeleccionarIdNota);

                        for ($i=0; $i < count($prueba) ; $i++) { 
                            $conect->consulta('INSERT INTO PUNTAJE_GE(ID_N, NUM_CE, CALIFICACION) VALUES("'.$IdNota[0].'","'.$i.'","'.$prueba[$i].'")');

                        }

                        
                        echo    '<script>
                                    BootstrapDialog.show({
                                         title: "Resultado de la Evaluacion",
                                         message: "Se proceso el formulario...su nota obtenida es de '.$nota.' puntos",
                                         onhide: function(dialogRef){
                                            location.reload();
                                        }
                                    });
                                </script>';  
                    }

                }
            }
            else
            {

                echo    '<script>
                        BootstrapDialog.show({
                        type: BootstrapDialog.TYPE_DANGER,
                        title: "Error",
                        message: "El valor del puntaje no puede ser mayor a 100"
                        });
                    </script>';
            }
        }
        else{
            
            echo    '<script>
                        BootstrapDialog.show({
                        type: BootstrapDialog.TYPE_DANGER,
                        title: "Error",
                        message: "Debe seleccionar llenar todos los campos"
                        });
                    </script>';
        }

?>