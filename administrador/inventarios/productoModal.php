<div class="modal fade" id="productoModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header bg-success">

                <h2 class="text-white" id="tituloVentana">Nueva Producto</h2>
                <button class="close" style="width: 2rem;" data-dismiss="modal" aria-label="cerrar"></button>
                <span aria-hidden="true">&times;</span>

            </div><!-- end modal-header -->

            <div class="modal-body">

                <form method="post" action="insert.php"> 

                <!-- NOMBRE -->
                    <div class="form-group">
                        <label for="nombre" class="col-sm-3 form-label"><h5 class="text-dark">Nombre</h5></label>
                        <input type="text" class="form-control transformacion1" placeholder="Nombre de producto" name="name" id="nombre" required style="height: 3rem; border-radius: 1rem;">
                    </div>

                    <!-- CATEGORIA -->
                    <div class="form-group">
                        
                        <label for="categoria" class="col-sm-3 form-label"><h5 class="text-dark">Categoria</h5></label>
                        <div class="input-group mb-3"> 
                            
                            <select class="form-control transformacion1" name="categoria" id="categoria" style="height: 3rem; border-radius: 1rem 0 0 1rem;" required>
                                <?php

                                $getCategoria  = "SELECT * FROM categoria_productos";
                                $resultGetCategoria = mysqli_query($conn, $getCategoria);

                                while($row = mysqli_fetch_array($resultGetCategoria)){
                                    $id          = $row['id']; 
                                    $descripcion = $row['descripcion'];

                                ?>
                                <option class="transformacion1" value="<?php echo $id; ?>"><?php echo $descripcion;?></option>
                                <?php
                                }
                                ?>
                                    
                            </select>

                            <div class="input-group-append">
                                <button type="button" class="btn btn-success" style="border-bottom-right-radius: 1rem; border-top-right-radius: 1rem;"  data-dismiss="modal" data-toggle="modal" data-target="#categoriaModal">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>

                        </div>
                    </div>

                    <!-- CANTIDAD -->
                    <div class="form-group">
                        <label for="cantidad" class="col-sm-8 form-label"><h5 class="text-dark">Cantidad inicial a añadir</h5></label>
                        <input type="number" class="form-control" name="cantidad" id="cantidad" style="height: 3rem; border-radius: 1rem;" required>
                    </div>

                    <!-- UNIDAD DE MEDIDA -->
                    <div class="form-group"> 
                        <label for="unidad" class="col-sm-6 form-label"><h5 class="text-dark">Unidad de medida</h5></label>
                        
                        <select class="form-control transformacion1" name="unidad" id="unidad" style="height: 3rem; border-radius: 1rem;" required>
                            <?php

                            $getUnidad  = "SELECT * FROM unidad_medida";
                            $resultGetUnidad = mysqli_query($conn, $getUnidad);

                            while($row = mysqli_fetch_array($resultGetUnidad)){
                                $id          = $row['id']; 
                                $descripcion = $row['descripcion'];

                            ?>
                            <option class="" value="<?php echo $descripcion; ?>"><?php echo $descripcion;?></option>
                            <?php
                            }
                            ?>
                                
                        </select>
                        <small class="text-danger h6">Ten en cuenta que el inventario del producto realizará entradas y salidas unicamente con la unidad que elijas para el, esta una vez seleccionada no podrá cambiarse</small>
                    </div>

                    <!-- VENCIMIENTO -->
                    <div class="form-group">
                        <label for="vencimieto" class="col-sm-6 form-label"><h5 class="text-dark">Fecha de vencimiento</h5></label>
                        <div class="form-floating">
                            <input type="date" class="form-control" placeholder="Fecha de vencimiento" name="vencimiento" id="vencimiento" style="height: 2rem; border-radius: 1rem;" required>
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