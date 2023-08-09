
<!-- EDITAR RECETA -->
<div class="modal fade" id="editarModal<?php echo $resultReceta['id']?>" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header bg-success">

                <h2 class="text-white" id="tituloVentana">Actualizar Receta</h2>
                <button class="close" data-dismiss="modal" aria-label="cerrar"></button>
                <span aria-hidden="true">&times;</span>

            </div><!-- end modal-header -->

            <div class="modal-body">
               <!--  RECETA INFO -->
                <form method="post" action="update.php" enctype = "multipart/form-data">  

                    <input type="hidden" name="id" value="<?php echo $resultReceta['id']; ?>"><!-- #ID  -->

                    <!-- NOMBRE -->
                    <div class="form-group">

                        <label for="nombre" class="col-sm-2 col-form-label col-form-label-sm"><h5 class="text-dark">Nombre: </h5></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm transformacion1" style="height: 4rem; border-radius: 1rem;" id="nombre" placeholder="Nombre de la receta" autocomplete="off" name="nombre" value="<?php echo $resultReceta['nombre']?>">
                        </div>

                    </div>

                <!-- PREPARACIÓN -->
                    <div class="form-group">

                        <label for="preparacion" class="col-sm-2 col-form-label col-form-label-sm"><h5 class="text-dark">Preparación: </h5></label>
                        <div class="col-sm-10">
                            <textarea class="form-control" placeholder="Preparación" name="preparacion" id="preparacion" style="height: 8rem; border-radius: 1rem;"><?php echo $resultReceta['preparacion']?></textarea>
                        </div>

                    </div>

                <!-- CATEGORIA -->
                    <div class="form-group">

                        <label for="selectC" class="col-sm-2 col-form-label col-form-label-sm"><h5 class="text-dark">Categoria: </h5></label>

                        <div class="col-sm-10">

                            <div class="input-group mb-3">

                                <select class="form-control" style="height: 4rem; border-radius: 1rem;" name="categoria" id="selectC" >

                                    <option selected value="<?php echo $resultReceta['id_categoria'] ?>"><?php echo $resultReceta['categoria'] ?></option>

                                    <!-- Consulta para traer las categorias de las recetas -->
                                    <?php
                                    include("../../conexion/conexion.php");/* incluyo la conexion a la BD */

                                    $get_categoria  = "SELECT * FROM categoria_recetas";/* Traigo la información de las categorias */
                                    $get_categoria2 = mysqli_query($conn, $get_categoria);/* Almaceno la información */

                                    while($rowC = mysqli_fetch_array($get_categoria2)){ /* Muestro la información por medio de Arrays */

                                        $id     = $rowC['id']; /* Almaceno el campo en una variable */
                                        $nombre = $rowC['descripcion']; /* Almaceno el campo en una variable */

                                    ?>
                        
                                    <option value="<?php echo $id; ?>"> <?php echo $nombre;?> </option><!-- Creo opciones con datos reales de la BD y los valuo con la variables -->

                                    <?php
                                    }
                                    ?>
                                
                                </select>

                            </div><!-- end input-group mb-3 -->

                        </div><!-- end col-sm-10 -->

                    </div><!-- end form-group-->

                    <!-- IMAGEN -->
                    <div class="form-group">

                        <label for="receipImage" class="col-sm-2 col-form-label col-form-label-sm"><h5 class="text-dark">Foto/Imagen: </h5></label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" style="height: 4rem; border-radius: 1rem;" name="imagen" id="receipImage">
                        </div>

                    </div>

            </div><!-- end modal-body -->

            <div class="modal-footer">

                <button class="btn btn-danger" style="height: 3rem; border-radius: 1rem;" type="button" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" style="height: 3rem; border-radius: 1rem;" type="submit" name="update">Guardar cambios</button>

                </form>

            </div><!-- end modal-footer -->

        </div><!-- end modal-content -->

    </div><!-- end modal-dialog -->

</div><!-- end modal -->
<!-- FIN MODAL -->


<div class="modal fade" id="editarModal2<?php echo $dataReceta['id']?>" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header bg-success">

                <h2 class="text-white" id="tituloVentana">Actualizar Receta</h2>
                <button class="close" data-dismiss="modal" aria-label="cerrar"></button>
                <span aria-hidden="true">&times;</span>

            </div><!-- end modal-header -->

            <div class="modal-body">
                <!-- RECETAS INFO  -->               
                <form method="post" action="update.php" enctype = "multipart/form-data">  

                    <input type="hidden" name="id" value="<?php echo $dataReceta['id']; ?>"><!-- #ID -->

                        <!-- NOMBRE -->
                        <div class="form-group">

                            <label for="nombre" class="col-sm-2 col-form-label col-form-label-sm"><h5 class="text-dark">Nombre: </h5></label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm transformacion1" style="height: 4rem; border-radius: 1rem;"  id="nombre" placeholder="Nombre de la receta" autocomplete="off" name="nombre" value="<?php echo $dataReceta['nombre']?>">
                            </div>

                        </div>

                        <!-- PREPARACIÓN -->
                        <div class="form-group">
                            <label for="preparacion" class="col-sm-2 col-form-label col-form-label-sm"><h5 class="text-dark">Preparación: </h5></label>
                            <div class="col-sm-10">
                            <textarea class="form-control" style="height: 4rem; border-radius: 1rem;" placeholder="Preparación" name="preparacion" id="preparacion"><?php echo $dataReceta['preparacion']?></textarea>
                            </div>
                        </div>

                        <!-- CATEGORIA -->
                        <div class="form-group">

                            <label for="selectC" class="col-sm-2 col-form-label col-form-label-sm"><h5 class="text-dark">Categoria: </h5></label>

                            <div class="col-sm-10">

                                <div class="input-group mb-3">

                                    <select class="form-control" style="height: 4rem; border-radius: 1rem;" name="categoria" id="selectC"  >

                                        <option selected value="<?php echo $dataReceta['id_categoria'] ?>"><?php echo $dataReceta['categoria'] ?></option>

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

                                </div><!-- end input-group mb-3 -->

                            </div><!-- end col-sm-10 -->

                        </div><!-- end form-group row-->

                        <!-- IMAGEN -->
                        <div class="form-group">

                            <label for="receipImage" class="col-sm-2 col-form-label col-form-label-sm"><h5 class="text-dark">Foto/Imagen: </h5></label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" style="height: 4rem; border-radius: 1rem;" name="imagen" id="receipImage">
                            </div>
                            
                        </div>

            </div><!-- end modal-body -->

            <div class="modal-footer">

                <button class="btn btn-danger" style="height: 3rem; border-radius: 1rem;" type="button" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" style="height: 3rem; border-radius: 1rem;" type="submit" name="update">Guardar cambios</button>

                </form>

            </div><!-- end modal-footer -->

        </div><!-- end modal-content -->

    </div><!-- end modal-dialog -->

</div><!-- end modal -->