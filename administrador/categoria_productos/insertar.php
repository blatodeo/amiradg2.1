<?php
    include('../../conexion/conexion.php');#Conexión a la BD
    session_start();#Inicio de sesión

    if (isset($_POST['enviar'])){#Verifico que hay una variable y no es NULL

        $descripcion = $_POST['descripcion'];# Datos del form

        /* CREO UNA CONSULTA PARA VALIDAR INFORMACION */
        $validar       = "SELECT descripcion FROM categoria_productos WHERE descripcion = '$descripcion'";#Acción
        $resultValidar = mysqli_query($conn, $validar);#Resultado de la acción

        while ($row = mysqli_fetch_array($resultValidar)){#Obtiene una fila de resultados como un array asociativo, numérico, o ambos
            $resultCategoria = $row['descripcion'];#Almaceno la información de categorias existentes
        }

        #verifico que no haya una categoria con es descripción
        if ($resultCategoria==$descripcion){#SI la hay, mensaje de error y redirección al registro

            $_SESSION['message'] = 'La categoria '.$descripcion.' ya existe';# Mensaje
            $_SESSION['message_type'] = 'danger'; #Tipo de mensaje
            header('Location:../inventarios/inventarios.php');#Redirección

        }else{#SINO, la registro

            $insert = "INSERT INTO categoria_productos (descripcion) VALUES ('$descripcion')";#Acción
            $result = mysqli_query($conn, $insert);# Redirección

            if ($result) {#SI hay un resultado, mensaje de exito
                $_SESSION['message'] = '¡Se ha registrado la categoria!';#Mensaje
                $_SESSION['message_type'] = 'success'; # Tipo de mensaje
                header('Location:../inventarios/inventarios.php');#Redirección
            } else {#SINO, mensaje de error
                $_SESSION['message'] = '¡Ha ocurrido un error, intentelo de nuevo!';#Mensaje
                $_SESSION['message_type'] = 'danger'; #Tipo de mensaje
                header('Location:../inventarios/inventarios.php');# Redirección
            }
        }
    }

    if (isset($_POST['agregar'])) {#Verifico que hay una variable y no es NULL

        $descripcion = $_POST['descripcion'];# Datos del form

        /* CREO UNA CONSULTA PARA VALIDAR INFORMACION */
        $validar       = "SELECT descripcion FROM categoria_productos WHERE descripcion = '$descripcion'";#Acción
        $resultValidar = mysqli_query($conn, $validar);#Resultado de la acción

        while ($row = mysqli_fetch_array($resultValidar)){#Obtiene una fila de resultados como un array asociativo, numérico, o ambos
            $resultCategoria = $row['descripcion'];#Almaceno la información de categorias existentes
        }

        #verifico que no haya una categoria con es descripción
        if ($resultCategoria==$descripcion){#SI la hay, mensaje de error y redirección al registro

            $_SESSION['message'] = 'La categoria '.$descripcion.' ya existe';
            $_SESSION['message_type'] = 'danger'; 
            header('Location:categorias.php');

        }else{

            $insert = "INSERT INTO categoria_productos (descripcion) VALUES ('$descripcion')";#Acción
            $result = mysqli_query($conn, $insert);#Resultado de la acción

            if ($result) {#SI hay un resultado, mensaje de exito
                $_SESSION['message'] = '¡Se ha registrado la categoria!';#Mensaje
                $_SESSION['message_type'] = 'success'; #Tipo de mensaje
                header('Location:categorias.php');#Redirección
            } else {#SINO, mensaje de error
                $_SESSION['message'] = '¡Ha ocurrido un error, intentelo de nuevo!';#Mensaje
                $_SESSION['message_type'] = 'danger'; #Tipo de mensaje
                header('Location:categorias.php');#Redirección
            }

        }
    }

?>