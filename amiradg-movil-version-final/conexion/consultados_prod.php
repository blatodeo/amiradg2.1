<?php 
    include_once('conexion.php');
    $result=mysqli_query($mysqli, "SELECT * FROM producto ORDER BY id DESC") or die ('Error en el select');
    $rows=array();
    while($r=mysqli_fetch_assoc($result)){
        $rows[]=$r;
    }
    $respuesta= json_encode($rows);
    echo $respuesta;
    return $respuesta;
?>