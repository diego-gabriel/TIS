<?php
	require_once '../Modelo/conexion.php';
	require_once '../Modelo/Model/GrupoEmpresa.php';

	$conexion = new conexion();
	$conexion->conectar();
	$ap = $conexion->consultarTabla("SELECT id_r, nombre_u, estado_e, nombre_r
	        						 FROM REGISTRO , inscripcion
	        						 WHERE tipo_t = 'actividad planificacion' AND estado_e = 'en proceso' and NOMBRE_UGE=nombre_u and NOMBRE_UA='$usuario';");
    $reportes = $conexion->consultarArreglo("SELECT DISTINCT id_r
									  		 FROM REPORTE");
    $asistencia = $conexion->consultarArreglo("SELECT DISTINCT id_r
									  		   FROM ASISTENCIA");
	$conexion->cerrarConexion();
	$filas = '';
	for ($i = 0; $i < count($ap); $i++) { 
		$ge = new GrupoEmpresa($ap[$i][1]);
		$idRegistro = $ap[$i][0];
		$btnAsistencia = '';
		$btnReportes = '';
		if (in_array($idRegistro, $asistencia)) {
			$btnAsistencia = '<button id="btnAsistencia'.$ap[$i][0].'" class="btn btn-xs btn-danger btnRegistroAsistencia" disabled="disabled">
	                     		  <i class="glyphicon glyphicon-check"></i>
	                          </button>';
		} else {
			$btnAsistencia = '<button id="btnAsistencia'.$ap[$i][0].'" class="btn btn-xs btn-danger btnRegistroAsistencia">
	                     		  <i class="glyphicon glyphicon-check"></i>
	                          </button>';
		}
		if (in_array($idRegistro, $reportes)) {
			$btnReportes = '<button id="btnReportes'.$ap[$i][0].'" class="btn btn-xs btn-danger btnRegistroReportes" disabled="disabled">
	                     		  <i class="glyphicon glyphicon-edit"></i>
	                          </button>';
		} else {
			$btnReportes = '<button id="btnReportes'.$ap[$i][0].'" class="btn btn-xs btn-danger btnRegistroReportes">
	                     		  <i class="glyphicon glyphicon-edit"></i>
	                           </button>';
		}
        $filas .= '<tr data-registro="'.$idRegistro.'">
				       <td>'.$ap[$i][3].'</td>
					   <td>'.$ge->getNombreCorto().'</td>
				       <td><span class="label label-success">'.$ap[$i][2].'</span></td>
			           <td>
                           '.$btnAsistencia.'
                           '.$btnReportes.'
			           </td>
				   </tr>';
    }
    echo '<table class="table table-hover">
			  <thead>
		    	  <tr>
		        	  <th>Actividad</th>
	          	      <th>Grupo-empresa</th>
	          		  <th>Estado</th>
	          		  <th>Acciones</th>
	        	  </tr>
		      </thead>
			  <tbody>
			  	'.$filas.'
			  </tbody>
		  </table>';
?>