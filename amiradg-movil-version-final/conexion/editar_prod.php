<?php
    include_once('conexion.php');
    $id=$_GET["id"];
    $nombre=$_GET["nombre"];
    $categoria=$_GET["categoria"];
    $vencimiento=$_GET["vencimiento"];
    $existencias=$_GET["existencias"];
    $creador=$_GET["creador"];





    mysqli_query($mysqli,"UPDATE producto SET nombre='$nombre',categoria='$categoria',vencimiento='$vencimiento',existencias='$existencias',creador='$creador' WHERE id='$id'") or die('Error al editar');

    $res=json_encode("Exito al editar!!");
    echo $res;
    return $res;
?>