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
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
                },
                "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            ajax: {
                url: 'jpersona',
                type: 'POST'
            },
            columns: [
                { data: 'per_nombre', title: 'Nombre'},
                { data: 'per_primerapellido', title: 'Estado'},
                {
                data: null, 
                    render: function (data, type, full, meta){
                        return '<span class="d-inline-block" tabindex="0"  title="Editar Categoria Laboral"><button type="button" class="btn btn-danger btn-sm" onclick="editar(\''+full["per_codigo"]+'\');"><i class="fas fa-pen"></i></button></span>';
                    }
                },
            ],
            scrollY:        "620px",
            scrollCollapse: true,
            paging:         false,
            buttons:        [ 'colvis' ],
            "autoWidth": false,
            "fixedHeader": {
                "header": true,
                "footer": true
            },
            "order": [[0, 'asc']],
            "columnDefs": [
                { "width": "120px", "targets": 0 },
                { "width": "40px", "targets": 1 },
                { "width": "25px", "targets": 2 },
            ],
        });


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
        $('#frmModal').modal({
            keyboard: true
        });

        $.ajax({
            url:"frmpersona",
            type:"POST",
            data:"codigo_persona="+codigo_persona,
            async:true,

            success: function(message){
            $(".modal-content").empty().append(message);
            }
        });
    }

    function usuario(codigo_persona){
        var codigo_persona= codigo_persona;
        $('#frmModal').modal({
            keyboard: true
        });

        $.ajax({
            url:"user",
            type:"POST",
            data:"codigo_persona="+codigo_persona,
            async:true,

            success: function(message){
            $(".modal-content").empty().append(message);
            }
        });
    }


</script>
