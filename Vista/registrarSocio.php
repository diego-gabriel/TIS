<?php
session_start();
  
    $nombreU = $_SESSION['usuario']  ;
    $nombreUS = $_POST['nombreU'];
    $nombreS = $_POST['nombre'];
    $apellidoS = $_POST['apellido'];
    $contrasenaS = $_POST['contrasena1'];

    include '../Modelo/conexion.php';
   
    $conect = new conexion();

    $VerificarUsuario = $conect->consulta("SELECT LOGIN_S FROM socio WHERE LOGIN_S = '$nombreU' ");
    $VerificarUsuario2 = mysql_fetch_row($VerificarUsuario);
    
     if (!is_array($VerificarUsuario2)) 
     {
         
                    $db = 'saetis';

                    $host = 'localhost';

                    $user = 'root';

                    $pass = '';

                    $conn = new PDO("mysql:dbname=".$db.";host=".$host,$user, $pass);

                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // iniciar transacción

                     $conn->beginTransaction();

                    try {

                    $sql = 'INSERT INTO socio (NOMBRE_U, NOMBRES_S, APELLIDOS_S, LOGIN_S, PASSWORD_S) VALUES (:nombreU, :nombreS, :apellidoS, :loginS, :passwordS);';

                    $result = $conn->prepare($sql);

                    $result->bindValue(':nombreU', $nombreU, PDO::PARAM_STR);
                    $result->bindValue(':nombreS', $nombreS, PDO::PARAM_STR);
                    $result->bindValue(':apellidoS', $apellidoS, PDO::PARAM_STR);
                    $result->bindValue(':loginS', $nombreUS, PDO::PARAM_STR);
                    $result->bindValue(':passwordS', $contrasenaS, PDO::PARAM_STR);

                    $result->execute();


                    $conn->commit();
                    echo"<script type=\"text/javascript\">alert('El registro ha sido satisfactorio'); window.location='RegistrarGrupoEmpresa.php';</script>";
                    /*echo '<script>
                      BootstrapDialog.show({
                      title: "Registro",
                      message: "El registro es satisfactorio"
                      });
                      </script>';
*/
                } catch (PDOException $e) {
                    // si ocurre un error hacemos rollback para anular todos los insert
                    $conn->rollback();

                    echo $e->getMessage();

                }
         
     }
     else
     {
          echo"<script type=\"text/javascript\">alert('El nombre de usuario ya esta registrado'); window.location='RegistrarGrupoEmpresa.php';</script>";
       /* 
        echo '<script>
        BootstrapDialog.show({
            title: "Fallo en el Registro",
            message: "El nombre de usuario ya esta registrado"
        });
        </script>';*/
     }
    ?>