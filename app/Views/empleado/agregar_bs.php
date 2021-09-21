<!-- Info boxes -->
<div class="card">

    <div class="card-header">
        <h3 class="card-title">Tabla usuariodsd</h3>
    </div>
    <div class="card-header">
        <form action="<?php echo base_url() ?>/tipo/buscarr" id="formulario_personas" method="POST" enctype="multipart/form-data">


            <td> <label for="buscar"><input type="text" class="form-control form-control-sm" placeholder="Por nombres" aria-controls="example1" name="nombre" id="nombre"></label>
                <input type="submit" id="buscar" value="Buscar ">
            </td>
            <td> &nbsp;</td>
            <td> <label for="buscar"><input type="text" class="form-control form-control-sm" placeholder="Descripcion" aria-controls="example1" name="descripcion" id="descripcion"></label>
                <input type="submit" id="buscar" value="Buscar ">

    </div>
    </form>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?php echo base_url() ?>/empleado/insertar" id="formulario_sistema" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label>Tipo </label>
                    <table id="example1" class="table table-bordered table-striped">
                        <!-- /.card-header -->

                        <tbody>
                            <?php
                            foreach ($tipos as $data) { ?>

                                <tr>
                                    <td><?php echo $data['id'] ?></td>
                                    <td><?php echo $data['nombre'] ?></td>
                                    <td><?php echo $data['descripcion'] ?></td>

                                    <td> <input type="checkbox" name="id_tipo" id="id_tipo" value="<?php echo $data['id'] ?>"> </td>

                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>

                </div>
                <div class="form-group">
                    <label>Area </label>
                    <table id="example1" class="table table-bordered table-striped">
                        <!-- /.card-header -->

                        <tbody>
                            <?php
                            foreach ($areas as $data) { ?>

                                <tr>
                                    <td><?php echo $data['id'] ?></td>
                                    <td><?php echo $data['nombre'] ?></td>
                                    <td><?php echo $data['descripcion'] ?></td>

                                    <td> <input type="checkbox" name="id_area" id="id_area" value="<?php echo $data['id'] ?>"> </td>

                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>

                </div>
                <div class="row">
                    <div class="form-group">

                        <label for="ci">Cedula</label>
                        <input type="text" name="ci" class="form-control" id="ci" value="" placeholder="Ingrese ci. ">
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombres" class="form-control" id="nombres" value="" placeholder="Ingrese nombre ">
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <label for="ap">Apellido Paterno</label>
                                <input type="text" name="ap" class="form-control" id="ap" value="" placeholder="Ingrese ap.paterno ">
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="am">Apellido Materno</label>
                                <input type="text" name="am" class="form-control" id="am" value="" placeholder="Ingrese ap.materno ">
                            </div>



                        </div>


                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" class="form-control" id="direccion" value="" placeholder="Ingrese direccion ">
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <label for="tel_cel">telefono celular</label>
                                <input type="text" name="tel_cel" class="form-control" id="tel_cel" value="" placeholder="Ingrese #celular ">
                            </div>
                            <div class="col-12 col-sm-6">

                                <label for="nombre">Telefono fijo</label>
                                <input type="text" name="tel_fijo" class="form-control" id="tel_fijo" value="" placeholder="Ingrese telefono ">
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" value="Guardar"></button>
                    <a href="<?php echo base_url() ?>/empleado" class="btn btn-dark ">Cancelar</a>

                </div>
        </form>

    </div>
    <!-- /.card-body -->
</div>
<!-- Modal -->