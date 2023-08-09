<?php
    include_once('conexion.php');
    $id=$_GET['id'];

    mysqli_query($mysqli,"DELETE FROM recetas WHERE id='$id'") or die('Error al eliminar');

    $res=json_encode("Exito al eliminar!!");
    echo $res;
    return $res;
?>