<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <section id="login" style="margin-top: 10%;">
    
    <div class="text-center">
        <h2>Inicia sesión para continuar</h2>
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

        <form action="Logica/validar.php" method="POST">

            <div class="form-group">

                <label for="usuario" class="col-sm-2 col-form-label col-form-label-sm"><h4>Usuario</h4></label>

                    <input type="number" class="form-control border-success" style="height: 4rem; border-radius: 1rem; font-size: 1.2rem;" placeholder="Número de identificación" name="usuario" id="usuario" autocomplete="off" required> 

                

            </div><!-- end form-group row -->

            <div class="form-group">

                <label for="contrasena" class="col-sm-2 col-form-label col-form-label-sm"><h4>Contraseña</h4></label>

                    <input type="password" class="form-control border-success" style="height: 4rem; border-radius: 1rem; font-size: 1.2rem;" placeholder="Contraseña" name="contrasena" id="contrasena" autocomplete="off" required> 

            </div><!-- end form-group row -->


            <div class="form-group" style = "margin-top: 2rem;">

                    <input class="btn btn-dark btn-block" type="submit" value="Ingresar" name="ingresar" style="height: 4rem; border-radius: 1rem; font-size: 2rem; font-weight: bold; font-family: 'Grave Nuts', cursive;" >

            </div>

        </form>

    </div><!-- end col-md-4 -->

</section>
  
  
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>