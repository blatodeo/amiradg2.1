<?php
include("../../conexion/conexion.php");

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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas</title>
    <link rel="stylesheet" href="../css/recetas_style.css">
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
    .specialFont{ font-family: 'Grape Nuts', cursive; font-weight: bold; } 
    </style>

</head>
<body>

<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }

?>


<div class="col-md-12 row fixed-top bg-light" >
    <div class="col-md-4 text-center" >
        
    <?php 
    $categoriaReceta = "SELECT * FROM categoria_recetas WHERE id = $id ";
    $resultCategoria = mysqli_query($conn, $categoriaReceta);
    while($rowCategoria = mysqli_fetch_array($resultCategoria)){
        $categoria = $rowCategoria['descripcion'];
    ?>     
        <h1 class="text-success" style = "font-size: 4rem;">
            <a class="btn" href="../recetas/recetas.php">
                <h1><i class="fa-solid fa-arrow-left"></i></h1>
            </a>
            <a class="btn" href="recetasCategoria.php?id=<?php echo $id ?>">
                <h1 class="text-success transformacion1 specialFont" style = "font-size: 4rem;"><?php echo $categoria ?></h1>
            </a>
            
        </h1>
        
    </div>

    <div class="col-md-6" style = "margin-top: 1rem;">

        <form class="form-inline" method="POST">
            <input class="form-control transformacion1" style = "width: 80%; height: 4rem; border-radius: 1rem 0 0 1rem; font-size: 1.5rem;" type="text" name="encontrar" placeholder="Buscar en <?php echo $categoria ?>">
            <button class="btn btn-outline-success" style = "width: 20%; height: 4rem; border-radius: 0 1rem 1rem 0; font-size: 1.5rem;" type="submit" name="buscar">Buscar</button>
        </form>
    <?php } ?>
    </div>
</div>

<?php
if (isset($_POST['buscar'])){
    $buscar = $_POST['encontrar'];
?>
    <section style = "margin: 5rem;">

        <div class="col-md-12 row mx-auto" style="">
                        
            <?php

            $consulta = "SELECT recetas.id AS id_Receta, recetas.nombre, preparacion , imagen, recetas.activo, categoria_recetas.descripcion AS nombre_categoria, fecha, user_login.nombre AS creador, user_login.foto AS perfilCreador, recetas.activo FROM recetas INNER JOIN (categoria_recetas, user_login) ON (categoria=categoria_recetas.id AND creador=usuario) WHERE categoria_recetas.id = $id AND recetas.nombre LIKE '%$buscar%'AND recetas.activo = 1 ORDER BY recetas.nombre";
            $consulta2 = mysqli_query($conn, $consulta);

            $resultados = "SELECT COUNT(id) AS resultados FROM recetas WHERE categoria = $id AND nombre LIKE '%$buscar%' AND activo = 1";
            $resulResultados = mysqli_query($conn, $resultados);
            $rowResultados = mysqli_fetch_array($resulResultados);

            
            if ($rowResultados['resultados']>0){
            ?>
                <div class="col-md-12 text-center" style="margin-top: 2rem;">
                    <h1 class="text-dark transformacion1 specialFont" style = "font-size: 3rem;">
                        Resultados encontrados para <span class="text-success"><?php echo $buscar?></span> 
                    </h1>
                </div>
                <?php 
                while ($row = mysqli_fetch_array($consulta2)){
                ?>
                <div class="col-md-3 mx-auto" style="margin-top: 2rem;">
                
                    <div class="card" style="height: 28rem;">
                        
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
                            <a class="btn btn-success btn-block btn-lg text-white" href="../recetas/recetaView.php?id=<?php echo $row['id_Receta'];?>" >Ver Receta</a>

                    </div><!-- end card -->

                </div><!-- end col-md-4 -->
            
            </div>
                <?php 
                }
                    
            }else{

                ?>
                <div class="col-md-12 text-center" style="height: 40vh; margin-top: 10rem;">
                    <img src="../img/undraw_no_data.svg" alt="" style="width: 20rem;">
                
                    <h1 class="text-dark transformacion1 specialFont" style = "font-size: 3rem;">
                        ¡¡Ups!! no se encontraron resultados para <span class="text-success"><?php echo $buscar?></span> en <span class="text-success"><?php echo $categoria?></span>
                    </h1>
                    <div class="col-md-8 mx-auto alert alert-danger">
                        <h5>Tal vez la receta que estás buscando no esta aquí o no ha sido añadida aún, intenta buscarla en
                            <strong><a href="../recetas/recetas.php">otra categoria</a></strong></h5>
                    </div>

                </div>

                <!-- <img src="../img/frutas.jpg" alt=""> -->
                <?php
            }
                
                ?>

    </section>
<?php
}else{

?>
    <section style = "margin-top: 5rem;">

    <div class="row col-md-10 mx-auto" style="">
                    
        <?php

        $consulta = "SELECT recetas.id AS id_Receta, recetas.nombre, preparacion , imagen, recetas.activo, categoria_recetas.descripcion AS nombre_categoria, fecha, user_login.nombre AS creador, user_login.foto AS perfilCreador, recetas.activo FROM recetas INNER JOIN (categoria_recetas, user_login) ON (categoria=categoria_recetas.id AND creador=usuario) WHERE categoria_recetas.id = $id AND recetas.activo = 1 ORDER BY nombre";
        $consulta2 = mysqli_query($conn, $consulta);

        $resultados = "SELECT COUNT(id) AS resultados FROM recetas WHERE categoria = $id ";
        $resulResultados = mysqli_query($conn, $resultados);
        $rowResultados = mysqli_fetch_array($resulResultados);

        
        if ($rowResultados['resultados']>0){
                
            while ($row = mysqli_fetch_array($consulta2)){
            ?>
            <div class="col-md-4 mx-auto" style="margin-top: 2rem;">
            
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
                        <a class="btn btn-success btn-block btn-lg text-white" href="../recetas/recetaView.php?id=<?php echo $row['id_Receta'];?>" >Ver Receta</a>

                </div><!-- end card -->

            </div><!-- end col-md-4 -->
        </div>
            <?php 
            }
                
        }else{

            ?>
            <div class="col-md-12 text-center" style="height: 60vh; margin-top: 2rem;">
                <img src="../../img/undraw_no_data.svg" alt="" style="width: 20rem;">
            
                <h1 class="text-dark transformacion1 specialFont" style = "font-size: 4rem;">
                    ¡¡Ups!! <?php echo $categoria ?> no tiene recetas
                </h1>

            </div>

            <!-- <img src="../img/frutas.jpg" alt=""> -->
            <?php
        }
            
            ?>
    </section>
<?php } ?>
<footer class="footer">
        
        <div class="wrap-footer">
            <div class="text-element-footer element-footer">
              <h3>AMIRA-DG</h3>
              <p>Aplicación de Manejo de Inventarios y Recetas del Ambiente Didactico Gourmet</p>
              <p><a href="http://senabuga.blogspot.com/"> SENA. Centro Agropecuario de Guadalajara de Buga, Valle del Cauca</p></a>
            </div><!-- end text-element-footer -->
            <div class="text-element-footer element-footer">
              <h5>Dirección</h5>
              <ul>
                <li>Carretera Central, variante Buga, Tuluá; teléfono (2) 23295 y (2) 376300 extensión 23261.</li>
                <li></li>
                <li>Teléfono: 22376300</li>
              </ul>
            </div><!-- end text-element-footer -->
            <div class="text-element-footer element-footer">
              <h5>Más información</h5>
              <ul>
                <li><a href="index.php#inicio">Inicio</a></li>
                <li><a href="index.php#login">Ingreso</a></li>
                <li><a href="index.php#nosotros">Nosotros</a></li>
                <li><a href="../recetas.php">Recetas</a></li>
                <li><a href="../registro.php">Sé un miembro</a></li>
              </ul>
            </div><!-- end text-element-footer -->
            <div class="text-element-footer element-footer">
              <h5>Créditos para</h5>
              <ul>
                <li><a href="https://www.flaticon.es/iconos-gratis/menu-abierto" title="menú abierto iconos">Flaticon</a></li>
              </ul>
            </div><!-- end rrss-element-footer element-footer -->
          </div><!-- end wrap-footer -->
            <div class="footer-creds">
                <div class="copy-creds">
                <p>©2022 · Todos los derechos reservados para SoftCookies.</p>
                </div>
            </div><!--footer-creds-->

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
