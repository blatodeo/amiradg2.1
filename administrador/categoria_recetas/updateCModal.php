
<!-- Modal -->
<div class="modal fade" id="editarCModal<?php echo $dataCategoria['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header bg-success">

                <h3 class="modal-title text-white" id="exampleModalLongTitle">Actualizar categoria</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>

            </div><!-- end modal-header -->

            <div class="modal-body">

                <form action="update.php" method="post">

                    <input type="hidden" name="id" value="<?php echo $dataCategoria['id']; ?>">

                    <div class="form-group row">

                        <div class="col-sm-12">

                            <input type="text" id="nombre" name="descripcion" class="form-control" placeholder="Nombre de la categoria" value="<?php echo $dataCategoria['descripcion']; ?>" style="height: 4rem; border-radius: 1rem; font-size: 1.3rem;">

                        </div>

                    </div>

                    <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" style="border-radius: 1rem;">Cancelar</button>
                    <button type="submit" name="update" class="btn btn-primary btn-lg" style="border-radius: 1rem;">Guardar cambios</button>

                </form>

            </div><!-- end modal-body -->
   
    </div><!-- end modal-content -->

  </div><!-- end modal-dialog -->

</div><!-- end modal -->



<div class="modal fade" id="editarCModal2<?php echo $resultCategoria['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header bg-success">

                <h3 class="modal-title text-white" id="exampleModalLongTitle">Actualizar categoria</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>

            </div><!-- end modal-header -->

            <div class="modal-body">

                <form action="update.php" method="post">

                <input type="hidden" name="id" value="<?php echo $resultCategoria['id']; ?>">

                    <div class="form-group row">

                        <div class="col-ms-12">

                            <input type="text" id="nombre" name="descripcion" class="form-control" placeholder="Nombre de la categoria" value="<?php echo $resultCategoria['descripcion']; ?>" style="height: 4rem; border-radius: 1rem; font-size: 1.5rem;">

                        </div>

                    </div>

                    <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" style="border-radius: 1rem;">Cancelar</button>
                    <button type="submit" name="update" class="btn btn-primary btn-lg" style="border-radius: 1rem;">Guardar cambios</button>

                </form>
            </div><!-- end modal-body -->

                
        </div><!-- end modal-content -->
    </div><!-- end modal-dialog -->

</div>

