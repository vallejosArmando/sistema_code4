<!-- Info boxes -->
<div class="card">

    <div class="card-header">
        <h3 class="card-title">Tabla usuariodsd</h3>
    </div>


    <!-- /.card-header -->
    <div class="card-body">
        <form action="<?php echo base_url() ?>/empleado/insertar" id="formulario_sistema" method="POST" enctype="multipart/form-data">


            <div class="card-header">
                <div class="row">

                    <div class="col-12 col-sm-6">

                        <div class="form-group">
                            <td> <label for="buscar"><input type="text" class="form-control form-control-sm" placeholder="Tipo empleado" aria-controls="example1" name="id_tipo" id="id_tipo"><a href="<?php echo base_url() ?>/tipo/buscarr"></a>
                                    <input type="submit" id="buscar" value="Buscar "> </input></td>
                            <table id="example1" class="table table-bordered table-striped">


                                <tbody>
                                    <?php
                                    foreach ($tipos as $tipo) { ?>

                                        <tr>
                                            <td><?php echo $tipo['id'] ?></td>
                                            <td><?php echo $tipo['nombre'] ?></td>

                                            <td> <input type="checkbox" name="id_area" id="id_area" value="<?php echo $tipo['id'] ?>"> </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                            </label>

                        </div>

                    </div>


                    <div class="col-12 col-sm-6">

                        <div class="form-group">
                            <form action="<?php echo base_url() ?>/area/buscarr" method="post">

                                <td> <label for="buscar"><input type="text" class="form-control form-control-sm" placeholder="Area" aria-controls="example1" name="id_area" id="id_area"></label>
                                    <input type="submit" id="buscar" value="Buscar ">
                                </td>
                                <table id="example1" class="table table-bordered table-striped">


                                    <tbody>
                                        <?php
                                        foreach ($tipos as $area) { ?>

                                            <tr>
                                                <td><?php echo $area['id'] ?></td>
                                                <td><?php echo $area['nombre'] ?></td>

                                                <td> <input type="checkbox" name="id_area" id="id_area" value="<?php echo $area['id'] ?>"> </td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </form>
                        </div>

                    </div>


                </div>
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
                <button type="submit" class="btn btn-primary" value="Guardar">Guardar</button>
                <a href="<?php echo base_url() ?>/empleado" class="btn btn-dark ">Cancelar</a>

            </div>
        </form>

    </div>
    <!-- /.card-body -->
</div>
<!-- Modal -->