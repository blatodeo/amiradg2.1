<?php
    include("../../conexion/conexion.php");#Conexión a la BD
    session_start();#Inicio de sesion

    if(isset($_GET['id'])){ #Determina si una variable está definida y no es NULL / isset

      $id       = $_GET['id'];
      $consulta = "SELECT * FROM user_login WHERE id = $id";
      $result   = mysqli_query($conn, $consulta);

        #Obtiene el número de filas de un conjunto de resultados / mysqli_num_rows
        if(mysqli_num_rows($result) == 1){
            $row    = mysqli_fetch_array($result);#Obtiene una fila de resultados como un array asociativo, numérico, o ambos
            $nombre = $row['nombre'];# Nombre de usuario
        }

      $update = "UPDATE user_login set rol = 1 WHERE id = $id";# Acción
      mysqli_query($conn, $update);# Resultado de la acción
        $_SESSION['message'] = '¡'.$nombre.' ahora es Administrador!';# Mensaje
        $_SESSION['message_type'] = 'info'; # Tipo de mensaje
        header('Location:lista.php');# Redirección
    }

?>