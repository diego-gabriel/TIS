

<?php

	require_once '../Modelo/conexion.php';
	require_once '../Modelo/Model/GrupoEmpresa.php';   
	session_start();
	$usuario = $_SESSION['usuario'];
     
	$conexion = new conexion();
	$conexion->conectar();

    $conGrupos = $conexion->consulta("SELECT inscripcion.NOMBRE_UGE, proyecto.NOMBRE_P FROM inscripcion,inscripcion_proyecto,proyecto WHERE inscripcion.NOMBRE_UA = '$usuario' AND inscripcion.NOMBRE_UGE = inscripcion_proyecto.NOMBRE_U AND inscripcion_proyecto.CODIGO_P = proyecto.CODIGO_P AND inscripcion.ESTADO_INSCRIPCION = 'Habilitado'");   
	$filas = '';

	while($rowGrupos = mysql_fetch_row($conGrupos))
	{

		$ge = new GrupoEmpresa($rowGrupos[0]);
		$btnAsist = '';
		$btnRepor = '';

	    $btnAsist = '<button id="btnAsistencia" class="btn btn-xs btn-danger btnRegistroAsistenciaSemanal">
	                     		  Asistencia <i class="glyphicon glyphicon-check"></i>
	                          </button>';

	    $btnRepor = '<button id="btnReportes" class="btn btn-xs btn-danger btnRegistroReportesSemanal">
	                     		  Reportes <i class="glyphicon glyphicon-edit"></i>
	                           </button>';  

        $filas .=  '<tr data-usuario="'.$rowGrupos[0].'">
            		
                		<td>'.$ge->getNombreCorto().'</td>
                		<td>'.$rowGrupos[1].'</td>
                		<td><span class="label label-success">en proceso</span></td>
                		<td>
                			'.$btnAsist.'
                			'.$btnRepor.'
                		</td>
                	</tr>';

	}
   
    echo   '<table class="table table-hover">
			  	<thead>
		    	  	<tr>
	          	      	<th>Grupo-empresa</th>
	          	      	<th>Proyecto</th>
	          		  	<th>Estado</th>
	          		  	<th>Acciones</th>
	        	  	</tr>
		      	</thead>
			  	<tbody>
			  		'.$filas.'
			  	</tbody>
		    </table>';
    
    ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
               
 



























