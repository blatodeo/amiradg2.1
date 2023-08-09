<?php
include('../../../conexion/conexion.php');#Conexión a la BD
session_start();#Inicio de sesión 

    if (isset($_GET['id'])){# Verifico si hay una variable y no es null
        $id = $_GET['id'];# Si la hay, la guardo
    }

    if (isset($_POST['enviar'])){# verifico si hay una acción

        # SI la hay, guardo la información recibida en variables

        $receta   = $_POST["receta"];    # Variable que recibe el ID de la receta
        $producto = $_POST["productos"]; # Variable que recibe el ID del producto
        $cantidad = $_POST["cantidad"];  # Variable que recibe la cantidad
        $unidad_m = $_POST["unidad"];    # Variable que recibe el ID de la unidad de medida

    
        /* CONSULTA PARA VALIDAR INFORMACIÓN */
        $consulta = "SELECT id_producto, nombre FROM producto_receta INNER JOIN recetas ON id_receta = recetas.id WHERE id_receta = $receta";# Acción
        $resultConsulta = mysqli_query($conn, $consulta);# Resulatdo de la acción

        #VALIDACIÓN

        while ($rowConsulta = mysqli_fetch_array($resultConsulta)){ #Creo Arrays para traer los datos de manera ordenada

            $nombreReceta = $rowConsulta['nombre'];# Variable que guarda el nombre de la receta
            $idProducto   = $rowConsulta['id_producto'];# Variable que guarda el ID del producto

        }

            if ($idProducto==$producto){# Verifico que el producto a insertar en la receta no exista

                #¡SI! existe, cero una consulta para traer datos y mostrar un mensaje de error
                
                $recibNombre       = "SELECT nombre FROM producto WHERE id = $producto";# Consulta
                $recibNombreResult = mysqli_query($conn, $recibNombre);# Resulatdo 

                while ($rowNombre = mysqli_fetch_array($recibNombreResult)){# Creo Arrays para traer el nombre del producto

                    $nombreP = $rowNombre['nombre'];# Alamceno el nombre del producto 

                }

                #MENSAJE DE ERROR
                $_SESSION['message']      = $nombreReceta.' ya tiene '.$nombreP; # Mensaje
                $_SESSION['message_type'] = 'danger';# Tipo de mensaje
                $location = "productos.php?id=".$id;#Destino
                header("Location: $location");#Redirección

            }else{

                #Si ¡NO! existe, inserto el producto en la receta

                $insertar = "INSERT INTO producto_receta (id_receta, id_producto, cantidad, unidad) VALUES ($receta,$producto,$cantidad, $unidad_m)"; #Acción
                $resultado = mysqli_query($conn,$insertar); #Resulatdo

                #VALIDACIÓN DEL RESULTADO

                if ($resultado) { 
                    #¡SI! se insertó, trae el nombre del producto y muestra un mensaje de exito
                    $get_producto  = "SELECT nombre FROM producto WHERE id = $producto";
                    $get_producto2 = mysqli_query($conn, $get_producto);

                    while($row = mysqli_fetch_array($get_producto2)){
                        $nombreProducto = $row['nombre'];
                    }

                    #MENSAJE DE EXITO
                    $_SESSION['message']      = 'Se añadió '. $nombreProducto; #Mensaje
                    $_SESSION['message_type'] = 'success'; #Tipo de mensaje
                    $location = "productos.php?id=".$id;#Destino
                    header("Location: $location"); #Redirección

                }else{

                    #Si ¡NO! se insertó, muestra un mensaje de error
                    $_SESSION['message'] = 'No se pudo añadir'. $nombreProducto.', intentelo de nuevo';# Mensaje
                    $_SESSION['message_type'] = 'danger'; # Tipo de mensaje
                    $location = "productos.php?id=".$id;#Destino
                    header("Location: $location");#Redirección
                }
            } 
    }  


?>