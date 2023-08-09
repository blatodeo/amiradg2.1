<?php 
    include("../../conexion/conexion.php");
    session_start();
    $usuario = $_SESSION['usuario'];

    if (isset($_POST['entrada'])){
        $id       = $_POST['id'];
        $tipo     = $_POST['tipo'];
        $cantidad = $_POST['cantidad'];
        $unidad   = $_POST['unidad'];


        $getExistencias      = "SELECT * FROM producto WHERE id = $id AND activo = 1";
        $resulGetExistencias = mysqli_query($conn, $getExistencias);

        while ($rowGetExistencias = mysqli_fetch_array($resulGetExistencias)){

            $idProducto   = $rowGetExistencias['id'];
            $nombre       = $rowGetExistencias['nombre'];
            $existencias  = $rowGetExistencias['existencias'];
            $unidadMedida = $rowGetExistencias['unidad'];
            $vencimiento  = $rowGetExistencias['vencimiento'];

        }

        if ($tipo==1){

            $suma          = $cantidad + $existencias;
            $entrada       = "UPDATE producto SET existencias = $suma WHERE id = $id AND activo = 1";
            $resultEntrada = mysqli_query($conn, $entrada);

            if ($resultEntrada){

                $movimientoTipo = "Entrada";
                $movimientoProducto = $idProducto;
                $movimientoCantidad = $cantidad;
                $movimientoUnidad = $unidadMedida;
                $movimientoFecha = date("Y-m-d"); 
                $movimientoHora = date("H:i:s");
                $movimientoResponsable = $usuario;
                
                $movimientoInsert = "INSERT INTO movimientos(tipo, id_producto, cantidad, unidad, fecha, hora, responsable) VALUES ('$movimientoTipo', $movimientoProducto, $movimientoCantidad, '$movimientoUnidad', '$movimientoFecha', '$movimientoHora', $movimientoResponsable)";
                $resultMovimiento = mysqli_query($conn, $movimientoInsert);

                $_SESSION['message']      = 'Se añadieron '. $cantidad . ' ' . $unidadMedida. ' de ' . $nombre;
                $_SESSION['message_type'] = 'success'; 
                $location                 = "ingresos.php?id=".$id;#Destino
                header("Location: $location");
            }
            
              
        }else{

            if ($existencias<$cantidad){

                $_SESSION['message']      = 'No puedes retirar '. $cantidad . ' ' . $unidadMedida. ' de ' . $nombre . ' porque el inventario solo cuenta con ' . $existencias . ' ' . $unidadMedida . ' , digita una cantidad menor o realiza una entrada y vuelve a intentarlo!';
                $_SESSION['message_type'] = 'danger'; 
                $location                 = "ingresos.php?id=".$id;#Destino
                header("Location: $location");

            }else{

                $resta         = $existencias - $cantidad;
                $salida        = "UPDATE producto SET existencias = $resta WHERE id = $id AND activo = 1";
                $resultEntrada = mysqli_query($conn, $salida);

                if ($resultEntrada){

                    $movimientoTipo = "Salida";
                    $movimientoProducto = $idProducto;
                    $movimientoCantidad = $cantidad;
                    $movimientoUnidad = $unidadMedida;
                    $movimientoFecha = date("Y-m-d"); 
                    $movimientoHora = date("H:i:s");
                    $movimientoResponsable = $usuario;
                    
                    $movimientoInsert = "INSERT INTO movimientos(tipo, id_producto, cantidad, unidad, fecha, hora, responsable) VALUES ('$movimientoTipo', $movimientoProducto, $movimientoCantidad, '$movimientoUnidad', '$movimientoFecha', '$movimientoHora', $movimientoResponsable)";
                    $resultMovimiento = mysqli_query($conn, $movimientoInsert);

                    $_SESSION['message']      = 'Se descontaron '. $cantidad . ' ' . $unidadMedida. ' de ' . $nombre;
                    $_SESSION['message_type'] = 'success'; 
                    $location                 = "ingresos.php?id=".$id;#Destino
                    header("Location: $location");
                }
            }
            
        }

    }

?>