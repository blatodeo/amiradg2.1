<?php
    include ("../../../conexion/conexion.php");
    session_start();
    $usuario = $_SESSION['usuario'];

    if (isset($_GET['id'])){    
        $id = $_GET['id'];

        if (isset($_POST['quitar'])){
            $receta = $_POST['id'];
            
            $delete = "DELETE FROM producto_receta WHERE id= $id";
            $result = mysqli_query($conn, $delete);
            if ($result){
                $location = "../recetaView.php?id=".$receta;#Destino
                header("Location: $location");#Redirección
            }else{
                $_SESSION['message'] = '¡Ha ocurrido un problema al eliminar '. $nombreReceta .', vuelva a intentarlo!';
                $_SESSION['message_type'] = 'danger'; # Función de bootstrap
                $location = "../recetaView.php?id=".$receta;#Destino
                header("Location: $location");#Redirección
            }
        }
        
    }
?>