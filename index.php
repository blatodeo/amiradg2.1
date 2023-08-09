<?php include("conexion/conexion.php");

session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMIRA-DG</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">

    <!-- Bootstrap4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!--Fontasome-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


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
  </style>
</head>
<body>


    <div class="wrap-header" id = "inicio">
    <header class="main-header">
        <div class="header-wrap">
            <div class="wrap-logo-header">
                <a class="logo-header" href="index.php">
                <!-- -->  
                AMIRA-DG
                </a>
            </div><!-- end wrap-logo-header -->
        

        <div class="wrap-nav-header">
            <nav class="nav-header">
                <input type="checkbox" id="check">
                <label for="check" class="checkbtn">
                    <i class="toggle-menu">
                        <!-- <i class="fa-solid fa-bars"></i> -->
                        <!-- <img src="img/logo.png" alt=""> -->
                        <img src="img/menu-hamburguesa.png" alt="">
                    </i>
                </label>

                <ul class="main-menu">
                    <li class="menu-item"><a href="index.php">Inicio</a></li>
                    <li class="menu-item"><a href="#nosotros">Equipo</a></li>
                    <li class="menu-item"><a href="recetas.php">Recetas</a></li>
                    <li  class="menu-item"><a href="#login">Login</a></li>
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
            <a href="recetas.php" class="btn btn-success btn-lg">Ver una receta</a>
        </div><!-- end wrap-hero-home-page -->
        <div class="wave">

        </div>
        </section>
    </div><!-- end wrap-header -->

<!-- LOGIN -->
        
    

<section id="login">
    
    <div class="wrap-title-section">
        <h2>Ingresa a AMIRA-DG</h2>
        <hr>
    </div>

    <div class="col-md-4 text-center" style = "display: flex; flex-flow: column; margin: 0 auto;">
    <?php 
            
        if(isset($_SESSION['message'])){/* Determino si hay un mensaje  */
        
        ?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">

              <?=  $_SESSION['message']?><!-- Si lo hay lo presento -->

            </div><!-- end alert alert -->

        <?php 

        } /* end if */ 

        unset($_SESSION['message']); /* Elimino el mensaje para que no se vuelva a mostrar */
        
        ?>
    </div><!-- end col-md-4 -->

    <div class="col-md-4" id="login" style = "display: flex; flex-flow: column; margin: 0 auto;">

        <form action="administrador/Logica/validar.php" method="POST">

            <div class="form-group">

                <label for="usuario" class="col-sm-2 col-form-label col-form-label-sm"><h4>Usuario</h4></label>

                    <input type="number" class="form-control border-success" style="height: 4rem; border-radius: 1rem; font-size: 1.2rem;" placeholder="Número de identificación" name="usuario" id="usuario" autocomplete="off" required> 

                

            </div><!-- end form-group row -->

            <div class="form-group">

                <label for="contrasena" class="col-sm-2 col-form-label col-form-label-sm"><h4>Contraseña</h4></label>

                    <input type="password" class="form-control border-success" style="height: 4rem; border-radius: 1rem; font-size: 1.2rem;" placeholder="Contraseña" name="contrasena" id="contrasena" autocomplete="off" required> 

            </div><!-- end form-group row -->


            <div class="form-group" style = "margin-top: 2rem;">

                    <input class="btn btn-dark btn-block" type="submit" value="Ingresar" style="height: 4rem; border-radius: 1rem; font-size: 2rem; font-weight: bold; font-family: 'Grave Nuts', cursive;" >

            </div>

            <div class="col-md-12">
                <a name="" class="btn btn-link text-primary" style = "font-size: 1.2rem;" href="recuperar/recuperar_contraseña.php">
                    ¿Olvidaste tu contraseña?
                </a>
            </div>

            <div class="row">
                
                <div class="col-md-8">
                    <p class="h4" style = "height: 3.5rem; font-size: 1.5rem; margin-top: .5rem;">
                    ¿No tienes una cuenta?
                    </p>
                </div>
                <div class="col-md-4">
                    <a name="" id="" class="btn btn-success btn-lg text-white" style="border-radius: 1rem; font-size: 1.5rem; font-weight: bold; font-family: 'Grave Nuts', cursive;" href="registro.php">
                        Registrate
                    </a>
                </div>
                        
            </div>

            </div>
            

        </form>

    </div><!-- end col-md-4 -->

</section>

<!-- LOGIN -->

    <!-- Recetas recientes -->
    <section class="section" id="recetas-recientes">
        <div class="wrap-title-section">
          <h2>Recetas recientes</h2>
          <hr>
        </div><!-- end wrap-title-section -->

        <div class="row d-flex justify-content-center">
        
        <?php

        $consulta = "SELECT recetas.id AS id_Receta, recetas.nombre, preparacion , imagen, recetas.activo, categoria_recetas.descripcion AS nombre_categoria, fecha, user_login.nombre AS creador, user_login.foto AS perfilCreador, recetas.activo FROM recetas INNER JOIN (categoria_recetas, user_login) ON (categoria=categoria_recetas.id AND creador=usuario) WHERE recetas.activo = 1 ORDER BY recetas.fecha DESC LIMIT 3; ";
        $consulta2 = mysqli_query($conn, $consulta);

          while ($receta_result = mysqli_fetch_array($consulta2)){
              ?>
        <div class="col-md-4 mx-auto">
            
        
              
        <div class="card">

            <div class="card-body">
                
                <img src="data:image/jpg;base64,<?php echo base64_encode($receta_result['imagen']); ?>" alt="" style="width: 100%; height: 10rem;">

                    <h3><span class="badge badge-success"><?php echo $receta_result['nombre_categoria'];?></span></h3>

                    <h3 class="transformacion1"><?php echo $receta_result['nombre']; ?></h3>

                
              
            </div><!-- end card-body -->
            
            <div class="card-footer">
                
                <div class="perfil-card">

                    <div class="img-perfil-card">
                        <img src="data:image/jpg;base64,<?php echo base64_encode($receta_result['perfilCreador']); ?>" alt="" style = "">
                    </div>

                    <div class="text-dark">
                        <h5><span class="">Por: <?php echo $receta_result['creador']?></span></h5>
                        <h6><span class="">En: <?php echo $receta_result['fecha']; ?></span></h6>
                    </div>

                </div><!-- end perfil-card -->

                <a class="btn btn-success btn-block text-white" href="usuario/categorias/ver_recetas-login.php?id=<?php echo $receta_result['id_Receta'];?>" >Ver Receta</a>
                
            </div>

        </div><!-- end card -->
    </div><!-- end col-md-4 -->
          <?php 
               
          }?>
</div><!-- end row -->
    
      </section>

        <!-- Team -->
<section id = "nosotros" class="pb-5">
  <div class="container">
      <h5 class="section-title h1 text-dark" style="font-family: 'Grave Nuts', cursive;">NUESTRO EQUIPO</h5>
      <div class="row" >
          <!-- Team member -->
          <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                  <div class="mainflip">
                      <div class="frontside">
                          <div class="card">
                              <div class="card-body text-center">
                                  <p><img class=" img-fluid" src="img/3.png"></p>
                                  <h4 class="text-success">Nicolas Guato Gonzalez</h4>
                                  <p class="card-text text-dark">Desarrollador móvil</p>
                              </div>
                          </div>
                      </div>
                      <div class="backside">
                          <div class="card">
                              <div class="card-body text-center mt-4">
                                  <h4 class="text-success">¿Qué funciones desempeña?</h4>
                                  <p class="card-text">Desarrolla aplicaciones para sistemas operativos android, crea tanto su base de datos, como su interfaz y lógica. Además es co-lider del proyecto, por lo que influye en las decisiones de la líder de la compañia.</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- ./Team member -->
          <!-- Team member -->
          <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                  <div class="mainflip">
                      <div class="frontside">
                          <div class="card">
                              <div class="card-body text-center">
                                  <p><img class=" img-fluid" src="img/4.png"></p>
                                  <h4 class="text-success">Luis Eduardo Romero Marín</h4>
                                  <p class="card-text text-dark">Desarrollador Web.</p>
                              </div>
                          </div>
                      </div>
                      <div class="backside">
                          <div class="card">
                              <div class="card-body text-center mt-4">
                                  <h4 class="text-success">¿Qué funciones desempeña?</h4>
                                  <p class="card-text">Desarrolla paginas web, desde su logica, hasta su interfaz de usuario. Implementa correctamente bases de datos acordes a las necesidades del cliente y genera su conexion con la interfaz web.</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- ./Team member -->
          <!-- Team member -->
          <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                  <div class="mainflip">
                      <div class="frontside">
                          <div class="card">
                              <div class="card-body text-center">
                                  <p><img class=" img-fluid" src="img/2.png"></p>
                                  <h4 class="text-success">Daniel Esteban Sierra Angulo</h4>
                                  <p class="card-text">Administrador de bases de datos</p>
                              </div>
                          </div>
                      </div>
                      <div class="backside">
                          <div class="card">
                              <div class="card-body text-center mt-4">
                                  <h4 class="text-success">¿Qué funciones desempeña?</h4>
                                  <p class="card-text">Analiza y crea desde cero la base de datos acorde a los requerimientos del cliente, realizando tablas relacionales y velando por el correcto funcionamiento del servidor </p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- ./Team member -->
          <!-- Team member -->
          <div class="col-xs-12 col-sm-6 col-md-4">
          </div>
          <!-- ./Team member -->
          <!-- Team member -->
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                <div class="mainflip">
                    <div class="frontside">
                        <div class="card">
                            <div class="card-body text-center">
                                <p><img class=" img-fluid" src="img/1.png"></p>
                                <h4 class="text-success">Carolina Delgado Correa</h4>
                                <p class="card-text">Diseñadora Gráfica y Líder del proyecto</p>
                            </div>
                        </div>
                    </div>
                    <div class="backside">
                        <div class="card">
                            <div class="card-body text-center mt-4">
                                <h4 class="text-success">¿Qué funciones desempeña?</h4>
                                <p class="card-text">Es encargada de la dirección del equipo, velando por que cumplan con todas las funciones requeridas, realizando reuniones constantes de equipo y administra el tiempo correctamente para generar avances en los tiempos estipulados. Además, se encarga de diseñar diagramas, interfaces, y documentación relacionada al proyecto.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Team member -->
        

      </div>
  </div>
</section>
<!-- Team -->

    </main>

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
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#login">Ingreso</a></li>
                <li><a href="#nosotros">Nosotros</a></li>
                <li><a href="recetas.php">Recetas</a></li>
                <li><a href="registro.php">Sé un miembro</a></li>
              </ul>
            </div><!-- end text-element-footer -->
          </div><!-- end wrap-footer -->
            <div class="footer-creds">
                <div class="copy-creds">
                <p>©2022 · Todos los derechos reservados para SoftCookies.</p>
                </div>
            </div><!--footer-creds-->

    </footer>

    
</body>
</html>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>
