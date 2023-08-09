<?php

session_start();
$usuario = $_SESSION['usuario'];
$rol = $_SESSION['rol'];

if(!isset($usuario)){
    header("Location: ../../administrador/login.php");
}else{

    if ($rol==2){
        
    }else{
        session_destroy();
        header("Location: ../../administrador/login.php");
        exit();
    }

} 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Administrador</title>

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <!-- FONTAWESOME -->
        <link rel="stylesheet" href="../../fontawesome/css/all.css">
        <!-- CDN de Bootstrap 4-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style type="text/css"> 
        .transformacion1 { text-transform: capitalize;}   
        .transformacion2 { text-transform: uppercase;}   
        .transformacion3 { text-transform: lowercase;}   
        </style>
    </head>
<body>
        
        <?php 
            include("../../conexion/conexion.php");

            $sql    = "SELECT * FROM user_login WHERE usuario = $usuario";
            $result = mysqli_query($conn, $sql);
            
            while ($row = mysqli_fetch_array($result)){
        ?>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-success" id="sidebar-wrapper">

            <div class="sidebar-heading border-bottom bg-success">

                <center>
                    <h4>
                        <a class="list-group-item list-group-item-action bg-success text-white p-3" href="../admin.php">
                            <img style = "width: 10rem; height: 10rem; border-radius: 50%; border: .5rem solid white;" src="data:image/jpg;base64,<?php echo base64_encode($row['foto']); ?>" alt="">
                            <p class="p-3"><?php echo $row['usuario'] ?></p>
                        </a>
                    </h4>
                </center>

            </div>

                <div class="list-group list-group-flush">

                    <h5>
                        <a class="list-group-item list-group-item-action text-white bg-success p-3" href="recetas.php">
                            <i class="fa-solid fa-bell-concierge"></i>
                            Recetas
                        </a>
                    </h5>

                    <h5>
                        <a class="list-group-item list-group-item-action text-white bg-success p-3" href="../logica/cerrar_sesion.php">
                            <i class="fa-regular fa-circle-left"></i>
                            Cerrar sesión
                        </a>
                    </h5>

                    </div>

                </div><!-- end list-group -->

            <!-- Contenido-->
            <div id="page-content-wrapper">

                <!-- Header-->
                <nav class="navbar navbar-expand-lg navbar-success bg-success border-bottom">

                    <div class="container-fluid">

                        <button class="btn btn-light" id="sidebarToggle">
                            <img src="../../img/lista.png" style="width: 30px; height: 30px;" alt="">
                        </button>
                    
                        <h3 class="transformacion1 text-white" style="position: absolute;
                        left: 100px;"><?php echo $row['nombre'] ?></h3>
            <?php 
            }/* end while */
            ?>
                    </div>

                </nav>

            <?php 
            if(isset($_SESSION['message'])){
            ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">

                    <?=  $_SESSION['message']?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div><!-- end alert alert -->

            <?php 
            } unset($_SESSION['message']); 
            ?>

            <?php
            if (isset($_GET['id'])){# Verifico si hay una variable y no es NULL
                $id = $_GET['id'];# ID
            }

            $query  = "SELECT recetas.id AS id_receta, recetas.nombre AS receta, preparacion , categoria_recetas.descripcion AS nombre_categoria, imagen, fecha, user_login.* , recetas.activo FROM recetas INNER JOIN (categoria_recetas, user_login) ON (categoria=categoria_recetas.id AND creador=usuario) WHERE recetas.id= $id" ;
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($result)){ 

            foreach($result as $receta) {?>

            <div class="col-md-11 mx-auto" style="margin-top: 2rem; margin-bottom: 2rem;">

                <div class="card border-success">

                    <div class="row">

                        <div class="col-sm-11">

                        <!-- HEADER INFO RECETA -->
                            <div class="card-header border-success" style="margin-right: -2rem; height: 8rem;">

                                <img class="rounded-circle float-left" style = "width: 4rem; margin-right: 1rem;" src="data:image/jpg;base64,<?php echo base64_encode($receta['foto']); ?>" alt="">

                                <p class="h5"> Por:<?php echo $receta['nombre'] ?>
                                    <p class="h6">En: <?php echo substr($receta['fecha'], 0, -9) ?></p>
                                </p>
                                <h2 class="card-title transformacion1 text-dark">
                                    <?php echo $receta['receta']; ?><span class="text-success">></span>Receta
                                </h2> 

                            </div>

                        </div><!-- end col-md-11 -->

                        <!-- CERRAR RECETA -->
                        <div class="col-sm-1" >
                            <div class="card-header border-success" style="margin-left: 0px; height: 8rem;">
                                <a name="" id="" class="btn btn-light" style="" href="recetas.php">
                                    <img src="../../img/close-icon.svg" alt="" style="width: 1rem;">
                                </a>
                            </div>
                        </div><!-- end col-md-1 -->
                            
                    </div><!-- end row -->

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
                        <div class="col-md-4">
                            <img style="width: 100%;border-radius: 10%;" src="data:image/jpg;base64,<?php echo base64_encode($receta['imagen']); ?>" alt="">
                        </div><!-- end col-md-4 -->

                        <!-- PRODUCTOS QUE TIENE LA RECETA -->
                        <div class="col-md-8">
                            
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

            </div><!-- end col-md-11-->

            <?php 
            }/* end foreach*/
            }/* end while */
            ?>
  
        </div><!--wrapper -->

    </div><!-- end d-flex -->

        <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
</body>
</html>