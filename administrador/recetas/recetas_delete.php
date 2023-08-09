<?php
    include ("../../conexion/conexion.php");
    session_start();
    $usuario = $_SESSION['usuario'];

    if (isset($_GET['id'])){    
        $id = $_GET['id'];

        $get_receta = "SELECT nombre FROM recetas WHERE id = $id";
        $get_receta2 = mysqli_query($conn, $get_receta);

            while($row = mysqli_fetch_array($get_receta2)){
                $nombreReceta = $row['nombre'];
            }

        $delete = "UPDATE recetas SET activo = 0 WHERE id= $id";
        $result = mysqli_query($conn, $delete);
        if ($result){
            
            $_SESSION['message'] = '¡Se ha eliminado '. $nombreReceta .'!';
            $_SESSION['message_type'] = 'danger'; # Función de bootstrap
            header('Location:recetas.php'); # Redireccionar el archivo
        }else{
            $_SESSION['message'] = '¡Ha ocurrido un problema al eliminar '. $nombreReceta .', vuelva a intentarlo!';
            $_SESSION['message_type'] = 'danger'; # Función de bootstrap
            header('Location:recetas.php');
        }
    }
?>
