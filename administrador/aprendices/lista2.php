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
        <title>Administradores</title>

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
            include("../../conexion/conexion.php");# Conexión a la BD

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
                        <a class="list-group-item list-group-item-action text-white bg-success border-0 p-3" href="lista.php">
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

            </div><!-- end sidebar-wraper -->
      
            <div id="page-content-wrapper">
              
                <nav class="navbar navbar-expand-lg navbar-success bg-success border-bottom">

                    <div class="container-fluid">

                        <button class="btn btn-light" id="sidebarToggle">
                            <img src="../img/lista.png" style="width: 30px; height: 30px;" alt="">
                        </button>
                    
                        <h3 class="transformacion1 text-white" style="position: absolute;
                        left: 100px;"><?php echo $row['nombre'] ?></h3>
            <?php 
            }/* end while */
            ?>

                    </div>

                </nav>
                
                <?php
                
                $cuenta  = "SELECT COUNT(usuario) AS resultados FROM user_login WHERE rol = 1";
                $rcuenta = mysqli_query($conn, $cuenta);

                while ($row = mysqli_fetch_array($rcuenta)){#Obtiene una fila de resultados como un array asociativo, numérico, o ambos?>

                <div class="row" style="margin-top: 2rem; margin-left: 2rem; margin-right: 2rem;">

                    <div class="col-md-4 d-flex align-items-center">

                        <div class="form-group">
                            <h3>Administradores (<span class="text-success"><?php echo $row['resultados'] ?></span>)</h3>
                        </div>

                    </div>

                    <div class="col-md-6 mx-auto" style="">

                        <form class="form-inline" method="POST"><!-- Formulario para buscar productos -->

                            <input class="form-control" type="text" placeholder="Buscar por nombre" name="encontrar" style="width: 80%; height: 4rem; font-size: 1.5rem; border-radius: 1rem 0 0 1rem;">

                            <button class="btn btn-outline-success text-center" type="submit" name="buscar" style="width: 20%; height: 4rem; font-size: 1.5rem;border-radius: 0 1rem 1rem 0;">Buscar</button>

                        </form>

                    </div>

                </div><!-- end row -->

                <?php 
                }
                ?>  
    
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
                if(isset($_POST['buscar'])){
                    $buscar      = $_POST['encontrar'];  
                    $resultados  = "SELECT COUNT(nombre) AS resultados FROM user_login WHERE nombre LIKE '%$buscar%' AND rol = 1";# Acción
                    $resultados2 = mysqli_query($conn, $resultados);# Resultado de la acción

                    while ($row = mysqli_fetch_array($resultados2)){#Obtiene una fila de resultados como un array asociativo, numérico, o ambos
                        $rowResult = $row['resultados'];# Resultados
                    }
                    if($rowResult>0){#SI hay resultados, muestra los administradores que coincidan con la busqueda
                    ?>
                        <div class="col-md-12 mx-auto text-center" style="margin-top: 2rem;">
                            <h5>Resultados encontrados para <span class="text-success"><?php echo $buscar ?></span> 
                                <span class="badge badge-success">
                                    <?php echo $rowResult;?>
                                </span>
                                
                                <a name="" id="" class="btn btn-light" href="lista2.php" style="margin-left: 4rem;">
                                    <i class="fa fa-close"></i>
                                </a>
                            </h5>
                        </div>
                
                        <div class="col-md-10 mx-auto">

                            <table class="table table-light">

                                <thead class="thead-light">
                                    <tr>
                                        <th>ID      </th>
                                        <th>Usuario </th>
                                        <th>Nombre  </th>
                                        <th>Correo  </th>
                                        <th>Rol     </th>
                                        <th>Accion  </th>
                                    </tr>
                                </thead>

                                <tbody>
                            
                                    <?php 
                                    $query = "SELECT user_login.*, descripcion FROM user_login INNER JOIN rol_user ON rol=rol_user.id WHERE nombre LIKE '%$buscar%' AND rol=1";# Acción
                                    $result = mysqli_query($conn, $query);# Resultado de la acción
                                    while($row = mysqli_fetch_array($result)){#Obtiene una fila de resultados como un array asociativo, numérico, o ambos
                                    ?>
                                    <tr> 
                                        <td><?php echo $row['id'] ?>          </td>
                                        <td><?php echo $row['usuario'] ?>     </td>
                                        <td><?php echo $row['nombre'] ?>      </td>
                                        <td><?php echo $row['correo'] ?>      </td>
                                        <td><?php echo $row['descripcion'] ?> </td>
                                        <td>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Convertir en Aprendiz">
                                                <a  href="update_rol2.php?id=<?php echo $row['id']?>" class="btn btn-danger" name="update">
                                                    <i class="fa-solid fa-arrow-down-short-wide"></i>
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php 
                                    }#end while
                                    ?>
                                </tbody>

                            </table>

                        </div><!-- end col-md-10 -->
                    <?php
                    }else{#Si NO hay resultados, mensaje informativo
                    ?>
                        <div class="col-md-12 text-center" style="margin-top: 2rem;">
                            <h3 style="text-align: center; ">
                                No se encontraron resultados  para <span class="text-success"><?php echo $buscar ?></span>
                                <a name="" id="" class="btn btn-light" href="lista2.php">
                                    <i class="fa fa-close"></i>
                                </a>
                            </h3>
                            <img src="../../img/undraw_empty.svg" alt="" style="width: 30%; margin: 2rem auto;"> 
                        </div>
                <?php 
                    }#end if

                }else{# Si NO se presiona, muestra todos los administradores

                ?>
                <div class="row">

                    <div class="col-md-3 mx-auto" style="margin-top: 2rem;">

                        <div class="card border-success">

                            <div class="card-body">

                                <h4 class="card-title">Convierte aprendices en administradores</h4>
                                <p class="card-text">
                                Permite que tus aprendices tengan acceso a funciones de administrador, ten en cuenta que ellos podrán manipular el sistema y SoftCookies no se hará responsable de un mal uso del mismo.
                                </p>
                                <a name="" id="" class="btn btn-success btn-lg" href="lista.php">Ver aquí los Aprendices</a>

                            </div>

                        </div>  

                    </div>

                    <div class="col-md-8 mx-auto" style="margin-top: 2rem;">

                        <table class="table table-light">

                            <thead class="thead-light">
                                <tr>
                                    <th>ID      </th>
                                    <th>Usuario </th>
                                    <th>Nombre  </th>
                                    <th>Correo  </th>
                                    <th>Rol     </th>
                                    <th>Accion  </th>
                                </tr>
                            </thead>

                            <tbody>
                            
                                <?php 
                                $query = "SELECT user_login.*, descripcion FROM user_login INNER JOIN rol_user ON rol=rol_user.id WHERE rol=1";# Accion
                                $result = mysqli_query($conn, $query);# Resultado de la acción
                                while($row = mysqli_fetch_array($result)){#Obtiene una fila de resultados como un array asociativo, numérico, o ambos
                                ?>
                                <tr> 
                                    <td><?php echo $row['id'] ?>          </td>
                                    <td><?php echo $row['usuario'] ?>     </td>
                                    <td><?php echo $row['nombre'] ?>      </td>
                                    <td><?php echo $row['correo'] ?>      </td>
                                    <td><?php echo $row['descripcion'] ?> </td>
                                    <td>
                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Convertir en Aprendiz">
                                            <a  href="update_rol2.php?id=<?php echo $row['id']?>" class="btn btn-danger" name="update2">
                                                <i class="fa-solid fa-arrow-down-short-wide"></i>
                                            </a>
                                        </span>
                                    </td>
                                </tr>
                                <?php 
                                }/* end while */
                                ?>
                            </tbody>

                        </table>

                    </div><!-- end col-md-8 -->

                </div><!-- end row -->
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