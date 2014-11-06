<?php  

	require_once '../Modelo/conexion.php';

	$con = new conexion();

	$con->conectar();

	$Asesor = $_POST['NombreAsesor'];
        
        $tipoSelect = $_POST['tipoSelect'];
        
        $Indicadores = $_POST['Indicador'];
        
        $valores = $_POST['ValorNumerico'];

        $m=0;
        $cont=0;
        $cont2=0;

        var_dump($valores);
        
        $nombre="";

        echo(count($valores));

        /*if(count($valores) > 1)
        {

       		for ($n=0; $n < count($valores); $n++) { 

       			if(in_array($valores[$n], $valores))
       			{
       				$cont2++;
       			}
       		}

       		if($cont2 > 1)
       		{
       			echo'<script>alert("No puede registrar 2 puntajes iguales")</script>';

       		}

        }*/


        /*if(count($Indicadores) > 1)
        {
        	for ($p=0; $p < count($Indicadores) ; $p++) { 

        		
        		if(in_array(strtoupper($Indicadores[$p]), $Indicadores))
        		{
        			$cont++;
        		}
        	}

        	if($cont > 1)
        	{
        		echo'<script>alert("No puede registrar 2 indicadores iguales")</script>';
        	}
        }*/

        $cont5=0;

        for ($t=0; $t < count($valores) ; $t++) { 

        	if($valores[$t] <= 100)
        	{
        		$cont5++;

        	}
        }

        if($cont5 == count($valores))
        {


        }
        else
        {
        	echo'<script>alert("funcion")</script>';
        }






        for ($j=0; $j <count($Indicadores) ; $j++) { 

            $nombre = $nombre.$Indicadores[$j].'('.$valores[$j].')';	
        }
              
	$ConsultaNombreCriterio = $con->consulta("SELECT nombre_criterio_calif FROM criterio_calificacion WHERE nombre_criterio_calif = '$nombre'");
	$ArregloCriterios = mysql_fetch_array($ConsultaNombreCriterio);//Si no hay valores se vuelve false, si existen se vuelve un arreglo
							
	if (!is_array($ArregloCriterios)) {//Si es un arreglo significa que el nombre de criterio ya existe;

		for ($i=0; $i<count($Indicadores); $i++) {

                    if (isset($Indicadores[$i]) and isset($valores[$i])) {

                        $con2 = new conexion();
                        $con2->consulta("INSERT INTO CRITERIO_CALIFICACION(nombre_asesor_calif, nombre_criterio_calif, tipo_criterio, Indicador, Puntaje_Criterio) VALUES('$Asesor', '$nombre', '$tipoSelect', '$Indicadores[$i]', '$valores[$i]')");

                    }
		}			
								
		if(isset($con2)){
                    echo'<script>alert("Se registraron los datos correctamente")</script>';
		}

	}
	else
	{
		echo'<script>alert("Ya existe un criterio de ese tipo en la base de datos")</script>';
	}
						

?>