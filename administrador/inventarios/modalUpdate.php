<!-- EDITAR RECETA -->
<div class="modal fade" id="editarModal<?php echo $rowProducto['id']?>" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header bg-success">

                <h2 class="text-white" id="tituloVentana">Actualizar Producto</h2>
                <button class="close" data-dismiss="modal" aria-label="cerrar"></button>
                <span aria-hidden="true">&times;</span>

            </div><!-- end modal-header -->

            <div class="modal-body">
               <!--  RECETA INFO -->
                <form method="post" action="update.php">  

                    <input type="hidden" name="id" value="<?php echo $rowProducto['id']; ?>"><!-- #ID  -->

                    <!-- NOMBRE -->
                    <div class="form-group">
                        <label for="nombre" class="col-sm-3 form-label"><h5 class="text-dark">Nombre</h5></label>
                        <input type="text" class="form-control transformacion1" placeholder="Nombre de producto" name="name" id="nombre" required style="height: 3rem; border-radius: 1rem;" value="<?php echo $rowProducto['nombre'] ?>">
                    </div>

                    <!-- CATEGORIA -->
                    <div class="form-group">
                        
                        <label for="categoria" class="col-sm-3 form-label"><h5 class="text-dark">Categoria</h5></label>
                            
                            <select class="form-control transformacion1" name="categoria" id="categoria" style="height: 3rem; border-radius: 1rem" required>

                                <option selected value="<?php echo $rowProducto['id_categoria'] ?>"><?php echo $rowProducto['descripcion'] ?></option>
                                <?php
                                $getCategoria       = "SELECT * FROM categoria_productos";
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

                    </div>


                    <!-- VENCIMIENTO -->
                    <div class="form-group">
                        <label for="vencimieto" class="col-sm-6 form-label"><h5 class="text-dark">Fecha de vencimiento</h5></label>
                        <div class="form-floating">
                            <input type="date" class="form-control" placeholder="Fecha de vencimiento" name="vencimiento" id="vencimiento" style="height: 3rem; border-radius: 1rem;" value="<?php echo $rowProducto['vencimiento'] ?>">
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


<!-- EDITAR RECETA -->
<div class="modal fade" id="editarModal<?php echo $rowProducto2['id']?>" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header bg-success">

                <h2 class="text-white" id="tituloVentana">Actualizar Producto</h2>
                <button class="close" data-dismiss="modal" aria-label="cerrar"></button>
                <span aria-hidden="true">&times;</span>

            </div><!-- end modal-header -->

            <div class="modal-body">
               <!--  RECETA INFO -->
                <form method="post" action="update.php">  

                    <input type="hidden" name="id" value="<?php echo $rowProducto2['id']; ?>"><!-- #ID  -->

                    <!-- NOMBRE -->
                    <div class="form-group">
                        <label for="nombre" class="col-sm-3 form-label"><h5 class="text-dark">Nombre</h5></label>
                        <input type="text" class="form-control transformacion1" placeholder="Nombre de producto" name="name" id="nombre" required style="height: 3rem; border-radius: 1rem;" value="<?php echo $rowProducto2['nombre'] ?>">
                    </div>

                    <!-- CATEGORIA -->
                    <div class="form-group">
                        
                        <label for="categoria" class="col-sm-3 form-label"><h5 class="text-dark">Categoria</h5></label>
                            
                            <select class="form-control transformacion1" name="categoria" id="categoria" style="height: 3rem; border-radius: 1rem" required>

                                <option selected value="<?php echo $rowProducto2['id_categoria'] ?>"><?php echo $rowProducto2['descripcion'] ?></option>
                                <?php
                                $getCategoria       = "SELECT * FROM categoria_productos";
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

                    </div>

                    <!-- VENCIMIENTO -->
                    <div class="form-group">
                        <label for="vencimieto" class="col-sm-6 form-label"><h5 class="text-dark">Fecha de vencimiento</h5></label>
                        <div class="form-floating">
                            <input type="date" class="form-control" placeholder="Fecha de vencimiento" name="vencimiento" id="vencimiento" style="height: 3rem; border-radius: 1rem;" value="<?php echo $rowProducto2['vencimiento'] ?>">
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