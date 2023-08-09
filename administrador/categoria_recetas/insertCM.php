<!-- Modal -->
<div class="modal fade" id="categoriaModal" tabindex="-1" role="dialog" aria-labelledby="categoriaModalTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header bg-success">

        <h3 class="modal-title text-white" id="exampleModalLongTitle">Nueva categoria</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body">
        
        <form action="../categoria_recetas/insertar.php" method="post">

          <div class="form-group row">

            <label for="nombre" class="col-sm-4 col-form-label col-form-label-sm"><h4>Nombre: </h4></label>

              <div class="col-ms-10">

                <input type="text" id="nombre" name="descripcion" class="form-control transformacion1" style="height: 4rem; border-radius: 1rem;" placeholder="Nombre de la categoria" autofocus required>

            </div>

          </div>

      </div><!-- end modal-body -->

      <div class="modal-footer">

        <button type="button" class="btn btn-danger" style="height: 3rem; border-radius: 1rem;" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-success" style="height: 3rem; border-radius: 1rem;" type="submit" name="enviar">Agregar</button>

        </form>

      </div>

    </div>

  </div>

</div>