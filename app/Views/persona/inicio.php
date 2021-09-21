<style>
  #add {
    float: right;
    margin-right: 60px;
    width: 100px;
  }

  ;
</style>
<div class="card">

  <div class="card-header">
    <h3 class="card-title">DataTable with default features</h3>
  </div>

  <form action="<?php echo base_url() ?>/persona/buscar" id="formulario_personas" method="POST" enctype="multipart/form-data">
    <a href="<?php echo base_url() ?>/persona/agregar" id="add" class="btn btn-primary">Agregar</a>
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="dt-buttons btn-group flex-wrap">
          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label for="buscar">*Nombre:<input type="text" class="form-control form-control-sm" placeholder="" aria-controls="example1" name="nombres" id="nombres">
                  <input type="submit" id="buscar" value="buscar "></label>

              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="buscar">*Ap. Paterno:<input type="text" class="form-control form-control-sm" placeholder="" aria-controls="example1" name="ap" id="ap"> <input type="submit" id="buscar" value="buscar"></label>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="buscar">*Ap. Materno:<input type="text" class="form-control form-control-sm" placeholder="" aria-controls="example1" name="am" id="am"> <input type="submit" id="buscar" value="buscar"></label>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </form>


  <table id="example1" class="table table-bordered table-striped">
    <!-- /.card-header -->
    <thead>
      <tr>
        <th>ID</th>
        <td>Cedula</td>
        <td>Nombre</td>
        <td>Ap_paterno</td>
        <td>Ap_materno</td>
        <td>Telefono</td>
        <td>Direccion</td>
        <td>Genero</td>
        <th>Editar</th>
        <th>Eliminar</th>

      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($datos as $data) { ?>

        <tr>
          <td><?php echo $data['id']; ?></td>
          <td><?php echo $data['ci']; ?></td>
          <td><?php echo $data['nombres']; ?></td>
          <td><?php echo $data['ap']; ?></td>
          <td><?php echo $data['am']; ?></td>
          <td><?php echo $data['telefono']; ?></td>
          <td><?php echo $data['direccion']; ?></td>
          <td><?php echo $data['genero']; ?></td>

          <td> <a href="<?php echo base_url(); ?>/persona/editar/<?php echo $data['id']; ?>" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a></td>
          <td> <a href="#" data-href="<?php echo base_url() . '/persona/eliminar/' . $data['id']; ?>" data-toggle="modal" data-target="#confirm-delete" data-placement="top" title="Eliminar registro" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
      <?php } ?>
    </tbody>
    <tfoot>
      <tr>
        <th>ID</th>
        <td>Cedula</td>
        <td>Nombre</td>
        <td>Ap_paterno</td>
        <td>Ap_materno</td>
        <td>Telefono</td>
        <td>Direccion</td>
        <td>Genero</td>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </tfoot>
  </table>
</div>
<!-- /.card-body -->


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
<script type="text/javascript">
  $(document).ready(function() {
    //	$('#tabla').load('componentes/tablaper.php');
    $('#buscador').load('buscador.php');
  });
</script>
<script>
  $(document).ready(function() {
    $('#buscadorvivo').select2();

    $('#buscadorvivo').change(function() {
      $.ajax({
        type: "post",
        data: 'valor=' + $('#buscadorvivo').val(),
        url: "<?php echo base_url() ?>/ajaxx",
        success: function(r) {
          $('#tabla').load("", );
        }
      });
    });
  });

  $(document).ready(function() {
    $('#buscadorvivo1').select2();

    $('#buscadorvivo1').change(function() {
      $.ajax({
        type: "post",
        data: 'valor=' + $('#buscadorvivo1').val(),
        url: "<?php echo base_url() ?>/ajaxx",
        success: function(r) {
          $('#tabla').DataTable().ajax.reload();
        }
      });
    });
  });

  $(document).ready(function() {
    $('#buscadorvivo2').select2();

    $('#buscadorvivo2').change(function() {
      $.ajax({
        type: "post",
        data: 'valor=' + $('#buscadorvivo2').val(),
        url: "<?php echo base_url() ?>/ajaxx",
        success: function(r) {
          $('#tabla').DataTable().ajax.reload();
        }
      });
    });
  });
  $(document).ready(function() {

    $('#buscadorvivo2').select2();

    $('#buscadorvivo2').change(function() {

      $.ajax({

        method: "POST",
        data: 'valor=' + $('#buscadorvivo2').val(),
        url: "<?php echo base_url('/ajaxx'); ?>",
        success: function(data) {

          $('#tabla').DataTable().ajax.reload();

        }

      })

    });

  });
</script>