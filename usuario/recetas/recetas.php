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
                            <a class="list-group-item list-group-item-action bg-success text-white p-3" href="../user.php">
                                <img style = "width: 10rem; height: 10rem; border-radius: 50%; border: .5rem solid white;" src="data:image/jpg;base64,<?php echo base64_encode($user['foto']); ?>" alt="">
                                <p class="p-3"><?php echo $user['usuario'] ?></p>
                            </a>
                        </h4>
                    </center>
                </div><!-- end sidebar-heading border-bottom bg-success -->

                <div class="list-group list-group-flush"><!-- Lista de opciones para el ADMIN -->

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

                </div><!-- end list-group list-group-flush -->

            </div><!-- end border-end bg-success -->

            <!-- Contenido-->

            <div id="page-content-wrapper">

                <!-- Navegacion-->

                <nav class="navbar navbar-expand-lg navbar-success bg-success border-bottom">

                    <div class="container-fluid">
                        <button class="btn btn-light" id="sidebarToggle">
                            <img src="../../img/lista.png" style="width: 30px; height: 30px;" alt="">
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
        
        $cuentaRecetas         = "SELECT COUNT(nombre) AS resultados FROM recetas WHERE activo = 1";/* utilizo una variable para traer la información */
        $resultCuenta          = mysqli_query($conn, $cuentaRecetas);/* almaceno la información */
        $cuentaCategorias      = "SELECT COUNT(descripcion) AS resultados FROM categoria_recetas";
        $resultCuentaCategoria = mysqli_query($conn, $cuentaCategorias);

        if ($rowCuentaReceta = mysqli_fetch_array($resultCuenta)){ /* verifico que la información exista */
            if ($rowCuentaCategoria = mysqli_fetch_array($resultCuentaCategoria)){?>

        <div class="row col-md-12" style="margin-left: .5rem; margin-top: 2rem; margin-right: 1rem;">

            <div class="col-md-4 d-flex align-items-center">
                <h3 class="text-dark" style="">Recetas(<span class="text-success"><?php echo $rowCuentaReceta['resultados'] ?></span>) Categorias(<span class="text-success"><?php echo $rowCuentaCategoria['resultados'] ?></span>)</h3><!-- muestro la información -->
            </div>
            <div class="col-md-6 mx-auto" style="">
                <form class="form-inline" method="POST"><!-- Formulario para buscar recetas -->

                    <input class="form-control input-receta" type="text" placeholder="Busca recetas por nombre" name="encontrar" style="width: 80%; ">

                    <button class="btn btn-outline-secondary btn-search-receta text-center" type="submit" name="buscar" style="width: 20%;">Buscar</button>

                </form>
            </div>
                

        </div><!-- end row -->

    <?php 
            }
        }/* end if */
    ?>       
    
<!-- RESULTADOS-->
<section class="resultados">
    <?php

    if(isset($_POST['buscar'])){
        $buscar = $_POST['encontrar'];
        /* $buscar2 = $_POST['encontrar2']; */  

        $resultados  = "SELECT COUNT(nombre) AS resultados FROM recetas WHERE nombre LIKE '%$buscar%' AND activo = 1";
        $resultados2 = mysqli_query($conn, $resultados);
        while ($row = mysqli_fetch_array($resultados2)){
        
            if($row['resultados']>0){
            ?>
                <div class="col-md-12 text-center">

                    <h3 class="text-dark transformacion1 specialFont" style = "margin-top: 1rem;">
                    Resultados encontrados para <span class="text-success transformacion1"> <?php echo $buscar ?> </span>
                    <span class="badge badge-success"><?php echo $row['resultados'];?> </span>
                        <a class="btn btn-light btn-lg" href="recetas.php" style="margin-left: 4rem;">
                            <i class="fa-solid fa-close"></i>
                        </a>
                    </h3>
                </div>

                <div class="row" style="margin: 2rem;">
                
                <?php

                $consulta = "SELECT recetas.id AS id_Receta, recetas.nombre, preparacion , imagen, recetas.activo, categoria_recetas.descripcion AS nombre_categoria, fecha, user_login.nombre AS creador, user_login.foto AS perfilCreador, recetas.activo FROM recetas INNER JOIN (categoria_recetas, user_login) ON (categoria=categoria_recetas.id AND creador=usuario) WHERE recetas.nombre LIKE '%$buscar%' AND recetas.activo = 1 ORDER BY recetas.nombre";
                $consulta2 = mysqli_query($conn, $consulta);

                while ($row = mysqli_fetch_array($consulta2)){

                ?>
                <div class="col-md-4 mx-auto" style="margin-top: 1rem;">
                
                    <div class="card" style="height: 27rem;">
                
                        <div class="card-img" style="">

                            <img class="card-img" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" alt="" style="height: 15rem;">

                            <div class="card-img-overlay" style="height: 10rem; background: linear-gradient(to bottom, rgb(0 0 0 / .75), rgb(0 0 0 / .0)); background-size: cover;">
                                <h3 class="transformacion1 text-white"><?php echo $row['nombre']; ?></h3>
                                <h3><span class="badge badge-light text-dark"><?php echo $row['nombre_categoria'];?></span></h3>

                            </div>

                        </div>

                        <div class="card-body">

                            <div class="row" style="margin-bottom: 2rem;">        
                                <div class="col-sm-2 img-perfil-card">
                                    <img src="data:image/jpg;base64,<?php echo base64_encode($row['perfilCreador']); ?>" alt="" style = "width: 4rem;">
                            </div>

                            <div class="col-sm-10 text-dark">
                                <h5><span class="">Por: <?php echo $row['creador']?></span></h5>
                                <h6><span class="">En: <?php echo $row['fecha']; ?></span></h6>
                            </div>

                        </div>
                            <a class="btn btn-success btn-block btn-lg text-white" href="recetaView.php?id=<?php echo $row['id_Receta'];?>" >Ver Receta</a>

                    </div><!-- end card -->

                </div><!-- end col-md-4 -->
            
            </div><!--row-->
            <?php
                }
                 

            }else{
                ?>
                <div class="col-md-12 mx-auto text-center" style="margin-top: 2rem;">
                    <h4 style="text-align: center; ">
                        No se encontraron resultados 
                        <a name="" id="" class="btn btn-light btn-lg" href="recetas.php" style="margin-left: 4rem;">
                            <i class="fa fa-close"></i>
                        </a>
                    </h4>
                    <img src="../../img/undraw_no_data.svg" alt="" style="width: 30%;">
                </div>
                    
                <?php
            }
        }

    }else{
    ?>
</section>

<!-- CATEGORIAS -->
<section class="categorias">

    <div class="row" style ="margin: 2rem;">
        
        <?php
        $query           = "SELECT * FROM categoria_recetas ORDER BY id";
        $resultCategoria = mysqli_query($conn, $query);
        while($rowCategoria = mysqli_fetch_array($resultCategoria)){ 

        ?>
            <div class="col-md-3 mx-auto" style="margin-top: 1rem;">

                <div class="card border-success" style="">

                    <div class="card-body text-center">
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Ver recetas de <?php echo $rowCategoria['descripcion'] ?>">

                        <a class="btn text-success" href="../categorias/recetasCategoria.php?id=<?php echo $rowCategoria['id'] ?>">

                            <h3 class=""><?php echo $rowCategoria['descripcion']; ?></h3>

                        </a>
                        </span>
                    </div>

                </div>

            </div><!-- end col-md-4 -->

        <?php } ?>

    </div><!-- end row -->

    <?php 
    } 
    ?>
</section>

<!-- RECETAS -->

<section class="recetas">

    <div class="text-center" style="margin-top: 4rem;">
        <h2 class="text-dark">Recetas disponibles</h2>
    </div> 

    <div class="col-md-12 row mx-auto" style="margin: 2rem;">
                    
        <?php

        $consulta = "SELECT recetas.id AS id_Receta, recetas.nombre, preparacion , imagen, recetas.activo, categoria_recetas.descripcion AS nombre_categoria, fecha, user_login.nombre AS creador, user_login.foto AS perfilCreador, recetas.activo FROM recetas INNER JOIN (categoria_recetas, user_login) ON (categoria=categoria_recetas.id AND creador=usuario) WHERE recetas.activo=1 ORDER BY nombre";
        $consulta2 = mysqli_query($conn, $consulta);
                
        while ($row = mysqli_fetch_array($consulta2)){
        ?>
        <div class="col-md-3 mx-auto" style="margin-top: 2rem;">
        
            <div class="card" style="height: 27rem;">
            
                <div class="card-img" style="">

                    <img class="card-img" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" alt="" style="height: 15rem;">

                    <div class="card-img-overlay" style="height: 10rem; background: linear-gradient(to bottom, rgb(0 0 0 / .75), rgb(0 0 0 / .0)); background-size: cover;">
                        <h3 class="transformacion1 text-white"><?php echo $row['nombre']; ?></h3>
                        <h3><span class="badge badge-light text-dark"><?php echo $row['nombre_categoria'];?></span></h3>

                    </div>

                </div>

                <div class="card-body">

                    <div class="row" style="margin-bottom: 2rem;">        
                        <div class="col-sm-2 img-perfil-card">
                            <img src="data:image/jpg;base64,<?php echo base64_encode($row['perfilCreador']); ?>" alt="" style = "width: 4rem;">
                        </div>

                        <div class="col-sm-10 text-dark">
                            <h5><span class="">Por: <?php echo $row['creador']?></span></h5>
                            <h6><span class="">En: <?php echo $row['fecha']; ?></span></h6>
                        </div>
                    </div>
                    <a class="btn btn-success btn-block btn-lg text-white" href="recetaView.php?id=<?php echo $row['id_Receta'];?>" >Ver Receta</a>

                </div><!-- end card-body -->

            </div><!-- end card -->

        </div><!-- end col-md-4 -->
        <?php 
        }
        ?>
    </div>
</section>
     
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
