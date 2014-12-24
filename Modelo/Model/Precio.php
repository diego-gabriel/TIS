<?php
	require_once '../Modelo/conexion.php';

	class Precio {
		var $conexion;
		private $usuario;
	    private $precio;

	    function __construct() {
	        $nargs = func_num_args();
	        $args = func_get_args();
	        $this->conexion = new conexion();
	        if ($nargs == 1) {
                $this->constructor($args[0]);
            } else {
            	$this->usuario = $args[0];
            	$this->precio = $args[1];
            }
	    }

	    function constructor($usuario) {
	        $this->conexion->conectar();
			$datosPrecio = $this->conexion->consultarTabla("SELECT nombre_u, precio_p
														    FROM precio
														    WHERE nombre_u = '$usuario';");
            $this->usuario = $datosPrecio[0][0];
            $this->precio = $datosPrecio[0][1];
	        $this->conexion->cerrarConexion();
	    }

	    function insertarBD() {
	        $this->conexion->conectar();
	        $this->conexion->consulta("INSERT INTO precio(nombre_u, precio_p)
	        						   VALUES('$this->usuario', $this->precio);");
	        $this->conexion->cerrarConexion();
	    }

	    public function getUsuario() {
	        return $this->usuario;
	    }

	    public function getPrecio() {
	        return $this->precio;
	    }

	    public function setUsuario($usuario) {
	        $this->usuario = $usuario;
	    }

	    public function setPrecio($precio) {
	        $this->precio = $precio;
	    }
	}
?>
