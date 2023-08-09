<?php
    include ('../../conexion/conexion.php');

    session_start();

    if (isset($_GET['id'])){  

        $id              = $_GET['id'];
        $update          = "UPDATE producto SET activo = 0 WHERE id = $id";
        $result          = mysqli_query($conn, $update);
        $getNombre       = "SELECT nombre FROM producto WHERE id = $id";
        $resultGetNombre = mysqli_query($conn, $getNombre);

        while ($rowNombre = mysqli_fetch_array($resultGetNombre)){
            $nombre = $rowNombre['nombre'];
        }

        if ($result){
            $_SESSION['message'] = '¡Se eliminó '. $nombre . '!';
            $_SESSION['message_type'] = 'danger'; # Funcion de bootstrap
            header('Location:inventarios.php'); # Redireccionar el archivo
        }else{
            $_SESSION['message'] = '¡Ha ocurrido un error, intentelo de nuevo!';
            $_SESSION['message_type'] = 'danger'; # Funcion de bootstrap
            header('Location:inventarios.php'); # Redireccionar el archivo
        }
    }
?>


