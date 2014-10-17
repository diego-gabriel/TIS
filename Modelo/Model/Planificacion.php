<?php
	require_once '../Modelo/conexion.php';

	class Planificacion {
		var $conexion;
	    private $usuario;
	    private $estado;
	    private $fechaInicio;
	    private $fechaFin;

	    function __construct() {
	        $nargs = func_num_args();
	        $args = func_get_args();
	        $this->conexion = new conexion();
            if ($nargs == 1) {
                $this->constructor($args[0]);
            } else {
                $this->usuario = $args[0];
                $this->estado = $args[1];
                $this->fechaInicio = $args[2];
                $this->fechaFin = $args[3];
            }
	    }

	    function constructor($usuario) {
	    	$this->conexion->conectar();
	        $datosPlanificacion = $this->conexion->consultarTabla("SELECT nombre_u, estado_e, fecha_inicio_p, fecha_fin_p
											                       FROM PLANIFICACION
											                       WHERE nombre_u = '$usuario';");
	        $this->usuario = $datosPlanificacion[0][0];
	        $this->estado = $datosPlanificacion[0][1];
	        $this->fechaInicio = $datosPlanificacion[0][2];
	        $this->fechaFin = $datosPlanificacion[0][3];
	        $this->conexion->cerrarConexion();
	    }

	    function insertarBD() {
	        $this->conexion->conectar();
	        $this->conexion->consulta("INSERT INTO PLANIFICACION(nombre_u, estado_e, fecha_inicio_p, fecha_fin_p)
	        							VALUES('$this->usuario', '$this->estado', '$this->fechaInicio', '$this->fechaFin');");
	        $this->conexion->cerrarConexion();
	    }

	    public function modificarBD() {
	        $this->conexion->conectar();
	        $this->conexion->consulta("UPDATE PLANIFICACION
	        						   SET estado_e = '$this->estado', fecha_inicio_p = '$this->fechaInicio', fecha_fin_p = '$this->fechaFin'
	        						   WHERE nombre_u = '$this->usuario';");
	        $this->conexion->cerrarConexion();
	    }

	    public function getUsuario() {
	        return $this->usuario;
	    }

	    public function getEstado() {
	        return $this->estado;
	    }

	    public function getFechaInicio() {
	        return $this->fechaInicio;
	    }

	    public function getFechaFin() {
	        return $this->fechaFin;
	    }

	    public function setUsuario($usuario) {
	        $this->usuario = $usuario;
	    }

	    public function setEstado($estado) {
	        $this->estado = $estado;
	    }

	    public function setFechaInicio($fechaInicio) {
	        $this->fechaInicio = $fechaInicio;
	    }

	    public function setFechaFin($fechaFin) {
	        $this->fechaFin = $fechaFin;
	    }
	}
?>
