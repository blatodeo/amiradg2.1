<?php


        include_once ('conexion.php');
        $nombre=$_GET["nombre"];
        $categoria=$_GET["categoria"];
        $vencimiento=$_GET["vencimiento"];
        $existencias=$_GET["existencias"];
        $creador=$_GET["creador"];







# $codigo_potrero $fecha_inicio $fecha_fin $actividad_realizada $producto $concentracion $cantidad $descripcion $persona_responsable






    mysqli_query ($mysqli,"INSERT INTO producto(nombre, categoria, vencimiento, existencias, creador) VALUES ('$nombre', '$categoria', '$vencimiento','$existencias','$creador')") or die('Error al guardar');

    $res= json_encode('Exito!!');
    echo $res;
    return $res;
        
?>

