
<!-- Modal -->
<div class="modal fade" id="eliminarCModal<?php echo $dataCategoria['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header bg-danger">

        <h3 class="modal-title text-white">
            Eliminar
        </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

    <div class="modal-body">
      
      <h4 class="card-title text-center">¿Realmente desea eliminar?</h4> 
      <h3 class="text-danger text-center">"<?php echo $dataCategoria['descripcion']?>"</h3>
    </div>

      <div class="modal-footer">

          <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" style="border-radius: 1rem;">No, cancelar</button>
          <a href="delete.php?id=<?php echo $dataCategoria['id']?>" class="btn btn-primary btn-lg" style="border-radius: 1rem;">
              Si, eliminar<!-- Link que alamcena el ID para ver -->
          </a>

      </div>

    </div>

  </div>

</div>


<div class="modal fade" id="eliminarCModal2<?php echo $resultCategoria['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header bg-danger">

        <h3 class="modal-title text-white">
            Eliminar
        </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body">

        <h4 class="card-title text-center">¿Realmente desea eliminar?</h4> 
        <h3 class="text-danger text-center">"<?php echo $resultCategoria['descripcion']?>"</h3>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" style="border-radius: 1rem;">No, cancelar</button>
        <a href="delete.php?id=<?php echo $resultCategoria['id']?>" class="btn btn-primary btn-lg" style="border-radius: 1rem;">
            Si, eliminar<!-- Link que alamcena el ID para ver -->
        </a>

      </div>

    </div>

  </div>
  
</div>