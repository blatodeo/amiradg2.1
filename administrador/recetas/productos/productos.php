<?php

session_start();
$usuario = $_SESSION['usuario'];
$rol = $_SESSION['rol'];

if(!isset($usuario)){
    header("Location: ../../login.php");
}else{

    if ($rol==1){
        
    }else{
        session_destroy();
        header("Location: ../../login.php");
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
        <link href="../../css/styles.css" rel="stylesheet" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <!--Fontasome-->
        <link rel="stylesheet" href="../../../fontawesome/css/all.css">
        <!-- CDN de Bootstrap 4-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style type="text/css"> 

        .transformacion1 { text-transform: capitalize;}   
        .transformacion2 { text-transform: uppercase;}   
        .transformacion3 { text-transform: lowercase;}   
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
        }
        </style>
    </head>
    <body>
        
        <?php 

            include("../../../conexion/conexion.php");# Conexión a la BD

            $sql = "SELECT * FROM user_login WHERE usuario = $usuario";# Acción
            $result = mysqli_query($conn, $sql);# Resultado de la acción
            
            while ($row = mysqli_fetch_array($result)){# Datos de la BD
        ?>

        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-success" id="sidebar-wrapper">

                <div class="sidebar-heading border-bottom bg-success">

                    <center>
                        <h4>
                            <a class="list-group-item list-group-item-action bg-success border-0 text-white p-3" href="../../admin.php">
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
                            <a class="dropdown-item list-group-item list-group-item-action text-white bg-success p-3 " href="../recetas.php">
                                Recetas
                            </a>
    
                            <a class="dropdown-item list-group-item list-group-item-action text-white bg-success p-3 " href="../../categoria_recetas/categorias.php">
                                Categorias
                            </a>

                        </div><!-- end dropdown-menu -->

                    </div><!-- end dropdown -->

                    <div class="dropdown">
                        
                        <button class="list-group-item list-group-item-action text-white bg-success border-0 p-3 h5 dropdown-toggle" type="button" id="recetasOptions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-wheat-awn"></i>
                            Inventarios
                        </button>

                        <div class="dropdown-menu bg-success" aria-labelledby="recetasOptions">
                            <a class="dropdown-item list-group-item list-group-item-action text-white bg-success p-3 " href="../../inventarios/inventarios.php">
                                Inventarios 
                            </a>

                            <a class="dropdown-item list-group-item list-group-item-action text-white bg-success p-3 " href="../../categoria_productos/categorias.php">
                                Categorias
                            </a>

                            <a class="dropdown-item list-group-item list-group-item-action text-white bg-success p-3 " href="../../inventarios/movimientos.php">
                                Movimientos 
                            </a>

                        </div>

                    </div>

                    <h5>
                        <a class="list-group-item list-group-item-action text-white bg-success border-0 p-3" href="../../aprendices/lista.php">
                            <i class="fa-solid fa-user-graduate"></i>
                            Aprendices
                        </a>
                    </h5>

                    <button type="button" class="list-group-item list-group-item-action bg-success border-0 text-white p-3" data-dismiss="modal" data-toggle="modal" data-target="#cerrarSesion">
                        <h5><i class="fa-regular fa-circle-left"></i>
                        Cerrar sesión</h5>
                    </button>  

                </div><!-- end list-group-item -->

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
                                <a class="btn btn-success btn-lg" style="height: 3rem; border-radius: 1rem;" href="../../Logica/cerrar_sesion.php">Si, cerrar sesión</a>

                            </div>

                        </div><!-- end modal-content -->

                    </div><!-- end modal-dialog -->

                </div><!-- end modal -->

            </div><!-- end sidebar-wrapper -->

            <!-- Contenido-->
            <div id="page-content-wrapper">

                <!--Header-->
                <nav class="navbar navbar-expand-lg navbar-success bg-success border-bottom">

                    <div class="container-fluid">

                        <button class="btn btn-light" id="sidebarToggle">
                            <img src="../../img/lista.png" style="width: 30px; height: 30px;" alt="">
                        </button>
                    
                        <h3 class="transformacion1 text-white" style="position: absolute;
                        left: 100px;"><?php echo $row['nombre'] ?>
                        </h3>
 
                    </div>

                </nav>

            <?php 
            } 
            ?>

    <?php 
    
    if(isset($_SESSION['message'])){
    ?>
    <div class="col-md-6 mx-auto" style = "margin-top: 2rem;">

        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <h5 class="text-center"><?=  $_SESSION['message']?></h5>
        </div><!-- end alert alert -->

    </div>
        

    <?php 
    } unset($_SESSION['message']); 
   
    if(isset($_GET['id'])){# Verifico si hay una variable y no es NULL

        $id = $_GET['id'];#ID
    }
    ?>
                           
    <div class="col-sm-12" style="margin-top: 1rem; margin-left: 7.5%;">

        <form action="insert.php?id=<?php echo $id ?>" method="post">
        
            <div class="row">
                
                <div class="col-sm-10">
                    <?php
                        $getNombreReceta  = "SELECT nombre FROM recetas WHERE id = $id";
                        $resultNombreReceta = mysqli_query($conn, $getNombreReceta);

                        while($rowNombre = mysqli_fetch_array($resultNombreReceta)){
                            $nombreReceta = $rowNombre['nombre'];
                        ?>
                            
                        <h2 class="text-center text-dark">Añade productos a <span class="text-success"><?php echo $nombreReceta ?></span></h2> 

                    <?php
                    }
                    ?>
                    
                </div>

                <div class="col-sm-1">

                    <a name="" id="" class="btn btn-light" href="../recetas.php">
                        <img src="../../../img/close-icon.svg" style="width: 2rem;" alt="">
                    </a>
                    
                </div>

            </div><!-- end row -->

            <!-- RECETA A AÑADIR PRODUCTOS -->
            <div class="form-group">

                <label for="id_receta" class="col-sm-2 col-form-label col-form-label-sm"><h4>Receta</h4></label>

                <div class="col-sm-10">

                    <select class="form-control transformacion1" style="height: 3rem; border-radius: 1rem;" name="receta" id="receta"> 
                        <?php
                        
                        $get_receta  = "SELECT id, nombre FROM recetas WHERE id = $id";
                        $get_receta2 = mysqli_query($conn, $get_receta);

                        while($row = mysqli_fetch_array($get_receta2)){

                            $cod    = $row['id']; 
                            $nombre = $row['nombre'];

                        ?>
                            
                            <option value="<?php echo $cod; ?>"><?php echo $nombre;?></option><!-- Nombre y valor de la receta-->

                        <?php
                        }
                        ?>
                    </select>

                </div><!-- end col-sm-10 -->

            </div><!-- end form-group-->

            <!-- PRODUCTOS A AÑADIR -->
            <div class="form-group">

                <label for="productos" class="col-sm-2 col-form-label col-form-label-sm"><h4>Productos</h4></label>

                <div class="col-sm-10">

                    <select class="form-control transformacion1" style="height: 3rem; border-radius: 1rem;" name="productos" id="productos"> 
                        <?php

                        $get_producto  = "SELECT * FROM producto WHERE activo = 1 ORDER BY nombre";
                        $get_producto2 = mysqli_query($conn, $get_producto);
                        
                        while($row = mysqli_fetch_array($get_producto2)){

                            $codP    = $row['id']; 
                            $nombreP = $row['nombre'];

                        ?>
                            <option value="<?php echo $codP; ?>"><?php echo $nombreP;?></option><!-- Nombres y valor de los productos -->

                        <?php
                        }
                        ?>
                    </select>

                </div><!-- end col-sm-10 -->

            </div><!-- end form-group-->

            <!-- CANTIDAD DE PRODUCTOS A INGRESAR -->
            <div class="form-group">

                <label for="cantidad" class="col-sm-2 col-form-label col-form-label-sm"><h4>Cantidad</h4></label>

                <div class="col-sm-10">

                    <input type="number" class="form-control" style="height: 3rem; border-radius: 1rem;" name="cantidad" id="cantidad" autocomplete="off"> 

                </div><!-- end col-sm-10 -->

            </div><!-- end form-group-->

            <!-- UNIDAD DE MEDIDA -->
            <div class="form-group">

                <label for="unidad" class="col-sm-2 col-form-label col-form-label-sm"><h4>Unidad</h4></label>

                <div class="col-sm-10">

                    <select class="form-control transformacion1" style="height: 3rem; border-radius: 1rem;" name="unidad" id="unidad"> 
                        <?php

                        $get_unidad  = "SELECT * FROM unidad_medida";
                        $get_unidad2 = mysqli_query($conn, $get_unidad);

                        while($row = mysqli_fetch_array($get_unidad2)){
                            $codU    = $row['id']; 
                            $nombreU = $row['descripcion'];
                        ?>

                            <option  value="<?php echo $codU; ?>"><?php echo $nombreU;?></option><!-- Nombres y valor de las unidades -->

                        <?php
                        }
                        ?>
                    </select>

                </div><!-- end col-sm-10 -->

            </div><!-- end form-group-->

            <div class="col-sm-10" style="margin-top: 2rem;">

                <button type="submit" name="enviar" id="" class="btn btn-success btn-lg btn-block" style="height: 4rem; border-radius: 1rem;">
                    <h4>Añadir</h4>
                </button>

            </div>

        </form>

    </div><!-- end col-sm-12 -->

</div><!-- end d-flex -->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="../../js/scripts.js"></script>
    </body>
</html>