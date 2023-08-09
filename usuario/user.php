<?php

session_start();
$usuario = $_SESSION['usuario'];
$rol = $_SESSION['rol'];

if(!isset($usuario)){
    header("Location: ../administrador/login.php");
}else{

    if ($rol==2){
        
    }else{
        session_destroy();
        header("Location: ../administrador/login.php");
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
        <!-- CSS only -->
        
        <link rel="stylesheet" href="css/admin.css">
 
        <link href="css/styles.css" rel="stylesheet" />

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <!--Fontasome-->
        <link rel="stylesheet" href="../fontawesome/css/all.css">
        <!-- CDN de Bootstrap 4-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style type="text/css"> /* Estilos de texto */
        .transformacion1 { text-transform: capitalize;}   
        .transformacion2 { text-transform: uppercase;}   
        .transformacion3 { text-transform: lowercase;}  
        
        .form-user{
            width: 90%;
            height: 3rem;
            border-radius: 1rem;
        }
        </style>

    </head>
    <body>
        
        <?php 

            include("../conexion/conexion.php");#conexion a la BD

            $sql = "SELECT user_login.*, descripcion FROM user_login INNER JOIN rol_user ON rol = rol_user.id WHERE usuario = $usuario";#acción a ejecutar
            $result = mysqli_query($conn, $sql);#resultado de la acción
            
            while ($row = mysqli_fetch_array($result)){#datos de la BD
        ?>

        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-success" id="sidebar-wrapper">

                <div class="sidebar-heading border-bottom bg-success">
                    
                    <center>
                        <h4>
                            <a class="list-group-item list-group-item-action bg-success text-white p-3" href="admin.php">
                                <img style = "width: 10rem; height: 10rem; border-radius: 50%; border: .5rem solid white;" src="data:image/jpg;base64,<?php echo base64_encode($row['foto']); ?>" alt="">
                                <p class="p-3"><?php echo $row['usuario'] ?></p>
                            </a>
                        </h4>
                    </center>

                </div>

                <div class="list-group list-group-flush">

                    <h5>
                        <a class="list-group-item list-group-item-action bg-success text-white p-3" href="recetas/recetas.php">
                            <i class="fa-solid fa-bell-concierge"></i>
                            Recetas
                        </a>
                    </h5>

                    <h5>
                        <a class="list-group-item list-group-item-action bg-success text-white p-3" href="logica/cerrar_sesion.php">
                            <i class="fa-regular fa-circle-left"></i>
                            Cerrar sesión
                        </a>
                    </h5>

                </div><!-- end list-group -->

            </div><!-- end sidebar wrapper -->

            <!-- Contenido-->
            <div id="page-content-wrapper">

                <!-- Header-->
                
                <nav class="navbar navbar-expand-lg navbar-success bg-success border-bottom">

                    <div class="container-fluid">

                        <button class="btn btn-light" id="sidebarToggle">
                            <img src="../img/lista.png" style="width: 30px; height: 30px;" alt="">
                        </button>
                     
                        <h3 class="transformacion1 text-white" style="position: absolute;
                        left: 100px;"><?php echo $row['nombre'] ?></h3>
                        
                    </div>

                </nav>

                <!-- ALERTAS-->

                <?php if(isset($_SESSION['message'])){?>

                    <div class="col-md-6 mx-auto" style="margin-top: 2.5rem;">
                        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show d-flex align-items-center" role="alert" style="height: 5rem;">
                        <h4>
                            <?=  $_SESSION['message']?>
                        </h4>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div><!-- end alert alert -->
                    </div>

                <?php } unset($_SESSION['message']); ?>

                    <!-- INFORMACIÓN DE USUARIO  -->
                    <div class="row col-md-12" style="margin: 3%;">

                        <div class="col-md-8 card border-success border-right-0">

                            <div class="card-header border-success" style="padding: 1rem;">

                                <div class="form-group row" style="margin: 1rem;">
                    
                                    <div class="col-sm-3">
                                        <h2 class="text-dark" id="id" style="">ID #<span class="text-success"><?php echo $row['id'] ?></span></h2><!-- ID -->
                                    </div>
                            
                                    <div class="col-sm-9">
                                        <h2 class="card-text text-dark" style="margin-left: 1rem;"><?php echo $row['descripcion'] ?></h2>
                                    </div><!-- ROL -->

                                </div>

                            </div>

                            <div class="form-group row" style="margin: 1rem;">

                                <label for="usuario" class="col-sm-3 col-form-label"><h5>Tu usuario...</h5></label>

                                <div class="col-sm-9">
                                    <h4 class="text-dark" id="usuario" style=""><?php echo $row['usuario'] ?></h4><!-- USUARIO/DOCUMENTO DE IDENTIDAD -->
                                </div>

                            </div>

                            <!-- ACTUALIZACIÓN DE INFORMACIÓN -->

                            <form action="logica/userUpdate.php?id=<?php echo $row['id'] ?>" method="POST" enctype = "multipart/form-data">

                            <!-- NOMBRE -->
                                <div class="form-group row" style="margin: 1rem;">

                                    <label for="nombre" class="col-sm-3 col-form-label"><h5>Nombre...</h5></label>

                                    <div class="col-sm-9">
                                        <input class="form-control form-user" type="text" name="nombre" id="nombre" placeholder="Nombre de usuario..." value="<?php echo $row['nombre'] ?>" required>
                                    </div>
                                    
                                </div><!-- end form-group -->

                            <!-- NOMBRE -->
                                <div class="form-group row" style="margin: 1rem;">

                                    <label for="correo" class="col-sm-2 col-form-label"><h5>Correo...</h5></label>

                                    <div class="col-sm-10">
                                        <input class="form-control form-user" type="email" name="correo" id="correo" placeholder="Correo electronico..." value="<?php echo $row['correo'] ?>" required>
                                    </div>

                                </div><!-- end form-group -->

                            <!-- FOTO -->
                                <div class="form-group row" style="margin: 1rem;">

                                    <label for="foto" class="col-sm-3 col-form-label"><h5>Foto de perfil...</h5></label>

                                    <div class="col-sm-9">
                                        <input class="form-control form-user" type="file" name="foto" id="foto" placeholder="Foto...">
                                    </div>

                                </div><!-- end form-group -->

                                <div class="form-group" style="margin: 1rem;">

                                    <button class="btn btn-success btn-block text-white" style="font-size: 2rem; border-radius: 1rem;">Actualizar Datos
                                    </button>

                                </div>
                                 
                            </form>

                        </div><!-- end card -->

                        <div class="col-md-3 card border-success" style="">

                            <img class="card-img-bottom" style="width: 100%; height: 70%; border-radius: 10%; margin-top: 15%;" src="data:image/jpg;base64,<?php echo base64_encode($row['foto']); ?>" alt=""><!-- FOTO DE PERFIL -->

                        </div>
                        
                    </div><!-- end row col-md-12 -->
                
                <?php
                } /* END WHILE */
                ?>
                
            </div><!-- end border-end bg-white -->
        </div><!-- end d-flex wrapper -->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        <!-- <script type="text/javascript" src="js/jquery-3.2.1.slim.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script> -->

        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
