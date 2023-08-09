<?php
include('../../conexion/conexion.php');
session_start();


    if (isset($_POST['enviar'])){ #verifico si hay una acción

        $usuario       = $_POST['usuario'];#creo variables que alamcenan la información enviada en el formulario
        $nombre        = $_POST['nombre'];
        $correo        = $_POST['correo']; 
        $passwordform  = $_POST['contrasena'];
        $passwordform2 = $_POST['contrasena2'];
        $contrasena    = md5($passwordform);
        $contrasena2   = md5($passwordform2);

        /* CREO UNA CONSULTA PARA VALIDAR USUARIOS*/
        $validarUsuario        = "SELECT usuario FROM user_login WHERE usuario = $usuario";
        $resultValidarUsusario = mysqli_query($conn, $validarUsuario);

        while ($rowUsuario = mysqli_fetch_array($resultValidarUsusario)){
            $resultUsuario = $rowUsuario['usuario'];#Almaceno la información de usuarios existentes
        }

            #Verifico que no haya un usuario con ese documento
            if ($resultUsuario==$usuario){#SI lo hay, mensaje de error y redirección al registro

                $_SESSION['message'] = 'El documento de identidad '.$usuario.' ya se encuentra registrado, verifique su información y vuelva a intentarlo';
                $_SESSION['message_type'] = 'danger'; 
                header('Location:../../registro.php');

            #Si NO lo hay, verifico que las contraseñas coincidan
            } elseif ($contrasena == $contrasena2){#SI coinciden, registro al usuario
            
                $insert = "INSERT INTO user_login (usuario, nombre, correo, contraseña, rol)
                VALUES ($usuario,'$nombre','$correo','$contrasena', 2)";#variable de registro
                $result = mysqli_query($conn, $insert);

                if ($result) {#SI hay un resultado, mensaje de exito y redirecciono
                    $getID       = "SELECT id from user_login WHERE usuario = $usuario";
                    $resultGetId = mysqli_query($conn, $getID);
                    $rowID       = mysqli_fetch_array($resultGetId);
                    $ID          = $rowID['id'];

                    $_SESSION['message'] = 'Bienvendid@ a AMIRA-DG, recuerda que tu usuario es tu documento de identidad, adicionalmente es muy ¡IMPORTANTE! que guardes o memorices tu ID de registro para que puedas cambiar tu contraseña en caso de la pérdida de la misma. Tu ID de registro es ' . $ID;
                    $_SESSION['message_type'] = 'success';
                    header('Location:../../index.php#login');

                }else {#Si NO lo hay, mensaje de error y redirección

                    $_SESSION['message'] = 'Error al registrar, intentelo de nuevo';
                    $_SESSION['message_type'] = 'danger';
                    header('Location:../../registro.php');
                }

            }else{#Si NO coinciden, mensaje de error y rediección

                $_SESSION['message'] = 'Verifique que las contraseñas coincidan';
                $_SESSION['message_type'] = 'danger';
                header('Location:../../registro.php');
        } 
    }
    
?>