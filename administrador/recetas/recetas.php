<?php

/* Inicio de sesion del usuario */
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

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <!-- FONTAWESOME -->
        <link rel="stylesheet" href="../../fontawesome/css/all.css">
        <!-- CDN de Bootstrap 4-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style type="text/css"> /* Estilos de texto */
        .transformacion1 { text-transform: capitalize;}   
        .transformacion2 { text-transform: uppercase;}   
        .transformacion3 { text-transform: lowercase;}   
        .specialFont { font-family: 'Grave Nuts', cursive;}
        .input-receta{ height: 4rem; border-radius: 1rem 0 0 1rem; font-size: 1.5rem;}
        .input-receta::placeholder{ color: gray;}
        .btn-search-receta{ height: 4rem; border-radius: 0 1rem 1rem 0; font-size: 1.5em;}
        </style>
    </head>
    <body>
        
    <?php /* Consulta para mostrar el nombre del usuario */

        include("../../conexion/conexion.php");/* incluyo la conexion a la BD */

        $sql    = "SELECT * FROM user_login WHERE usuario = $usuario";/* utilizo la variable de sesion para traer la información */
        $result = mysqli_query($conn, $sql);/* almaceno la información */
        
        while ($user = mysqli_fetch_array($result)){/* verifico que la información exista */
    ?>


        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-success" id="sidebar-wrapper">

                <div class="sidebar-heading border-bottom bg-success">
                    <center>
                        <h4>
                            <a class="list-group-item list-group-item-action bg-success border-0 text-white p-3" href="../admin.php">
                                <img style = "width: 10rem; height: 10rem; border-radius: 50%; border: .5rem solid white;" src="data:image/jpg;base64,<?php echo base64_encode($user['foto']); ?>" alt="">
                                <p class="p-3"><?php echo $user['usuario'] ?></p>
                            </a>
                        </h4>
                    </center>
                </div><!-- end sidebar-heading border-bottom bg-success -->

                <div class="list-group list-group-flush"><!-- Lista de opciones para el ADMIN -->

                    <div class="dropdown">
                        
                        <button class="list-group-item list-group-item-action text-white bg-success border-0 p-3 h5 dropdown-toggle" type="button" id="recetasOptions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-bell-concierge"></i>
                            Recetas
                        </button>
                        <div class="dropdown-menu bg-success" aria-labelledby="recetasOptions">
                            <a class="dropdown-item list-group-item list-group-item-action text-white bg-success p-3 " href="recetas.php">
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
                            <a class="dropdown-item list-group-item list-group-item-action text-white bg-success p-3 " href="../inventarios/inventarios.php">
                                Inventarios 
                            </a>

                            <a class="dropdown-item list-group-item list-group-item-action text-white bg-success p-3 " href="../categoria_productos/categorias.php">
                                Categorias
                            </a>

                            <a class="dropdown-item list-group-item list-group-item-action text-white bg-success p-3 " href="../inventarios/movimientos.php">
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

                </div><!-- end list-group list-group-flush -->

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

            </div><!-- end border-end bg-success -->

            <!-- Contenido-->

            <div id="page-content-wrapper">

                <!-- Navegacion-->

                <nav class="navbar navbar-expand-lg navbar-success bg-success border-bottom">

                    <div class="container-fluid">
                        <button class="btn btn-light" id="sidebarToggle">
                            <img src="../img/lista.png" style="width: 30px; height: 30px;" alt="">
                        </button>

                    
                        
                        <h3 class="transformacion1 text-white" style="position: absolute;
                        left: 100px;">

                        <?php echo $user['nombre'] ?><!--  muestro la información  -->

                        </h3>

                    <?php 
                        } /* end while */
                    ?>
                    </div><!-- end container-fluid -->
                </nav>
                
                <!--Contenido de la página-->

    <?php /* Consulta para mostrar la recetas existentes */
        
        $cuenta  = "SELECT COUNT(nombre) AS resultados FROM recetas WHERE activo = 1";/* utilizo una variable para traer la información */
        $rcuenta = mysqli_query($conn, $cuenta);/* almaceno la información */

        if ($row = mysqli_fetch_array($rcuenta)){ /* verifico que la información exista */?>

        <div class="row col-md-12" style="margin-left: .5rem; margin-top: .5rem; margin-right: 1rem;">

            <div class="col-md-2 d-flex align-items-center">
                <h3 class="text-dark" style="">Recetas: (<span class="text-success"><?php echo $row['resultados'] ?></span>)</h3><!-- muestro la información -->
            </div>
            <div class="col-md-6 mx-auto" style="">
                <form class="form-inline" method="POST"><!-- Formulario para buscar recetas -->

                    <input class="form-control input-receta" type="text" placeholder="Buscar por nombre" name="encontrar" style="width: 80%; ">

                    <button class="btn btn-outline-success btn-search-receta text-center" type="submit" name="buscar" style="width: 20%;">Buscar</button>

                </form>
            </div>
                

        </div><!-- end row -->

    <?php 
        }/* end if */
    ?>

    <div class="row" style="margin-left: .5rem; margin-top: .5rem; margin-right: 1rem;">

        <div class="col-md-2">

            <div class="form-group">
                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Nueva receta">
                    <button class="btn btn-success btn-lg" style="border-radius: 1rem;" data-toggle="modal" data-target="#ventanaModal">Nueva 
                        <i class="fa fa-plus"></i>
                    </button>
                </span>
            </div>

        </div><!-- end col-md-2 -->
        
        <div class="col-md-10 mx-auto">

            <?php 
            
            if(isset($_SESSION['message'])){/* Determino si hay un mensaje  */
            
            ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">

                    <?=  $_SESSION['message']?><!-- Si lo hay lo presento -->

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
        

    <!-- MODAL PARA INSERTAR RECETAS -->

<?php include("insertarModal.php"); ?>
    
        <!-- RECETAS ALMACENADAS EN LA BD -->

        <?php

        if(isset($_POST['buscar'])){
            $buscar = $_POST['encontrar'];
            /* $buscar2 = $_POST['encontrar2']; */  

            $resultados  = "SELECT COUNT(nombre) AS resultados FROM recetas WHERE nombre LIKE '%$buscar%'";
            $resultados2 = mysqli_query($conn, $resultados);
            while ($row = mysqli_fetch_array($resultados2)){
            
                if($row['resultados']>0){
                    ?>

                    <div class="col-md-11 mx-auto" style="margin-bottom: .5rem;">
                        <h5 style="text-align: center; ">Resultados encontrados para <strong class="transformacion1" style="color: green;"><?php echo $buscar ?></strong>: 
                            <span class="badge badge-success">
                                <?php echo $row['resultados'];?>
                            </span>
                            <a name="" id="" class="btn btn-light btn-lg" href="recetas.php" style="margin-left: 4rem;">
                                <i class="fa fa-close"></i>
                            </a>
                        </h5>
                    </div>
                            
                    <div class="col-md-12 mx-auto">

                        <table class="table table-bordered table-hover">

                            <thead>

                                <tr>
                                    <th>ID                                      </th>
                                    <th>Foto                                    </th>
                                    <th>Nombre                                  </th>
                                    <th>Categoria                               </th>
                                    <th>Responsable                             </th>
                                    <th class="text-center">¿Que quieres hacer? </th>
                                </tr>

                            </thead>

                            <tbody>

                            <?php 

                                /* Consulta para traer la informacion de las recetas */

                                $query  = "SELECT recetas.id, recetas.nombre, preparacion, categoria_recetas.id AS id_categoria, categoria_recetas.descripcion AS categoria, imagen, fecha, user_login.nombre AS creador, recetas.activo FROM recetas INNER JOIN (categoria_recetas, user_login) ON categoria = categoria_recetas.id AND creador = user_login.usuario WHERE recetas.nombre LIKE '%$buscar%' ORDER BY id";/* Traigo la información */
                                $result = mysqli_query($conn, $query);/* Almaceno la información */

                                while($dataReceta = mysqli_fetch_array($result)){ /* Muestro la información por medio de arrays */

                            ?>
                                <tr>

                                    <td>
                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Ver Receta">
                                            <a href="recetaView.php?id=<?php echo $dataReceta['id']?>" class="btn btn-light">
                                                <?php echo $dataReceta['id']?>
                                            </a>
                                        </span>
                                    </td>
                                    <td>
                                    <img style = "width:5rem;" src="data:image/jpg;base64,<?php echo base64_encode($dataReceta['imagen']); ?>" alt="">
                                    </td>
                                    <td><?php echo $dataReceta['nombre']?>    </td>
                                    <td><?php echo $dataReceta['categoria']?> </td>
                                    <td><?php echo $dataReceta['creador']?>   </td>
                                    <td class="col-md-4 mx-auto">
                                        
                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar">
                                            <button type="button" data-toggle="modal" data-target="#editarModal2<?php echo $dataReceta['id']?>" class="btn btn-success btn-lg" style="border-radius: 1rem;">
                                                <i class="fa-solid fa-pen"></i><!-- Link que alamcena el ID para editar -->
                                            </button>
                                        </span>

                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar">
                                            <button type="button" data-toggle="modal" data-target="#eliminarModal2<?php echo $dataReceta['id']?>" class="btn btn-danger btn-lg" style="border-radius: 1rem;">
                                                <i class="fa-solid fa-trash"></i><!-- Link que alamcena el ID para eliminar -->
                                            </button>
                                        </span>

                                        <a href="productos/productos.php?id=<?php echo $dataReceta['id']?>" class="btn btn-primary btn-lg" style="border-radius: 1rem;">
                                            Añadir productos
                                        </a>

                                    </td>

                                </tr>
                                
                                <!-- MODAL PARA ACTUALIZAR -->
                                <?php include("editarModal.php");  ?>

                                <!-- MODAL PARA ELIMINAR -->
                                <?php include("eliminarModal.php");?>

                            <?php 

                                } /* end while */

                            ?>

                            </tbody>

                        </table>
                                        
                    </div><!-- end col-md-12 mx-auto -->
        
                <?php

                }else{
                    ?>
                    <div class="col-md-12 mx-auto ">
                        <h5 style="text-align: center; ">
                            No se encontraron resultados 
                            <a name="" id="" class="btn btn-light btn-lg" href="recetas.php" style="margin-left: 4rem;">
                                <i class="fa fa-close"></i>
                            </a>
                        </h5>
                    </div>
                        
                    <?php
                }
            }

        }else{
        ?>

        <div class="col-md-12 mx-auto">

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>
                        <th>ID                                     </th>
                        <th>Foto                                   </th>
                        <th>Nombre                                 </th>
                        <th>Categoria                              </th>
                        <th>Responsable                            </th>
                        <th class="text-center">¿Que quieres hacer?</th>
                    </tr>

                </thead>

                <tbody>

                <?php 

                    /* Consulta para traer la informacion de las recetas */

                    $query  = "SELECT recetas.id, recetas.nombre, preparacion, categoria_recetas.id AS id_categoria, categoria_recetas.descripcion AS categoria, imagen, fecha, recetas.activo, user_login.nombre AS creador, recetas.activo FROM recetas INNER JOIN (categoria_recetas, user_login) ON categoria = categoria_recetas.id AND creador = user_login.usuario WHERE recetas.activo = 1 ORDER BY id";/* Traigo la información */
                    $result = mysqli_query($conn, $query);/* Almaceno la información */

                    while($resultReceta = mysqli_fetch_array($result)){ /* Muestro la información por medio de arrays */

                ?>
                    <tr>

                        <td>
                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Ver Receta">
                                <a href="recetaView.php?id=<?php echo $resultReceta['id']?>" class="btn btn-light">      
                                    <?php echo $resultReceta['id']?>
                                </a>
                            </span>
                        </td>

                        <td><img style = "width:5rem;" src="data:image/jpg;base64,<?php echo base64_encode($resultReceta['imagen']); ?>" alt=""></td>
                        <td><?php echo $resultReceta['nombre']?>    </td>
                        <td><?php echo $resultReceta['categoria']?> </td>
                        <td><?php echo $resultReceta['creador']?>   </td>
                        <td class="col-md-4 mx-auto">

                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar">
                                <button type="button" data-toggle="modal" data-target="#editarModal<?php echo $resultReceta['id']?>" class="btn btn-success btn-lg" style="border-radius: 1rem;">
                                    <i class="fa-solid fa-pen"></i><!-- Link que alamcena el ID para eliminar -->
                                </button>
                            </span>

                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar">
                                <button type="button" data-toggle="modal" data-target="#eliminarModal<?php echo $resultReceta['id']?>" class="btn btn-danger btn-lg" style="border-radius: 1rem;">
                                    <i class="fa-solid fa-trash"></i><!-- Link que alamcena el ID para eliminar -->
                                </button>
                            </span>
                            <a href="productos/productos.php?id=<?php echo $resultReceta['id']?>" class="btn btn-primary btn-lg" style="border-radius: 1rem;">
                                Añadir productos
                            </a>

                        </td>

                    </tr>
                    
                    <!-- MODAL PARA ACTUALIZAR -->
                    <?php include("editarModal.php");   ?>

                    <!-- MODAL PARA ELIMINAR -->
                    <?php include("eliminarModal.php"); ?>

                <?php 

                    } /* end while */

                ?>

                </tbody>

            </table>
                                
        </div><!-- end col-md-12 mx-auto -->
        <?php 
        } 
        ?>

        <!-- MODAL PARA NUEVA CATEGORIA -->
        <?php include("../categoria_recetas/insertCM.php");  ?>
     
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
