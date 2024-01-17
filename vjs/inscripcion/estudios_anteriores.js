function getInput(type) {
    var numero_estudios = 0;

    $("input[name='nombre_grado[]']").each(function(indice, elemento) {
        numero_estudios++;
    });
   
    var dta = ` <tr class="trEstudio${numero_estudios}">
                    <td><input type="text" class="form-control caja_texto_sizer" name="nombre_grado[]" aria-describedby="textHelp" value="" onblur="datosEstudiante()"></td>
                    <td><input type="text" class="form-control caja_texto_sizer" name="nombre_colegio[]" aria-describedby="textHelp" value="" onblur="datosEstudiante()"></td>
                    <td><input type="text" class="form-control caja_texto_sizer" name="nombre_direccion[]" aria-describedby="textHelp" value="" onblur="datosEstudiante()"></td>
                    <td><input type="number" class="form-control caja_texto_sizer" name="numero_telefono[]" aria-describedby="textHelp" value="" onblur="datosEstudiante()"></td>
                    <td><input type="text" class="form-control caja_texto_sizer" name="nombre_ciudad[]" aria-describedby="textHelp" value="" onblur="datosEstudiante()"></td>
                    <td><input type="number" class="form-control caja_texto_sizer" name="numero_year[]" aria-describedby="textHelp" value="" onblur="datosEstudiante()"></td>
                    <td><i class="fas fa-minus fa-lg" style="color: red" onclick="eliminar_tr('${numero_estudios}')"></i></td>
                </tr>`;
    return dta;
}

function eliminar_tr(data_info) {
    var data_info = data_info;
    $('.trEstudio'+data_info).remove();   

    var formulario = $('#inscripcionform')[0];
    var data_enviar = new FormData(formulario);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: 'cruddatosestudianteinscripcion',
        data: data_enviar,
        cache: false,
        contentType: false,
        processData: false, 
        success: function (data, status) {
            
        },
        error: function (e) {
            
        }
    }); 
}

function append(className, nodoToAppend) {
    var nodo = document.getElementsByClassName(className)[0];
    $('.'+className).append(nodoToAppend);
}

function AgregarItems() {
    var nodo = getInput('text')
    append("tablaEstudiosAnteriores", nodo)
}