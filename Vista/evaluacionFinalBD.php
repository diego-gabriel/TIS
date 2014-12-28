 <?php  
    session_start();
    $UsuarioActivo = $_SESSION['usuario'];
    include '../Modelo/conexion.php';  
    $conectar=new conexion();
    
    
    
    
    
    
           $_SESSION["ID"];
           $_SESSION["NombreCorto"];
           $_SESSION["Actividad"] ;
           $_SESSION["usuarioGE"] ;
           $_SESSION["IDPago"];
           $_SESSION["Puntaje"];
           $_SESSION["tamano"] ;
           $_SESSION["nota"] ;
        
           $ID=$_SESSION["ID"];
           $NombreCorto= $_SESSION["NombreCorto"];
           $Actividad=$_SESSION["Actividad"] ;
           $usuarioGE=$_SESSION["usuarioGE"]; 
           $IDPago=$_SESSION["IDPago"];
           $Puntaje=$_SESSION["Puntaje"];
           $tamano= $_SESSION["tamano"] ;
           $nota= $_SESSION["nota"] ;
    
    
          $conectar->consulta("INSERT INTO evaluacion (`ID_R`, `ID_E`, `NOTA_E`,`PORCENTAJE` ) VALUES ('$ID', NULL, '$nota','$Puntaje');");
          
          echo"<script type=\"text/javascript\">alert('La evaluacion se guardo exitosamente'); window.location='inicio_asesor.php';</script>";
 ?> 

                      		