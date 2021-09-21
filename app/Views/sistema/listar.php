                    <h1 class="mt-4">Tables</h1>
                    <a href="<?= base_url('agregar');?>"class=" btn btn-primary " >Crear</a>
                 
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i> Tabla Sistema
                        </div>
                        <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th>id</th>
                                        <th>Nombre del sistema</th>
                                        <th>Nombre del creador</th>
                                        <th>Logo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                <?php foreach($sistema as $dato): ?>
                                    <tr>
                                        <td><?= $dato['id'];  ?></td>
                                        <td><?= $dato['nombre'];  ?></td>
                                        <td><?= $dato['nombre_creador'];  ?></td>
                                        <td>
                                        <img  class="img-thumbnail" src=" <?= base_url()?>/fotos/<?= $dato['logo'];  ?> " alt="" width="60">
                                        </td>
                                        <td>
                                        <a href="<?= base_url('editar/'.$dato['id']);  ?>" class="btn btn-primary "> <i class="nav-icon fas fa-edit"></i></a></td>
                                        <td> 	<a href="#" data-href="<?= base_url('borrar/'.$dato['id']);  ?>" data-toggle="modal" data-target="#confirm-delete" data-placement="top" title="Eliminar registro" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
</tr>
<?php endforeach;?>

</tbody>
        
        </table>
      </div>
      <!-- /.card-body -->
    </div>
<!-- Modal -->
<div class="modal" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Eliminar registro</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<p>¿Desea eliminar este registro?</p>
			</div>
			<div class="modal-footer">
				<a class="btn btn-light" data-dismiss="modal">Cancelar</a>
				<a class="btn btn-light" data-dismiss="modal">No</a>
				<a class="btn btn-danger btn-ok" >Si</a>
			</div>
		</div>
	</div>
</div>
