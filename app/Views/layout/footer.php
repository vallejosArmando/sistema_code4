<!-- /.CAMPO DE TABLAS -->
</div>
<!-- /.CAMPO DE TABLAS -->
<!-- /.card -->
</div>
<!-- /.col -->

<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapp-->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.1.0
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>/public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/public/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url(); ?>/public/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- Ch-->
<script src="<?php echo base_url(); ?>/public/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>/public/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>/public/dist/js/pages/dashboard2.js"></script>

<!-- Bootstrap 4 -->
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>/public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>/public/js/ficha.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/select2/js/select2.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/select2/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/jquery-3.5.0.js"></script>
<script src="<?php echo base_url(); ?>/public/plugins/jquery-3.5.0.min.js"></script>







<script>
  $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));


  });
  $(function() {
    $("#btnEnviar").click(function(event) {
      /*Evita que se recargue la p??gina*/
      event.preventDefault();
      /* Serializamos en una sola variable ambos formularios*/
      var allData = $("#formulario_personas").serialize();
      /*Prueba*/
      console.log(allData);
      /*Podemos usar allData para enviarlo por Ajax o lo que sea*/
    });
  });

  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
</script>

<!--<script>
  function id_tipo() {
    $('#id_tipo').select2({

    });
  }
  $(document).ready(function() {
    id_tipo();
  });
</script>-->
<script>
  $('.areas').select2();
</script>
<script>
  $('.tipos').select2();
</script>

<script>
  $('.personass').select2();
  $('.gruposs').select2();
  $('.roless').select2();
  $('.opcioness').select2();
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#tabla').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
        'url': "<?= site_url('/persona/getPersona') ?>",
        'data': function(data) {
          // CSRF Hash
          var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
          var csrfHash = $('.txt_csrfname').val(); // CSRF hash

          return {
            data: data,
            [csrfName]: csrfHash // CSRF Token
          };
        },
        dataSrc: function(data) {

          // Update token hash
          $('.personass').val(data.token);

          // Datatable data
          return data.aaData;
        }
      },
      'columns': [{
          data: 'id'
        },
        {
          data: 'nombres'
        },
        {
          data: 'ap'
        },
        {
          data: 'am'
        },
      ]
    });
  });
</script>

<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "language": {
        "processing": "Procesando...",
        "lengthMenu": "Mostrar _MENU_ registros",
        "zeroRecords": "No se encontraron resultados",
        "emptyTable": "Ning??n dato disponible en esta tabla",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "infoThousands": ",",
        "loadingRecords": "Cargando...",
        "paginate": {
          "first": "Primero",
          "last": "??ltimo",
          "next": "Siguiente",
          "previous": "Anterior"
        },
        "aria": {
          "sortAscending": ": Activar para ordenar la columna de manera ascendente",
          "sortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
          "copy": "Copiar",
          "colvis": "Visibilidad",
          "collection": "Colecci??n",
          "colvisRestore": "Restaurar visibilidad",
          "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
          "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %d fila al portapapeles"
          },
          "copyTitle": "Copiar al portapapeles",
          "csv": "CSV",
          "excel": "Excel",
          "pageLength": {
            "-1": "Mostrar todas las filas",
            "1": "Mostrar 1 fila",
            "_": "Mostrar %d filas"
          },
          "pdf": "PDF",
          "print": "Imprimir"
        },
        "autoFill": {
          "cancel": "Cancelar",
          "fill": "Rellene todas las celdas con <i>%d<\/i>",
          "fillHorizontal": "Rellenar celdas horizontalmente",
          "fillVertical": "Rellenar celdas verticalmentemente"
        },
        "decimal": ",",
        "searchBuilder": {
          "add": "A??adir condici??n",
          "button": {
            "0": "Constructor de b??squeda",
            "_": "Constructor de b??squeda (%d)"
          },
          "clearAll": "Borrar todo",
          "condition": "Condici??n",
          "conditions": {
            "date": {
              "after": "Despues",
              "before": "Antes",
              "between": "Entre",
              "empty": "Vac??o",
              "equals": "Igual a",
              "notBetween": "No entre",
              "notEmpty": "No Vacio",
              "not": "Diferente de"
            },
            "number": {
              "between": "Entre",
              "empty": "Vacio",
              "equals": "Igual a",
              "gt": "Mayor a",
              "gte": "Mayor o igual a",
              "lt": "Menor que",
              "lte": "Menor o igual que",
              "notBetween": "No entre",
              "notEmpty": "No vac??o",
              "not": "Diferente de"
            },
            "string": {
              "contains": "Contiene",
              "empty": "Vac??o",
              "endsWith": "Termina en",
              "equals": "Igual a",
              "notEmpty": "No Vacio",
              "startsWith": "Empieza con",
              "not": "Diferente de"
            },
            "array": {
              "not": "Diferente de",
              "equals": "Igual",
              "empty": "Vac??o",
              "contains": "Contiene",
              "notEmpty": "No Vac??o",
              "without": "Sin"
            }
          },
          "data": "Data",
          "deleteTitle": "Eliminar regla de filtrado",
          "leftTitle": "Criterios anulados",
          "logicAnd": "Y",
          "logicOr": "O",
          "rightTitle": "Criterios de sangr??a",
          "title": {
            "0": "Constructor de b??squeda",
            "_": "Constructor de b??squeda (%d)"
          },
          "value": "Valor"
        },
        "searchPanes": {
          "clearMessage": "Borrar todo",
          "collapse": {
            "0": "Paneles de b??squeda",
            "_": "Paneles de b??squeda (%d)"
          },
          "count": "{total}",
          "countFiltered": "{shown} ({total})",
          "emptyPanes": "Sin paneles de b??squeda",
          "loadMessage": "Cargando paneles de b??squeda",
          "title": "Filtros Activos - %d"
        },
        "select": {
          "1": "%d fila seleccionada",
          "_": "%d filas seleccionadas",
          "cells": {
            "1": "1 celda seleccionada",
            "_": "$d celdas seleccionadas"
          },
          "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
          }
        },
        "thousands": ".",
        "datetime": {
          "previous": "Anterior",
          "next": "Proximo",
          "hours": "Horas",
          "minutes": "Minutos",
          "seconds": "Segundos",
          "unknown": "-",
          "amPm": [
            "am",
            "pm"
          ]
        },
        "editor": {
          "close": "Cerrar",
          "create": {
            "button": "Nuevo",
            "title": "Crear Nuevo Registro",
            "submit": "Crear"
          },
          "edit": {
            "button": "Editar",
            "title": "Editar Registro",
            "submit": "Actualizar"
          },
          "remove": {
            "button": "Eliminar",
            "title": "Eliminar Registro",
            "submit": "Eliminar",
            "confirm": {
              "_": "??Est?? seguro que desea eliminar %d filas?",
              "1": "??Est?? seguro que desea eliminar 1 fila?"
            }
          },
          "error": {
            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">M??s informaci??n&lt;\\\/a&gt;).<\/a>"
          },
          "multi": {
            "title": "M??ltiples Valores",
            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aqu??, de lo contrario conservar??n sus valores individuales.",
            "restore": "Deshacer Cambios",
            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
          }
        }
      }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>