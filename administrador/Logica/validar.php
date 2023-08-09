<?php
require ('conexion.php');
session_start();

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$password_hash = md5($contrasena);

$sql = "SELECT * FROM user_login WHERE usuario = $usuario AND contraseña = '$password_hash'";
$consulta = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($consulta);

if($result>0){
    $_SESSION['usuario'] = $usuario;
    $query = "SELECT * FROM user_login WHERE usuario = $usuario ";
    $resultado = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($resultado)){ 
        $rol = $row['rol'];
        $user_name = $row['nombre'];
     } 
    $_SESSION['rol'] =  $rol;
    if($result['rol']==1){
        $_SESSION['message'] = '¡Bienvenid@ '.$user_name.'!';
        $_SESSION['message_type'] = 'info'; # Funcion de bootstrap
        header("Location: ../admin.php"); 
    }else{
        header("Location: ../../usuario/recetas/recetas.php");
    }
    
}else{
    $_SESSION['message'] = '¡Sus credenciales de inicio de sesión no coinciden! Verifique su información y vuelva a intentarlo.';
    $_SESSION['message_type'] = 'danger'; # Funcion de bootstrap
    header('Location:../../index.php#login');
}

if (isset($_POST['ingresar'])){
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $password_hash = md5($contrasena);

    $sql = "SELECT * FROM user_login WHERE usuario = $usuario AND contraseña = '$password_hash'";
    $consulta = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($consulta);

    if($result>0){
        $_SESSION['usuario'] = $usuario;
        $query = "SELECT * FROM user_login WHERE usuario = $usuario ";
        $resultado = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($resultado)){ 
            $rol = $row['rol'];
            $user_name = $row['nombre'];
        } 
        $_SESSION['rol'] =  $rol;
        if($result['rol']==1){
            $_SESSION['message'] = '¡Bienvenid@ '.$user_name.'!';
            $_SESSION['message_type'] = 'info'; # Funcion de bootstrap
            header("Location: ../admin.php"); 
        }else{
            header("Location: ../../usuario/recetas/recetas.php");
        }
        
    }else{
        $_SESSION['message'] = '¡Sus credenciales de inicio de sesión no coinciden! Verifique su información y vuelva a intentarlo.';
        $_SESSION['message_type'] = 'danger'; # Funcion de bootstrap
        header('Location:../login.php');
    }
}


?>