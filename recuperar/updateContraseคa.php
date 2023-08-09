<?php include("../conexion/conexion.php");

session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMIRA-DG</title>
    <link rel="stylesheet" href="../css/registro_style.css">
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


    <div class="wrap-header">
    <header class="main-header">
        <div class="header-wrap">
            <div class="wrap-logo-header">
                <a class="logo-header" href="../index.php">
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
                        <img src="../img/menu-hamburguesa.png" alt="">
                    </i>
                </label>

                <ul class="main-menu">
                    <li class="menu-item"><a href="../index.php">Inicio</a></li>
                    <li class="menu-item"><a href="../index.php#nosotros">Equipo</a></li>
                    <li class="menu-item"><a href="../recetas.php">Recetas</a></li>
                    <li  class="menu-item"><a href="../index.php#login">Login</a></li>
                </ul>

            </nav>
            </div><!-- end header-wrap -->
        </div><!-- end wrap-nav-header -->

    
    </header>
    

    <main class="main-section">

        <section class="hero-home-page">

            <div class="wrap-hero-home-page">
            </div><!-- end wrap-hero-home-page -->

            <div class="wave">
            </div>

        </section>
    </div><!-- end wrap-header -->

<!-- LOGIN -->
        
    

<section id="login">
    
    <div class="wrap-title-section">
        <h2>Recupera tu contraseña</h2>
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

        <form action="../administrador/Logica/recuperar_contraseña.php" method="POST">

        <?php if (isset($_GET['id'])){ 
            $usuario = $_GET['id'];
        } ?>
        <input type="hidden" name="usuario" value="<?php echo $usuario ?>">

         <!-- CONTRASEÑA -->
        <div class="form-group">

            <label for="contrasena" class="col-sm-2 col-form-label col-form-label-sm"><h4>Contraseña</h4></label>

            <input type="password" class="form-control border-success" style="height: 4rem; border-radius: 1rem; font-size: 1.2rem;" placeholder="Contraseña" name="contrasena" id="contrasena" autocomplete="off" required> 

        </div><!-- end form-group -->


        <!-- CONFIRMAR CONTRASEÑA -->
        <div class="form-group">

            <label for="contrasena2" class="col-sm-6 col-form-label col-form-label-sm"><h4>Confirmar contraseña</h4></label>

            <input type="password" class="form-control border-success" style="height: 4rem; border-radius: 1rem; font-size: 1.2rem;" placeholder="Contraseña" name="contrasena2" id="contrasena2" autocomplete="off" required> 

        </div><!-- end form-group -->

        <!-- INGRESAR -->
            <div class="form-group" style = "margin-top: 2rem;">

                <input class="btn btn-dark btn-block" type="submit" name="cambiarContrasena" value="Cambiar contraseña" style="height: 4rem; border-radius: 1rem; font-size: 2rem; font-weight: bold; font-family: 'Grave Nuts', cursive;" >

            </div>

        </form>

    </div><!-- end col-md-4 -->

</section>

<!-- LOGIN -->


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
            <li><a href="../index.php#inicio">Inicio</a></li>
            <li><a href="../index.php#login">Ingreso</a></li>
            <li><a href="../index.php#nosotros">Nosotros</a></li>
            <li><a href="../recetas.php">Recetas</a></li>
            <li><a href="../registro.php">Sé un miembro</a></li>
            </ul>
        </div><!-- end text-element-footer -->
        </div><!-- end wrap-footer -->
        <div class="footer-creds">
            <div class="copy-creds">
            <p>©2022 · Todos los derechos reservados</p>
            </div>
        </div><!--footer-creds-->

</footer>

    
</body>
</html>


    <a href="https://www.flaticon.es/iconos-gratis/menu-abierto" title="menú abierto iconos">Menú abierto iconos creados por Freepik - Flaticon</a>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>
