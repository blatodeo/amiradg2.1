<?php 
    $id=$_GET['id'];

    include_once('conexion.php');
    $result=mysqli_query($mysqli, "SELECT * FROM producto WHERE id=$id ORDER BY id DESC") or die ('Error en el select');
    $rows=array();
    while($r=mysqli_fetch_assoc($result)){
        $rows[]=$r;
    }
    $respuesta= json_encode($rows);
    echo $respuesta;
    return $respuesta;
?>