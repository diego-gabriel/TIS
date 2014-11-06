<?php  


//var_dump($_POST['EvaEscogidos']);
//var_dump($_POST['CritEscogidos']);

include '../Modelo/conexion.php';

    $asesor="Leticia";

    $nameForm = $_POST['nombreFormulario'];
                                                  
    $conect = new conexion();

    $EvaEscogidos = $_POST['EvaEscogidos'];
    $CritEscogidos = $_POST['CritEscogidos'];

    $puntaje = $_POST['PuntajeForm'];

    //var_dump($puntaje);


    if (($_POST['nombreFormulario']) != "") {
        
        $VerificarNombre = $conect->consulta("SELECT * FROM FORMULARIO WHERE Name_Form = '$nameForm' ");
        
        $ResultadoVerificacion = mysql_fetch_row($VerificarNombre);
        
        if(!is_array($ResultadoVerificacion))
        {
            if($puntaje[0] != "")
            {
                $resultado=0;
            
                for($z=0;$z<count($puntaje);$z++)
                {
                    $resultado = $resultado + $puntaje[$z]; 
                }
                

                    if($resultado > 0 and $resultado == 100)
                    {
                        for ($i=0; $i < count($EvaEscogidos) ; $i++) { 

                            $resultado = $conect->consulta("INSERT INTO formulario(Name_Form, Form_Asesor, Form_CE, Form_TC, Puntaje_Form, Form_Estado) VALUES('$nameForm', '$asesor', '$EvaEscogidos[$i]', '$CritEscogidos[$i]', '$puntaje[$i]', 'Deshabilitado')");
                        }

                        if($resultado)
                        {
                            echo '<script>alert("Se Guardo en la BD")</script>';
                        }

                    }
                    else{
                        echo '<script>alert("La sumatoria de puntajes en el formulario no puede ser mayor ni menor a 100")</script>';
                    }
            }
            else {
                echo '<script>alert("debe llenar el/los campo Puntaje en el formulario")</script>';
            }
                
       }
       else
       {
            echo '<script>alert("Ya existe un formulario con ese nombre registrado")</script>';
     
       }
            
    }
    else
    {
         echo '<script>alert("debe ingresar un nombre para su formulario")</script>';
    }

?>