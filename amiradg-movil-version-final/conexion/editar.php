<?php
    include_once('conexion.php');
    $id=$_GET['id'];
    $nombre=$_GET['nombre'];
    $preparacion=$_GET['preparacion'];
    $categoria=$_GET['categoria'];
    $creador=$_GET["creador"];
    $imagen=$_GET["imagen"];





    mysqli_query($mysqli,"UPDATE recetas SET nombre='$nombre',preparacion='$preparacion',categoria='$categoria', creador='$creador', imagen='$imagen' WHERE id='$id'") or die('Error al editar');

    $res=json_encode("Exito al editar!!");
    echo $res;
    return $res;
?>