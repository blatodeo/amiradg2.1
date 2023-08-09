<?php

session_start();
$usuario = $_SESSION['usuario'];

include('../../conexion/conexion.php');


if (isset($_POST['enviar'])) {

    $name = trim($_POST["nombre"]);
    $preparacion = trim($_POST["preparacion"]);
    $categoria = trim($_POST["categoria"]);
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $hoy = date("Y-m-d H:i:s"); 
    $creador = $usuario;

    $insertar = "INSERT INTO recetas(nombre, preparacion, categoria, imagen, fecha, creador, activo) VALUES ('$name','$preparacion', $categoria, '$imagen', '$hoy', $creador, 1)";

    $resultado = mysqli_query($conn,$insertar);
    if ($resultado) {
        $_SESSION['message'] = '¡Se añadió '.'<span class="transformacion1">'.$name.'</span>!';
        $_SESSION['message_type'] = 'success'; # Funcion de bootstrap
        header('Location:recetas.php');
    }else {
        $_SESSION['message'] = 'Ha ocurrido un problema al insertar '.$name.', intentelo de nuevo';
        $_SESSION['message_type'] = 'danger'; # Funcion de bootstrap
        header('Location:recetas.php');
    }
}


?>