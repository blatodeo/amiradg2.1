<?php


        include_once ('conexion.php');
        $nombre=$_GET["nombre"];
        $correo=$_GET["correo"];
        $contrasena=$_GET["contraseña"];
        $rol=$_GET["rol"];










# $codigo_potrero $fecha_inicio $fecha_fin $actividad_realizada $producto $concentracion $cantidad $descripcion $persona_responsable






    mysqli_query ($mysqli,"INSERT INTO user_login(nombre, correo, contrasena, rol) VALUES ('$nombre','$correo', '$contrasena', '$rol')") or die('Error al guardar');

    $res= json_encode('Exito!!');
    echo $res;
    return $res;
        
?>
