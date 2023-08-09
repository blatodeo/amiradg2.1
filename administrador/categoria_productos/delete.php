<?php
    include ("../../conexion/conexion.php");#Conexión a la BD
    session_start();#Inicio de sesión

    if (isset($_GET['id'])){#Si obtinene el ID, lo guardo
        $id                 = $_GET['id'];
        $getCategorias      = "SELECT COUNT(categoria) AS categorias, descripcion FROM producto INNER JOIN categoria_productos ON categoria = categoria_productos.id WHERE categoria = $id";#Acción
        $resultGetCategoria = mysqli_query($conn, $getCategorias);#Resultado de la acción

        while ($rowCategoria = mysqli_fetch_array($resultGetCategoria)){#Obtiene una fila de resultados como un array asociativo, numérico, o ambos
            $categorias      = $rowCategoria['categorias'];
            $nombreCategoria = $rowCategoria['descripcion'];
        }

        if ($categorias>0){#SI hay productos que dependen de la categoria, mensaje y redirección

            $_SESSION['message'] = '¡Categoria en uso! ' . $categorias . ' productos dependen de ' . $nombreCategoria . ' .NO se puede eliminar';#Mensaje
            $_SESSION['message_type'] = 'danger'; # Tipo de mensaje
            header("Location:categorias.php"); # Redirección

        }else{#SINO, elimina la categoria

            $query  = "DELETE FROM categoria_productos WHERE id = $id";#Acción
            $result = mysqli_query($conn, $query);#Resultado de la acción

            if ($result){#SI hay un resultado, mensaje de exito y redirección
                $_SESSION['message'] = '¡Se eliminó la categoria!';#Mensaje
                $_SESSION['message_type'] = 'danger'; #Tipo de mensaje
                header("Location:categorias.php"); # Redirección
            }
        }
        
    }

?>