<?php
include('../../conexion/conexion.php');

session_start();
$usuario = $_SESSION['usuario'];


if (isset($_POST['enviar'])) {

    $name        = $_POST["name"];
    $categoria   = $_POST["categoria"];
    $cantidad    = $_POST['cantidad'];
    $unidad      = $_POST['unidad'];
    $vencimiento = $_POST["vencimiento"];
    $creador     = $usuario;

    /* CREO UNA CONSULTA PARA VALIDAR INFORMACION */
    $validar       = "SELECT nombre FROM producto WHERE nombre = '$name'";
    $resultValidar = mysqli_query($conn, $validar);

    while ($row = mysqli_fetch_array($resultValidar)){
        $resultNombre = $row['nombre'];#Almaceno la información de categorias existentes
    }

        #verifico que no haya una categoria con es descripción
        if ($resultNombre==$name){#SI la hay, mensaje de error y redirección al registro

            $_SESSION['message'] = $name.' ya existe';
            $_SESSION['message_type'] = 'danger'; 
            header('Location:inventarios.php');

        }else{

            $insertar    = "INSERT INTO producto(nombre, categoria, existencias, unidad, vencimiento, creador, activo) VALUES ( '$name', $categoria, $cantidad, '$unidad', '$vencimiento', $creador, 1)";
            $resultado   = mysqli_query($conn,$insertar);

            if ($resultado) {
                $_SESSION['message'] = '¡Se añadió '. $name . '!';
                $_SESSION['message_type'] = 'success'; # Funcion de bootstrap
                header('Location:inventarios.php');
            }else {
                $_SESSION['message'] = 'Ha ocurrido un problema, intentelo de nuevo';
                $_SESSION['message_type'] = 'danger'; # Funcion de bootstrap
                header('Location:inventarios.php');
            }
        }

    
}


?>