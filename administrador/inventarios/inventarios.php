<?php

session_start();
$usuario = $_SESSION['usuario'];
$rol = $_SESSION['rol'];

if(!isset($usuario)){
    header("Location: ../login.php");
}else{

    if ($rol==1){
        
    }else{
        session_destroy();
        header("Location: ../login.php");
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

        <!-- Favicon-->
       <!--  <link type="image/png" sizes="32x32" rel="icon" href=".../Img/icons8-cocinero-de-sexo-masculino-32.png"> -->
        <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <!--Fontasome-->
        <link rel="stylesheet" href="../../fontawesome/css/all.css">
        <!-- CDN de Bootstrap 4-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style type="text/css"> 
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
        }
        .transformacion1 { text-transform: capitalize;}   
        .transformacion2 { text-transform: uppercase;}   
        .transformacion3 { text-transform: lowercase;}   
        </style>
    </head>
    <body>
        
        <?php 
            include("../../conexion/conexion.php");

            $sql = "SELECT * FROM user_login WHERE usuario = $usuario";
            $result = mysqli_query($conn, $sql);
            
            while ($row = mysqli_fetch_array($result)){
        ?>

        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-success" id="sidebar-wrapper">

                <div class="sidebar-heading border-bottom bg-success">

                <center>
                    <h4>
                        <a class="list-group-item list-group-item-action bg-success border-0 text-white p-3" href="../admin.php">
                            <img style = "width: 10rem; height: 10rem; border-radius: 50%; border: .5rem solid white;" src="data:image/jpg;base64,<?php echo base64_encode($row['foto']); ?>" alt="">
                            <p class="p-3"><?php echo $row['usuario'] ?></p>
                        </a>
                    </h4>
                </center>

                </div>

                <div class="list-group list-group-flush">

                    <div class="dropdown">
                        
                        <button class="list-group-item list-group-item-action text-white bg-success border-0 p-3 h5 dropdown-toggle" type="button" id="recetasOptions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-bell-concierge"></i>
                            Recetas
                        </button>

                        <div class="dropdown-menu bg-success" aria-labelledby="recetasOptions">
                            <a class="dropdown-item list-group-item list-group-item-action text-white bg-success p-3 " href="../recetas/recetas.php">
                                Recetas
                            </a>
    
                            <a class="dropdown-item list-group-item list-group-item-action text-white bg-success p-3 " href="../categoria_recetas/categorias.php">
                                Categorias
                            </a>
 
                        </div>

                    </div>

                    <div class="dropdown">
                        
                        <button class="list-group-item list-group-item-action text-white bg-success border-0 p-3 h5 dropdown-toggle" type="button" id="recetasOptions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-wheat-awn"></i>
                            Inventarios
                        </button>

                        <div class="dropdown-menu bg-success" aria-labelledby="recetasOptions">
                            <a class="dropdown-item list-group-item list-group-item-action text-white bg-success p-3 " href="inventarios.php">
                                Inventarios 
                            </a>

                            <a class="dropdown-item list-group-item list-group-item-action text-white bg-success p-3 " href="../categoria_productos/categorias.php">
                                Categorias
                            </a>

                            <a class="dropdown-item list-group-item list-group-item-action text-white bg-success p-3 " href="movimientos.php">
                                Movimientos 
                            </a>

                        </div>

                    </div>

                    <h5>
                        <a class="list-group-item list-group-item-action text-white bg-success border-0 p-3" href="../aprendices/lista.php">
                            <i class="fa-solid fa-user-graduate"></i>
                            Aprendices
                        </a>
                    </h5>

                    <button type="button" class="list-group-item list-group-item-action bg-success border-0 text-white p-3" data-dismiss="modal" data-toggle="modal" data-target="#cerrarSesion">
                        <h5><i class="fa-regular fa-circle-left"></i>
                        Cerrar sesión</h5>
                    </button>  
 
                </div>

                <!-- Modal CERRAR SESION-->
                <div class="modal fade" id="cerrarSesion" tabindex="-1" role="dialog" aria-labelledby="categoriaModalTitle" aria-hidden="true">

                    <div class="modal-dialog modal-dialog-centered" role="document">

                        <div class="modal-content">

                            <div class="modal-header bg-success">

                                <h3 class="modal-title text-white" id="exampleModalLongTitle">Cerrar Sesión?</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>

                            <div class="modal-body text-center">
                            
                                <h4 class="text-dark">¿Estas seguro de que quieres cerrar sesión?</h4>

                            </div><!-- end modal-body -->

                            <div class="modal-footer border-0">

                                <button type="button" class="btn btn-danger btn-lg" style="height: 3rem; border-radius: 1rem;" data-dismiss="modal">No, continuar aquí</button>
                                <a class="btn btn-success btn-lg" style="height: 3rem; border-radius: 1rem;" href="../Logica/cerrar_sesion.php">Si, cerrar sesión</a>

                            </div>

                        </div><!-- end modal-content -->

                    </div><!-- end modal-dialog -->

                </div><!-- end modal -->

            </div>

            <div id="page-content-wrapper">

                <nav class="navbar navbar-expand-lg navbar-success bg-success border-bottom">

                    <div class="container-fluid">

                        <button class="btn btn-light" id="sidebarToggle">
                            <img src="../img/lista.png" style="width: 30px; height: 30px;" alt="">
                        </button>
                    
                        <h3 class="transformacion1 text-white" style="position: absolute;
                        left: 100px;"><?php echo $row['nombre'] ?></h3>
                        <?php } ?>

                    </div>

                </nav>
                <!-- Page content-->

        <?php /* Consulta para mostrar los productos existentes */
        
        $cuenta  = "SELECT COUNT(nombre) AS resultados FROM producto WHERE activo = 1";/* utilizo una variable para traer la información */
        $rcuenta = mysqli_query($conn, $cuenta);/* almaceno la información */

        if ($row = mysqli_fetch_array($rcuenta)){ /* verifico que la información exista */?>

        <div class="row col-md-12" style="margin-left: .5rem; margin-top: .5rem; margin-right: 1rem;">

            <div class="col-md-2">
                <h3 class="text-dark" style="">Productos: (<span class="text-success"><?php echo $row['resultados'] ?></span>)</h3><!-- muestro la información -->
            </div>

            <div class="col-md-6 mx-auto" style="">

                <form class="form-inline" method="POST"><!-- Formulario para buscar productos -->

                    <input class="form-control" type="text" placeholder="Buscar por nombre" name="encontrar" style="width: 80%; height: 4rem; font-size: 1.5rem; border-radius: 1rem 0 0 1rem;">

                    <button class="btn btn-outline-success text-center" type="submit" name="buscar" style="width: 20%; height: 4rem; font-size: 1.5rem;border-radius: 0 1rem 1rem 0;">Buscar</button>

                </form>

            </div>
                
        </div><!-- end row -->

    <?php 
        }/* end if */
    ?>

    <div class="row" style="margin-left: .5rem; margin-top: .5rem; margin-right: 1rem;">

        <div class="col-md-2">

            <div class="form-group">
                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Nuevo producto">
                    <button class="btn btn-success btn-lg" style="border-radius: 1rem;" data-toggle="modal" data-target="#productoModal">Nuevo
                        <i class="fa fa-plus"></i>
                    </button>
                </span>
            </div>

        </div><!-- end col-md-2 -->

        <?php include("productoModal.php"); ?>

        <div class="col-md-10 mx-auto">

            <?php 
            
            if(isset($_SESSION['message'])){/* Determino si hay un mensaje  */
            
            ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">

                    <h5 class=""><?=  $_SESSION['message']?></h5><!-- Si lo hay lo presento -->

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div><!-- end alert alert -->

            <?php 

            } /* end if */ 

            unset($_SESSION['message']); /* Elimino el mensaje para que no se vuelva a mostrar */
            
            ?>

        </div><!-- end col-md-10 mx-auto -->

    </div><!-- end row -->


    <!-- BUSCAR PRODUCTOS -->
    <?php 
    if(isset($_POST['buscar'])){
        $buscar      = $_POST['encontrar'];  
        $resultados  = "SELECT COUNT(nombre) AS resultados FROM producto WHERE nombre LIKE '%$buscar%' AND activo = 1";
        $resultados2 = mysqli_query($conn, $resultados);

        while ($row = mysqli_fetch_array($resultados2)){
            $rowResult = $row['resultados'];
        }
            if($rowResult>0){
                ?>
                <div class="col-md-12 mx-auto text-center">
                    <h5>Resultados encontrados para <span class="text-success"><?php echo $buscar ?></span> 
                        <span class="badge badge-success">
                            <?php echo $rowResult;?>
                        </span>
                        
                        <a name="" id="" class="btn btn-light" href="inventarios.php" style="margin-left: 4rem;">
                            <i class="fa fa-close"></i>
                        </a>
                    </h5>
                </div>

                <div class="col-md-12 mx-auto">

                    <table class="table table-bordered table-hover">

                        <thead>

                            <tr>
                                <th>ID                 </th>
                                <th>Nombre             </th>
                                <th>Categoria          </th>
                                <th>Existencias        </th>
                                <th>Unidad             </th>
                                <th>Vencimiento        </th>
                                <th>¿Que quieres hacer?</th>
                            </tr>

                        </thead>

                        <tbody>
                        <?php 
                            $query  = "SELECT producto.*, categoria_productos.id AS id_categoria, descripcion FROM producto INNER JOIN categoria_productos ON categoria = categoria_productos.id WHERE nombre LIKE '%$buscar%' AND activo = 1 ORDER BY nombre ASC";
                            $result = mysqli_query($conn, $query);
                            while($rowProducto = mysqli_fetch_array($result)){ 
                            #Obtiene una fila de resultados como un array asociativo, numérico, o ambos
                        ?>
                            <tr>
                                <td>                         <?php echo $rowProducto['id'] ?>          </td>
                                <td class="transformacion1"> <?php echo $rowProducto['nombre'] ?>      </td>
                                <td class="transformacion1"> <?php echo $rowProducto['descripcion'] ?> </td>
                                <td>                         <?php echo $rowProducto['existencias'] ?> </td>
                                <td class="transformacion1"> <?php echo $rowProducto['unidad'] ?>      </td>
                                <td>                         <?php echo $rowProducto['vencimiento'] ?> </td>
                                <td>

                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar">
                                    <button type="button" data-toggle="modal" data-target="#editarModal<?php echo $rowProducto['id']?>" class="btn btn-success btn-lg" style="border-radius: 1rem;">
                                        <i class="fa-solid fa-pen"></i><!-- Link que alamcena el ID para eliminar -->
                                    </button>
                                </span>

                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar">
                                    <button type="button" data-toggle="modal" data-target="#eliminarModal<?php echo $rowProducto['id']?>" class="btn btn-danger btn-lg" style="border-radius: 1rem;">
                                        <i class="fa-solid fa-trash"></i><!-- Link que alamcena el ID para eliminar -->
                                    </button>
                                </span>

                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Entrada/Salida">
                                    <a href="ingresos.php?id=<?php echo $rowProducto['id']?>" class="btn btn-dark btn-lg" style="border-radius: 1rem;">
                                        <i class="fa-solid fa-arrow-right-arrow-left"></i>
                                    </a>
                                </span>

                                </td>
                            </tr>
                            <!-- MODAL PARA EDITAR -->
                            <?php include("modalUpdate.php"); ?>
                            <!-- MODAL PARA ELIMINAR -->
                            <?php include("modalDelete.php"); ?>
                            <?php } ?>
                        </tbody>

                    </table>
                                        
                </div><!-- end col-md-12 mx-auto -->
            <?php
            }else{
                ?>
                    <div class="col-md-12 text-center">
                        <h3 style="text-align: center; ">
                            No se encontraron resultados  para <span class="text-success"><?php echo $buscar ?></span>
                            <a name="" id="" class="btn btn-light" href="inventarios.php">
                                <i class="fa fa-close"></i>
                            </a>
                        </h3>
                        <img src="../../img/undraw_empty.svg" alt="" style="width: 30%; margin: 2rem auto;"> 
                    </div>
                    
                <?php
            }
    }else{
    ?>
        <div class="col-md-12 mx-auto">

                    <table class="table table-bordered table-hover">

                        <thead>

                            <tr>
                                <th>ID                 </th>
                                <th>Nombre             </th>
                                <th>Categoria          </th>
                                <th>Existencias        </th>
                                <th>Unidad             </th>
                                <th>Vencimiento        </th>
                                <th>¿Que quieres hacer?</th>
                            </tr>

                        </thead>

                        <tbody>
                        <?php 
                            $query  = "SELECT producto.*, categoria_productos.id AS id_categoria, descripcion FROM producto INNER JOIN categoria_productos ON categoria = categoria_productos.id WHERE activo = 1 ORDER BY nombre ASC";
                            $result = mysqli_query($conn, $query);
                            while($rowProducto2 = mysqli_fetch_array($result)){ 
                            #Obtiene una fila de resultados como un array asociativo, numérico, o ambos
                        ?>
                            <tr>
                                <td>                         <?php echo $rowProducto2['id'] ?>          </td>
                                <td class="transformacion1"> <?php echo $rowProducto2['nombre'] ?>      </td>
                                <td class="transformacion1"> <?php echo $rowProducto2['descripcion'] ?> </td>
                                <td>                         <?php echo $rowProducto2['existencias'] ?> </td>
                                <td class="transformacion1"> <?php echo $rowProducto2['unidad'] ?>      </td>
                                <td>                         <?php echo $rowProducto2['vencimiento'] ?> </td>
                                <td>

                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar">
                                    <button type="button" data-toggle="modal" data-target="#editarModal<?php echo $rowProducto2['id']?>" class="btn btn-success btn-lg" style="border-radius: 1rem;">
                                        <i class="fa-solid fa-pen"></i><!-- Link que alamcena el ID para eliminar -->
                                    </button>
                                </span>

                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar">
                                    <button type="button" data-toggle="modal" data-target="#eliminarModal<?php echo $rowProducto2['id']?>" class="btn btn-danger btn-lg" style="border-radius: 1rem;">
                                        <i class="fa-solid fa-trash"></i><!-- Link que alamcena el ID para eliminar -->
                                    </button>
                                </span>

                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Entrada/Salida">
                                    <a href="ingresos.php?id=<?php echo $rowProducto2['id']?>" class="btn btn-dark btn-lg" style="border-radius: 1rem;">
                                        <i class="fa-solid fa-arrow-right-arrow-left"></i>
                                    </a>
                                </span>

                                </td>
                            </tr>
                            <!-- MODAL PARA EDITAR -->
                            <?php include("modalUpdate.php"); ?>
                            <!-- MODAL PARA ELIMINAR -->
                            <?php include("modalDelete.php"); ?>
                            <?php } ?>
                        </tbody>

                    </table>
                                        
                </div><!-- end col-md-12 mx-auto -->
    <?php
    }
    ?>
        </div><!-- end container -->   

    <?php include("../categoria_productos/insertCM.php"); ?>

    </div><!-- end  page content wrapper -->

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
