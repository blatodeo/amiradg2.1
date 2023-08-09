<?php
    include("../../conexion/conexion.php");
    session_start();
    $usuario = $_SESSION['usuario'];

    if(isset($_POST['update'])){
        $id          = $_POST['id'];
        $nombre      = $_POST['name'];
        $categoria   = $_POST['categoria'];
        $vencimiento = $_POST['vencimiento'];

        $update      = "UPDATE producto set nombre = '$nombre', categoria = $categoria, vencimiento = '$vencimiento'  WHERE id = $id";
        $result = mysqli_query($conn, $update);

        if ($result){

            $_SESSION['message'] = '¡Se actualizó el inventario de '. $nombre . '!';
            $_SESSION['message_type'] = 'success'; # Función de bootstrap
            header('Location:inventarios.php');
        }else{
            $_SESSION['message'] = '¡Error al actualizar!';
            $_SESSION['message_type'] = 'danger'; # Función de bootstrap
            header('Location:inventarios.php');
        }
        

    }

?>
