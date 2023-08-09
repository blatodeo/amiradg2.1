<?php


        include_once ('conexion.php');
        $nombre=$_GET["nombre"];
        $preparacion=$_GET["preparacion"];
        $categoria=$_GET["categoria"];
        $creador=$_GET["creador"];
        $imagen=$_GET["imagen"];










# $codigo_potrero $fecha_inicio $fecha_fin $actividad_realizada $producto $concentracion $cantidad $descripcion $persona_responsable






    mysqli_query ($mysqli,"INSERT INTO recetas(nombre, preparacion, categoria, creador, imagen) VALUES ('$nombre', '$preparacion', '$categoria', '$creador', '$imagen')") or die('Error al guardar');

    $res= json_encode('Exito!!');
    echo $res;
    return $res;
        
?>

