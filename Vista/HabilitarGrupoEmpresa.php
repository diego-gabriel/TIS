<?php  

	include '../Modelo/conexion.php';
    $conectar = new conexion();
    $GrupoEmpresa = $_GET['GE'];
    $Operacion = $_GET['Operacion'];


    if($Operacion == 'Habilitar')
    {
        $Habilitar = $conectar->consulta("UPDATE inscripcion SET ESTADO_INSCRIPCION = 'Habilitado' WHERE NOMBRE_UGE='$GrupoEmpresa'");
        
        
        
        
        
        
        
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
	$peticion1 = $conectar->consulta("SELECT NOMBRE_LARGO_GE FROM grupo_empresa WHERE NOMBRE_U = '$GrupoEmpresa'"); 
        while ($correo1 = mysql_fetch_array($peticion1))
        {        
        $NombreLargo=$correo1["NOMBRE_LARGO_GE"];}   
        
 	$peticion2 = $conectar->consulta("SELECT NOMBRE_CORTO_GE FROM grupo_empresa WHERE NOMBRE_U = '$GrupoEmpresa'"); 
        while ($correo2 = mysql_fetch_array($peticion2))
        {        
        $NombreCorto=$correo2["NOMBRE_CORTO_GE"];}       
 
 	$peticion3 = $conectar->consulta("SELECT NOMBRE_CORTO FROM lista_ge WHERE NOMBRE_CORTO = '$NombreCorto'"); 
        $tamano=mysql_num_rows($peticion3);
        if($tamano>0)
        {
        while ($correo3 = mysql_fetch_array($peticion3))
        {        
        $NombreCortoT=$correo3["NOMBRE_CORTO"];}
        
        } 
        else{$NombreCortoT='aaaaa';}
  	$peticion4 = $conectar->consulta("SELECT DIRECCION_GE FROM grupo_empresa WHERE NOMBRE_U = '$GrupoEmpresa'"); 
        while ($correo4 = mysql_fetch_array($peticion4))
        {        
        $Direccion=$correo4["DIRECCION_GE"];}        
        


        
     if (strcmp ($NombreCorto , $NombreCortoT ) !== 0) 
     {
      
      $conectar ->consulta("INSERT INTO `saetis`.`lista_ge` (`NOMBRE_CORTO`, `NOMBRE_LARGO`, `DIRECCION`, `REPRESENTANTE_LEGAL`) VALUES ('$NombreCorto', '$NombreLargo', '$Direccion', NULL);");
     }
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if($Habilitar)
        {

            echo '<script>alert("Se habilito la grupo empresa correctamente");</script>';
            echo '<script>window.location="../Vista/AdministrarGrupoEmpresa.php";</script>';
                   
        }
    }

    if($Operacion == 'Deshabilitar')
    {
        $DesHabilitar = $conectar->consulta("UPDATE inscripcion SET ESTADO_INSCRIPCION = 'Deshabilitado' WHERE NOMBRE_UGE='$GrupoEmpresa'");

        if($DesHabilitar)
        {

            echo '<script>alert("Se Deshabilito la grupo empresa correctamente");</script>';
            echo '<script>window.location="../Vista/AdministrarGrupoEmpresa.php";</script>';
                   
        }
    }

?>