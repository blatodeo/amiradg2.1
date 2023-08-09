<?php  

    $host='localhost';
    $name='amira-dg';
    $user='root';
    $pass='';

    $mysqli=mysqli_connect($host,$user,$pass,$name);

        if(!$mysqli) {
            die('Error en la conexion!!');

        }
        #mysqli_connect_error()
        #devuelve una cadena con la descripcion del ultimo error de conexión
?>