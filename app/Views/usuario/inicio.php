<!-- Info boxes -->
<div class="card">

  <div class="card-header">
    <h3 class="card-title">Tabla usuariodsd</h3>
  </div>
  <div class="card-header">
    <form action="<?php echo base_url() ?>/persona/buscarr" id="formulario_personas" method="POST" enctype="multipart/form-data">

      <td> <a href="<?php echo base_url() ?>/usuario/nuevo" class="btn btn-primary">Agregar</a> </td>
      <td> &nbsp;&nbsp;</td>
      <td> &nbsp;&nbsp;</td>
      <td> &nbsp;&nbsp;</td>
      <td> <label for="buscar"><input type="text" class="form-control form-control-sm" placeholder="Por nombres" aria-controls="example1" name="nombres" id="nombres"></label>
        <input type="submit" id="buscar" value="Buscar ">
      </td>
      <td> &nbsp;</td>
      <td> <label for="buscar"><input type="text" class="form-control form-control-sm" placeholder="Ap. Paterno" aria-controls="example1" name="ap" id="ap"></label>
        <input type="submit" id="buscar" value="Buscar ">
      </td>
      <td> &nbsp;</td>
      <td> <label for="buscar"><input type="text" class="form-control form-control-sm" placeholder="Ap. Materno" aria-controls="example1" name="am" id="am"></label>
        <input type="submit" id="buscar" value="Buscar ">
      </td>
  </div>
  </form>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Usuario</th>
          <th>Clavec</th>
          <th>Editar</th>
          <th>Eliminar</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $dato) : ?>


          <tr>
            <td><?php echo $dato['id'] ?></td>
            <td><?php echo $dato['nom_usuario'] ?></td>
            <td><?php echo $dato['clave'] ?></td>
            <td> <a href="<?= base_url('/usuario/editar/' . $dato['id']); ?>" class="btn btn-success "> <i class="nav-icon fas fa-edit"></i></a></td>
            <td> <a href="#" data-href="<?php echo base_url() . '/usuario/eliminar/' . $dato['id']; ?>" data-toggle="modal" data-target="#confirm-delete" data-placement="top" title="Eliminar registro" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
          </tr>
        <?php endforeach; ?>

      </tbody>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Usuario</th>
          <th>Clave</th>
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
          <span aria-hidden="true">??</span>
        </button>
      </div>
      <div class="modal-body">
        <p>??Desea eliminar este registro?</p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-light" data-dismiss="modal">Cancelar</a>
        <a class="btn btn-light" data-dismiss="modal">No</a>
        <a class="btn btn-danger btn-ok">Si</a>
      </div>
    </div>
  </div>
</div>