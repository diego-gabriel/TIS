<?php  

 include_once '../Modelo/conexion.php';
 
    $asesor="Leticia";

    $CriterioEliminar = $_POST['ListaCriterios'];


    $con = new conexion();
    //$ConsultaEliminar = "DELETE * FROM criterio_calificacion WHERE nombre_criterio_calif = '$CriterioEliminar'";
    $CriteriosEliminados = $con->consulta("DELETE FROM criterio_calificacion WHERE nombre_criterio_calif = '$CriterioEliminar'");

    if ($CriteriosEliminados) {

    	echo '<script>alert("El criterio se elimino correctamente")</script>';
        echo '<script>location.reload();</script>';

    }

?>