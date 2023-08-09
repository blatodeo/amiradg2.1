
<!-- Modal -->
<div class="modal fade" id="eliminarModal<?php echo $resultReceta['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title text-white">
            Eliminar
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h4 class="card-title text-dark text-center">¿Realmente deseas eliminar?</h4> 
        <h3 class="text-danger text-center">"<?php echo $resultReceta['nombre']?>"</h3>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" style="height: 3rem; border-radius: 1rem; font-size: 1rem;">No, cancelar</button>
            <a href="recetas_delete.php?id=<?php echo $resultReceta['id']?>" class="btn btn-primary d-flex align-items-center" style="height: 3rem; border-radius: 1rem; font-size: 1rem;">
                Si, eliminar<!-- Link que alamcena el ID para ver -->
            </a>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="eliminarModal2<?php echo $dataReceta['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
            Eliminar
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h4 class="card-title">¿Realmente desea eliminar la receta <strong style="color: red;"><?php echo $dataReceta['nombre']?></strong>?</h4>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">No, cancelar</button>
            <a href="recetas_delete.php?id=<?php echo $dataReceta['id']?>" class="btn btn-primary">
                Si, eliminar<!-- Link que alamcena el ID para ver -->
            </a>
      </div>
    </div>
  </div>
</div>