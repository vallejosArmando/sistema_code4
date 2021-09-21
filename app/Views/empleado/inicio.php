<!-- Info boxes -->
<div class="card">

  <div class="card-header">
    <h3 class="card-title"> <?php echo $titulo ?></h3>
  </div>

  <div class="card-header">Tipo de empelados
    <form action="<?php echo base_url() ?>/tipo/buscarr" id="formulario_personas" method="POST" enctype="multipart/form-data">


      <td> <label for="buscar"><input type="text" class="form-control form-control-sm" placeholder="Por nombres" aria-controls="example1" name="nombre" id="nombre"></label>
        <input type="submit" id="buscar" value="Buscar ">
      </td>
      <td> &nbsp;</td>
      <td> <label for="buscar"><input type="text" class="form-control form-control-sm" placeholder="Descripcion" aria-controls="example1" name="descripcion" id="descripcion"></label>
        <input type="submit" id="buscar" value="Buscar ">

    </form>

  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tipo empleado</th>
          <th>Area</th>
          <th>Nombre</th>
          <th>Ap. paterno</th>
          <th>Ap. materno</th>
          <th>Cedula</th>
          <th>Telefono</th>
          <th>Tel. celular</th>
          <th>Direccion</th>
          <th>Editar</th>
          <th>Eliminar</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $data) : ?>


          <tr>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['nomb']; ?></td>
            <td><?php echo $data['nombre']; ?></td>
            <td><?php echo $data['nombres']; ?></td>
            <td><?php echo $data['ap']; ?></td>
            <td><?php echo $data['am']; ?></td>
            <td><?php echo $data['ci']; ?></td>
            <td><?php echo $data['tel_fijo']; ?></td>
            <td><?php echo $data['tel_cel']; ?></td>
            <td><?php echo $data['direccion']; ?></td>
            <td> <a href="<?php echo base_url(); ?>/empleado/editar/<?php echo $data['id']; ?>" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a></td>
            <td> <a href="#" data-href="<?php echo base_url() . '/empleado/eliminar/' . $data['id']; ?>" data-toggle="modal" data-target="#confirm-delete" data-placement="top" title="Eliminar registro" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
          </tr>
        <?php endforeach; ?>

      </tbody>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Tipo empleado</th>
          <th>Area</th>
          <th>Nombre</th>
          <th>Ap. paterno</th>
          <th>Ap. materno</th>
          <th>Cedula</th>
          <th>Telefono</th>
          <th>Tel. celular</th>
          <th>Direccion</th>
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