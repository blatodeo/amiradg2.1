<?php
    include("../../conexion/conexion.php");# Conexion a la BD
    session_start();# Inicio de sesión
    if(isset($_GET['id'])){ #Determina si una variable está definida y no es NULL / isset

      $id       = $_GET['id'];
      $consulta = "SELECT * FROM user_login WHERE id = $id";#Acción
      $result = mysqli_query($conn, $consulta);#Resultado de la acción
        
        if(mysqli_num_rows($result) == 1){#Obtiene el número de filas de un conjunto de resultados / mysqli_num_rows
            $row = mysqli_fetch_array($result);#Obtiene una fila de resultados como un array asociativo, numérico, o ambos
            $nombre = $row['nombre'];# Nombre de usuario
        }

      $update = "UPDATE user_login set rol = 2 WHERE id = $id";#Acción
      mysqli_query($conn, $update);#Resultado de la acción
        $_SESSION['message'] = '¡'.$nombre.' ahora es Aprendiz!';#Mensaje
        $_SESSION['message_type'] = 'info'; # Tipo de mensaje
        header('Location:lista2.php');#Redirección
    }

?>