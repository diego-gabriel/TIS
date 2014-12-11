<?php  

	require_once '../Modelo/conexion.php';

    session_start();

    $UsuarioActivo = $_SESSION['usuario'];

	$con = new conexion();

	$con->conectar();

        
        $tipoSelect = $_POST['tipoSelect'];
        
        $Indicadores = $_POST['Indicador'];
        
        $valores = $_POST['ValorNumerico'];

        $m=0;
        $cont=0;
        $cont2=0;

        $buscador=0;

        
        $nombre="";

        $cont5=0;
        /***********************************************/

        for ($v=0; $v < count($Indicadores) ; $v++) { 

            for ($b=0; $b < count($Indicadores) ; $b++) { 

                if ((strtoupper(trim($Indicadores[$v])) == strtoupper(trim($Indicadores[$b])) or ($valores[$v] == $valores[$b]))) {
                     
                    $buscador++;
                }
        
            }
        }

            if ($buscador > count($Indicadores)) {

                echo '<script>alert("No puede registrar 2 indicadores o puntajes iguales");</script>';
                die();
                
            }else{

                for ($t=0; $t < count($valores) ; $t++) { 

                if($valores[$t] <= 100)
                {
                    $cont5++;

                }
            }

                if($cont5 == count($valores))
                {

                    for ($j=0; $j <count($Indicadores) ; $j++) { 

                        $nombre = $nombre.$Indicadores[$j].'('.$valores[$j].')';    
                    }
                      
                    $ConsultaNombreCriterio = $con->consulta("SELECT NOMBRE_CRITERIO_C FROM criteriocalificacion WHERE NOMBRE_CRITERIO_C = '$nombre' AND NOMBRE_U='$UsuarioActivo'");
               
                    $ArregloCriterios = mysql_fetch_row($ConsultaNombreCriterio);
                               
            
                    if (!is_array($ArregloCriterios)) {

                            $con2 = new conexion();
                            $con2->consulta("INSERT INTO criteriocalificacion(NOMBRE_CRITERIO_C, NOMBRE_U, TIPO_CRITERIO) VALUES('$nombre', '$UsuarioActivo', '$tipoSelect')");

                            $maxIdRes = $con2->consulta("SELECT MAX(ID_CRITERIO_C) FROM criteriocalificacion WHERE NOMBRE_U = '$UsuarioActivo'");

                             $maxID = mysql_fetch_row($maxIdRes);

                        for ($i=0; $i<count($Indicadores); $i++) {

                            if (isset($Indicadores[$i]) and isset($valores[$i])) {

                                $con2->consulta("INSERT INTO indicador( ID_CRITERIO_C, NOMBRE_INDICADOR,PUNTAJE_INDICADOR) VALUES('$maxID[0]','$Indicadores[$i]', '$valores[$i]')");

                            }
                        }

                
                            if(isset($con2)){

                                echo '<script>alert("Se registraron los datos correctamente");</script>';
                                
                            }      
                    }          
                                        
                    else
                    {

                        echo '<script>alert("Ya existe un criterio de ese tipo");</script>';

                    }
                }
                else
                {

                    echo '<script>alert("El puntaje no puede ser mayor a 100");</script>';
            
                }
            }
        
		

?>