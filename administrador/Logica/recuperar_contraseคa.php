<?php
include('../../conexion/conexion.php');
session_start();


if (isset($_POST['enviar'])){ #verifico si hay una acción

    $usuario = $_POST['usuario'];#creo variables que alamcenan la información enviada en el formulario
    $correo  = $_POST['correo']; 
    $id = $_POST['idRegistro'];

    /* CREO UNA CONSULTA PARA VALIDAR INFORMACION */
    $validar = "SELECT id, usuario, correo FROM user_login WHERE usuario = $usuario";
    $resultValidar = mysqli_query($conn, $validar);

    while ($row = mysqli_fetch_array($resultValidar)){
        $resultId = $row['id'];
        $resultUsuario = $row['usuario'];#Almaceno la información de usuarios existentes
        $resultCorreo = $row['correo'];
    }

        #verifico que no haya un usuario con ese documento
    if ($resultUsuario==$usuario && $resultCorreo==$correo && $resultId==$id){#SI lo hay, mensaje de error y redirección al registro

        $_SESSION['message'] = 'Tus credenciales coinciden, ya puedes modificar tu contraseña';
        $_SESSION['message_type'] = 'danger'; 
        $location = "../../recuperar/updateContraseña.php?id=".$usuario;#Destino
        header("Location: $location");#Redirección
    }else{#Si NO lo hay, verifico que las contraseñas coincidan
        $_SESSION['message'] = '¡Tus credenciales no coinciden!';
        $_SESSION['message_type'] = 'danger'; 
        header('Location:../../recuperar/recuperar_contraseña.php');
    }

}

    if (isset($_POST['cambiarContrasena'])){
        $idUsuario = $_POST['usuario'];
        $passwordform = $_POST['contrasena'];
        $passwordform2 = $_POST['contrasena2'];
        $contrasena =md5($passwordform);
        $contrasena2 = md5($passwordform2);

        if ($contrasena == $contrasena2){#SI coinciden, registro al usuario
            
            $update = "UPDATE user_login SET contraseña = '$contrasena' WHERE usuario = $idUsuario";
            $result = mysqli_query($conn, $update);

            if ($result) {#SI hay un resultado, mensaje de exito y redirecciono
                
                $_SESSION['message'] = 'Hemos actualizado tu contraseña, ya puedes ingresar';
                $_SESSION['message_type'] = 'success';
                header('Location:../../index.php#login');
            }else {#Si NO lo hay, mensaje de error y redirección

                $_SESSION['message'] = 'Error al guardar cambios, intentelo de nuevo';
                $_SESSION['message_type'] = 'danger';
                header('Location:../../recuperar/updateContraseña.php');
            }
        }else{#Si NO coinciden, mensaje de error y rediección

            $_SESSION['message'] = 'Verifique que las contraseñas coincidan';
            $_SESSION['message_type'] = 'danger';
            header('Location:../../recuperar/updateContraseña.php');
        } 
    }
    
?>