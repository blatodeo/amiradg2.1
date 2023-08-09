<?php
    include("../../conexion/conexion.php");# Conexión a la BD
    session_start();# Inicio de sesión

    if (isset($_GET['id'])){# Verifico si existe una variable y no es NULL

        # SI existe la guardo y POSTEO LA IFORMACIÓN DEL FORMULARIO

        $id          = $_GET['id'];      # ID de usuario
        $nombre      =$_POST["nombre"];  # Nombre
        $correo      = $_POST["correo"]; # correo

        if(strlen($_FILES['foto']['tmp_name'])>0){# Verifico que se haya seleccionado un archivo, SI se seleccionó guardo su contenido

            $foto   = addslashes(file_get_contents($_FILES['foto']['tmp_name']));# Foto
            $update = "UPDATE user_login SET nombre = '$nombre', correo = '$correo', foto = '$foto' WHERE id = $id";#Acción a ejecutar
            $result = mysqli_query($conn, $update);# Resultado de la acción

            if($result){# SI hay un resultado, mensaje de exito y redirección
                $_SESSION['message'] = '¡Cambios guardados exitosamente!';# Mensaje
                $_SESSION['message_type'] = 'success'; # Tipo de mensaje
                header('Location:../user.php');# Redirección

            }else{# Si NO hay un resultado, mensaje de error y redirección
                $_SESSION['message'] = '¡Error al guardar cambios, inténtelo de nuevo!';# Mensaje
                $_SESSION['message_type'] = 'success'; # Tipo de mensaje
                header('Location:../user.php');# Redirección
            }

        }else{# Si NO se seleccionó, ejecuto una acción distinta

            $update = "UPDATE user_login SET nombre = '$nombre', correo = '$correo' WHERE id = $id";# Acción
            $result = mysqli_query($conn, $update);# Resultado de la acción
            
            if($result){#SI hay un resultado, mensaje de exito y redirección
                $_SESSION['message'] = '¡Cambios guardados exitosamente!';# Mensaje
                $_SESSION['message_type'] = 'success'; # Tipo de mensaje
                header('Location:../user.php');# Redirección

            }else{# Si NO hay un resultado, mensaje de error y redirección
                $_SESSION['message'] = '¡Error al guardar cambios, inténtelo de nuevo!';# Mensaje
                $_SESSION['message_type'] = 'success'; # Tipo de mensaje
                header('Location:../user.php');# Redirección
            }
        }

    }

?>