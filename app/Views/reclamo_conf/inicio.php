<!-- Info boxes -->
<div class="card">

    <div class="card-header">
        <h3 class="card-title"><?php echo $titulo ?></h3>
    </div>
    <div class="card-header">
        <td> <a href="<?php echo base_url() ?>/reclamo_conf/agregar" class="btn btn-primary">Agregar</a> </td>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ap. paterno</th>
                    <th>Ap. materno</th>
                    <th>Telefono</th>
                    <th>Codigo_Usuario</th>
                    <th>Barrio</th>
                    <th>Calle o Avenida</th>
                    <th>Entre calles</th>
                    <th>Num. de casa</th>
                    <th>Referencias</th>
                    <th>Descripcion del reclamo_conf</th>
                    <th>Otro recurrente</th>
                    <th>Tel. del recurrente</th>
                    <th>Foto</th>

                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $data) : ?>

                    <tr>
                        <td><?php echo $data['ID'];  ?></td>
                        <td><?php echo $data['nombres'];  ?></td>
                        <td><?php echo $data['ap']; ?></td>
                        <td><?php echo $data['am']; ?></td>
                        <td><?php echo $data['telefono']; ?></td>
                        <td><?php echo $data['codigo_usuario']; ?></td>
                        <td><?php echo $data['barrio']; ?></td>
                        <td><?php echo $data['calle_avenida']; ?></td>
                        <td><?php echo $data['entre_que_calles']; ?></td>
                        <td><?php echo $data['numero_de_casa']; ?></td>
                        <td><?php echo $data['referencias']; ?></td>
                        <td><?php echo $data['descripcion_del_reclamo']; ?></td>
                        <td><?php echo $data['otro_recurrente']; ?></td>
                        <td><?php echo $data['telefono_del_recurrente']; ?></td>
                        <td><?php   echo '<img src="'.$data["fotos"].'" width="50" heigth="10"><br>'; ?></td>


                        <td> <a href="<?php echo base_url(); ?>/reclamo_conf/editar/<?php echo $data['id']; ?>" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a></td>
                        <td> <a href="#" data-href="<?php echo base_url() . '/reclamo_conf/eliminar/' . $data['id']; ?>" data-toggle="modal" data-target="#confirm-delete" data-placement="top" title="Eliminar registro" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                <?php endforeach; ?>
                icon-cancel
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ap. paterno</th>
                    <th>Ap. materno</th>
                    <th>Telefono</th>
                    <th>Codigo_Usuario</th>
                    <th>Barrio</th>
                    <th>Calle o Avenida</th>
                    <th>Entre calles</th>
                    <th>Num. de casa</th>
                    <th>Referencias</th>
                    <th>Descripcion del reclamo_conf</th>
                    <th>Otro recurrente</th>
                    <th>Tel. del recurrente</th>
                    <th>Foto</th>
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