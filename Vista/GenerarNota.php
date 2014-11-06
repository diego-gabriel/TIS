<?php  

        include '../Modelo/conexion.php';
	$grupo = $_POST['GrupoEscogido'];
        
        $nota = 0;

        $conect = new conexion();
        
        $RecuperarPuntajes = $conect->consulta("SELECT Puntaje_Form FROM formulario WHERE Form_Estado = 'Habilitado'");
                         
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
            for ($i=0; $i <count($puntajes) ; $i++) { 

		$nota = $nota + ($puntajes[$i][0] * ($prueba[$i]*0.01));

            }
            
                //$conect->consulta("INSERT INTO........VALUES('$nota')");

		echo '<script>
                        BootstrapDialog.show({
			    title: "Resultado de la Evaluacion",
			    message: "Se proceso el formulario...su nota obtenida es de '.$nota.' puntos"
			});
                      </script>';
        }
        else{
            echo '<script>alert("Debe seleccionar una opcion en la seleccion multiple")</script>';
        }

?>