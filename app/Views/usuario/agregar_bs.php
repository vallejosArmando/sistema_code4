


<!-- Info boxes -->
<div class="card">
  
      <div class="card-header">
        <h3 class="card-title">Tabla usuariodsd</h3>
      </div>
      <div class="card-header">
      <form action="<?php echo base_url() ?>/persona/buscarr" id="formulario_personas" method="POST" enctype="multipart/form-data">

    
      <td>  <label for="buscar"><input type="text" class="form-control form-control-sm" placeholder="Por nombres" aria-controls="example1" name="nombres" id="nombres"></label>
                  <input type="submit" id="buscar" value="Buscar "></td><td> &nbsp;</td><td>  <label for="buscar"><input type="text" class="form-control form-control-sm" placeholder="Ap. Paterno" aria-controls="example1" name="ap" id="ap"></label>
                  <input type="submit" id="buscar" value="Buscar "></td><td> &nbsp;</td><td>  <label for="buscar"><input type="text" class="form-control form-control-sm" placeholder="Ap. Materno" aria-controls="example1" name="am" id="am"></label>
                  <input type="submit" id="buscar" value="Buscar "></td>
      </div></form>
      <!-- /.card-header -->
      <div class="card-body">
      <form  action="<?php echo base_url() ?>/usuario/insertar" id="formulario_sistema" method="POST" enctype="multipart/form-data" >
                <div class="card-body">
                <div class="form-group">
                <label>Persona</label>
                <table id="example1" class="table table-bordered table-striped">
    <!-- /.card-header -->
   
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

          <td> <input type="checkbox" name="id_persona" id="id_persona" value="<?php echo $data['id']?>"> </td>
         
        </tr>
      <?php } ?>
    </tbody>
    
  </table>

              </div>
              <div class="row">
                    <div class="fr">
                    <label for="nom_usuario">Nombre</label>
                    <input type="text" name="nom_usuario" class="form-control" id="nom_usuario" value="<?php echo set_value('nom_usuario') ?>" >
                  </div>
                  <div class="form-group">
  <div class="row" >
  <div class ="col-12 col-sm-6" >
    <label for="usuario">Contraseña:</label>
    <input type="password" class="form-control" name="clave" id="clave" value="<?php  set_value('clave') ?>" >
  </div>
    <div class ="col-12 col-sm-6" >
    <label for="clave">Repite la contraseña:</label>
    <input type="password" class="form-control" name ="reclave" id="reclave" value="<?php echo set_value('reclave') ?>" >
  </div>
  </div>
  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Agregar</button>
                  <a href="<?php echo base_url()?>/usuario" class="btn btn-dark ">Cancelar</a> 

                </div>
              </form>
     
      </div>
      <!-- /.card-body -->
    </div>
<!-- Modal -->
