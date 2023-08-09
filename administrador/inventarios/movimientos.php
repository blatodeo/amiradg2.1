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
        <title>Movimientos</title>

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
        
        <?php 
            include("../../conexion/conexion.php");#conexion a la BD
            # Información de usuario
            $sql    = "SELECT * FROM user_login WHERE usuario = $usuario";# Acción
            $result = mysqli_query($conn, $sql);# Resultado de la acción
            
            while ($row = mysqli_fetch_array($result)){#Obtiene una fila de resultados como un array asociativo, numérico, o ambos
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
    
                </div><!-- end list-group -->

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

            </div><!-- end sidebar-wrapper -->

            <div id="page-content-wrapper">

                <nav class="navbar navbar-expand-lg navbar-success bg-success border-bottom">

                    <div class="container-fluid">

                        <button class="btn btn-light" id="sidebarToggle">
                            <img src="../img/lista.png" style="width: 30px; height: 30px;" alt="">
                        </button>
                        
                        <h3 class="transformacion1 text-white" style="position: absolute;
                        left: 100px;">
                            <?php echo $row['nombre']# Nombre de usuario?>
                        </h3>
            <?php 
            } /* end while */
            ?>
                    </div><!-- end container-fluid -->

                </nav>

                <div class="row" style="margin-top: 2rem; margin-left: 2rem; margin-right: 2rem;">

                    <div class="col-md-4 d-flex align-items-center">

                        <div class="form-group">
                            
                            <h3>Movimientos</h3>

                        </div>

                    </div>

                    <div class="col-md-6 mx-auto">

                        <form class="form-inline" method="POST"><!-- Formulario para buscar productos -->

                            <input class="form-control" type="date" placeholder="Buscar por fecha" name="encontrar" style="width: 80%; height: 4rem; font-size: 1.5rem; border-radius: 1rem 0 0 1rem;" title="Buscar por fecha">

                            <button class="btn btn-outline-success text-center" type="submit" name="buscar" style="width: 20%; height: 4rem; font-size: 1.5rem;border-radius: 0 1rem 1rem 0;">Buscar</button>

                        </form>

                    </div>

                </div><!-- end row -->
    
                <?php 
                if(isset($_SESSION['message'])){
                ?>
                    <div class="col-md-6 mx-auto" style="margin-top: 2rem;">

                        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show text-center" role="alert">

                            <?=  $_SESSION['message']?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>

                    </div><!-- end col-md-6 -->

                <?php 
                unset($_SESSION['message']); #Libera el mensaje de sesión
                }# end if
                ?>
            
                <?php 
                if(isset($_POST['buscar'])){# Verifico si hay una variable y no es NULL
                    # SI se presiona buscar, muestro los resultados de busqueda
                    $buscar      = $_POST['encontrar'];  
                    $resultados  = "SELECT COUNT(fecha) AS resultados FROM movimientos WHERE fecha = '$buscar'";# Acción
                    $resultados2 = mysqli_query($conn, $resultados);# Resultado de la acción
            
                    while ($row = mysqli_fetch_array($resultados2)){#Obtiene una fila de resultados como un array asociativo, numérico, o ambos
                        $rowResult = $row['resultados'];# Resultados
                    }

                    if($rowResult>0){#SI hay resultados, muestra los aprendices que coincidan con la busqueda
                    ?>
                        <div class="col-md-12 mx-auto text-center" style="margin-top: 2rem;">
                            <h5>Movimientos realizados el <span class="text-success"><?php echo $buscar ?></span> 
                                <span class="badge badge-success">
                                    <?php echo $rowResult;?>
                                </span>
                                
                                <a name="" id="" class="btn btn-light" href="movimientos.php" style="margin-left: 4rem;">
                                    <i class="fa fa-close"></i>
                                </a>
                            </h5>
                        </div>
            
                        <div class="col-md-10 mx-auto">
                            
                            <?php 
                            #MOVIMIENTOS
                            $query  = "SELECT movimientos.*, producto.nombre AS producto, user_login.nombre AS responsable FROM movimientos INNER JOIN (user_login, producto) ON id_producto=producto.id AND responsable = user_login.usuario WHERE fecha = '$buscar' ORDER BY id DESC";# Acción
                            $result = mysqli_query($conn, $query);# Resultado de la acción
                            
                            while($row = mysqli_fetch_array($result)){#Obtiene una fila de resultados como un array asociativo, numérico, o ambos
                                if ($row['tipo']=="Entrada"){
                                ?>
                                    <button class="btn col-md-12 alert-success" type="button" data-toggle="collapse" data-target="#collapse<?php echo $row['id'] ?>" aria-expanded="false" aria-controls="collapseExample">
                                    <h4 class="alert-heading text-left"><span class="transformacion1"><?php echo $row['responsable'] ?></span> realizó una <?php echo $row['tipo'] ?></h4>  
                                    <h5 class="text-right"><?php echo $row['fecha'] ?>-<?php echo $row['hora'] ?></h5>
                                    </button>

                                    <div class="collapse" id="collapse<?php echo $row['id'] ?>">

                                        <div class="card card-body">

                                            <h3 class="text-success">Detalles del movimiento</h3>

                                            <h5 class="text-dark">Movimiento #<span class="transformacion1 h4"><?php echo $row['id'] ?></span></h5>

                                            <h5 class="text-dark">Responsable: <span class="transformacion1 h4"><?php echo $row['responsable'] ?></span></h5>

                                            <h5 class="text-dark">Tipo de acción: <span class="h4"><?php echo $row['tipo'] ?></span></h5>

                                            <h5 class="text-dark">
                                            Entrada de: <span class="h4"><?php echo $row['cantidad']; echo $row['unidad'] ?> de <?php echo $row['producto'] ?></span>
                                            </h5>
                                                <!-- <h5 class="text-dark">
                                                Salida de: <span class="h4"><?php echo $row['cantidad']; echo $row['unidad'] ?> de <?php echo $row['producto'] ?></span> -->
                                                                
                                            <h5 class="text-dark">Fecha del movimiento: <span class="h4"><?php echo $row['fecha'] ?>-<?php echo $row['hora'] ?></span></h5>

                                        </div>
                                    </div>
                                <?php
                                }else{
                                ?>
                                    <button class="btn col-md-12 alert-danger" type="button" data-toggle="collapse" data-target="#collapse<?php echo $row['id'] ?>" aria-expanded="false" aria-controls="collapseExample">
                                    <h4 class="alert-heading text-left"><span class="transformacion1"><?php echo $row['responsable'] ?></span> realizó una <?php echo $row['tipo'] ?></h4>  
                                    <h5 class="text-right"><?php echo $row['fecha'] ?>-<?php echo $row['hora'] ?></h5>
                                    </button>

                                    <div class="collapse" id="collapse<?php echo $row['id'] ?>">

                                        <div class="card card-body">

                                            <h3 class="text-success">Detalles del movimiento</h3>

                                            <h5 class="text-dark">Movimiento #<span class="transformacion1 h4"><?php echo $row['id'] ?></span></h5>

                                            <h5 class="text-dark">Responsable: <span class="transformacion1 h4"><?php echo $row['responsable'] ?></span></h5>

                                            <h5 class="text-dark">Tipo de acción: <span class="h4"><?php echo $row['tipo'] ?></span></h5>

                                            <h5 class="text-dark">
                                            Salida de: <span class="h4"><?php echo $row['cantidad']; echo $row['unidad'] ?> de <?php echo $row['producto'] ?></span>
                                            </h5>
                                                <!-- <h5 class="text-dark">
                                                Salida de: <span class="h4"><?php echo $row['cantidad']; echo $row['unidad'] ?> de <?php echo $row['producto'] ?></span> -->
                                                                
                                            <h5 class="text-dark">Fecha del movimiento: <span class="h4"><?php echo $row['fecha'] ?>-<?php echo $row['hora'] ?></span></h5>

                                        </div>
                                    </div>
                                <?php
                                }
                            }#end while
                            ?>
                               

                        </div><!-- end col-md-10 -->

                    <?php
                    }else{#Si NO hay resultados, mensaje informativo
                        ?>
                        <div class="col-md-12 text-center" style="margin-top: 2rem;">
                            <h3 style="text-align: center; ">
                                No se encontraron movimientos para <span class="text-success"><?php echo $buscar ?></span>
                                <a name="" id="" class="btn btn-light" href="movimientos.php">
                                    <i class="fa fa-close"></i>
                                </a>
                            </h3>
                            <img src="../../img/undraw_empty.svg" alt="" style="width: 30%; margin: 2rem auto;"> 
                        </div>
                    <?php 
                    }/* end if */
                }else{# Si NO se presiona, muestra todos los aprendices
                    ?>
                    <div class="row" style="margin: 2rem;">
                    <?php 
                        #MOVIMIENTOS
                        $query  = "SELECT movimientos.*, producto.nombre AS producto, user_login.nombre AS responsable FROM movimientos INNER JOIN (user_login, producto) ON id_producto=producto.id AND responsable = user_login.usuario ORDER BY id DESC";# Acción
                        $result = mysqli_query($conn, $query);# Resultado de la acción
                        
                        while($row = mysqli_fetch_array($result)){#Obtiene una fila de resultados como un array asociativo, numérico, o ambos
                        ?>
                        <div class="col-md-12 mx-auto" role="alert" style="border-radius: 1rem; margin: .5rem;">

                            <?php 
                            if ($row['tipo']=="Entrada"){
                            ?>
                                <button class="btn col-md-12 alert-success" type="button" data-toggle="collapse" data-target="#collapse<?php echo $row['id'] ?>" aria-expanded="false" aria-controls="collapseExample">
                                <h4 class="alert-heading text-left"><span class="transformacion1"><?php echo $row['responsable'] ?></span> realizó una <?php echo $row['tipo'] ?></h4>  
                                <h5 class="text-right"><?php echo $row['fecha'] ?>-<?php echo $row['hora'] ?></h5>
                                </button>

                                <div class="collapse" id="collapse<?php echo $row['id'] ?>">

                                    <div class="card card-body">

                                        <h3 class="text-success">Detalles del movimiento</h3>

                                        <h5 class="text-dark">Movimiento #<span class="transformacion1 h4"><?php echo $row['id'] ?></span></h5>

                                        <h5 class="text-dark">Responsable: <span class="transformacion1 h4"><?php echo $row['responsable'] ?></span></h5>

                                        <h5 class="text-dark">Tipo de acción: <span class="h4"><?php echo $row['tipo'] ?></span></h5>

                                        <h5 class="text-dark">
                                        Entrada de: <span class="h4"><?php echo $row['cantidad']; echo $row['unidad'] ?> de <?php echo $row['producto'] ?></span>
                                        </h5>
                                            <!-- <h5 class="text-dark">
                                            Salida de: <span class="h4"><?php echo $row['cantidad']; echo $row['unidad'] ?> de <?php echo $row['producto'] ?></span> -->
                                                            
                                        <h5 class="text-dark">Fecha del movimiento: <span class="h4"><?php echo $row['fecha'] ?>-<?php echo $row['hora'] ?></span></h5>

                                    </div>
                                </div>
                            <?php
                            }else{
                            ?>
                                <button class="btn col-md-12 alert-danger" type="button" data-toggle="collapse" data-target="#collapse<?php echo $row['id'] ?>" aria-expanded="false" aria-controls="collapseExample">
                                <h4 class="alert-heading text-left"><span class="transformacion1"><?php echo $row['responsable'] ?></span> realizó una <?php echo $row['tipo'] ?></h4>  
                                <h5 class="text-right"><?php echo $row['fecha'] ?>-<?php echo $row['hora'] ?></h5>
                                </button>

                                <div class="collapse" id="collapse<?php echo $row['id'] ?>">

                                    <div class="card card-body">

                                        <h3 class="text-success">Detalles del movimiento</h3>

                                        <h5 class="text-dark">Movimiento #<span class="transformacion1 h4"><?php echo $row['id'] ?></span></h5>

                                        <h5 class="text-dark">Responsable: <span class="transformacion1 h4"><?php echo $row['responsable'] ?></span></h5>

                                        <h5 class="text-dark">Tipo de acción: <span class="h4"><?php echo $row['tipo'] ?></span></h5>

                                        <h5 class="text-dark">
                                        Salida de: <span class="h4"><?php echo $row['cantidad']; echo $row['unidad'] ?> de <?php echo $row['producto'] ?></span>
                                        </h5>
                                            <!-- <h5 class="text-dark">
                                            Salida de: <span class="h4"><?php echo $row['cantidad']; echo $row['unidad'] ?> de <?php echo $row['producto'] ?></span> -->
                                                            
                                        <h5 class="text-dark">Fecha del movimiento: <span class="h4"><?php echo $row['fecha'] ?>-<?php echo $row['hora'] ?></span></h5>

                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                
                        </div><!-- end col-md-12 -->
                        <?php 
                        }#end while
                        ?>
            
                    </div><!-- end row-->
                <?php
                }
                ?>

            </div><!-- end  page content wrapper -->

        </div><!-- end d-flex -->

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>