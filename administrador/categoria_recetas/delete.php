<?php
    include ("../../conexion/conexion.php");#Conexión
    session_start();#Inicio de sesión

     if (isset($_GET['id'])){#Verifico que hay una variable y no es NULL 
        $id                 = $_GET['id'];
        $getCategorias      = "SELECT COUNT(categoria) AS categorias, descripcion FROM recetas INNER JOIN categoria_recetas ON categoria = categoria_recetas.id WHERE categoria = $id";#Acción
        $resultGetCategoria = mysqli_query($conn, $getCategorias);#Resultado de la acción

        while ($rowCategoria = mysqli_fetch_array($resultGetCategoria)){#Obtiene una fila de resultados como un array asociativo, numérico, o ambos
            $categorias = $rowCategoria['categorias'];
            $nombreCategoria = $rowCategoria['descripcion'];
        }

        if ($categorias>0){#Si hay recetas que dependen de la categoria, mensaje de error y redirección
            $_SESSION['message'] = '¡Categoria en uso! ' . $categorias . ' recetas dependen de ' . $nombreCategoria . ' .NO se puede eliminar';#Mensaje
            $_SESSION['message_type'] = 'danger'; #Tipo de mensaje
            header("Location:categorias.php"); # Redirección

        }else{#SINO, la elimino

            $query  = "DELETE FROM categoria_recetas WHERE id = $id";#Acción
            $result = mysqli_query($conn, $query);#Resultado de la acción

            if ($result){#Si hay un resultado, mensaje de exito y redirección
                $_SESSION['message'] = '¡Se eliminó la categoria!';#Mensaje
                $_SESSION['message_type'] = 'danger'; #Tipo de mensaje
                header("Location:categorias.php"); # Redirección
            }
        }
        
    }
?>