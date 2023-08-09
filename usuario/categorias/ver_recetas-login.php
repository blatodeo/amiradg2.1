<?php
include("../../conexion/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas</title>
    <link rel="stylesheet" href="../css/recetas_style.css">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="../../fontawesome/css/all.css">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Grape+Nuts&family=Roboto&display=swap" rel="stylesheet">
    <!---->
    
    <!-- Bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css"> 
    .transformacion1 { text-transform: capitalize;}   
    .transformacion2 { text-transform: uppercase;}   
    .transformacion3 { text-transform: lowercase;}   

    .ver-receta{
        margin-top: 5rem;
        margin-bottom: 5rem;
    }
    </style>

</head>
<body>

<section class="ver-receta">

<?php
            if (isset($_GET['id'])){# Verifico si hay una variable y no es NULL
                $id = $_GET['id'];# ID

            $query  = "SELECT recetas.id AS id_receta, recetas.nombre AS receta, preparacion , categoria_recetas.descripcion AS nombre_categoria, imagen, fecha, user_login.* , recetas.activo FROM recetas INNER JOIN (categoria_recetas, user_login) ON (categoria=categoria_recetas.id AND creador=usuario) WHERE recetas.id= $id" ;
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($result)){ 

            foreach($result as $receta) {?>

                <div class="col-md-8 mx-auto card border-success">

                <!-- HEADER INFO RECETA -->
                    <div class="row col-md-12 mx-auto card-header border-success" style="height: 9rem;">

                        <div class="col-md-10">
                            
                            <img class="rounded-circle float-left" style = "width: 4rem; margin-right: 1rem;" src="data:image/jpg;base64,<?php echo base64_encode($receta['foto']); ?>" alt="">

                            <p class="h5"> Por:<?php echo $receta['nombre'] ?>
                                <p class="h6">En: <?php echo substr($receta['fecha'], 0, -9) ?></p>
                            </p>
                            <h2 class="card-title transformacion1 text-dark">
                                <?php echo $receta['receta']; ?><span class="text-success">></span>Receta
                            </h2>
                        </div>
                        <div class="col-md-2">
                            <a name="" id="" class="btn btn-light btn-lg" style="margin-left: 8rem;" href="../../index.php#recetas-recientes">
                                <i class="fa-solid fa-close"></i>
                            </a>
                        </div>
                        
                    </div>                                

                    <div class="card-body border-success">

                        <div class="alert alert-success">

                            <div class="col-sm-8" style="">
                                <p class="h4">
                                    <i class="fa-solid fa-user-group"></i>
                                    Receta Estándar
                                </p>
                            </div>
                            
                            <div class="col-sm-8">
                                <h4 class="card-title">Categoria
                                    <span class="badge badge-success"><?php echo $receta['nombre_categoria'];?></span>
                                </h4>
                            </div>

                        </div><!-- end alert -->

                    </div><!-- end card-body -->

                    <div class="row col-md-12" style = "">

                        <!-- IMAGEN -->
                        <div class="col-md-6">
                            <img style="width: 100%;border-radius: 10%;" src="data:image/jpg;base64,<?php echo base64_encode($receta['imagen']); ?>" alt="">
                        </div><!-- end col-md-4 -->

                        <!-- PRODUCTOS QUE TIENE LA RECETA -->
                        <div class="col-md-6">
                            
                            <?php
                            $resProducto    = "SELECT COUNT(id_producto) AS Cproductos FROM producto_receta WHERE id_receta= $id";
                            $resProductos   = mysqli_query($conn, $resProducto);
                            $resultProducto = mysqli_fetch_array($resProductos);
                            
                            if ($resultProducto['Cproductos']>0){?>

                                <table class="table bordered-none">

                                    <thead>

                                        <tr>
                                        <?php
                                        $nombreReceta = "SELECT nombre FROM recetas WHERE id= $id";
                                        $nombreResult = mysqli_query($conn, $nombreReceta);

                                        while ($nombre = mysqli_fetch_array($nombreResult)){

                                        ?>

                                            <div class="col-sm-12" style="">
                                                <h5>
                                                    Ingredientes para preparar  <strong class="transformacion1" style="color: green;"><?php echo $nombre['nombre'] ?></strong>:
                                                </h5>
                                            </div>

                                        <?php
                                        }
                                        ?>
                                            <th>Producto </th>
                                            <th>Cantidad </th>
                                            <th>Unidad   </th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                    <?php
                                    $productos = "SELECT producto_receta.*,producto.nombre AS nombreProducto, cantidad, unidad_medida.descripcion AS descripcionunidad FROM producto_receta INNER JOIN (producto, unidad_medida, recetas) ON (id_producto=producto.id AND unidad_medida.id = producto_receta.unidad AND id_receta=recetas.id) WHERE id_receta = $id";
                                    $rprod    = mysqli_query($conn, $productos);
                                    
                                        while($row = mysqli_fetch_array($rprod)){
                                    ?>
                                        <tr>
                                            
                                            <td class="transformacion1"><?php echo $row['nombreProducto'];?> </td>
                                            <td class="transformacion1"><?php echo $row['cantidad']; ?>      </td>
                                            <td class="transformacion1"><?php echo $row['unidad']; ?>        </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                            
                                    </tbody>

                                </table>
                                
                            <?php 
                            }else{
                            ?>

                                <div class="alert alert-danger fade show" role="alert" style="margin-top: 1rem;">

                                    <strong><h5><?php echo $receta['receta'] ?> NO tiene productos</h5></strong>
                                    <a name="" id="" class="btn btn-primary" href="productos/productos.php?id=<?php echo $receta['id_receta'] ?>">
                                        Añadelos aquí <i class="fa fa-plus"></i>
                                    </a>

                                </div>
                                
                            <?php
                            }
                            ?>
                        </div><!-- end col-md-8-->
                        <h4 class="card-title">
                            ¿Cómo preparar <strong class="transformacion1" style="color: green;"><?php echo $receta['receta'] ?></strong>?
                        </h4>
                        <h5 class="card-text text-dark" style="margin-bottom: 2rem;"><?php echo $receta['preparacion']; ?></h5>

                    </div><!-- end row col-md-12-->

                </div><!-- end card -->

            <?php 
            }/* end foreach*/
            }/* end while */
        }
            ?>
</section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
