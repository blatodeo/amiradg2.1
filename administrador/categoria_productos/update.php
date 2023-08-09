<?php
  include("../../conexion/conexion.php");#Conexión a la BD
  session_start();#Inicio de sesión
  
  if(isset($_POST['update'])){#Verifico si hay una variable y no es NULL
      $id          = $_POST['id'];
      $descripcion = $_POST['descripcion'];

      $update      = "UPDATE categoria_productos set descripcion = '$descripcion' WHERE id = $id";#Acción
      mysqli_query($conn, $update);#Resultado de la acción

      $_SESSION['message'] = '¡Se guardaron los cambios!';#Mensaje
      $_SESSION['message_type'] = 'success'; #Tipo de mensaje
      header('Location:categorias.php');#Redirección
  }
?>
