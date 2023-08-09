<?php

    session_start();# Inicio de sesión
    $usuario = $_SESSION['usuario'];# Usuario de sesión que viene desde el login
    $rol     = $_SESSION['rol'];# Rol de sesión de usuario

    if(!isset($usuario)){# Verifico si hay un usuario con un inicio de sesión

        # SI no lay, lo redirecciono al login para que inicie su sesión
        header("Location: ../login.php");# Redirección

    }else{# Si NO lo hay, verifico el rol de usuario

        if ($rol==1){# SI es igual a 1(ADMINISTRADOR) puede permanecer
            
        }else{ #SINO, cierra la sesión del usuario y lo redirecciona al login

            session_destroy();# Cierre de sesión
            header("Location: ../login.php");# Redirección
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
        <title>Categorias</title>

        <!-- CSS de bootstrap/Siderbar -->
        <link href="../css/styles.css" rel="stylesheet" />

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

            input[type=number] { -moz-appearance:textfield; }

            .transformacion1 {
                text-transform: capitalize;
            }   
            .transformacion2 { 
                text-transform: uppercase;
            }   
            .transformacion3 { 
                text-transform: lowercase;
            }  

            .transformacion4::first-letter {
                font-size: large;
            }

            .specialFont{ 
                font-family: 'Grape Nuts', cursive; 
                font-weight: bold; 
            } 

        </style>

    </head>

    <body>
        
        <?php /* Consulta para mostrar el nombre del usuario */

            include("../../conexion/conexion.php");/* incluyo la conexion a la BD */

            $sql    = "SELECT * FROM user_login WHERE usuario = $usuario";/* utilizo la variable de sesion para traer la información */
            $result = mysqli_query($conn, $sql);/* almaceno la información */
            
            while ($row = mysqli_fetch_array($result)){/* verifico que la información exista */
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

                </div><!-- end sidebar-heading border-bottom bg-success -->

                <div class="list-group list-group-flush"><!-- Lista de opciones para el ADMIN -->

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
                            <a class="dropdown-item list-group-item list-group-item-action text-white bg-success p-3 " href="../inventarios/inventarios.php">
                                Inventarios 
                            </a>

                            <a class="dropdown-item list-group-item list-group-item-action text-white bg-success p-3 " href="categorias.php">
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

            <div id="page-content-wrapper">

                <nav class="navbar navbar-expand-lg navbar-success bg-success border-bottom">

                    <div class="container-fluid">

                        <button class="btn btn-light" id="sidebarToggle">
                            <img src="../img/lista.png" style="width: 30px; height: 30px;" alt="">
                        </button>

                        <h3 class="transformacion1 text-white" style="position: absolute;
                        left: 100px;">
                            <?php echo $row['nombre'] ?><!--  muestro la información  -->
                        </h3>

                    <?php 
                        } /* end if */
                    ?>
                    </div><!-- end container-fluid -->

                </nav>

                <?php /* Consulta para mostrar las categorias existentes */
                
                $cuenta  = "SELECT COUNT(descripcion) AS resultados FROM categoria_productos";/* utilizo una variable para traer la información */
                $rcuenta = mysqli_query($conn, $cuenta);/* almaceno la información */

                if ($row = mysqli_fetch_array($rcuenta)){ /* verifico que la información exista */?>

                    <div class="col-md-12 row" style="margin-left: .5rem; margin-top: .5rem; margin-right: 1rem;">

                        <div class="col-md-4 d-flex align-items-center">
                            <h4>Categorias: (<?php echo $row['resultados'] ?>)</h4><!-- muestro la información -->
                        </div>

                        <div class="col-md-8">
                            
                            <form class="form-inline" method="POST"><!-- Formulario para buscar categorias -->

                                <input class="form-control transformacion1" type="text" placeholder="Buscar por nombre" name="encontrar" style="width: 75%; height: 4rem; border-radius: 1rem 0 0 1rem; font-size: 1.5rem;" required>

                                <button class="btn btn-outline-success btn-lg" type="submit" name="buscar" style="width: 15%; height: 4rem; border-radius: 0 1rem 1rem 0;">Buscar</button>

                            </form>

                        </div>

                    </div><!-- col-md-12-->

                <?php 
                }/* end if */
                ?>

                <div class="row" style="margin-left: .5rem; margin-top: .5rem; margin-right: 1rem;">
                    
                    <div class="col-md-10 mx-auto">

                        <?php 
                        if(isset($_SESSION['message'])){/* Determino si hay un mensaje  */   
                        ?>
                            <div class="col-md-8 mx-auto">

                                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">

                                    <h5><?=  $_SESSION['message']?></h5><!-- Si lo hay lo presento -->
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>

                                </div><!-- end alert alert -->

                            </div>
                            
                        <?php 
                        } /* end if */ 
                        unset($_SESSION['message']); /* Elimino el mensaje para que no se vuelva a mostrar */
                        ?>

                    </div><!-- end col-md-10 mx-auto -->

                </div><!-- end row -->

                <?php
                if(isset($_POST['buscar'])){#Si se presiona buscar, muestro las categorias que coincidan con la busqueda

                    $buscar      = $_POST['encontrar'];
                    $resultados  = "SELECT COUNT(descripcion) AS resultados FROM categoria_productos WHERE descripcion LIKE '%$buscar%'";#Acción
                    $resultados2 = mysqli_query($conn, $resultados);#Resultado de la acción

                    while ($row = mysqli_fetch_array($resultados2)){#Obtiene una fila de resultados como un array asociativo, numérico, o ambos
                    
                        if($row['resultados']>0){#Si hay resultados los muestro
                            ?>
                            <div class="row">

                                <div class="col-md-11 mx-auto ">

                                    <h5 style="text-align: center; ">Resultados encontrados para <strong class="transformacion1" style="color: green;"><?php echo $buscar ?></strong>: 
                                        <span class="badge badge-success">
                                            <?php echo $row['resultados'];?>
                                        </span>
                                    </h5>

                                </div>

                                <div class="col-md-1 mx-auto">
                                    <a name="" id="" class="btn btn-light" href="categorias.php">
                                        <i class="fa fa-close"></i>
                                    </a>
                                </div>

                            </div><!-- end row -->
                        
                            <div class="row" style="margin: .5rem .5rem .5rem .5rem;">

                                <div class="col-md-4 mx-auto">

                                    <div class="card border-success" style="">

                                        <div class="card-header bg-light border-success">

                                            <h3 class="text-dark text-center">
                                            Agrega una nueva categoria
                                            </h3>

                                        </div>

                                        <div class="card-body">

                                            <form action="insertar.php" method="post">

                                                <div class="form-group">
                                                    <input type="text" id="nombre" name="descripcion" class="form-control transformacion1" style="height: 4rem; border-radius: 1rem;" placeholder="Nombre de la categoria" required autofocus>
                                                </div>

                                            <button class="btn btn-success btn-lg" type="submit" name="agregar" style="border-radius: 1rem;">Agregar</button>
                                        
                                            </form>

                                        </div><!-- end card-body -->

                                    </div><!-- end card -->

                                </div><!-- end col-md-4 -->
                                
                                <div class="col-md-8 mx-auto">

                                    <table class="table table-bordered table-hover">

                                        <thead>

                                            <tr>
                                                <th>ID          </th>
                                                <th>Descripcion </th>
                                                <th>Acciones    </th>
                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php 
                                            /* Consulta para traer la informacion de las recetas */

                                            $query  = "SELECT * FROM categoria_productos  WHERE descripcion LIKE '%$buscar%' ORDER BY descripcion ASC";/* Traigo la información */
                                            $result = mysqli_query($conn, $query);/* Almaceno la información */

                                            while($dataCategoria = mysqli_fetch_array($result)){ #Obtiene una fila de resultados como un array asociativo, numérico, o ambos
                                            ?>
                                            <tr>

                                                <td><?php echo $dataCategoria['id']?>          </td>
                                                <td><?php echo $dataCategoria['descripcion']?> </td>
                                                <td>
                                                    <button type="button" data-toggle="modal" data-target="#editarCModal<?php echo $dataCategoria['id']?>" class="btn btn-success btn-lg" style="border-radius: 1rem;">
                                                        <i class="fa-solid fa-pen"></i><!-- Link que alamcena el ID para eliminar -->
                                                    </button>
                                                
                                                    <button type="button" data-toggle="modal" data-target="#eliminarCModal<?php echo $dataCategoria['id']?>" class="btn btn-danger btn-lg" style="border-radius: 1rem;">
                                                        <i class="fa-solid fa-trash"></i><!-- Link que alamcena el ID para eliminar -->
                                                    </button>

                                                </td>

                                            </tr>

                                            <!-- MODAL PARA ACTUALIZAR -->
                                            <?php include("deleteCModal.php"); ?>

                                            <!-- MODAL PARA ELIMINAR -->
                                            <?php
                                            include("updateCModal.php");
                                            ?>

                                            <?php 
                                            } /* end while */
                                            ?>

                                        </tbody>

                                    </table>
                                                    
                                </div><!-- end col-md-8 mx-auto -->

                            </div><!-- end row -->

                        <?php
                        }else{#Si NO hay resultados, mensaje informativo
                            ?>
                            <div class="row" style="margin-top: 2rem;">

                                <div class="col-md-11 mx-auto ">

                                    <h3 style="text-align: center; ">
                                        No se encontraron resultados 
                                    </h3>

                                </div>

                                <div class="col-md-1 mx-auto">

                                    <a name="" id="" class="btn btn-light" href="categorias.php">
                                        <i class="fa fa-close"></i>
                                    </a>

                                </div>

                            </div><!-- end row -->

                            <?php
                        }/* end if */
                    }/* end while */

                }else{#Si No se presiona buscar, muestro todas las categorias
                ?>
                    <div class="row" style="margin: .5rem .5rem .5rem .5rem;">

                        <div class="col-md-4 mx-auto">

                            <div class="card border-success" style="">

                                <div class="card-header bg-light border-success">

                                    <h3 class="text-dark text-center">
                                    Agrega una nueva categoria
                                    </h3>

                                </div>

                                <div class="card-body">

                                    <form action="insertar.php" method="post">

                                        <div class="form-group row">

                                            <div class="col-sm-12">
                                                <input type="text" id="nombre" name="descripcion" class="form-control transformacion1" placeholder="Nombre de la categoria" style="height: 4rem; border-radius: 1rem; font-size: 1.3rem;" required autofocus>
                                            </div>
                                        </div>

                                    <button class="btn btn-success btn-lg" name="agregar" style="border-radius: 1rem;">Agregar</button>
                                
                                    </form>

                                </div>

                            </div>

                        </div><!-- end col-md-4 -->

                        <div class="col-md-8 mx-auto">

                            <table class="table table-bordered table-hover">

                                <thead>

                                    <tr>
                                        <th>ID          </th>
                                        <th>Descripción </th>
                                        <th>Acciones    </th>
                                    </tr>

                                </thead>

                                <tbody>

                                <?php 

                                    /* Consulta para traer la informacion de las recetas */

                                    $query = "SELECT * FROM categoria_productos ORDER BY id";/* Traigo la información */
                                    $result = mysqli_query($conn, $query);/* Almaceno la información */

                                    while($resultCategoria = mysqli_fetch_array($result)){ #Obtiene una fila de resultados como un array asociativo, numérico, o ambos

                                ?>
                                    <tr>

                                        <td><?php echo $resultCategoria['id']?>          </td>
                                        <td><?php echo $resultCategoria['descripcion']?> </td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#editarCModal2<?php echo $resultCategoria['id']?>" class="btn btn-success btn-lg" style="border-radius: 1rem;">
                                                <i class="fa-solid fa-pen"></i><!-- Link que alamcena el ID para eliminar -->
                                            </button>
                                        
                                            <button type="button" data-toggle="modal" data-target="#eliminarCModal2<?php echo $resultCategoria['id']?>" class="btn btn-danger btn-lg" style="border-radius: 1rem;">
                                            <i class="fa-solid fa-trash"></i><!-- Link que alamcena el ID para eliminar -->
                                            </button>

                                        </td>

                                    </tr>
                                    
                                    <!-- MODAL PARA ACTUALIZAR -->
                                    <?php include("updateCModal.php"); ?>

                                    <!-- MODAL PARA ELIMINAR -->
                                    <?php
                                    include("deleteCModal.php");
                                    ?>
                                <?php 

                                    } /* end while */

                                ?>

                                </tbody>

                            </table>
                                                
                        </div><!-- end col-md-8 mx-auto -->

                    </div><!-- end row -->
                <?php 
                }/* end if */
                ?>
     
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
