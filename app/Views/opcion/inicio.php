<!-- Info boxes -->
<div class="card">

  <div class="card-header">
    <h3 class="card-title"><?php echo $titulo ?></h3>
  </div>
  <div class="card-header">
    <td> <a href="<?php echo base_url() ?>/opcion/agregar" class="btn btn-primary">Agregar</a> </td>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Grupo</th>
          <th>Nombre</th>
          <th>URL</th>
          <th>Mostrar</th>
          <th>Orden</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $data) : ?>


          <tr>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['grupo']; ?></td>
            <td><?php echo $data['nombre']; ?></td>
            <td><?php echo $data['op_url']; ?></td>
            <td><?php echo $data['mostrar']; ?></td>
            <td><?php echo $data['orden']; ?></td>

            <td> <a href="<?php echo base_url(); ?>/opcion/editar/<?php echo $data['id']; ?>" class="btn btn-success"><i class="nav-icon fas fa-edit"></i></a></td>
            <td> <a href="#" data-href="<?php echo base_url() . '/opcion/eliminar/' . $data['id']; ?>" data-toggle="modal" data-target="#confirm-delete" data-placement="top" title="Eliminar registro" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
          </tr>
        <?php endforeach; ?>
        icon-cancel
      </tbody>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Grupo</th>
          <th>Nombre</th>
          <th>URL</th>
          <th>Mostrar</th>
          <th>Orden</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </tfoot>
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
        <a class="btn btn-danger btn-ok">Si</a>
      </div>
    </div>
  </div>
</div>