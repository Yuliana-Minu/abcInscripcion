<!-- **********************     Inicio Tabla Datatable     *********************************** -->
<table id="persona" class="table table-striped table-bordered">

</table>

<script>
    $(document).ready(function() {
        var table =	$('#persona').DataTable({
            "processing": true,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                  "sFirst": "Primero",
                  "sLast": "Último",
                  "sNext": "Siguiente",
                  "sPrevious": "Anterior"
                },
                "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            ajax: {
                url: 'jdocente',
                type: 'POST'
            },
            columns: [
              {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
              },
              { data: 'per_identificacion', title: 'Número Identificación'},
              { data: 'tid_nombre', title: 'Tipo Identificación'},
              { data: 'nombrePersona', title: 'Nombre'},          
              { data: 'genero', title: 'Genero'},
              {
                data: null, 
                render: function (data, type, full, meta){
                  return '<span class="d-inline-block" tabindex="0"  title="Editar Persona"><button type="button" class="btn btn-danger btn-sm" onclick="modificarPersona(\''+full["per_codigo"]+'\');"><i class="fas fa-pen"></i></button></span>&nbsp;<span class="d-inline-block" tabindex="0"  title="Perfil"><button type="button" class="btn btn-danger btn-sm" onclick="perfilUser(\''+full["per_codigo"]+'\');"><i class="fas fa-users-cog"></i></button></span>';
                }
              },
            ],

            scrollY:        "1200px",
            scrollCollapse: true,
            paging:         true,
            buttons:        [ 'colvis' ],
            "autoWidth": false,
            "fixedHeader": {
              "header": true,
              "footer": true
            },
            "order": [[1, 'asc']],
            
            "columnDefs": [
              { "width": "5px", "targets": 0 },
              { "width": "80px", "targets": 1 },
              { "width": "90px", "targets": 2 },
              { "width": "150px", "targets": 3 },
              { "width": "50px", "targets": 4 },
              { "width": "30px", "targets": 5 },
            ],
        });

        function format(codigo_data) {
          var per_codigo=codigo_data.per_codigo;
          var dataenviar = {
                          "per_codigo" : codigo_data.per_codigo,
                          }

          $.ajax({
              url:"infopersona",
              type:"POST",
              data:dataenviar,
              async:true,

              success: function(message){
                  $("#infoPersona"+per_codigo).empty().append(message);
              }
          });

          return '<div id="infoPersona'+per_codigo+'"></div>';
          }


        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        }

        $('#persona tbody').on('click', 'td.details-control', function(){
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if ( row.child.isShown() ) {
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });
    });


  function modificarPersona(codigo_persona){
    var codigo_persona= codigo_persona;
    //alert(codigo_persona);
    $('#frmModal').modal({
      keyboard: true
    });
    var seccion=3;
    $.ajax({
      url:"frmpersona",
      type:"POST",
      data:"codigo_persona="+codigo_persona+'&seccion='+seccion,
      async:true,

      success: function(message){
        $(".modal-content").empty().append(message);
      }
    });
  }

  function perfilUser(codigo_persona){
    var codigo_persona= codigo_persona;
    var seccion=3;
    $('#frmModal').modal({
      keyboard: true
    });

    $.ajax({
      url:"formperfilusuario",
      type:"POST",
      data:"codigo_persona="+codigo_persona+'&seccion='+seccion,
      async:true,

      success: function(message){
        $(".modal-content").empty().append(message);
      }
    });
  }


</script>
