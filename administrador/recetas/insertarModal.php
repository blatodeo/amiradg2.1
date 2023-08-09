<div class="modal fade" id="ventanaModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header bg-success">

                <h2 class="text-white" id="tituloVentana">Nueva Receta</h2>
                <button class="close" style="width: 2rem;" data-dismiss="modal" aria-label="cerrar"></button>
                <span aria-hidden="true">&times;</span>

            </div><!-- end modal-header -->

            <div class="modal-body">
                        
                <form method="post" name="form" action="recetas_insertar.php" enctype = "multipart/form-data">  

                    <div class="form-group">

                        <label for="nombre" class="col-sm-2 col-form-label col-form-label-sm"><h4>Nombre: </h4></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm transformacion1" style="height: 4rem; border-radius: 1rem;" id="nombre" placeholder="Nombre de la receta" autocomplete="off" name="nombre">
                        </div>

                    </div>

                    <div class="form-group">

                        <label for="preparacion" class="col-sm-2 col-form-label col-form-label-sm"><h4>Preparación: </h4></label>
                            <div class="col-sm-10">
                        <textarea class="form-control" placeholder="Preparación" name="preparacion" id="preparacion" style="height: 80px; height: 4rem; border-radius: 1rem;" required></textarea>
                        </div>

                    </div>

                    <div class="form-group">

                        <label for="selectC" class="col-sm-2 col-form-label col-form-label-sm"><h4>Categoria: </h4></label>

                        <div class="col-sm-10">

                            <div class="input-group mb-3">

                                <select class="form-control" style="height: 4rem; border-bottom-left-radius: 1rem; border-top-left-radius: 1rem;" name="categoria" id="selectC" required>

                                    <option selected>Categoria...</option>
                                    <!-- Consulta para traer las categorias de las recetas -->
                                    <?php
                                    include("../../conexion/conexion.php");/* incluyo la conexion a la BD */

                                    $get_categoria  = "SELECT * FROM categoria_recetas";/* Traigo la información de las categorias */
                                    $get_categoria2 = mysqli_query($conn, $get_categoria);/* Almaceno la información */

                                    while($row = mysqli_fetch_array($get_categoria2)){ /* Muestro la información por medio de Arrays */

                                        $id     = $row['id']; /* Almaceno el campo en una variable */
                                        $nombre = $row['descripcion']; /* Almaceno el campo en una variable */

                                    ?>
                        
                                        <option value="<?php echo $id; ?>"> <?php echo $nombre;?> </option><!-- Creo opciones con datos reales de la BD y los valuo con la variables -->
                                        <?php
                                    }
                                    ?>
                                    
                                </select>

                            <div class="input-group-append">

                            <button type="button" class="btn btn-success" style="height: 4rem; border-bottom-right-radius: 1rem; border-top-right-radius: 1rem;"  data-dismiss="modal" data-toggle="modal" data-target="#categoriaModal">
                                <i class="fa fa-plus"></i>
                            </button>

                            </div>

                            </div><!-- end input-group mb-3 -->
                        </div><!-- end col-sm-10 -->
                    </div><!-- end form-group row-->

                    <div class="form-group">
                        <label for="receipImage" class="col-sm-2 col-form-label col-form-label-sm"><h4>Foto/Imagen: </h4></label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" style="height: 4rem; border-radius: 1rem;" name="imagen" id="receipImage" required>
                        </div>
                    </div>

            </div><!-- end modal-body -->

            <div class="modal-footer">

                <button class="btn btn-danger" style="height: 3rem; border-radius: 1rem;" type="button" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-success" style="height: 3rem; border-radius: 1rem;" type="submit" name="enviar">Agregar</button>

                        </form>

            </div><!-- end modal-footer -->

        </div><!-- end modal-content -->

    </div><!-- end modal-dialog -->

</div><!-- end modal -->