<?php
    include("../../conexion/conexion.php");
    session_start();
    
    if(isset($_POST['update'])){

        $id           = $_POST['id'];
        $nombrer      = $_POST['nombre'];
        $preparacionr = $_POST['preparacion'];
        $codigo_c_r   = $_POST['categoria'];
        
        if(strlen($_FILES['imagen']['tmp_name'])>0){# Verifico que se haya seleccionado un archivo, SI se seleccionó guardo su contenido

            $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));# Imagen
            $update = "UPDATE recetas set nombre = '$nombrer',preparacion = '$preparacionr', categoria = $codigo_c_r, imagen = '$imagen' WHERE id = $id";
            $result = mysqli_query($conn, $update);# Resultado de la acción

            if($result){# SI hay un resultado, mensaje de exito y redirección
                $_SESSION['message'] = '¡Cambios guardados exitosamente!';# Mensaje
                $_SESSION['message_type'] = 'success'; # Tipo de mensaje
                header('Location:recetas.php');# Redirección

            }else{# Si NO hay un resultado, mensaje de error y redirección
                $_SESSION['message'] = '¡Error al guardar cambios, inténtelo de nuevo!';# Mensaje
                $_SESSION['message_type'] = 'success'; # Tipo de mensaje
                header('Location:recetas.php');# Redirección
            }

        }else{# Si NO se seleccionó, ejecuto una acción distinta

            $update = "UPDATE recetas set nombre = '$nombrer',preparacion = '$preparacionr', categoria = $codigo_c_r WHERE id = $id";# Acción
            $result = mysqli_query($conn, $update);# Resultado de la acción
            
            if($result){#SI hay un resultado, mensaje de exito y redirección
                $_SESSION['message'] = '¡Cambios guardados exitosamente!';# Mensaje
                $_SESSION['message_type'] = 'success'; # Tipo de mensaje
                header('Location:recetas.php');# Redirección

            }else{# Si NO hay un resultado, mensaje de error y redirección
                $_SESSION['message'] = '¡Error al guardar cambios, inténtelo de nuevo!';# Mensaje
                $_SESSION['message_type'] = 'success'; # Tipo de mensaje
                header('Location:recetas.php');# Redirección
            }
        }

    } 
?>