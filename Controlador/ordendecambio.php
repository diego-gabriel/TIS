
<?php

include '../Modelo/conexion_pd.php';
include '../Modelo/crear_oc_pdf.php';
$conexion = new conexion();
$nombreAsesor = 'leticia' ;

if (isset($_POST['lista'])) {
	if (isset($_POST['fecha'])) {
		if (isset($_POST['hora'])) {
			if (isset($_POST['lugar'])) {
				
				$nombreEmpresa=$_POST['lista'];
				$fecha=$_POST['fecha'];
				$hora=$_POST['hora'];
				$lugar=$_POST['lugar'];
				$arr=$_POST['text'];
				
				$calificaciones = array();
				$observaciones =array();
				$encontrados=false;
				$indice=1;
				while (!$encontrados)
				{
					if(isset($_POST['nombre'.$indice]))
					{
					$observaciones[]=$_POST['nombre'.$indice];
					}
					else {
					$encontrados=true;
					}
					$indice++;
				}
				if($observaciones == NULL){
				 //	echo "<script type=\"text/javascript\">alert('Se requiere al menos una observaci\u00f3n '); window.location='ordendecambioEmpresas.php';</script>";

				}
				else{
			 
			
				$queryStat = "SELECT ge.`NOMBRE_U` FROM `grupo_empresa` AS ge WHERE ge.`NOMBRE_LARGO_GE` LIKE '$nombreEmpresa'";
				$stmt      = $conexion->query($queryStat);
				$row       = $stmt->fetchObject();
				$user      = $row->NOMBRE_U;
				
				$email     = "SELECT u.`CORREO_ELECTRONICO_U` FROM `usuario` AS u WHERE u.`NOMBRE_U` LIKE '$nombreAsesor'";
				$consulta  = $conexion->query($email);
				$row       = $consulta->fetchObject();
				$correo    = $row->CORREO_ELECTRONICO_U;

				$consultaNombre = "SELECT a.`NOMBRES_A`, a.`APELLIDOS_A` FROM `asesor` AS a WHERE a.`NOMBRE_U` LIKE '$nombreAsesor'";
				$nombre        = $conexion->query($consultaNombre);
				$row           = $nombre->fetchObject();
				$nomAs = $row->NOMBRES_A;
				$apeAs = $row->APELLIDOS_A;
				$nombreCompleto = $nomAs."  ".$apeAs;	
				
				$indice=0;
				foreach ($arr as $key => $value) {
				    $calificaciones[$indice] = $value;
				    $indice++;
				}
				 
				  		
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					if($id !=1){
					$oc  = new OrdenCambio('Orden de Cambio',$user,$nombreCompleto,$calificaciones,$observaciones,$fecha,$hora,$lugar,$correo,0,$nombreEmpresa);
					$pdf = new ORDENPDF();
					$pdf->obtenerOC($oc);
					$pdf->crearNuevoContenido();
					header('Location: http://localhost/ProyectoSprint3/Vista/ordendecambioEmpresas.php'); 
					
					
				}else{
					$oc  = new OrdenCambio('Orden de Cambio',$user,$nombreCompleto,$calificaciones,$observaciones,$fecha,$hora,$lugar,$correo,1,$nombreEmpresa);
					$pdf = new ORDENPDF();
					$pdf->obtenerOC($oc);
					$pdf->crearNuevoContenido();
					
				
					}
				}
			}
		 
			
		}
		
	}

}


}

	

/*


$oc  = new OrdenCambio('orden de cambio',$st,$nombreAsesor,$calificaciones,$observaciones,$fecha,$hora,$lugar,$correo,0);
$pdf = new ORDENPDF();
$pdf->obtenerOC($oc);
$pdf->crearNuevoContenido();
//var_dump($observacion);
*/
?>