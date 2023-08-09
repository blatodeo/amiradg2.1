<?php include("conexion/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas</title>
    <link rel="stylesheet" href="css/recetas_style.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Grape+Nuts&display=swap" rel="stylesheet">

<!-- Bootstrap4 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
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

    .specialFont{ font-family: 'Grape Nuts', cursive; font-weight: bold; } 
  </style>

</head>
<body>


    <div class="wrap-header">

        <header class="main-header">

            <div class="header-wrap">

                <div class="wrap-logo-header">

                    <a class="logo-header" href="index.php">
                        AMIRA-DG
                    </a>

                </div><!-- end wrap-logo-header -->
            

            <div class="wrap-nav-header">

                <nav class="nav-header">

                    <input type="checkbox" id="check">
                    <label for="check" class="checkbtn">

                        <i class="toggle-menu">
                            <img src="img/lista.png" alt="">
                        </i>
                    </label>

                    <ul class="main-menu">
                        <li class="menu-item"><a href="index.php">Inicio</a></li>
                        <li class="menu-item"><a href="index.php #nosotros">Equipo</a></li>
                        <li class="menu-item"><a href="recetas.php">Recetas</a></li>
                        <li class="menu-item"><a href="index.php #login">Login</a></li>
                    </ul>

                </nav>

                </div><!-- end header-wrap -->

            </div><!-- end wrap-nav-header -->

        
        </header>
    

    <main class="main-section">

        <section class="hero-home-page">

            <div class="wrap-hero-home-page">
                <h1>AMIRA-DG</h1>
                <p>Aplicación de Manejo de Inventarios y Recetas del Ambiente Didactico Gourmet</p>

                <form method="POST">

                    <input class="input-receta-search" type="text" placeholder="Buscar receta" aria-label="Search" name="encontrar" autocomplete="off" required>

                    <a name="" id="" class="" href="#resultados">

                    <button class="btn-receta-search" type="submit" name="buscar">Buscar</button></a>

                </form>

            </div><!-- end wrap-hero-home-page -->

            <div class="wave">
                
            </div>

        </section>

    </div><!-- end wrap-header -->

    </main>

<!-- Recetas -->

<section class="wrap section" id="resultados">

        <div class="wrap-title-section">
            
        </div><!-- end wrap-title-section -->
        

        <?php

            if(isset($_POST['buscar'])){#verifico si hay una accion

                $buscar = $_POST['encontrar'];#guardo la variable buscadora

                $resultados = "SELECT COUNT(recetas.nombre) AS resultados, recetas.id AS id_Receta, recetas.nombre, preparacion , imagen, recetas.activo, categoria_recetas.descripcion AS nombre_categoria, fecha, user_login.nombre AS creador, user_login.foto AS perfilCreador, recetas.activo FROM recetas INNER JOIN (categoria_recetas, user_login) ON (categoria=categoria_recetas.id AND creador=usuario) WHERE recetas.nombre LIKE '%$buscar%' AND recetas.activo = 1 ORDER BY recetas.nombre";#hago una consulta en la BD
                $resultados2 = mysqli_query($conn, $resultados);#ejecuto la consulta

                while ($row = mysqli_fetch_array($resultados2)){#traigo los datos
                
                    #valido que hayan datos
                    if($row['resultados']>0){#SI los hay, los muestro
                        ?>
                        <div class="col-md-12 row ">

                            <div class="col-md-8 text-center">

                                <h2 class="text-dark transformacion1 specialFont" style = "font-size: 3rem; margin-top: 1rem;">
                                Resultados encontrados para <span class="text-success transformacion1"> <?php echo $buscar ?> </span>
                                <span class="badge badge-success"><?php echo $row['resultados'];?> </span></h2>
                            </div>

                            <div class="col-md-4">
                                <a href="recetas.php">
                                    <h2 class="float-right text-success">
                                        <i class="fa-solid fa-close " style="margin-top: 2rem;"></i>
                                    </h2>
                                </a>
                            </div>
                            
                                
                        </div>
                        
                        <?php
                    }else{
                        ?>
                        <div class="col-md-12 text-center" style="height: 60vh; margin-top: 2rem;">
                            <img src="img/undraw_empty.svg" alt="" style="width: 20rem;">
                        
                            <h2 class="text-dark transformacion1 specialFont" style = "font-size: 3rem; margin-top: 1rem;">
                                ¡¡Ups!! No se encontraron resultados para  <span class="text-success"><?php echo $buscar ?></span>
                            </h2>
                            <div class="alert alert-danger col-md-8 mx-auto">
                              <h4>Verifica el nombre de la receta y vuelve a intentarlo</h4>
                            </div>

                        </div>
                        <?php
                    }
                }
                ?>

                <div class="row">
                
                <?php

                $consulta = "SELECT recetas.id AS id_receta, recetas.nombre, preparacion , imagen, recetas.activo, categoria_recetas.descripcion AS nombre_categoria, fecha, user_login.nombre AS creador, user_login.foto AS perfilCreador, recetas.activo FROM recetas INNER JOIN (categoria_recetas, user_login) ON (categoria=categoria_recetas.id AND creador=usuario) WHERE recetas.nombre LIKE '%$buscar%' AND recetas.activo = 1 ORDER BY recetas.nombre";
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
                            <a class="btn btn-success btn-block btn-lg text-white" href="usuario/categorias/ver_recetas.php?id=<?php echo $row['id_receta']; ?>" >Ver Receta
                            </a>

                    </div><!-- end card -->

                </div><!-- end col-md-4 -->
            
            </div>
                <?php
                }
            }
        ?>
</section>

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
            <li><a href="recetas.php">Recetas</a></li>
            <li><a href="registro.php">Sé un miembro</a></li>
            </ul>
        </div><!-- end text-element-footer -->
        </div><!-- end wrap-footer -->
        <div class="footer-creds">
            <div class="copy-creds">
            <p>©2022 · Todos los derechos reservados</p>
            </div>
            <div class="legal-creds">
            </div>
        </div><!--footer-creds-->

</footer>

</body>
</html>

