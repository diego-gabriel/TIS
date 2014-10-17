<?php
	require_once '../Modelo/conexion.php';

	class FechaRealizacion {
		var $conexion;
		private $idRegistro;
	    private $fecha;

	    function __construct() {
	        $nargs = func_num_args();
	        $args = func_get_args();
	        $this->conexion = new conexion();
	        if ($nargs == 1) {
                $this->constructor($args[0]);
            } else {
            	$this->idRegistro = $args[0];
            	$this->fecha = $args[1];
            }
	    }

	    function constructor($id) {
	        $this->conexion->conectar();
			$datosFechaRealizacion = $this->conexion->consultarTabla("SELECT id_r, fecha_fr
														      		  FROM FECHA_REALIZACION
														      		  WHERE id_r = $id;");
            $this->idRegistro = $datosFechaRealizacion[0][0];
            $this->fecha = $datosFechaRealizacion[0][1];
	        $this->conexion->cerrarConexion();
	    }

	    function insertarBD() {
	        $this->conexion->conectar();
	        $this->conexion->consulta("INSERT INTO FECHA_REALIZACION(id_r, fecha_fr)
	        							VALUES($this->idRegistro, '$this->fecha');");
	        $this->conexion->cerrarConexion();
	    }

	    public function modificarBD() {
	        $this->conexion->conectar();
	        $this->conexion->consulta("UPDATE FECHA_REALIZACION 
										SET fecha_fr = '$this->fecha'
										WHERE id_r = '$this->idRegistro';");
	        $this->conexion->cerrarConexion();
	    }

	    public function getIdRegistro() {
	        return $this->idRegistro;
	    }

	    public function getFecha() {
	        return $this->fecha;
	    }

	    public function setIdRegistro($idRegistro) {
	        $this->idRegistro = $idRegistro;
	    }

	    public function setFecha($fecha) {
	        $this->fecha = $fecha;
	    }
	}
?>
